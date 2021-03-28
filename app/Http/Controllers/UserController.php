<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard($id, $slug) {
        $user_profile = Profile::where('user_id', $id)->where('slug', $slug)->firstOrFail();
        $tickets = Ticket::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->limit(8)->get();
        return view('user.dashboard', compact('user_profile', 'tickets'));
    }

   
}
