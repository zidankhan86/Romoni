<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $data['categories'] = Category::get();
        return view('backend.product.create', $data);
    }
    public function index()
    {
        $data['products'] = Product::all();

        return view('backend.product.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'          => 'required|max:255',
                'price'         => 'required|numeric',
                'image'         => 'required',
                'description'   => 'required',
                'status'        => 'required',
                'is_popular'    => 'required',
                'time'          => 'required',
                'short_description' =>'nullable'
            ]);

            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $imageName, 'public');
            }

            $product = new Product;
            $product->name              = $request->name;
            $product->category_id       = $request->category_id;
            $product->slug              = Str::slug($request->name);
            $product->price             = $request->price;
            $product->image             = '/public/uploads/' . $imageName;
            $product->description       = $request->description;
            $product->is_popular        = $request->is_popular;
            $product->status            = $request->status;
            $product->time              = $request->time;
            $product->short_description = $request->short_description;
            $product->save();

            // ✅ Save multiple gallery images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    if ($file->isValid()) {
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('uploads', $filename, 'public');
                        ImageGallery::create([
                            'product_id' => $product->id,
                            'images' => '/public/uploads/' . $filename,
                        ]);
                    }
                }
            }

            return redirect()->route('product.index')->with('success', '✅ Product created successfully!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', '❌ Something went wrong: ' . $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::get();
        return view('backend.product.edit', $data);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'image' => 'nullable|image',
                'description' => 'required',
                'status' => 'required',
                'is_popular' => 'required',
                'time' => 'required',
                'short_description' =>'nullable'
            ]);

            $product = Product::findOrFail($id);

            /* ---------------------------
         ✅ Remove existing thumbnail if requested
        ---------------------------- */
            if ($request->remove_thumbnail == '1') {
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }
                $product->image = null;
            }

            /* ---------------------------
         ✅ Update main image if a new one is uploaded
        ---------------------------- */
            if ($request->hasFile('image')) {
                // delete old image if exists
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }

                $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $imageName, 'public');
                $product->image = '/public/uploads/' . $imageName;
            }

            /* ---------------------------
         ✅ Remove selected gallery images
        ---------------------------- */
            if ($request->filled('remove_images')) {
                $removeIds = explode(',', $request->remove_images);
                foreach ($removeIds as $imgId) {
                    $image = ImageGallery::where('id', $imgId)->where('product_id', $product->id)->first();
                    if ($image) {
                        $path = public_path($image->images);
                        if (file_exists($path)) {
                            unlink($path);
                        }
                        $image->delete();
                    }
                }
            }

            /* ---------------------------
         ✅ Update basic product data
        ---------------------------- */
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->slug = Str::slug($request->name);
            $product->price = $request->price;
            $product->description = $request->description;
            $product->is_popular = $request->is_popular;
            $product->status = $request->status;
            $product->time = $request->time;
            $product->short_description = $request->short_description;
            $product->save();

            /* ---------------------------
         ✅ Add new gallery images
        ---------------------------- */
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    if ($file->isValid()) {
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('uploads', $filename, 'public');
                        ImageGallery::create([
                            'product_id' => $product->id,
                            'images' => '/public/uploads/' . $filename,
                        ]);
                    }
                }
            }

            return redirect()->route('product.index')->with('success', '✅ Product updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', '❌ Something went wrong: ' . $e->getMessage());
        }
    }




    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            // ✅ Delete main image from storage
            if ($product->image && file_exists(public_path(str_replace('/public', '', $product->image)))) {
                unlink(public_path(str_replace('/public', '', $product->image)));
            }

            // ✅ Delete gallery images
            $galleries = ImageGallery::where('product_id', $product->id)->get();
            foreach ($galleries as $gallery) {
                if ($gallery->images && file_exists(public_path(str_replace('/public', '', $gallery->images)))) {
                    unlink(public_path(str_replace('/public', '', $gallery->images)));
                }
                $gallery->delete();
            }

            // ✅ Delete the product itself
            $product->delete();

            return redirect()->route('product.index')->with('success', '🗑️ Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '❌ Something went wrong: ' . $e->getMessage());
        }
    }
}
