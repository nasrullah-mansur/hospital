<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('profile');
    }
    
    public function index() {
        if(Auth::user()->profile->user_role == 0) {
            $slug = Auth::user()->profile->slug;
            $id = Auth::user()->id;
            return redirect()->route('user.dashboard', [$id, $slug]);
        } elseif (Auth::user()->profile->user_role == 1) {
            $slug = Auth::user()->profile->slug;
            $id = Auth::user()->id;
            return redirect()->route('admin.dashboard', [$id, $slug]);
        } else {
            abort(404);
        }
    }
}


