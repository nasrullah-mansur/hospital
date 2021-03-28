<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {}

    public function add($id, $slug){
        $profile = Profile::where('slug', $slug)->firstOrFail();
        return view('profile.add', compact('profile'));
    }

    public function edit($id, $slug) {
       $profile = Profile::where('slug', $slug)->where('user_id', $id)->firstOrFail();
        return view('profile.edit', compact('profile'));
    }


    public function update(Request $request) {
        $profile = Profile::where('user_id', Auth::user()->id)->firstOrFail();
        $request->validate([
            'full_name' => 'required|max:255',
            'gender' => 'required|max:255',
            'birth_date' => 'required|max:255',
            'age' => 'required|numeric',
            'address' => 'required',
            'medical_history' => 'required',
        ]);

        $profile->full_name = $request->full_name;
        $profile->slug = Str::slug($request->full_name, '-');
        $profile->gender = $request->gender;
        $profile->birth_date = $request->birth_date;
        $profile->age = $request->age;
        $profile->address = $request->address;
        $profile->medical_history = $request->medical_history;

        $profile->save();

        return redirect()->route('dashboard');

    }

    public function full_update(Request $request, $id, $slug)
    {
        $profile = Profile::where('slug', $slug)->where('user_id', $id)->firstOrFail();
        if($request->email != Auth::user()->email) {
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        } else {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                
                'birth_date' => 'required|max:255',
                'age' => 'required|numeric',
                'address' => 'required',
                'medical_history' => 'required',
    
                'content_password' => ['nullable', 'min:8', new MatchOldPassword],
                'new_password' => ['nullable', 'min:8'],
                'confirm_password' => ['same:new_password'],
            ]);
        }

        $profile->full_name = $request->full_name;
        $profile->slug = Str::slug($request->full_name, '-');
        $profile->birth_date = $request->birth_date;
        $profile->age = $request->age;
        $profile->address = $request->address;
        $profile->medical_history = $request->medical_history;
        $profile->save();

        if($request->confirm_password != null) {
            User::where('id', Auth::user()->id)->update([
                'password' => $request->confirm_password,
            ]);
        }

        if($request->confirm_password != null) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->confirm_password),
            ]);
            return redirect()->route('logout');
        } 

        if($request->email != Auth::user()->email) {
            User::where('id', Auth::user()->id)->update([
                'email' => $request->email,
            ]);
            Auth::guard('web')->logout();
        }

        return redirect()->route('dashboard');

    }
}
