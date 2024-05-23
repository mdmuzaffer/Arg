@extends('layouts.doctor')
@section('title','Profile') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle ms-5">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row d-flex justify-content-center">
        <div class="col-xl-3">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{URL::asset(isset($user->userDetails->profile_photo) && !empty($user->userDetails->profile_photo) ? $user->userDetails->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
              <h2>@if(!empty($user->name)){{$user->name}}@endif</h2>
              <h3>@if(!empty($user->email)){{$user->email}}@endif</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
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

                <div class="tab-pane show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label ">Full name</div>
                    <div class="col-lg-3 col-md-3">@if(!empty($user->name)){{$user->name}}@endif</div>
                    <div class="col-lg-3 col-md-3 label">Email</div>
                    <div class="col-lg-3 col-md-3">@if(!empty($user->email)){{$user->email}}@endif</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Mobile no</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->mobile_no) && !empty($user->mobile_no ) ? $user->mobile_no : "No" }}</div>
                    
                    <!-- <div class="col-lg-3 col-md-3 label">Status</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->is_active) && $user->is_active ==1  ? "Active" : "In Active" }}</div> -->
                    
                  </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Is active</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->is_active) && $user->is_active ==1  ? "Yes" : "No" }}</div>
                    <div class="col-lg-3 col-md-3 label">Profile-Complete</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->profile_complete) && $user->profile_complete ==1  ? "Yes" : "No" }}</div>
                  </div><hr>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">First name</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->first_name) && !empty($user->userDetails->first_name) ? $user->userDetails->first_name : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Department</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->department->name) && !empty($user->userDetails->department->name) ? $user->userDetails->department->name : 'No' }} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">What's no</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->whats_no) && !empty($user->userDetails->whats_no) ? $user->userDetails->whats_no : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Section</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->section->name) && !empty($user->userDetails->section->name) ? $user->userDetails->section->name : 'No' }}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Age</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->age) && !empty($user->userDetails->age) ? $user->userDetails->age : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Pincode</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->pincode) && !empty($user->userDetails->pincode) ? $user->userDetails->pincode : 'No' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Gender</div>
                    <div class="col-lg-3 col-md-3">{{ (isset($user->userDetails->gender) && $user->userDetails->gender == 1) ? "Male" : ((isset($user->userDetails->gender) && $user->userDetails->gender == 2) ? "Female" : "Other") }}
                    </div>
                   
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Address</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->address) && !empty($user->userDetails->address) ? $user->userDetails->address : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">State</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->state->state_name) && !empty($user->userDetails->state->state_name) ? $user->userDetails->state->state_name : 'No' }}</div>
                  </div>

                 <!-- <form method="post" action="{{route('doctor.patientDepartmentUpdate',$user->id)}}">
                    @csrf
                      <input type="hidden" name="userId" value="{{$user->id}}">
                      <div class="row">
                          <div class="col-lg-3 col-md-4 label d-flex align-items-center">Department</div>
                          <div class="col-lg-2 col-md-4 d-flex align-items-center">
                              <div class="lvl-name">
                                  {{ isset($user->userDetails->department->name) && !empty($user->userDetails->department->name) ? $user->userDetails->department->name : 'No' }}
                              </div>
                          </div>
                          <div class="col-lg-4 col-md-4  d-flex justify-content-end">

                            <select style="width:74%;" class="form-select p-2 rounded" aria-label="Default select example" name="department_type">

                                @foreach($departments as $department)
                                  <option value="{{$department->id}}" @if(isset($user->userDetails->department->id) && $user->userDetails->department->id == $department->id) selected @endif>{{$department->name}}</option>
                                 @endforeach

                            </select>
                          </div>

                          <div class="col-lg-3 col-md-8">
                              <div class="department-btn">
                                  <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                              </div>
                          </div>
                      </div>
                    </form> -->

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Language</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->language->name) && !empty($user->userDetails->language->name) ? $user->userDetails->language->name : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">Accomudation</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->accommodation->name) && !empty($user->userDetails->accommodation->name) ? $user->userDetails->accommodation->name : 'No' }}</div>
                 </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">Section status</div>
                    <div class="col-lg-3 col-md-3">{{ (isset($user->userDetails->department_status) && $user->userDetails->department_status == 1) ? "Approve" : ((isset($user->userDetails->department_status) && $user->userDetails->department_status == 0) ? "Pending" : "Decline") }}</div>
                    <div class="col-lg-3 col-md-3 label">Active Date</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->department_active_date) && !empty($user->userDetails->department_active_date) ? $user->userDetails->department_active_date : 'No' }}</div>
                  </div>
                  

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>


@endsection
