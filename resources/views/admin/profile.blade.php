@extends('layouts.master')
@section('title', __('apilang.profile')) 
@section('content')



    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label')}}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">


               <img src="{{URL::asset(isset($admin->userDetails->image) && !empty($admin->userDetails->image) ? $admin->userDetails->image : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">


              <h2>@if(!empty($admin->name)){{$admin->name}}@endif</h2>
              <h3>@if(!empty($admin->email)){{$admin->email}}@endif</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">{{__('apilang.overview')}}</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">{{__('apilang.edit_profile')}}</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">{{__('apilang.change_password')}}</button>
                </li>

                <div class="text-success adminProUpdate ms-4"></div>
                    <input type="hidden" name="adminId" id="adminId" value="@if(!empty($admin->id)){{$admin->id}}@endif">

                    <div class="text-success passwordUpdate"></div>

              </ul>
              
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">{{__('apilang.profile_details')}}</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">{{__('apilang.name_formlabel')}}</div>
                    <div class="col-lg-9 col-md-8">@if(!empty($admin->name)){{$admin->name}}@endif</div>
                  </div>
                                 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('apilang.label_mobile')}}</div>
                    <div class="col-lg-9 col-md-8">{{ isset($admin->mobile_no) ? substr($admin->mobile_no, 3, 10) : '' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('apilang.label_email')}}</div>
                    <div class="col-lg-9 col-md-8">{{ $admin->email ? $admin->email : $admin->email }}</div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{route('adminProfileUpdate')}}" id="adminProfile">
                    @csrf
                    
                    <!--
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">

                        
                        <img src="{{URL::asset(isset($admin->userDetails->image) && !empty($admin->userDetails->image) ? $admin->userDetails->image : 'admin/assets/img/profile-img.jpg')}}" alt="Profile">

                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image">
                            <input type="file" name="image" id="formFile">
                            <i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>

                    </div> -->
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.name_formlabel')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="name" value="{{ $admin->name ? $admin->name : $admin->userDetails->full_name }}">

                        <span class="text-red-500 name"></span>
                        @error('name')
                            <div class="text-red-500 name">{{ $message }}</div>
                        @enderror

                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.label_email')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="{{ $admin->email ? $admin->email : $admin->userDetails->email }}">
                        <span class="text-red-500 email"></span>
                        @error('email')
                            <div class="text-red-500 email">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.label_mobile')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile" type="text" class="form-control" id="mobile" value="{{ isset($admin->mobile_no) ? substr($admin->mobile_no, 3, 10) : '' }}">

                        <span class="text-red-500 mobile"></span>
                        @error('mobile')
                            <div class="text-red-500 mobile">{{ $message }}</div>
                        @enderror

                      </div>
                    </div>


                    <!--
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="{{ isset($admin->userDetails->address) && !empty($admin->userDetails->address) ? $admin->userDetails->address : 'No' }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">What's App</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{isset( $admin->userDetails->whats_no) && !empty($admin->userDetails->whats_no ) ? $admin->userDetails->whats_no : '' }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">State</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="state" type="text" class="form-control" id="state" value="{{ isset($admin->userDetails->states->state_name) && !empty($admin->userDetails->states->state_name ) ? $admin->userDetails->states->state_name : '' }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Pin code</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pincode" type="text" class="form-control" id="pincode" value="{{ isset($admin->userDetails->pincode ) && !empty($admin->userDetails->pincode) ? $admin->userDetails->pincode : '' }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Language</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="language" type="text" class="form-control" id="language" value="{{ isset($admin->userDetails->language->language_name) && !empty($admin->userDetails->language->language_name) ? $admin->userDetails->language->language_name : '' }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Department</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="department" type="text" class="form-control" id="Department" value="{{ isset( $admin->userDetails->department->department_name) && !empty($admin->userDetails->department->department_name) ? $admin->userDetails->department->department_name : '' }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Accomudation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="accomudation" type="text" class="form-control" id="Accomudation" value="{{ isset($admin->userDetails->accommodation->accommodation_name) && !empty($admin->userDetails->accommodation->accommodation_name) ? $admin->userDetails->accommodation->accommodation_name : '' }}">
                      </div>
                    </div> -->

                    <div class="text-center">
                      <button type="button" class="btn btn-primary" id="changeAdminProfile">{{__('apilang.save')}}</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="post" action="{{route('adminPasswordChange')}}" id="AdminPwdChange">
                    @csrf
                    
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.current_password')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="current_password" type="password" class="form-control" id="currentPassword" value="{{ old('current_password') }}">
                        <span class="text-red-500 current_password"></span>
                        @error('current_password')
                            <div class="text-red-500 current_password">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.new_password')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password" type="password" class="form-control" id="newPassword" value="{{ old('new_password') }}">
                        <span class="text-red-500 new_password"></span>
                        @error('new_password')
                            <div class="text-red-500 new_password">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.renter_password')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation" value="{{ old('new_password_confirmation') }}">
                        <span class="text-red-500 new_password_confirmation"></span>
                        @error('new_password_confirmation')
                            <div class="text-red-500 new_password_confirmation">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="button" class="btn btn-primary" id="changeAdminPwd">{{__('apilang.save')}}</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>


@endsection
