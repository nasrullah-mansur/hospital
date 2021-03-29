<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function new($id)
    {
       $ticket = Ticket::where('id', $id)->firstOrFail();
       $ticket->update([
           'status' => 'new',
       ]);
       return redirect()->back();
    }

    public function waiting($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
       $ticket->update([
           'status' => 'waiting',
       ]);
       return redirect()->back();
    }

    public function opened($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
       $ticket->update([
           'status' => 'opened',
       ]);
       return redirect()->back();
    }

    public function responded($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        $ticket->update([
            'status' => 'responded',
        ]);
        return redirect()->back();
    }

    public function closed($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        $ticket->update([
            'status' => 'closed',
        ]);
        return redirect()->back();
    }

}
