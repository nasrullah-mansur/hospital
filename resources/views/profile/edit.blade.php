@extends('layouts.app')
@section('title')
 - {{$profile->full_name}}
@endsection
@section('heading')
{{$profile->full_name}}
@endsection
@section('content')
@section('content')
<div class="row">
    <div class="col-lg-12">
    <div class="section-wrap">
        <div class="primary-form">
        <h2 class="form-title">Personal Information</h2>
        <form action="{{ route('profile.full.update', [Auth::user()->id, $profile->slug]) }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-lg-12">
                    <div class="user-info">
                    <div class="user-image">
                        <img id="preview-img" src="{{ $profile->image == null ? Avatar::create($profile->full_name)->toBase64() : asset($profile->image) }}" alt="profile" />
                        <div class="uplode-image">
                        <label for="edit-image" class="edit-btn"><i class="fas fa-pencil-alt"></i></label>
                        <input type="file" id="edit-image" name="image" class="d-none" />
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="label-text" for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="full_name" placeholder="Your Name" value="{{ old('full_name') ? old('full_name') : $profile->full_name }}" />
                    @if($errors->has('full_name'))
                    <span style="color: red;">{{ $errors->first('full_name') }}</span>
                    @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="label-text" for="phonenumber">Phone Number</label>
                    <input type="text" class="form-control" id="phonenumber" name="phone" name="phone" placeholder="+88 000 444 666" value="{{ old('phone') ? old('phone') : $profile->phone }}" />
                    @if($errors->has('phone'))
                    <span style="color: red;">{{ $errors->first('phone') }}</span>
                    @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="label-text" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="yourname@gmail.com" value="{{ old('email') ? old('email') : Auth::user()->email }}" />
                    @if($errors->has('email'))
                    <span style="color: red;">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="label-text" for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" name="address" placeholder="Khulna, Bangladesh" value="{{ old('address') ? old('address') : $profile->address }}" />
                    @if($errors->has('address'))
                    <span style="color: red;">{{ $errors->first('address') }}</span>
                    @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="label-text" for="BirthDate">Birth Date</label>
                    <input type="text" class="form-control" id="BirthDate" name="birth_date" placeholder="29 March, 1985" value="{{ old('birth_date') ? old('birth_date') : $profile->birth_date }}" />
                    @if($errors->has('birth_date'))
                    <span style="color: red;">{{ $errors->first('birth_date') }}</span>
                    @endif
                    <i class="input-icon fas fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="label-text" for="Age">Age</label>
                                <input type="number" class="form-control" id="Age" name="age" placeholder="38 Years" value="{{ old('age') ? old('age') : $profile->age }}" />
                                @if($errors->has('age'))
                                <span style="color: red;">{{ $errors->first('age') }}</span>
                                @endif
                                </div>
                        </div>
    
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="label-text" for="Gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option>Gender</option>
                                <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ $profile->gender == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>

                @if(Auth::user()->profile->user_role == 0)
                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="label-text" for="MedicalHistory">Medical History</label>
                    <textarea class="form-control message-box" id="MedicalHistory" name="medical_history" placeholder="Your Medical History">{{ old('medical_history') ? old('medical_history') : $profile->medical_history }}</textarea>
                    @if($errors->has('medical_history'))
                    <span style="color: red;">{{ $errors->first('medical_history') }}</span>
                    @endif
                    </div>
                </div>
                @endif
                
            
                <div class="col-lg-12">
                    <h2 class="form-title">Reset Password</h2>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="label-text" for="CurrentPassword">Current Password</label>
                    <input type="password" id="CurrentPassword" class="form-control" name="content_password" />
                    @if($errors->has('content_password'))
                    <span style="color: red;">{{ $errors->first('content_password') }}</span>
                    @endif
                    <i class="input-icon toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>


                    <div class="form-group">
                    <label class="label-text" for="newPassword">New Password</label>
                    <input type="password" id="newPassword" class="form-control"  name="new_password" />
                    @if($errors->has('new_password'))
                    <span style="color: red;">{{ $errors->first('new_password') }}</span>
                    @endif
                    <i class="input-icon toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>

                    
                    <div class="form-group">
                    <label class="label-text" for="cnewPassword">Confirm New Password</label>
                    <input type="password" id="cnewPassword" class="form-control" name="confirm_password" />
                    @if($errors->has('confirm_password'))
                    <span style="color: red;">{{ $errors->first('confirm_password') }}</span>
                    @endif
                    <i class="input-icon toggle-password fa fa-fw fa-eye-slash"></i>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-button text-right">
                    <button type="submit" class="primary-btn">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    $("#edit-image").change(function() {
        readURL(this);
    });
</script>
@endsection