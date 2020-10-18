<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Notifications\NewOrder;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $product = Product::locale()->findOrFail($id);
        Cart::add($product->id, $product->title, ($request->quantity ?? 1), $product->price)->associate('App\Models\Product');
        return redirect()->route('cart.index')->with(['success' => 'Item was added successfully!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->has('update')) {
            Cart::update($id, $request->quantity); // Will update the quantity
            return back()->with(['success' => 'Item was updated successfully!']);
        }

        if ($request->has('delete')) {
            $this->destroy($id);
            return back()->with(['success' => 'Item was removed successfully!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
    }

    public function checkout()
    {
        return view('site.checkout.index')->with([
            'countries' => Country::locale()->get(),
            'cities'    => City::locale()->get(),
        ]);
    }

    public function guestCheckout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return view('site.checkout.guest')->with([
                'countries' => Country::locale()->get(),
                'cities'    => City::locale()->get(),
            ]);
        }
    }

    public function charge(Request $request)
    {
        if ($request->payment_method == 'cod') {
            

            Admin::find(1)->notify(new NewOrder($this->makeOrder($request, null)));

            Cart::destroy();

            return redirect()->route('thankyou')->with('thankyou', 'Thank You');
        }
        if ($request->payment_method == 'card') {
            try {
                Stripe::charges()->create([
                    'amount'        => Cart::total(),
                    'currency'      => 'EGP',
                    'source'        => $request->stripeToken,
                    'description'   => 'Order',
                    'receipt_email' => $request->email,
                    'metadata'      => [
                        'quantity' => Cart::count(),
                    ],
                ]);

                $this->makeOrder($request, null);

                Cart::destroy();

                return redirect()->route('thankyou')->with('thankyou', 'Thank You');
            } catch (\Exception $e) {
                $this->makeOrder($request, $e->getMessage());
                return back()->withErrors(['card_error' => $e->getMessage()]);
            }
        }
    }

    public function thankyou()
    {
        if (!session()->has('thankyou')) {
            return redirect()->route('home');
        }
        return view('site.checkout.thankyou');
    }

    public function makeOrder($request, $error = null)
    {
        $request->validate([
            'first_name'     => 'required|string',
            'last_name'      => 'required|string',
            'email'          => 'required|email',
            'phone'          => 'required',
            'address_1'      => 'required|string',
            'address_2'      => 'nullable',
            'country_id'     => 'required|integer',
            'city_id'        => 'required|integer',
            'state'          => 'required|string',
            'post_code'      => 'string|nullable',
            'payment_method' => 'in:cod,card',
        ]);
        $order = Order::create([
            'user_id'        => $request->user()->id ?? null,
            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address_1'      => $request->address_1,
            'address_2'      => $request->address_2,
            'country_id'     => $request->country_id,
            'city_id'        => $request->city_id,
            'state'          => $request->state,
            'post_code'      => $request->post_code,
            'subtotal'       => Cart::subtotal(2, '.', ''),
            'discount'       => Cart::getCost('discount'),
            'discount_code'  => '',
            'tax'            => Cart::tax(2, '.', ''),
            'total'          => Cart::total(2, '.', ''),
            'payment_method' => $request->payment_method,
            'error'          => $error,
            'comment'        => $request->comment,
        ]);

        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $item->model->id,
                'quantity'   => $item->qty,
                'price'      => $item->price,
            ]);
        }

        return $order;

    }
}
