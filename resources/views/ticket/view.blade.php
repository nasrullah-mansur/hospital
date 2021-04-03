@extends('layouts.app')
@section('title')
 - Ticket of {{ $profile->full_name }}
@endsection
@section('heading')
Ticket - {{ $profile->full_name }}
@endsection
@section('custom_css')
<style>
.view-ticketing .status-select > a {
    padding: 0 1.5rem;
    min-width: 120px;
    height: 45px;
    border-radius: 5px;
    background: #F7FAFB;
    font-family: "Poppins", sans-serif;
    font-size: 1.6rem;
    font-weight: 400;
    color: #797A7A;
    padding: 1rem 1.5rem;
    border: none;
}

.view-ticketing .status-select > .dropdown-menu {
    max-width: 140px;
}
</style>
@endsection
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
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('status.new', $ticket->id) }}">New</a>
                        <a class="dropdown-item" href="{{ route('status.waiting', $ticket->id) }}">On Hold</a>
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
                                <img src="{{ $ticket->user->profile->image == null ? Avatar::create($ticket->user->profile->full_name)->toBase64() : asset($ticket->user->profile->image) }}" class="user-image mr-3" alt="user" />
                                <div class="media-body">
                                    <h4>{{ ucwords($ticket->user->profile->full_name) }}</h4>
                                    <p>{{ $ticket->user->profile->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>{{ $ticket->subject }}</h3>
                    <p>{{ $ticket->massage }}</p>
                    <div class="photos">
                        @foreach($ticket->photo as $s_photo)
                        @php
                        $ext = explode('.', $s_photo->image);
                        @endphp
                        @if(end($ext) == 'jpg' || end($ext) == 'jpeg' || end($ext) == 'JPG'  || end($ext) == 'JPEG' || end($ext) == 'png' || end($ext) == 'PNG' || end($ext) == 'gif' || end($ext) == 'GIF') 
                        <a href="{{ asset($s_photo->image) }}" class="venobox">
                            <img style="max-width: 90px; height: 90px; object-fit: cover; margin: 5px;" src="{{ asset($s_photo->image) }}">
                        </a>
                        @elseif(end($ext) == 'pdf' || end($ext) == 'PDF' )
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($s_photo->image) }}" download>Download PDF</a>
                        @elseif(end($ext) == 'mp4' || end($ext) == 'MP4' )
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($s_photo->image) }}" download>Download Video</a>
                        @else
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($s_photo->image) }}" download>Download File</a>
                        @endif
                        @endforeach
                    </div>
                </div>
                
                @foreach($ticket->answer->where('p_id', 0) as $answer)
                <div class="single-ticketing">
                    <div class="ticketing-top">
                        <div class="user-info">
                            <div class="media align-items-center">
                                <img src="{{ $answer->user->profile->image == null ? Avatar::create($answer->user->profile->full_name)->toBase64() : asset($answer->user->profile->image) }}" class="user-image mr-3" alt="user" />
                                <div class="media-body">
                                    <h4>{{ ucwords($answer->user->profile->full_name) }}</h4>
                                    <p>{{ ucwords($answer->user->profile->address) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p>{{ $answer->answer }}</p>
                    <div class="photos">
                        @foreach($answer->image as $s_image)
                        @php
                        $ext = explode('.', $s_image->image);
                        @endphp
                        @if(end($ext) == 'jpg' || end($ext) == 'jpeg' || end($ext) == 'JPG'  || end($ext) == 'JPEG' || end($ext) == 'png' || end($ext) == 'PNG' || end($ext) == 'gif' || end($ext) == 'GIF') 
                        <a href="{{ asset($s_image->image) }}" class="venobox">
                            <img style="max-width: 90px; height: 90px; object-fit: cover; margin: 5px;" src="{{ asset($s_image->image) }}">
                        </a>
                        @elseif(end($ext) == 'pdf' || end($ext) == 'PDF' )
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($s_image->image) }}" download>Download PDF</a>
                        @elseif(end($ext) == 'mp4' || end($ext) == 'MP4' )
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($s_image->image) }}" download>Download Video</a>
                        @else
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($s_image->image) }}" download>Download File</a>
                        @endif
                        @endforeach
                    </div>
                </div>

                @foreach($ticket->answer->where('p_id', 1) as $single_reply)
                <div class="single-ticketing bg-light px-4">
                    <div class="ticketing-top">
                        <div class="user-info">
                            <div class="media align-items-center">
                                <img src="{{ $single_reply->user->profile->image == null ? Avatar::create($single_reply->user->profile->full_name)->toBase64() : asset($single_reply->user->profile->image) }}" class="user-image mr-3" alt="user" />
                                <div class="media-body">
                                    <h4>{{ ucwords($single_reply->user->profile->full_name) }}</h4>
                                    <p>{{ ucwords($single_reply->user->profile->address) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>{{ $single_reply->answer }}</p>
                    <div class="photos">
                        @foreach($single_reply->image as $r_image)
                        @php
                        $ext = explode('.', $r_image->image);
                        @endphp
                        @if(end($ext) == 'jpg' || end($ext) == 'jpeg' || end($ext) == 'JPG'  || end($ext) == 'JPEG' || end($ext) == 'png' || end($ext) == 'PNG' || end($ext) == 'gif' || end($ext) == 'GIF') 
                        <a href="{{ asset($r_image->image) }}" class="venobox">
                            <img style="max-width: 90px; height: 90px; object-fit: cover; margin: 5px;" src="{{ asset($r_image->image) }}">
                        </a>
                        @elseif(end($ext) == 'pdf' || end($ext) == 'PDF' )
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($r_image->image) }}" download>Download PDF</a>
                        @elseif(end($ext) == 'mp4' || end($ext) == 'MP4' )
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($r_image->image) }}" download>Download Video</a>
                        @else
                        <a style="color: #18A9F1; background-color: #F7FAFB; padding: 1.5rem;" href="{{ asset($r_image->image) }}" download>Download File</a>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
                @endforeach

                @if(count($ticket->answer) > 0 || Auth::user()->profile->user_role == 1)
                <!-- Replay BTN -->
                <div class="single-ticketing">
                    <a href="#replyForm" id="replyBtn" class="primary-btn"><i class="flaticon-reply"></i> Reply</a>
                </div>
                

                <div class="single-ticketing" style="display: none;" id="replyForm">
                    <div class="primary-form">
                        <form action="{{ route('ticket.answer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label-text" for="MedicalHistory">Reply</label>
                                <textarea class="form-control message-box" id="MedicalHistory" name="answer" placeholder="Write your reply here"></textarea>
                                @if($errors->has('answer'))
                                <span style="color: red;">{{ $errors->first('answer') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="label-text" for="Messege">Attach File</label>
                                <input type="file" class="form-control" name="file[]" multiple placeholder="Enter Name" />
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

$('.venobox').venobox();
</script>
@endsection

