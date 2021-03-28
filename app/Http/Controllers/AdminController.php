<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Profile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard($id, $slug) {
        $admin_profile = Profile::where('user_id', $id)->where('slug', $slug)->firstOrFail();
        $tickets = Ticket::with('user', 'answer')->orderBy('created_at', 'DESC')->limit(6)->get();
        return view('admin.dashboard', compact('admin_profile', 'tickets'));
    }
}
