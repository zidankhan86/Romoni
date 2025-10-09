<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $clients = User::where('role','customer')->get();
        return view('backend.pages.users-index',compact('clients'));
    }
}
