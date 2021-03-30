<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function new($id)
    {
       $ticket = Ticket::where('id', $id)->firstOrFail();
       $ticket->update([
           'status' => 'new',
       ]);
       Session::put('success', 'Status  has been updated successfully');
       return redirect()->back();
    }

    public function waiting($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
       $ticket->update([
           'status' => 'waiting',
       ]);
       Session::put('success', 'Status  has been updated successfully');
       return redirect()->back();
    }

    public function opened($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
       $ticket->update([
           'status' => 'opened',
       ]);
       Session::put('success', 'Status  has been updated successfully');
       return redirect()->back();
    }

    public function responded($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        $ticket->update([
            'status' => 'responded',
        ]);
        Session::put('success', 'Status  has been updated successfully');
        return redirect()->back();
    }

    public function closed($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        $ticket->update([
            'status' => 'closed',
        ]);
        Session::put('success', 'Status  has been updated successfully');
        return redirect()->back();
    }

}
