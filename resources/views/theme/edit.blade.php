@extends('layouts.app')
@section('title')
 - Theme Setting
@endsection
@section('heading')
Theme Setting
@endsection
@section('content')

    <div class="card">
        <div class="body">
            <div class="primary-form p-5">
                <form action="{{ route('theme.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Website Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Website Name" name="theme_name" value="{{ $theme_info->theme_name }}">
                        @if($errors->has('theme_name'))
                        <span style="color: red;">{{ $errors->first('theme_name') }}</span>
                        @endif
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                          <img id="logo_img" src="{{ asset($theme_info->logo) }}" alt=""> <br> <br>
                          <label class="btn btn-info" style="font-size: 16px;">
                              <input type="file" id="logo_input" name="logo" class="d-none">
                              Change Logo
                          </label>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="logo" class="col-sm-2 col-form-label">Favicon</label>
                        <div class="col-sm-10">
                          <img id="favicon_img" src="{{ asset($theme_info->favicon) }}" alt="">
                          <br>
                          <br>
                          <label class="btn btn-info" style="font-size: 16px;">
                            <input id="favicon_input" type="file" name="favicon" class="d-none">
                            Change Favicon
                        </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-auto">
                          <button type="submit" class="primary-btn">Save Change</button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
<script>
   function readURL(input, preview) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          preview.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#logo_input").change(function() {
        readURL(this, $('#logo_img'));
    });

    $("#favicon_input").change(function() {
        readURL(this, $('#favicon_img'));
    });
</script>
@endsection