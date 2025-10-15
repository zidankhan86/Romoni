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
    $orders = \App\Models\Order::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
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
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads', $imageName, 'public');
    }

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'role' => 'customer',
        'image' => $imageName,
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
