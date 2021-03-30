@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
    <div class="section-wrap">
        <div class="primary-form">
        <form action="{{ route('ticket.store') }}" class=" " method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
            </div>
            <div class="form-group">
            <label class="label-text" for="ticketSubject">Ticket Subject</label>
            <input type="text" class="form-control" id="ticketSubject" name="subject" placeholder="Enter Name" />
            @if($errors->has('subject'))
            <span style="color: red;">{{ $errors->first('subject') }}</span>
            @endif
            </div>
            <div class="form-group">
            <label class="label-text" for="Messege">Messege</label>
            <textarea class="form-control message-box" id="Messege" name="massage" placeholder="Write your messege here"></textarea>
            @if($errors->has('massage'))
            <span style="color: red;">{{ $errors->first('massage') }}</span>
            @endif
            </div>
            <div class="form-button text-right">
            <button type="submit" class="primary-btn">Submit Ticketing</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    let fileInputBtn = $('#uplodephoto');
    fileInputBtn.on('change', function() {
        console.log(fileInputBtn.val())
    })
</script>
@endsection
