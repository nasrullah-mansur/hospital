@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="section-wrap">
            <div class="primary-table">
            <div class="table-responsive">
                <table class="table DataTable patient-list-table">
                <thead>
                    <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Age</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
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
        ajax: "{{ route('patients.all.get') }}",
        columns: [ 
                    { data: "id" },  
                    { data: "full_name" },  
                    { data: "email" }, 
                    { data: "phone" }, 
                    { data: "address" }, 
                    { data: "age" }, 
                    { data: "status" }, 
                    { data: "action" }, 
                ],
    });
</script>
@endsection