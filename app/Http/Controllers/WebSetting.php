<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class WebSetting extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view setting', ['only' => ['index']]);
        $this->middleware('permission:update setting', ['only' => ['update']]);
    }

    public function index()
    {
        $settings = Setting::first();

        if (!$settings) {
            return redirect()->back()->with('error', 'No settings found.');
        }

        return view('setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'logo_light' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $setting = Setting::find(1); // Get existing record or create a new one

        $setting->title = $request->input('title', $setting->title);

        $imageName = $setting->logo_light;
        if ($request->hasFile('logo_light')) {

            $imageName = "settings/".rand(99999,9999999).time().'.'.$request->logo_light->extension(); 
            $request->logo_light->move(public_path('settings'), $imageName);
            
        }
        $setting->logo_light = $imageName;
        
        $imageName2 = $setting->logo_dark;
        if ($request->hasFile('logo_dark')) {

            $imageName2 = "settings/".rand(99999,9999999).time().'.'.$request->logo_dark->extension(); 
            $request->logo_dark->move(public_path('settings'), $imageName2);
            
        }
        $setting->logo_dark = $imageName2;

        $imageName3 = $setting->light_icon;
        if ($request->hasFile('light_icon')) {

            $imageName3 = "settings/".rand(99999,9999999).time().'.'.$request->light_icon->extension(); 
            $request->light_icon->move(public_path('settings'), $imageName3);
            
        }
        $setting->light_icon = $imageName3;
        
        $imageName4 = $setting->dark_icon;
        if ($request->hasFile('dark_icon')) {

            $imageName4 = "settings/".rand(99999,9999999).time().'.'.$request->dark_icon->extension(); 
            $request->dark_icon->move(public_path('settings'), $imageName4);
 
        }
        $setting->dark_icon = $imageName4;
        
        $setting->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
