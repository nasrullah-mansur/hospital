<?php

namespace App\Http\Controllers;

use Avatar;
use App\Models\User;
use App\Models\Photo;
use App\Models\Ticket;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
        $this->middleware('block_user');
        $this->middleware(['user'], ['only' => [
            'dashboard',
        ]]);
        $this->middleware(['admin'], ['only' => [
            'profile',
            'index',
            'all_patients',
            'destroy',
            'block',
            'active'
        ]]);
    }

    public function index()
    {
        return view('user.index');
    }

    public function all_patients() {
        $profiles = Profile::where('user_role', 0)->with('user')->get();

        return datatables($profiles)

        ->editColumn('id', function ($profiles) {
            return '#p-' . $profiles->id;
        })

        ->editColumn('status', function ($profiles) {
            return ucwords($profiles->user->status);
        })

        ->editColumn('age', function ($profiles) {
            return '<span class="text-center d-block">'. $profiles->age . '</span>';
        })

        ->editColumn('full_name', function ($profiles) {
            if($profiles->image == null) {
                $profile_image = Avatar::create($profiles->full_name)->toBase64();
            } else {
                $profile_image = asset($profiles->image);
            }

            return '<div class="patient-area">
                <div class="media patient-info">
                    <img src="'. $profile_image .'" class="mr-3 patient-img" alt="patient" />
                    <div class="media-body">
                    <a class="patient-name" href="'. route('profile.show', [$profiles->user_id, $profiles->slug]). '">'. ucwords($profiles->full_name) .'</a>
                    </div>
                </div>
            </div>';
        })

        ->addColumn('email', function ($profiles) {
            return $profiles->user->email;
        })

        ->addColumn('tickets', function ($profiles) {
            return '<span class="text-center d-block">'. count(Ticket::where('user_id', $profiles->user_id)->get('id')) . '</span>';
        })

        ->addColumn('photos', function ($profiles) {
            return '<span class="text-center d-block">'. count(Photo::where('user_id', $profiles->user_id)->get('id')) . '</span>';
        })

        ->addColumn('action', function ($profiles) {
            if($profiles->user->status == 'active') {
                $active_route = route('user.block', $profiles->user_id);
            } else {
                $active_route = route('user.active', $profiles->user_id);
            }

            if($profiles->user->status == 'active') {
                $active_btn = 'Block Patient';
            } else {
                $active_btn = 'Active Patient';
            }


            if(Ticket::where('user_id', $profiles->user_id)->count() > 0) {
                $tickets_link = '<a class="dropdown-item" href="'. route('p.tickets', [$profiles->user_id, $profiles->slug]). '">View Tickets</a>';
            } else {
                $tickets_link = '';
            }

            return '<div class="dropdown">
                    <button class="btn"  data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" >
                    <a class="dropdown-item" href="'. route('profile.show', [$profiles->user_id, $profiles->slug]). '">View Profile</a>
                    '.  $tickets_link .'
                    <a class="dropdown-item" href="'. $active_route .'">'. $active_btn .'</a>
                    <a class="dropdown-item delete-btn" href="javascript:void(0);" data-id="'. $profiles->user_id .'">Delete Account</a>
                    </div>
                </div>';
        })

        ->make(true);
    }

    public function dashboard($id, $slug) {
        $user_profile = Profile::where('user_id', $id)->where('slug', $slug)->firstOrFail();
        $tickets = Ticket::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->limit(8)->get();
        return view('user.dashboard', compact('tickets', 'user_profile'));
    }

    public function destroy($id)
    {
        $user = User::with('photo')->where('id', $id)->firstOrFail();
        $profile = Profile::where('user_id', $id)->firstOrFail();
        if(Auth::user()->profile->user_role == 1) {
            $user_tickets = Ticket::where('user_id', $id)->get();
            foreach ($user_tickets as  $user_ticket) {
                $user_ticket->delete();
            }

            $image_path = $profile->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            } 

            if($user->photo->count() > 0) {
                $photo_items = Photo::where('user_id', $profile->user_id)->get();
                foreach($photo_items as $photo) {
                    if (File::exists($photo->image)) {
                        File::delete($photo->image);
                    }
                    $photo->delete();
                }
            }

            $user->delete();
            $profile->delete();
            
            Session::put('success', 'Patient has been destroyed successfully');
            return redirect()->route('patients.all');
        } else {
            abort(404);
        }
    }


    public function block($id)
    {
        $user_profile = User::where('id', $id)->firstOrFail();
        $user_profile->status = 'blocked';
        $user_profile->save();
        Session::put('success', 'Patient has been blocked successfully');
        return redirect()->back();
    }

    public function active($id)
    {
        $user_profile = User::where('id', $id)->firstOrFail();
        $user_profile->status = 'active';
        $user_profile->save();
        Session::put('success', 'Patient has been active successfully');
        return redirect()->back();
    }
}
