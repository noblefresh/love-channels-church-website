<?php

namespace App\Http\Controllers\Backend;

use App\Customs\Utilities;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::latest()->paginate(20);
            $title = 'All products';
            return view('admin.products.index', compact('title', 'products'));
        } catch (\Exception $e) {
            dd("an exceptional error occured.");
        } catch (\Error $e) {
            dd("an error occured.");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add new product';
        $categories = Category::all();
        return view('admin.products.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image'],
            'category_id' => ['required'],
            'description' => []
        ]);

        // $height = Image::make($request->thumbnail)->height();
        // $width = Image::make($request->thumbnail)->width();

        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnail = Utilities::createFitThumbnails($request->file('thumbnail'), 'product_cover_images', '.webp', 270, 160);
                if (Product::create(array_merge($data, ['thumbnail' => $thumbnail]))) {
                    return back()->withSuccess("Product created successfully.");
                } else {
                    return back()->withError("ooOps! An error occured while saving product.");
                }
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        } catch (\Error $e) {
            return back()->withError("ooOps! An error occured.");
        }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $title = "Edit $product->name";
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'description' => []
        ]);

        // $height = Image::make($request->thumbnail)->height();
        // $width = Image::make($request->thumbnail)->width();

        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnail = Utilities::createFitThumbnails($request->file('thumbnail'), 'product_cover_images', '.webp', 270, 160);
                if ($product->update(array_merge($data, ['thumbnail' => $thumbnail]))) {
                    return back()->withSuccess("Product updated successfully.");
                } else {
                    return back()->withError("ooOps! An error occured while saving product.");
                }
            }else{
                if ($product->update($data)) {
                    return back()->withSuccess("Product updated successfully.");
                } else {
                    return back()->withError("ooOps! An error occured while updating product.");
                }
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        } catch (\Error $e) {
            return back()->withError("ooOps! An error occured.");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            if ($product->delete()) {
                return back()->withSuccess("Product deleted successfully.");
            } else {
                return back()->withError("Error occured while deleting product.");
            }
        } catch (\Exception $e) {
            dd("An exceptional error occured");
        } catch (\Error $e) {
            dd("An error occured");
        }
    }
}
