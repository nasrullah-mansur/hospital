
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
    <div class="section-wrap">
        <div class="view-ticketing">
        @if(Auth::user()->profile->user_role == 1)
        <div class="dropdown status-select">
            <button class="change-ticketing dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Status
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('status.new', $ticket->id) }}">New</a>
                <a class="dropdown-item" href="{{ route('status.waiting', $ticket->id) }}">Waiting</a>
                <a class="dropdown-item" href="{{ route('status.opened', $ticket->id) }}">Opened</a>
                <a class="dropdown-item" href="{{ route('status.responded', $ticket->id) }}">Responded</a>
                <a class="dropdown-item" href="{{ route('status.closed', $ticket->id) }}">Closed</a>
            </div>
        </div>
        @endif
        <div class="single-ticketing">
            <div class="ticketing-top">
            <div class="user-info">
                <div class="media align-items-center">
                <img src="{{ asset('assets/images/user.png') }}" class="user-image mr-3" alt="user" />
                <div class="media-body">
                    <h4>{{ ucwords($ticket->user->profile->full_name) }}</h4>
                    <p>{{ $ticket->user->profile->address }}</p>
                </div>
                </div>
            </div>
            </div>
            <h3>{{ $ticket->subject }}</h3>
            <p>{{ $ticket->massage }}</p>
        </div>
        
        @foreach($ticket->answer->where('p_id', 0) as $answer)
        <div class="single-ticketing">
            <div class="ticketing-top">
            <div class="user-info">
                <div class="media align-items-center">
                <img src="{{ asset('assets/images/user-2.png') }}" class="user-image mr-3" alt="user" />
                <div class="media-body">
                    <h4>{{ ucwords($answer->user->profile->full_name) }}</h4>
                    <p>{{ ucwords($answer->user->profile->address) }}</p>
                </div>
                </div>
            </div>
            </div>
            <p>{{ $answer->answer }}</p>
        </div>

        @foreach($ticket->answer->where('p_id', 1) as $single_reply)
        <div class="single-ticketing bg-light px-4">
            <div class="ticketing-top">
            <div class="user-info">
                <div class="media align-items-center">
                <img src="{{ asset('assets/images/user-2.png') }}" class="user-image mr-3" alt="user" />
                <div class="media-body">
                    <h4>{{ ucwords($single_reply->user->profile->full_name) }}</h4>
                    <p>{{ ucwords($single_reply->user->profile->address) }}</p>
                </div>
                </div>
            </div>
            </div>
            <p>{{ $single_reply->answer }}</p>
        </div>
        @endforeach
        @endforeach

        @if(count($ticket->answer) > 0 || Auth::user()->profile->user_role == 1)
        <!-- Replay BTN -->
        <div class="single-ticketing">
            <a href="#replyForm" id="replyBtn" class="primary-btn"><i class="flaticon-reply"></i> Replay</a>
        </div>
        

        <div class="single-ticketing" style="display: none;" id="replyForm">
            <div class="primary-form">
            <form action="{{ route('ticket.answer') }}" method="POST">
                @csrf
                <div class="form-group">
                <label class="label-text" for="MedicalHistory">Reply</label>
                <textarea class="form-control message-box" id="MedicalHistory" name="answer" placeholder="Write your reply here"></textarea>
                @if($errors->has('answer'))
                <span style="color: red;">{{ $errors->first('answer') }}</span>
                @endif
                </div>
                <div class="form-button text-right">
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                @if(count($ticket->answer) > 0)
                <input type="hidden" name="p_id" value="1">
                @else
                <input type="hidden" name="p_id" value="0">
                @endif
                <button type="submit" class="primary-btn">Send</button>
                </div>
            </form>
            </div>
        </div>
        @endif

        </div>
    </div>

    
@endsection

@section('custom_js')
<script>
$('#replyForm').hide();
$('#replyBtn').on('click', function() {
    $('#replyForm').toggle();
    console.log('ok');
})
</script>
@endsection

