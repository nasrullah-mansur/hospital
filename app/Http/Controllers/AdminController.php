<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Ticket;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard($id, $slug) {
        $admin_profile = Profile::where('user_id', $id)->where('slug', $slug)->firstOrFail();
        $tickets = Ticket::with('user', 'answer')->orderBy('created_at', 'DESC')->limit(6)->get();
        $today_tickets = Ticket::whereDate('created_at', Carbon::today())->count();
        $today_reply = Answer::where('p_id', 0)->whereDate('created_at', Carbon::today())->count();
        $today_due = $today_tickets - $today_reply;
        $today_hold = Ticket::where('status', 'waiting')->whereDate('created_at', Carbon::today())->count();
        return view('admin.dashboard', compact('admin_profile', 'tickets', 'today_tickets', 'today_reply', 'today_due','today_hold'));
    }
}
