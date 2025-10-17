<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderIndex(){

        // dd('');

        $data['orders']= Order::get();

        return view('backend.order.index',$data);
    }


  public function report()
{
    // Base query for orders
    $ordersQuery = Order::with('items')->latest();

    // Apply date filters if provided
    $from = request('from');
    $to = request('to');

    if ($from) {
        $ordersQuery->whereDate('created_at', '>=', $from);
    }

    if ($to) {
        $ordersQuery->whereDate('created_at', '<=', $to);
    }

    $data['orders'] = $ordersQuery->get();
    $data['from'] = $from;
    $data['to'] = $to;

    // === CHART DATA ===
    // Daily Orders (last 7 days)
    $dailyOrders = Order::select(
        DB::raw('DATE(created_at) as date'),
        DB::raw('COUNT(*) as total')
    )
        ->where('created_at', '>=', Carbon::now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date', 'ASC')
        ->pluck('total', 'date');

    // Weekly Orders (last 4 weeks)
    $weeklyOrders = Order::select(
        DB::raw('YEARWEEK(created_at, 1) as week'),
        DB::raw('COUNT(*) as total')
    )
        ->where('created_at', '>=', Carbon::now()->subWeeks(4))
        ->groupBy('week')
        ->orderBy('week', 'ASC')
        ->pluck('total', 'week');

    // Monthly Orders (last 6 months)
    $monthlyOrders = Order::select(
        DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
        DB::raw('COUNT(*) as total')
    )
        ->where('created_at', '>=', Carbon::now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month', 'ASC')
        ->pluck('total', 'month');

    // Pass data to view
    $data['dailyLabels'] = $dailyOrders->keys();
    $data['dailyData'] = $dailyOrders->values();

    $data['weeklyLabels'] = $weeklyOrders->keys();
    $data['weeklyData'] = $weeklyOrders->values();

    $data['monthlyLabels'] = $monthlyOrders->keys();
    $data['monthlyData'] = $monthlyOrders->values();

    $data['title'] = 'Order Report';

    return view('backend.order.report', $data);
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


public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,approved,cancelled',
    ]);

    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully!');
}



}
