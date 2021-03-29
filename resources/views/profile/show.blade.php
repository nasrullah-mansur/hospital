@extends('layouts.app')
@section('content')
<div class="row">
              <div class="col-xl-3">
                <div class="section-wrap">
                  <div class="patient-profile-info text-center">
                      <img class="profile-image" src="{{ $profile->image == null ? Avatar::create($profile->full_name)->toBase64() : asset($profile->image) }}" alt="profile-image" />
                      <h3>{{ ucwords($profile->full_name) }}</h3>
                      <p>{{ $profile->address }}</p>
                  </div>
                </div>
              </div>
              <div class="col-xl-9">
                <div class="section-wrap">
                    <div class="row">
                      <div class="col-lg-5">
                        <div class="profile-info left-table right-border">
                          <div class="table-responsive">
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <td><span>Full Name</span></td>
                                  <td><p>{{ ucwords($profile->full_name) }}</p></td>
                                </tr>
                                <tr>
                                  <td><span>Gender</span></td>
                                  <td><p>{{ $profile->gender }}</p></td>
                                </tr>
                                <tr>
                                  <td><span>Birth Date</span></td>
                                  <td><p>{{ $profile->birth_date }}</p></td>
                                </tr>
                                <tr>
                                  <td><span>Age</span></td>
                                  <td><p>{{ $profile->age }} Years</p></td>
                                </tr>
                                <tr>
                                  <td><span>Address</span></td>
                                  <td><p>{{ $profile->address }}</p></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-7">
                        <div class="profile-info">
                          <div class="table-responsive">
                            <table class="table right-table table-borderless">
                              <tbody>
                                <tr>
                                  <td><span>Email Adress</span></td>
                                  <td><p>{{ $profile->user->email }}</p></td>
                                </tr>
                                <tr>
                                  <td><span>Phone Number</span></td>
                                  <td><p>{{ $profile->phone }}</p></td>
                                </tr>
                                <tr>
                                  <td><span>Medical History</span></td>
                                  <td><p>{{ $profile->medical_history }}</p></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
@endsection