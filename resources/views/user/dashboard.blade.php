@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-6">
    <div class="section-wrap md-mb-30">
        <div class="user-profile-area">
        <div class="profile-top text-center">
            <img class="profile-image" src="{{ asset('assets/images/profile-image.png') }}" alt="profile-image" />
            <h3>{{ ucwords($user_profile->full_name) }}</h3>
            <p>{{ ucwords($user_profile->address) }}</p>
            <a class="edit-profile" href="{{ route('profile.edit', [Auth::user()->id, $user_profile->slug]) }}"><i class="fas fa-pen"></i>Edit</a>
        </div>
        <div class="profile-info">
            <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                <tr>
                    <td><span>Full Name</span></td>
                    <td><p>{{ ucwords($user_profile->full_name) }}</p></td>
                </tr>
                <tr>
                    <td><span>Gender</span></td>
                    <td><p>{{ $user_profile->gender }}</p></td>
                </tr>
                <tr>
                    <td><span>Birth Date</span></td>
                    <td><p>{{ $user_profile->birth_date }}</p></td>
                </tr>
                <tr>
                    <td><span>Age</span></td>
                    <td><p>{{ $user_profile->age }}</p></td>
                </tr>
                <tr>
                    <td><span>Address</span></td>
                    <td><p>{{ $user_profile->address }}</p></td>
                </tr>
                <tr>
                    <td><span>Medical History</span></td>
                    <td><p>{{ $user_profile->medical_history }}</p></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="section-wrap">
        <div class="previous-ticketing-area">
        <div class="primary-table">
            <div class="table-top">
            <div class="row align-items-center">
                <div class="col-md-7 col-sm-7">
                <h3 class="section-inner-title">Your Previous Ticketing</h3>
                </div>
                <div class="col-md-5 col-sm-5 text-sm-right">
                <a class="small-btn" href="{{ route('ticket.create') }}">+ Submit New</a>
                </div>
            </div>
            </div>
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><input class="table-check" type="checkbox" /> Ticket ID</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Last Update</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td><input class="table-check" type="checkbox" /> #{{ $ticket->id }}</td>
                        <td>{{ strlen($ticket->subject) > 12 ? substr($ticket->subject, 0, 12) . '...' : $ticket->subject }}</td>
                        <td>{{ ucwords($ticket->status) }}</td>
                        <td>{{ $ticket->updated_at->format('d M Y') }}</td>
                        <td>
                        <div class="dropdown">
                            <button class="btn"  data-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" >
                            <a class="dropdown-item" href="{{ route('ticket.show', $ticket->id) }}">View</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
