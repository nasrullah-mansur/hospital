@extends('layouts.app')
@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/sweetalert.css') }}">
@endsection
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
                        <th style="text-align: center;">Wound Photo</th>
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
<script src="{{ asset('admin/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
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
                    { data: "photos" }, 
                    { data: "created_at" }, 
                    { data: "status" }, 
                    { data: "action" }, 
                ],
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
                window.location.replace(`/ticket/${delteteDataId}/destroy`);
            } else {
                swal("Cancelled", "Your content is safe", "error");
            }
        });
    }
});
</script>
@endsection