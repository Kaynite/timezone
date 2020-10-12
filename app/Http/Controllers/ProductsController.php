<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDatatable;
use App\DataTables\TrashProductsDatatable;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Mall;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Size;
use App\Models\Trademark;
use App\Models\Weight;
use App\Traits\ImagesUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    use ImagesUpload;
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
        $trademarks    = Trademark::locale()->get();
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
            'trademarks'    => $trademarks,
        ]);
        // TODO: Change all select menus to custom menus.
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->malls()->sync($request->malls);

        $this->upload($product, 'images', 'products');
        if ($request->hasFile('images')) {
            $product->image_id = $product->images->first()->id;
            $product->save();
        }

        return redirect()->route('products.index')
            ->with('success', 'Product was created successfully!');
    }

    public function show($id, $slug)
    {
        $product = Product::locale()->where('id', $id)->where('slug', $slug)->firstOrFail();
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
        $trademarks    = Trademark::locale()->get();
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
            'trademarks'     => $trademarks,
            'product_images' => $product->images()->paginate(10),
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        // Update Using Ajax
        if ($request->ajax()) {
            return $this->ajaxUpdate($product, $request);
        }

        if ($request->has('mainImage')) {
            return $this->mainImage($request->mainImage);
        }

        if ($request->has('deleteImage')) {
            return $this->destoryImage($request);
        }

        $product->update($request->all());

        $product->malls()->sync($request->malls);

        $this->upload($product, 'images', 'products');
        if ($request->hasFile('images')) {
            $product->image_id == null ? $product->image_id = $product->images()->first()->id : null;
            $product->save();
        }

        return redirect()->route('products.index')
            ->with('success', 'Product was updated successfully!');
    }

    public function ajaxUpdate($product, $request)
    {
        $product->update($request->all());
        $this->upload($product, 'images', 'products');
        if ($request->hasFile('images')) {
            $product->image_id = $product->images->first()->id;
            $product->save();
        }
        return response()->json([
            'status'  => 'success',
            'message' => 'Product Changes were saved successfully',
        ]);
    }

    public function copy($id)
    {
        $product    = Product::findOrFail($id);
        $copy       = $product->replicate();
        $copy->slug = $copy->slug . '-copy';
        $copy->save();
        return redirect()->route('products.edit', $copy->id)
            ->with('success', 'Product was copied successfully!');
    }

    public function mainImage($id)
    {
        $image   = Image::findOrFail($id);
        $product = Product::findOrFail($image->imageable_id);

        if ($image->imageable_id != $product->id) {
            return redirect()->route('products.index')
                ->withErrors(['message' => 'The image is not attached to the product']);
        }

        $product->image_id = $image->id;
        $product->save();
        return redirect()->route('products.edit', $product->id)
            ->with('success', 'The Image was changed successfully!!');
    }

    public function destoryImage($request)
    {
        if ($request->has('deleteImage')) {
            $image = Image::findOrFail($request->deleteImage);
            // Find Parent Product
            $product = Product::findOrFail($image->imageable_id);

            // Check if the image is the product main image
            if ($product->image_id == $request->deleteImage) {
                // setting product main image to null
                $product->image_id = null;
                $product->save();
            }

            $image->delete();
            Storage::delete($image->path);
            return redirect()->back()->with(['success' => 'Image was deleted successfully!']);
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

    public function makeSlug(Request $request)
    {
        if ($request->ajax() && $request->has('slug')) {
            $slug  = Str::slug($request->title);
            $times = Product::where('slug', 'LIKE', "%$slug%")->count();
            if ($times > 0) {
                $slug = $slug . '-' . strval($times + 1);
            }
            if ($slug != '') {
                return response()->json([
                    'slug'   => $slug,
                    'status' => 'success',
                ]);
            } else {
                return response()->json([
                    'message' => 'Please enter a valid title',
                    'status'  => 'error',
                ]);
            }

        }
    }

    public function shop(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::locale()->latest()->paginate(request('perPage'));
            return response()->json([
                'html'             => view('site.products.ajax.products')->with(['products' => $products])->render(),
                'pagination_links' => $products->links('vendor.pagination.custom')->render(),
            ]);
        }
        $products = Product::locale()->latest()->paginate();
        return view('site.products.shop')->with('products', $products);
    }

}
