<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StuffController extends Controller
{
     public function index()
    {
        $staffs = Stuff::latest()->get();
        return view('backend.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('backend.staff.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
            'gender' => 'nullable',
            'expert' =>'nullable',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->only('name', 'email', 'phone', 'status','gender','expert');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = 'uploads/staff/';
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path($path), $filename);
            $data['photo'] = $path . $filename;
        }

        Stuff::create($data);

        return redirect()->route('staff.index')->with('success', 'Staff added successfully.');
    }

    public function edit($id)
    {
        $staff = Stuff::findOrFail($id);
        return view('backend.staff.edit', compact('staff'));
    }

   public function update(Request $request, $id)
{
    $staff = Stuff::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'name'  => 'required|string|max:255',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'photo' => 'nullable|image|max:2048',
        'gender'=> 'nullable', // Correct validation
        'status'=> 'required|in:0,1',
        'expert' =>'nullable',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $request->only('name', 'email', 'phone', 'status', 'gender');

    // Only update photo if a new file is uploaded
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $path = 'uploads/staff/';
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path($path), $filename);
        $data['photo'] = $path . $filename;
    } else {
        // Keep old image
        $data['photo'] = $staff->photo;
    }

    $staff->update($data);

    return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
}


    public function destroy($id)
    {
        $staff = Stuff::findOrFail($id);
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
