<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AnswerNotification;
use Illuminate\Support\Facades\Notification;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('block_user');
        $this->middleware('auth');
    }
    
    public function store(Request $request) {
        $request->validate([
            'answer' => 'required'
        ]);

        $answer = new Answer();
        $answer->ticket_id = $request->ticket_id;
        $answer->p_id = $request->p_id;
        $answer->answer = $request->answer;
        $answer->user_id = Auth::user()->id;
        $answer->save();
        if($request->p_id == 0) {
            $data = [
                'name' => Auth::user()->profile->full_name,
                'to' => Ticket::where('id', $request->ticket_id)->firstOrFail()->user->profile->full_name,
            ];
            Notification::send(Auth::user(), new AnswerNotification($data));
        }
        return redirect()->back();
    }
}
