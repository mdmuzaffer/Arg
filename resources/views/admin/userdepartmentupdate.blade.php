@extends('layouts.master')
@section('title','Profile') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{URL::asset(isset($user->userDetails->image) && !empty($user->userDetails->image) ? $user->userDetails->image : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
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
                   <div class="col-lg-6">
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                  </div>
                  @endif


                  @if(session('success'))
                   <div class="col-lg-6">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                  </div>
                  @endif

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">@if(!empty($user->name)){{$user->name}}@endif</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">India</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">{{ isset($user->userDetails->address) && !empty($user->userDetails->address) ? $user->userDetails->address : 'No' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ isset($user->mobile_no) && !empty($user->mobile_no ) ? $user->mobile_no : "No" }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">What's app no</div>
                    <div class="col-lg-9 col-md-8">{{ isset($user->userDetails->whats_no ) && !empty($user->userDetails->whats_no) ? $user->userDetails->whats_no : 'No' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ isset($user->email) && !empty($user->email) ? $user->email : $user->userDetails->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Profile Updated</div>
                    <div class="col-lg-9 col-md-8">{{ isset($user->profile_complete) && $user->profile_complete ==1 ? "Completed" : "Not completed" }}
                    </div>
                  </div>

                  <form method="post" action="{{route('userDepartmentUpdate',$user->id)}}">
                    @csrf
                  <input type="hidden" name="userId" value="{{$user->id}}">
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-6 col-md-5">
                      <select class="form-select p-2 rounded" aria-label="Default select example" name="department_type">
                        @foreach($departments as $department)
                          <option value="{{$department->id}}"@if($user->userDetails->department->id ==$department->id) selected @endif)>{{$department->name}}</option>
                         @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8">{{ isset($user->status) && $user->status ==1 ? "Active" : "Inactive" }}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"></div>
                    <div class="col-lg-9 col-md-8"><button type="submit" class="btn btn-primary rounded-pill">Update</button></div>
                  </div>
                </form>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>


@endsection
