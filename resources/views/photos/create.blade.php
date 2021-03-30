@extends('layouts.app')
@section('title')
 - Add Wound Photo
@endsection
@section('heading')
Add Wound Photo
@endsection
@section('custom_css')
<link rel="stylesheet" href="{{ asset('admin/dropify/dist/css/dropify.min.css') }}">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="section-wrap">
            <div class="primary-form">
            <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input name="image" type="file" class="dropify" data-max-file-size="3M" data-allowed-file-extensions="jpg jpeg png gif" id="uplodephoto">
                </div>
                <div class="form-button text-right">
                <button type="submit" class="primary-btn">Save Photo</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="{{ asset('admin/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $('.dropify').dropify();
</script>
@endsection