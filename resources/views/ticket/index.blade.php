@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="section-wrap">
            <div class="primary-table">
            <div class="table-responsive">
                <table class="table DataTable Ticketing-table">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Patient Name</th>
                        <th>Subject</th>
                        <th>Messege</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    $('.DataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.tickets') }}",
        columns: [ 
                    { data: "id" },  
                    { data: "name" },  
                    { data: "subject" }, 
                    { data: "massage" }, 
                    { data: "created_at" }, 
                    { data: "status" }, 
                    { data: "action" }, 
                ],
    });
</script>
@endsection