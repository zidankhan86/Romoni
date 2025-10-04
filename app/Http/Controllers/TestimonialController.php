<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{

    public function index()
    {
        $data['testimonials'] = Testimonial::get();
        return view('backend.testiominal.index', $data);
    }

    // Store new testimonial
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'review'      => 'required',
            'rating'      => 'required|integer|between:1,5',
            'image'       => 'required',
            'is_verified' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $fileName);
            $data['image'] = $fileName;
        }

        Testimonial::create($data);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully.');
    }

    // Update existing testimonial
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'review'      => 'required',
            'rating'      => 'required|integer|between:1,5',
            'image'       => 'required',
            'is_verified' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image && file_exists(public_path('uploads/testimonials/' . $testimonial->image))) {
                unlink(public_path('uploads/testimonials/' . $testimonial->image));
            }

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/testimonials'), $fileName);
            $data['image'] = $fileName;
        }

        $testimonial->update($data);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully.');
    }


    public function create()
    {

        return view('backend.testiominal.create');
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testiominal.edit', compact('testimonial'));
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete image if exists
        if ($testimonial->image && file_exists(public_path('uploads/testimonials/' . $testimonial->image))) {
            unlink(public_path('uploads/testimonials/' . $testimonial->image));
        }

        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }
}
