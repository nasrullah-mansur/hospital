@extends('layouts.app')
@section('title')
 - All Patient
@endsection
@section('heading')
All Patient List
@endsection
@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/sweetalert.css') }}">
@endsection
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
                    <th scope="col" style="text-align: center">Age</th>
                    <th scope="col" style="text-align: center">Tickets</th>
                    <th scope="col" style="text-align: center">Wound Photos</th>
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
<script src="{{ asset('admin/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>

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
                { data: "tickets" }, 
                { data: "photos" }, 
                { data: "status" }, 
                { data: "action" }, 
            ]
});

$('.DataTable').on('click', function(e) {
    
    if (e.target.classList.contains("delete-btn")) {
        e.preventDefault();
        let delteteDataId = e.target.getAttribute("data-id");
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this content!",
            icon: "warning",
            showCancelButton: true,
            buttons: {
                cancel: {
                    text: "No, cancel please!",
                    value: null,
                    visible: true,
                    className: "btn-warning",
                    closeModal: false,
                },
                confirm: {
                    text: "Yes, delete it!",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
            }
        }).then(isConfirm => {
            if (isConfirm) {
                swal("Deleted!", "Your content has been deleted.", "success");
                window.location.replace(`/user/destroy/${delteteDataId}`);
            } else {
                swal("Cancelled", "Your content is safe", "error");
            }
        });
    }
});

</script>
@endsection