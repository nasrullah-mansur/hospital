<?php

namespace App\Http\Controllers;

use Avatar;
use App\Models\User;
use App\Models\Photo;
use App\Models\Answer;
use App\Models\Ticket;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Notifications\TicketAdded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
        $this->middleware(['user'], ['except' => [
            'index',
            'show',
            'all_tickets',
            'destroy',
            'p_tickets',
            'p_tickets_get'
        ]]);
        $this->middleware(['admin'], ['only' => [
            'index',
            'all_tickets'
        ]]);
    }

    public function index() {
        return view('ticket.index');
    }

    public function p_tickets($id, $slug)
    {
        $profile = Profile::where('user_id', $id)->firstOrFail();
        return view('ticket.p_tickets', compact('id', 'profile'));
    }


    public function p_tickets_get($id) {
        $tickets = Ticket::where('user_id', $id)->get();
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
                ->addColumn('photos', function ($tickets){
                    return '<span class="d-block text-center"> ' . Photo::where('user_id', $tickets->user_id)->count() . ' </span>';
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
                   if(Photo::where('user_id', $tickets->user_id)->count() > 0) {
                        $wound_link = '<a class="dropdown-item" href="'. route('photo.show', $tickets->user_id) . '">Wound Photos</a>';
                   } else {
                    $wound_link = '';
                   }
                    return '<div class="dropdown">
                    <button class="btn"  data-toggle="dropdown">
                      <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" >
                      <a class="dropdown-item" href="'. route('ticket.show', $tickets->id). '">View Ticket</a>
                      '. $wound_link .'
                      <a class="dropdown-item delete-btn" href="javascript:void(0);" data-id="'. $tickets->id .'">Delete Ticket</a>
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
            $profile = Profile::where('user_id', $id)->firstOrFail();
            return view('ticket.view', compact('ticket', 'profile'));
        } else {
            $ticket = Ticket::with('answer', 'user')->where('id', $id)->firstOrFail();
            if($ticket->user_id != Auth::user()->id) {
                abort(404);
            } else {
                $profile = Profile::where('user_id', $id)->firstOrFail();
                return view('ticket.view', compact('ticket', 'profile'));
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
        Notification::send(Auth::user(), new TicketAdded());
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
