<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('frontend.pages.contact');
    }


    public function store(Request $request)
    {
        // 1️⃣ Validate request
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
             return redirect()->back()->with('error', 'Please check the form and try again.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // 2️⃣ Save contact message
            Contact::create([
                'name'    => $request->name,
                'email'   => $request->email,
                'message' => $request->message,
            ]);

            return redirect()->back()->with('success','Thank you! Your message has been sent successfully.');

        } catch (\Exception $e) {
            // 4️⃣ Error handling
            return redirect()->back()->with('error', 'Please check the form and try again.');
            return redirect()->back()->withInput();
        }
    }

}
