<?php

namespace App\Http\Controllers;

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
        return view('backend.pages.dashboard',compact('total_service'));
    }


}
