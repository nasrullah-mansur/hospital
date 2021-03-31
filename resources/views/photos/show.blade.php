@extends('layouts.app')
@section('title')
Wound Photo - {{$name}}
@endsection
@section('heading')
Wound Photos - {{$name}}
@endsection
@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('admin/venobox/venobox.min.css') }}">

@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            @foreach($photos as $photo)
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="img-item text-center">
                    <img style="height: 160px;" src="{{ asset($photo->image) }}" alt="">
                </div>
                <div class="action text-center mt-3">
                    <a data-gall="gallery01" href="{{ asset($photo->image) }}" class="btn btn-primary venobox" style="font-size: 14px; width: 90px;">View</a>
                    <a href="javascript:void(0);" data-id="{{ $photo->id }}" class="btn btn-danger delete-btn" style="font-size: 14px; width: 90px;">Delete</a>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                {{ $photos->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="{{ asset('admin/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
<script>
    $('.venobox').venobox(); 
    $('.delete-btn').on('click',function(e){
    e.preventDefault();
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
                window.location.replace(`/wound-photo/${e.target.getAttribute('data-id')}/destroy`);
            } else {
                swal("Cancelled", "Your content is safe", "error");
            }
        });
    });
</script>
@endsection

