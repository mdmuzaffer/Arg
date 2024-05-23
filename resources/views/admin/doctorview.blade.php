@extends('layouts.master')
@section('title', __('apilang.label_doctor')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">


      <!-- <div class="row">
        <div class="col-lg-12">
          
          <div class="card">
            <div class="card-body">
             <h5 class="card-title">@yield('title')</h5>
            </div>
          </div>

        </div>
      </div> -->



          <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{URL::asset(isset($doctor->doctor->profile_photo) && !empty($doctor->doctor->profile_photo) ? $doctor->doctor->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
              <h2>@if(!empty($doctor->name)){{$doctor->name}}@endif</h2>
              <h3>@if(!empty($doctor->email)){{$doctor->email}}@endif</h3>
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
                    <div class="col-lg-3 col-md-3">@if(!empty($doctor->name)){{$doctor->name}}@endif</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_email') }}</div>
                    <div class="col-lg-3 col-md-3">@if(!empty($doctor->email)){{$doctor->email}}@endif</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_mobile') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->mobile_no) && !empty($doctor->mobile_no ) ? substr($doctor->mobile_no, 3, 12) : "No" }}</div>
                    
                    <!-- <div class="col-lg-3 col-md-3 label">Department</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->doctor->department->name) && !empty($doctor->doctor->department->name) ? $doctor->doctor->department->name : "No" }}</div> -->
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.active') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->status) && $doctor->status =='1'  ? "Yes" : "No" }}</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.section') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->sections[0]->name) && !empty($doctor->sections[0]->name) ? $doctor->sections[0]->name : "No" }}</div>
                  </div>




                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-3 label">First Name</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->first_name) && !empty($doctor->userDetails->first_name) ? $doctor->userDetails->first_name : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Last Name</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->last_name) && !empty($doctor->userDetails->last_name) ? $doctor->userDetails->last_name : 'No' }} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Whats-No</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->whats_no) && !empty($doctor->userDetails->whats_no) ? $doctor->userDetails->whats_no : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Section</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->section->name) && !empty($doctor->userDetails->section->name) ? $doctor->userDetails->section->name : 'No' }}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Age</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->age) && !empty($doctor->userDetails->age) ? $doctor->userDetails->age : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Pincode</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->pincode) && !empty($doctor->userDetails->pincode) ? $doctor->userDetails->pincode : 'No' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Gender</div>
                    <div class="col-lg-3 col-md-3">{{ (isset($doctor->userDetails->gender) && $doctor->userDetails->gender == 1) ? "Male" : ((isset($doctor->userDetails->gender) && $doctor->userDetails->gender == 2) ? "Female" : "Other") }}
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Address</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->address) && !empty($doctor->userDetails->address) ? $doctor->userDetails->address : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">State</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->state->state_name) && !empty($doctor->userDetails->state->state_name) ? $doctor->userDetails->state->state_name : 'No' }}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Department</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->department->name) && !empty($user->userDetails->department->name) ? $user->userDetails->department->name : 'No' }}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Language</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->language->name) && !empty($doctor->userDetails->language->name) ? $doctor->userDetails->language->name : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Accomudation</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->accommodation->name) && !empty($doctor->userDetails->accommodation->name) ? $doctor->userDetails->accommodation->name : 'No' }}</div>
                 </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Department Status</div>
                    <div class="col-lg-3 col-md-3">{{ (isset($doctor->userDetails->department_status) && $doctor->userDetails->department_status == 1) ? "Approve" : ((isset($doctor->userDetails->department_status) && $doctor->userDetails->department_status == 0) ? "Pending" : "Decline") }}</div>
                    <div class="col-lg-3 col-md-3 label">Active Date</div>
                    <div class="col-lg-3 col-md-3">{{ isset($doctor->userDetails->department_active_date) && !empty($doctor->userDetails->department_active_date) ? $doctor->userDetails->department_active_date : 'No' }}</div>
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
