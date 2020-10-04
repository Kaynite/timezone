<?php

namespace App\Http\Controllers;

use App\Models\Mall;
use App\Models\Size;
use App\Models\Color;
use App\Models\Weight;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Traits\ProductsImagesUpload;
use App\DataTables\ProductsDatatable;
use Illuminate\Support\Facades\Storage;
use App\DataTables\TrashProductsDatatable;

class ProductsController extends Controller
{
    use ProductsImagesUpload;
    public function index(ProductsDatatable $datatable)
    {
        return $datatable->render('adminlte.products.index');
    }

    public function trash(TrashProductsDatatable $datatable)
    {
        return $datatable->render('adminlte.products.index');
    }

    public function create()
    {
        $weights       = Weight::locale()->get();
        $sizes         = Size::locale()->get();
        $colors        = Color::locale()->get();
        $categories    = Category::treeJson()->get();
        $manufacturers = Manufacturer::locale()->get();
        $malls         = Mall::locale()->get();
        $treeJson      = [];
        foreach ($categories as $category) {
            if ($category->parent == null) {
                $category->parent = '#';
            }
            array_push($treeJson, $category);
        }

        return view('adminlte.products.create')->with([
            'treeJson'      => json_encode($treeJson),
            'weights'       => $weights,
            'sizes'         => $sizes,
            'colors'        => $colors,
            'manufacturers' => $manufacturers,
            'malls'         => $malls,
        ]);
        // TODO: Change all select menus to custom menus.
    }



    public function store(Request $request)
    {

        $request->validate([
            'title_ar'         => 'required|string',
            'title_en'         => 'required|string',
            'content'          => 'required',
            'category_id'      => 'required|exists:categories,id',
            'trademark_id'     => 'nullable|exists:trademarks,id',
            'manufacturer_id'  => 'nullable|exists:manufacturers,id',
            'color_id'         => 'nullable|exists:colors,id',
            'weight'           => 'nullable|numeric',
            'weight_id'        => 'nullable|exists:weights,id',
            'size_id'          => 'nullable|exists:sizes,id',
            'price'            => 'required|numeric',
            'stock'            => 'required|integer',
            'stock_starts_at'  => 'nullable|date',
            'stock_ends_at'    => 'nullable|date',
            'offer_price'      => 'nullable|numeric',
            'offer_starts_at'  => 'nullable|date',
            'offer_ends_at'    => 'nullable|date',
            'status'           => 'required|in:accepted,pending,rejected',
            'rejection_reason' => 'nullable|string',
        ]);

        $product = Product::create($request->all());
        $product->malls()->sync($request->malls);

        $this->upload('images', $product->id);
        $product->image_id = $product->images()->first()->id;
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product was created successfully!');
    }

    public function show($id)
    {
        $product = Product::locale()->findOrFail($id);

        return view('site.products.details')->with('product', $product);
    }

    public function edit(Product $product)
    {
        $weights       = Weight::locale()->get();
        $sizes         = Size::locale()->get();
        $colors        = Color::locale()->get();
        $categories    = Category::treeJson()->get();
        $manufacturers = Manufacturer::locale()->get();
        $malls         = Mall::locale()->get();
        $treeJson      = [];
        foreach ($categories as $cat) {
            if ($cat->parent == null) {
                $cat->parent = '#';
            }
            $cat['state'] = (object) [
                'opened' => true,
            ];
            if ($product->category_id == $cat->id) {
                $cat['state'] = (object) [
                    'opened'   => true,
                    'disabled' => true,
                ];
            }
            array_push($treeJson, $cat);
        }

        return view('adminlte.products.edit')->with([
            'treeJson'       => json_encode($treeJson),
            'weights'        => $weights,
            'sizes'          => $sizes,
            'colors'         => $colors,
            'manufacturers'  => $manufacturers,
            'malls'          => $malls,
            'product'        => $product,
            'product_images' => $product->images()->paginate(10),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->ajax()) {
            $request->validate([
                'title_ar'         => 'required|string',
                'title_en'         => 'required|string',
                'content'          => 'required',
                'category_id'      => 'required|exists:categories,id',
                'trademark_id'     => 'nullable|exists:trademarks,id',
                'manufacturer_id'  => 'nullable|exists:manufacturers,id',
                'color_id'         => 'nullable|exists:colors,id',
                'weight'           => 'nullable|numeric',
                'weight_id'        => 'nullable|exists:weights,id',
                'size_id'          => 'nullable|exists:sizes,id',
                'price'            => 'required|numeric',
                'stock'            => 'required|integer',
                'stock_starts_at'  => 'nullable|date',
                'stock_ends_at'    => 'nullable|date',
                'offer_price'      => 'nullable|numeric',
                'offer_starts_at'  => 'nullable|date',
                'offer_ends_at'    => 'nullable|date',
                'status'           => 'required|in:accepted,pending,rejected',
                'rejection_reason' => 'nullable|string',
            ]);

            $product->update($request->all());

            return response()->json([
                'status'  => 'success',
                'message' => 'Product Changes were saved successfully',
            ]);
        }

        $request->validate([
            'title_ar'         => 'required|string',
            'title_en'         => 'required|string',
            'content'          => 'required',
            'category_id'      => 'required|exists:categories,id',
            'trademark_id'     => 'nullable|exists:trademarks,id',
            'manufacturer_id'  => 'nullable|exists:manufacturers,id',
            'color_id'         => 'nullable|exists:colors,id',
            'weight'           => 'nullable|numeric',
            'weight_id'        => 'nullable|exists:weights,id',
            'size_id'          => 'nullable|exists:sizes,id',
            'price'            => 'required|numeric',
            'stock'            => 'required|integer',
            'stock_starts_at'  => 'nullable|date',
            'stock_ends_at'    => 'nullable|date',
            'offer_price'      => 'nullable|numeric',
            'offer_starts_at'  => 'nullable|date',
            'offer_ends_at'    => 'nullable|date',
            'status'           => 'required|in:accepted,pending,rejected',
            'rejection_reason' => 'nullable|string',
        ]);

        $product->update($request->all());

        $product->malls()->sync($request->malls);

        $this->upload('images', $product->id);
        $product->image_id == null ? $product->image_id = $product->images()->first()->id : null;
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product was updated successfully!');
    }



    public function copy($id)
    {
        $product = Product::findOrFail($id);
        $copy    = $product->replicate();
        $copy->save();
        return redirect()->route('products.edit', $copy->id)
            ->with('success', 'Product was copied successfully!');
    }



    public function mainImage($id, $image_id)
    {
        $product = Product::findOrFail($id);
        $image = ProductImage::findOrFail($image_id);

        if($image->product_id != $product->id) {
            return redirect()->route('products.index')
                ->withErrors(['message' => 'The image is not attached to the product']);
        }

        $product->image_id = $image->id;
        $product->save();
        return redirect()->route('products.edit', $id)
            ->with('success', 'Product main image was changed successfully!');
    }



    public function destoryProductImage(Request $request)
    {
        if ($request->ajax()) {
            if($request->has('imageId')) {
                $image = ProductImage::find($request->imageId);
                if($image){
                    // Find Parent Product
                    $product = Product::find($image->product_id);

                    // Check if the image is the product main image
                    if($product->image_id == $request->imageId) {
                        // setting product main image to null
                        $product->image_id = null;
                        $product->save();
                    }

                    $image->delete();
                    Storage::delete($image->path);
                    return response()->json(['status' => 'success', 'message' => 'Image was deleted successfully!']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Image was not found!'], 404);
                }
            }
        }
    }



    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product was moved to trash successfully!');
    }

    public function restore($id)
    {
        Product::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('products.index')
            ->with('success', 'Product was restored successfully!');
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        Storage::deleteDirectory("products/$id");

        $product->forceDelete();

        return redirect()->route('products.index')
            ->with('success', __('admin.products.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('products')) {
            return back()->withErrors(['message' => __('admin.products.form.no selection')]);
        }

        Product::destroy($request->products);

        return redirect()->route('products.index')
            ->with('success', __('admin.products.form.success multiple delete'));
    }

}
