<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stuff;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderIndex(){

        // dd('');

        $data['orders']= Order::get();

        return view('backend.order.index',$data);
    }


    public function invoice($orderId)
{
    $order = Order::with('items')->findOrFail($orderId);

    return view('backend.order.invoice', compact('order'));
}


    public function assignStaffForm($id)
{
    $order = Order::findOrFail($id);
    $staffs = Stuff::where('status', '1')->get();

    return view('backend.order.assign', compact('order', 'staffs'));
}

public function assignStaff(Request $request, $id)
{
    $request->validate([
        'staff_id' => 'required|exists:stuffs,id',
    ]);

    $order = Order::findOrFail($id);
    $order->staff_id = $request->staff_id;
    $order->save();

    return redirect()->route('orderIndex')->with('success', 'Staff assigned successfully!');
}


}
