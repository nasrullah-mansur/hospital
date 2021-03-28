@extends('layouts.app')
@section('content')
<div class="card-box-lst">
    <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card-box">
        <div class="card-icon">
            <i class="flaticon-call-center-agent"></i>
        </div>
        <h4>Todays Ticket Amount</h4>
        <h2 class="counter">560</h2>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card-box done-card">
        <div class="card-icon">
            <i class="flaticon-reply"></i>
        </div>
        <h4>Reply Done Today</h4>
        <h2 class="counter">250</h2>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card-box due-card">
        <div class="card-icon">
            <i class="flaticon-calendar"></i>
        </div>
        <h4>Due Today</h4>
        <h2 class="counter">270</h2>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card-box hold-card">
        <div class="card-icon">
            <i class="flaticon-hold"></i>
        </div>
        <h4>On Hold Today</h4>
        <h2 class="counter">70</h2>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
    <div class="section-wrap md-mb-30 ">
        <div class="primary-table">
        <div class="table-top">
            <div class="row align-items-center">
            <div class="col-md-6">
                <h3 class="section-inner-title">Recent Ticketing</h3>
            </div>
            <div class="col-md-6 text-md-right">
                <a class="small-btn" href="#">view all</a>
            </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table ticketing-table">
            <thead>
                <tr>
                <th scope="col"><input class="table-check" type="checkbox" /> Patient Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Messege</th>
                <th scope="col">Time</th>
                <th scope="col" colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>
                        <div class="patient-area d-flex align-items-center">
                        <input class="table-check" type="checkbox" />
                        <div class="media patient-info">
                            <img src="{{ asset('assets/images/patient.png') }}" class="mr-3 patient-img" alt="patient" />
                            <div class="media-body">
                            <a class="patient-name" href="#">{{ ucwords($ticket->user->profile->full_name) }}</a>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td>{{ strlen($ticket->subject) > 15 ? substr($ticket->subject, 0, 15) . '..' : $ticket->subject }}</td>
                    <td>{{ strlen($ticket->massage) > 22 ? substr($ticket->massage, 0, 22) . '..' : $ticket->massage }}</td>
                    <td>{{ $ticket->created_at->format('h i A') }}</td>
                    <td>{{ ucwords($ticket->status) }}</td>
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
    <div class="col-lg-4">
    <div class="section-wrap">
        <div class="recent-activity-area">
        <h2 class="activity-title">Recent Activity</h2>
        <ul class="activity-list">
            <li>
            <div class="media align-items-center">
                <img src="{{ asset('assets/images/activity-1.png') }}" class="mr-3 patient-image" alt="activity">
                <div class="media-body">
                <h5 class="patient-name">John Doe Submitted a New Ticket</h5>
                <span class="active-titme">5 mins ago</span>
                </div>
            </div>
            </li>
            <li>
            <div class="media align-items-center">
                <img src="{{ asset('assets/images/activity-2.png') }}" class="mr-3 patient-image" alt="activity">
                <div class="media-body">
                <h5 class="patient-name">John Doe Submitted a New Ticket</h5>
                <span class="active-titme">5 mins ago</span>
                </div>
            </div>
            </li>
            <li>
            <div class="media align-items-center">
                <img src="{{ asset('assets/images/activity-3.png') }}" class="mr-3 patient-image" alt="activity">
                <div class="media-body">
                <h5 class="patient-name">John Doe Submitted a New Ticket</h5>
                <span class="active-titme">5 mins ago</span>
                </div>
            </div>
            </li>
            <li>
            <div class="media align-items-center">
                <img src="{{ asset('assets/images/activity-4.png') }}" class="mr-3 patient-image" alt="activity">
                <div class="media-body">
                <h5 class="patient-name">John Doe Submitted a New Ticket</h5>
                <span class="active-titme">5 mins ago</span>
                </div>
            </div>
            </li>
            <li>
            <div class="media align-items-center">
                <img src="{{ asset('assets/images/activity-5.png') }}" class="mr-3 patient-image" alt="activity">
                <div class="media-body">
                <h5 class="patient-name">John Doe Submitted a New Ticket</h5>
                <span class="active-titme">5 mins ago</span>
                </div>
            </div>
            </li>
            <li>
            <div class="media align-items-center">
                <img src="{{ asset('assets/images/activity-6.png') }}" class="mr-3 patient-image" alt="activity">
                <div class="media-body">
                <h5 class="patient-name">John Doe Submitted a New Ticket</h5>
                <span class="active-titme">5 mins ago</span>
                </div>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </div>
</div>
@endsection