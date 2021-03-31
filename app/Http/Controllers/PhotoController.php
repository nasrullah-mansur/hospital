<?php

namespace App\Http\Controllers;

use Avatar;
use App\Models\User;
use App\Models\Photo;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
        $this->middleware(['user'], ['except' => [
            'show',
            'destroy',
            'user_has_wound_view',
            'user_has_wound_get'
        ]]);
    }

    public function show($id)
    {
        if(Auth::user()->profile->user_role == 1 || Auth::user()->id == $id) {
            $photos = Photo::where('user_id', $id)->paginate(8);
            $name = User::where('id', $id)->firstOrFail()->profile->full_name;
            return view('photos.show', compact('photos', 'name'));
        } else {
            return abort(404);
        }
    }

    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $photo = new Photo();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_path = 'images/wound/';
            $extension = strtolower($file->getClientOriginalExtension());
            $fileName = time() . '-' . 'wound-image' . '.' . $extension;
            $file->move($file_path, $fileName);
            $db_img = $file_path . $fileName;

            $photo->image = $db_img;
        }

        $photo->user_id = Auth::user()->id;
        $photo->save();

        Session::put('success', 'Image  has been updated successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $image = Photo::where('id', $id)->firstOrFail();
        if(Auth::user()->profile->user_role == 1 || Auth::user()->id == $image->user_id) {
            if (File::exists($image->image)) {
                File::delete($image->image);
            } 

            $image->delete();
            return redirect()->back();
        } else {
            return abort(404);
        }
    }


    public function user_has_wound_view()
    {
        $profiles = User::has('photo')->with('profile')->get();
        return view('photos.photo_user');
    }

    public function user_has_wound_get()
    {
        $users = User::has('photo')->with('profile')->get();
        return datatables($users)

        ->editColumn('id', function ($users) {
            return '#p-' . $users->id;
        })

        ->addColumn('name', function ($users) {
            if($users->profile->image == null) {
                $profile_image = Avatar::create($users->profile->full_name)->toBase64();
            } else {
                $profile_image = asset($users->profile->image);
            }

            return '<div class="patient-area">
                <div class="media patient-info">
                    <img src="'. $profile_image .'" class="mr-3 patient-img" alt="patient" />
                    <div class="media-body">
                    <a class="patient-name" href="'. route('profile.show', [$users->id, $users->profile->slug]). '">'. ucwords($users->profile->full_name) .'</a>
                    </div>
                </div>
            </div>';
        })

        ->addColumn('phone', function ($users) {
            return $users->profile->phone;
        })

        ->addColumn('address', function ($users) {
            return $users->profile->address;
        })

        ->addColumn('age', function ($users) {
            return '<span class="text-center d-block">'. $users->profile->age . '</span>';
        })

        ->addColumn('ticket', function ($users) {
            return '<span class="text-center d-block">'. Ticket::where('user_id', $users->id)->count() . '</span>';
        })

        ->addColumn('photos', function ($users) {
            return '<span class="text-center d-block">'. Photo::where('user_id', $users->id)->count() . '</span>';
        })


        ->addColumn('action', function ($users) {
            if($users->status == 'active') {
                $active_route = route('user.block', $users->id);
            } else {
                $active_route = route('user.active', $users->id);
            }

            if($users->status == 'active') {
                $active_btn = 'Block Patient';
            } else {
                $active_btn = 'Active Patient';
            }

            if(Photo::where('user_id', $users->id)->count() > 0){
                $photos_link = '<a class="dropdown-item" href="'. route('photo.show', $users->id) . '">View Wound</a>';
            } else {
                $photos_link = '';
            }

            return '<div class="dropdown">
                    <button class="btn"  data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu" >
                    '.  $photos_link .'
                    <a class="dropdown-item" href="'. $active_route .'">'. $active_btn .'</a>
                    <a class="dropdown-item delete-btn" href="javascript:void(0);" data-id="'. $users->id .'">Delete Account</a>
                    </div>
                </div>';
        })


        ->make(true);
    }
}
