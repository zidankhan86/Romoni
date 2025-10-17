<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\PasswordCheckRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
            /**
             * Display a listing of the resource.
             */
            public function index()
            {
                return view('frontend.components.registration.registration');
            }


            /**
             * Store a newly created resource in storage.
             */
           public function store(Request $request)
            {
                // Validate input
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|unique:users',
                    'phone' => [
                        'required',
                        'regex:/^(?:\+?88|0088)?01[13-9]\d{8}$/'
                    ],
                    'name' => 'required',
                    'password' => 'required|min:5',
                ], [
                    'phone.regex' => 'The phone number should be a valid number.'
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Handle image upload
                $imageName = null;
                if ($request->hasFile('image')) {
                    $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('uploads', $imageName, 'public');
                }

                // Create user
                $user = User::create([
                    "email"    => $request->email,
                    "phone"    => $request->phone,
                    "name"     => $request->name,
                    "password" => bcrypt($request->password),
                    "role"     => 'customer',
                    "image"    => $imageName,
                    'gender'  =>$request->gender
                ]);

                // Automatically log in the user
                Auth::login($user);

                return redirect()->route('home')->with('success', '✅ Registration successful. You are now logged in.');
            }



            public function update(Request $request, string $id)
            {

            $userUpdate= User::find($id);

            $imageName = auth()->user()->image;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('uploads', $imageName, 'public');
            }
            //dd($imageName);
            $userUpdate->update([
                "email"   =>  $request->email,
                "phone"   =>  $request->phone,
                "name"    =>  $request->name,
                "role"    =>  'admin',
                "image"   => $imageName,

            ]);
                return redirect()->back()->withSuccess('Profile Update Success');
            }


}
