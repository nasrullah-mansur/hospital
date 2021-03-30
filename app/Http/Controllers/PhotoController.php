<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
        $this->middleware('user');
    }

    public function show($id)
    {
        if(Auth::user()->profile->user_role == 1 || Auth::user()->id == $id) {
            $photos = Photo::where('user_id', $id)->get();
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
}
