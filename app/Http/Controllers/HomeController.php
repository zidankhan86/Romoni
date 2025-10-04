<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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
        return view('backend.pages.dashboard',compact('total_service','total_order'));
    }


}
