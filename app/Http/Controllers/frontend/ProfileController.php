<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
 public function profile()
{
    $user = auth()->user();

    // Get user orders
     $orders = Order::with('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(4)
            ->get();

    return view('frontend.user.profile', compact('user', 'orders'));
}


 public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'password' => 'nullable|min:5|confirmed',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imageName = $user->image;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();

        // Move file to public/uploads
        $file->move(public_path('uploads'), $imageName);
    }

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'role' => 'customer',
        'image' => $imageName,
        'gender'  =>$request->gender
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}


 public function myOrders(){

    $orders = Order::with('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

    return view('frontend.user.user-order',compact('orders'));

   }


}
