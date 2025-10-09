<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit(){

        $setting = Settings::first();
        return view('backend.settings.index',compact('setting'));

    }


    public function update(Request $request, $id)
    {
        // ✅ Step 1: Validate input
        $request->validate([
            'facebook_link'   => 'nullable|string|max:255',
            'instagram_link'  => 'nullable|string|max:255',
            'youtube_link'    => 'nullable|string|max:255',
            'phone'           => 'nullable|string|max:50',
            'top_var_text'    => 'nullable|string|max:255',
            'copyright_text'  => 'nullable|string|max:500',
        ]);

        try {
            // ✅ Step 2: Find the existing settings record
            $setting = Settings::findOrFail($id);

            // ✅ Step 3: Update with new values
            $setting->update([
                'facebook_link'   => $request->facebook_link,
                'instagram_link'  => $request->instagram_link,
                'youtube_link'    => $request->youtube_link,
                'phone'           => $request->phone,
                'top_var_text'    => $request->top_var_text,
                'copyright_text'  => $request->copyright_text,
            ]);


            return redirect()->back()->with('success','Settings updated successfully!');

        } catch (\Exception $e) {
dd($e);
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
