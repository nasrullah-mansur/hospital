<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Answer;
use App\Models\Ticket;
use Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['user'], ['except' => [
            'index',
            'show',
            'all_tickets',
            'destroy'
        ]]);
        $this->middleware(['admin'], ['only' => [
            'index',
            'all_tickets'
        ]]);
    }

    public function index() {
        return view('ticket.index');
    }

    public function all_tickets() {
      $tickets = Ticket::orderBy('created_at', 'DESC')->get();
        return datatables($tickets)
                ->addColumn('name', function ($tickets){
                    $user_info = User::where('id', $tickets->user_id)->firstOrFail();
                    if($user_info->profile->image == null) {
                        $profile_image = Avatar::create($user_info->profile->full_name)->toBase64();
                    } else {
                        $profile_image = asset($user_info->profile->image);
                    }
                    return '<div class="patient-area">
                                <div class="media patient-info">
                                    <img src="'.  $profile_image . '" class="mr-3 patient-img" alt="patient" />
                                    <div class="media-body">
                                    <a class="patient-name" href="'. route('profile.show', [$user_info->id, $user_info->profile->slug]) . '">'. ucwords($user_info->profile->full_name) . '</a>
                                    </div>
                                </div>
                            </div>';
                })

                ->editColumn('id', function ($tickets) {
                    return '#'. $tickets->id;
                })
                ->editColumn('subject', function ($tickets) {
                    return substr($tickets->subject, 0, 22) . '..';
                })
                ->editColumn('massage', function ($tickets) {
                    return substr($tickets->massage, 0, 32) . '..';
                })

                ->editColumn('status', function ($tickets) {
                    if($tickets->status == 'new'){
                        return '<td><span class="status-new">New</span></td>';
                    } elseif ($tickets->status == 'waiting') {
                        return '<td><span class="status-waiting">Waiting</span></td>';
                    } elseif ($tickets->status == 'opened') {
                        return '<td><span class="status-opened">Opened</span></td>';
                    } elseif ($tickets->status == 'responded') {
                        return '<td><span class="status-responded">Responded</span></td>';
                    } elseif ($tickets->status == 'closed') {
                        return '<td><span class="status-closed">Closed</span></td>';
                    } else {
                        return '';
                    }
                })
               
               ->addColumn('action', function ($tickets){
                    return '<div class="dropdown">
                    <button class="btn"  data-toggle="dropdown">
                      <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" >
                      <a class="dropdown-item" href="'. route('ticket.show', $tickets->id). '">View</a>
                      <a class="dropdown-item" href="'. route('ticket.destroy', $tickets->id). '">Delete</a>
                    </div>
                  </div>';
                })
               ->editColumn('created_at', function ($tickets) {
                    return $tickets->created_at->format('d M Y, g:i A');
                })
            ->make(true);

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
        Session::put('success', 'Ticket  has been submitted successfully');
        return redirect()->route('dashboard');
    }


    public function destroy($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();

        if($ticket->user_id == Auth::user()->id || Auth::user()->profile->user_role == 1) {
            $ticket->delete();
            Session::put('success', 'Ticket  has been destroyed successfully');
            return redirect()->back();
        }
    }
}
