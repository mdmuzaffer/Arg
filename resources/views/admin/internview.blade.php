@extends('layouts.master')
@section('title', __('apilang.view')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{  __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item"><a href="{{route('interns')}}">{{  __('apilang.intern') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">



    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{URL::asset(isset($intern->intern->profile_photo) && !empty($intern->intern->profile_photo) ? $intern->intern->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
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
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">{{  __('apilang.overview') }}</button>
                </li>

                  
                  @if(session('message'))
                   <div class="col-lg-6 d-flex justify-content-end">
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                  </div>
                  @endif


                  @if(session('success'))
                   <div class="col-lg-6 d-flex justify-content-end">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                  </div>
                  @endif
                

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">{{ __('apilang.profile_details') }}</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label ">{{ __('apilang.label_full_name') }}</div>
                    <div class="col-lg-3 col-md-3">@if(!empty($intern->name)){{$intern->name}}@endif</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_email') }}</div>
                    <div class="col-lg-3 col-md-3">@if(!empty($intern->email)){{$intern->email}}@endif</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_mobile') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->mobile_no) && !empty($intern->mobile_no ) ? $intern->mobile_no : $intern->intern->mobile_no }}</div>
                    
                   <!--  <div class="col-lg-3 col-md-3 label">Department</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->intern->department->name) && !empty($intern->intern->department->name) ? $intern->intern->department->name : "No" }}</div> -->
                    
                  </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.active') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->status) && $intern->status =='1'  ? "Yes" : "No" }}</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.section') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->sections[0]->name) && !empty($intern->sections[0]->name) ? $intern->sections[0]->name : "No" }}</div>
                  </div>




                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-3 label">First Name</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->first_name) && !empty($intern->userDetails->first_name) ? $intern->userDetails->first_name : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Last Name</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->last_name) && !empty($intern->userDetails->last_name) ? $intern->userDetails->last_name : 'No' }} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Whats-No</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->whats_no) && !empty($intern->userDetails->whats_no) ? $intern->userDetails->whats_no : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Section</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->section->name) && !empty($intern->userDetails->section->name) ? $intern->userDetails->section->name : 'No' }}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Age</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->age) && !empty($intern->userDetails->age) ? $intern->userDetails->age : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Pincode</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->pincode) && !empty($intern->userDetails->pincode) ? $intern->userDetails->pincode : 'No' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Gender</div>
                    <div class="col-lg-3 col-md-3">{{ (isset($intern->userDetails->gender) && $intern->userDetails->gender == 1) ? "Male" : ((isset($intern->userDetails->gender) && $intern->userDetails->gender == 2) ? "Female" : "Other") }}
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Address</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->address) && !empty($intern->userDetails->address) ? $intern->userDetails->address : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">State</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->state->state_name) && !empty($intern->userDetails->state->state_name) ? $intern->userDetails->state->state_name : 'No' }}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Department</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->department->name) && !empty($user->userDetails->department->name) ? $user->userDetails->department->name : 'No' }}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Language</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->language->name) && !empty($intern->userDetails->language->name) ? $intern->userDetails->language->name : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Accomudation</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->accommodation->name) && !empty($intern->userDetails->accommodation->name) ? $intern->userDetails->accommodation->name : 'No' }}</div>
                 </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Department Status</div>
                    <div class="col-lg-3 col-md-3">{{ (isset($intern->userDetails->department_status) && $intern->userDetails->department_status == 1) ? "Approve" : ((isset($intern->userDetails->department_status) && $intern->userDetails->department_status == 0) ? "Pending" : "Decline") }}</div>
                    <div class="col-lg-3 col-md-3 label">Active Date</div>
                    <div class="col-lg-3 col-md-3">{{ isset($intern->userDetails->department_active_date) && !empty($intern->userDetails->department_active_date) ? $intern->userDetails->department_active_date : 'No' }}</div>
                  </div> -->

                  
                  

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>



    </section>
  </main>


@endsection
