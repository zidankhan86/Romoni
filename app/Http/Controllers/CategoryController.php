<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::get();

        return view('backend.category.index', $data);
    }


    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'status' => 'required|boolean',
            'icon' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->icon  = $request->icon;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }


    public function edit($id)
    {
        $data['category'] = Category::findOrFail($id);
        return view('backend.category.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'status' => 'required|boolean',
            'icon' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->icon  = $request->icon;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }


        public function delete($id)
        {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
        }

}
