<?php

namespace App\Http\Controllers;

use App\Models\CustomPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    public function index()
    {
        $data = CustomPage::all();
        return view('backend.components.custom_page.index', compact('data'));
    }

    public function edit($id)
    {
        $item = CustomPage::findOrFail($id);
        return view('backend.components.custom_page.edit', compact('item'));
    }

    public function update(Request $request, $id)
{

    // dd($request->all());
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'meta_title' => 'required|string|max:255',
        'meta_description' => 'required|string|max:255',
        'meta_keywords' => 'required|string|max:255',
        'status' => 'required|boolean',
        'body' => 'required',
    ]);

    // Find the existing record
    $item = CustomPage::findOrFail($id);

    // Assign each field explicitly
    $item->title = $validatedData['title'];
    $item->meta_title = $validatedData['meta_title'];
    $item->meta_description = $validatedData['meta_description'];
    $item->meta_keywords = $validatedData['meta_keywords'];
    $item->status = $validatedData['status'];
    $item->body = $validatedData['body'];

    // Save the updated record
    $item->save();

    // Redirect or return response
    return redirect()->route('custom.page.index')->with('success', 'Custom page updated successfully.');
}



public function about(){
    return view('frontend.custom_page.about');
}
}
