@extends('layouts.app')
@section('custom_css')
<link rel="stylesheet" href="{{ asset('admin/venobox/venobox.min.css') }}">
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 mb-3">
                <p>Wound Photo of <strong>{{ $name }}</strong></p>
            </div>
            @foreach($photos as $photo)
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="img-item">
                    <img src="{{ asset($photo->image) }}" alt="">
                </div>
                <div class="action text-center mt-3">
                    <a data-gall="gallery01" href="{{ asset($photo->image) }}" class="btn btn-primary venobox" style="font-size: 14px; width: 90px;">View</a>
                    <a href="#" class="btn btn-danger" style="font-size: 14px; width: 90px;">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('custom_js')
<script src="{{ asset('admin/venobox/venobox.min.js') }}"></script>
<script>
    $('.venobox').venobox(); 
</script>
@endsection