<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\DataTables\OrdersDatatable;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrdersDatatable $datatable)
    {
        return $datatable->render('adminlte.orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('adminlte.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        if($request->has('ship')) {
            if($order->shipped) {
                $order->shipped = 0;
                $order->shipped_on = null;
                $order->save();
            } else {
                $order->shipped = 1;
                $order->shipped_on = now();
                $order->save();
            }
        }

        if($request->has('complete')) {
            if($order->completed) {
                $order->completed = 0;
                $order->completed_on = null;
                $order->save();
                foreach($order->products as $product) {
                    $product->stock++;
                    $product->save();
                }
            } else {
                $order->completed = 1;
                $order->completed_on = now();
                $order->save();
                foreach($order->products as $product) {
                    $product->stock--;
                    $product->save();
                }
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
