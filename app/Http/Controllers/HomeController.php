<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_service = Product::count();
        $total_order = Order::count();
        $total_revenue = Order::sum('total_price');
        $total_clients = User::where('role','customer')->count();
        return view('backend.pages.dashboard', compact('total_service', 'total_order','total_revenue','total_clients'));
    }
}
