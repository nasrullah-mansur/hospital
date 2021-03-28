<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['user'], ['except' => [
            'index',
            'show'
        ]]);
        $this->middleware(['admin'], ['only' => [
            'index'
        ]]);
    }

    public function index() {
        $tickets = Ticket::all();
        return view('ticket.index', compact('tickets'));
    }

    

    public function show($id){
        if(Auth::user()->profile->user_role == 1){
            $ticket = Ticket::with('answer', 'user')->where('id', $id)->firstOrFail();
            return view('ticket.view', compact('ticket'));
        } else {
            $ticket = Ticket::with('answer', 'user')->where('id', $id)->firstOrFail();
            if($ticket->user_id != Auth::user()->id) {
                abort(404);
            } else {
                return view('ticket.view', compact('ticket'));
            }
        }
    }

    public function create() {
        return view('ticket.create');
    }

    public function store(Request $request) {
        $request->validate([
            'subject' => 'required',
            'massage' => 'required'
        ]);

        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id;
        $ticket->subject = $request->subject;
        $ticket->massage = $request->massage;

        $ticket->save();

        return redirect()->route('dashboard');
    }
}
