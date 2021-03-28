@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
    <div class="section-wrap">
        <div class="primary-form">
        <form action="{{ route('ticket.store') }}" method="POST">
            @csrf
            <div class="form-group">
            </div>
            <div class="form-group">
            <label class="label-text" for="ticketSubject">Ticket Subject</label>
            <input type="text" class="form-control" id="ticketSubject" name="subject" placeholder="Enter Name" />
            </div>
            <div class="form-group">
            <label class="label-text" for="Messege">Messege</label>
            <textarea class="form-control message-box" id="Messege" name="massage" placeholder="Write your messege here"></textarea>
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