<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function edit()
    {
        $theme_info = Theme::firstOrFail();
        return view('theme.edit', compact('theme_info'));
    }


    public function update(Request $request) {
        $theme_info = Theme::firstOrFail();
        $request->validate([
            'theme_name' => 'required',
            'logo' => 'nullable|mimes:jpg,png,jpeg,gif,ico',
            'favicon' => 'nullable|mimes:jpg,png,jpeg,gif,ico',
        ]);

        $theme_info->theme_name = $request->theme_name;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $file_path = 'assets/images/';
            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = time() . '-' . 'logo' . '.' . $extension;
            $upload_path = 'public/assets/images/';
            $file->move($file_path, $fileName);
            $db_img = $file_path . $fileName;
            $theme_info->logo = $db_img;
        } 

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $file_path = 'assets/images/';
            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = time() . '-' . 'favicon' . '.' . $extension;
            $upload_path = 'public/assets/images/';
            $file->move($file_path, $fileName);
            $db_img = $file_path . $fileName;
            $theme_info->favicon = $db_img;
        } 
        $theme_info->save();

        Session::put('success', 'Updated successfully');

        return redirect()->back();

    }
}
