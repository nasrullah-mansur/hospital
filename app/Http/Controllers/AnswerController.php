<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back();
    }
}
