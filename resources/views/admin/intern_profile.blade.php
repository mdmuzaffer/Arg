@extends('layouts.intern')
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


               <img src="{{URL::asset(isset($intern->profile_photo) && !empty($intern->profile_photo) ? $intern->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">

              <h2>@if(!empty($intern->name)){{$intern->name}}@endif</h2>
              <h3>@if(!empty($intern->email)){{$intern->email}}@endif</h3>
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

                @if(session('message'))
                  <div class="alert alert-success m-alert">
                      {{ session('message') }}
                  </div>
                @endif


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane show active profile-overview" id="profile-overview">

                  <h5 class="card-title">{{__('apilang.profile_details')}}</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">{{__('apilang.first_name')}}</div>
                    <div class="col-lg-9 col-md-8">@if(!empty($intern->name)){{$intern->name}}@endif</div>
                      @error('name')
                          <div class="error">{{ $message }}</div>
                      @enderror
                  </div>

                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('apilang.last_name')}}</div>
                    <div class="col-lg-9 col-md-8">{{ isset($intern->lastname) && !empty($intern->lastname) ? $intern->lastname : '' }}</div>
                  </div>
                 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('apilang.label_mobile')}}</div>
                    <div class="col-lg-9 col-md-8">{{ isset($intern->mobile) ? substr($intern->mobile, 3, 10) : '' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('apilang.label_email')}}</div>
                    <div class="col-lg-9 col-md-8">{{ isset($intern->email) && !empty($intern->email) ? $intern->email : '' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('apilang.label_section')}}</div>
                    <div class="col-lg-9 col-md-8">{{ isset($intern->section_name) && !empty($intern->section_name) ? $intern->section_name : '' }}</div>
                  </div>

                </div>

                <div class="tab-pane profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="{{route('intern.profile')}}" id="internProfile">
                    @csrf
                    <div class="text-success internProUpdate"></div>
                    <input type="hidden" name="internId" id="internId" value="{{ isset($intern->user_id) && !empty($intern->user_id) ? $intern->user_id : auth()->id() }}">




                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.label_image')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{URL::asset(isset($intern->profile_photo) && !empty($intern->profile_photo) ? $intern->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile">

                        <div class="pt-2">
                          <a href="javaScript::void()" class="btn btn-primary btn-sm" title="Upload new profile image">
                            <input type="file" name="profile_photo" id="profile_photo">
                            <i class="bi bi-upload"></i></a>
                          <a href="javaScript::void()" class="btn btn-danger btn-sm" title="my profile image" id="RemoveProfileinternImage"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.first_name')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" type="text" class="form-control" id="firstname" value="{{ isset($intern->name) && !empty($intern->name) ? $intern->name : '' }}">
                        <span class="text-red-500 firstname"></span>
                        @error('firstname')
                            <div class="text-red-500 firstname">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.last_name')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastname" type="text" class="form-control" id="lastname" value="{{ isset($intern->lastname) && !empty($intern->lastname) ? $intern->lastname : '' }}">

                        <span class="text-red-500 lastname"></span>
                        @error('lastname')
                            <div class="text-red-500 lastname">{{ $message }}</div>
                        @enderror

                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.label_email')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="{{ isset($intern->email) && !empty($intern->email) ? $intern->email : '' }}">

                        <span class="text-red-500 email"></span>
                        @error('email')
                            <div class="text-red-500 email">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">{{__('apilang.label_mobile')}}</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile" type="text" class="form-control" id="mobile" value="{{ isset($intern->mobile) ? substr($intern->mobile, 3, 10) : '' }}">
                        
                        <span class="text-red-500 mobile"></span>
                        @error('mobile')
                            <div class="text-red-500 mobile">{{ $message }}</div>
                        @enderror

                      </div>
                    </div>

                    <div class="text-center">
                      <button type="button" class="btn btn-primary" id="changeInternProfile">{{__('apilang.save')}}</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>

                <div class="tab-pane pt-3" id="profile-change-password">
                  <!-- Change Password Form -->

                 <form method="post" action="{{route('internPasswordChange')}}" id="internPwdChange">
                    @csrf
                    <div class="text-success passwordUpdate"></div>
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
                      <button type="button" class="btn btn-primary" id="changeInternPwd">{{__('apilang.save')}}</button>
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
