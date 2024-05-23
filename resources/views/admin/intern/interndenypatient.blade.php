@extends('layouts.intern')
@section('title','Discharge patients') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <!-- <h1>@yield('title')</h1> -->
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">@yield('title')</h5>

              @if(session('success'))
               <div class="col-lg-6">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              </div>
              @endif

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>

                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Department</th> -->
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Department status</th> -->
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($patients as $patient)
                  <tr>
                    <th scope="row">{{$patient['id']}}</th>
                    <td>{{$patient['name']}}</td>
                    <td>{{$patient['email']}}</td>
                    <!-- <td>
                      {{ isset($patient['user_details']['department']['name']) && !empty($patient['user_details']['department']['name']) ? $patient['user_details']['department']['name'] : "Not selected" }}
                    </td> -->
                    <td>{{$patient['is_active'] ==0 ?"Inactive":"Active"}}</td>
                   <!--  <td>
                      @if(isset($patient['user_details']['department_status']) && !empty($patient['user_details']['department_status']))
                        @if($patient['user_details']['department_status'] == 0)
                           Pending
                        @elseif($patient['user_details']['department_status'] == 1)
                             Approve
                        @elseif($patient['user_details']['department_status'] == 2)
                            Decline
                        @endif
                      @endif
                    </td> -->

                    <td>{{ date('j F, Y', strtotime($patient['created_at'])) }}</td>
                    <td>

                      <span class="badge text-bg-warning py-2"><a class="text-white" href="{{route('intern.userProfile',$patient['id'])}}" >View</a></span>
                      <span class="badge text-bg-info bg-blue text-white py-2"><a class="text-white" href="{{route('intern.patientProfileUpdate',$patient['id'])}}" >{{ isset($patient['is_active']) && $patient['is_active'] ==1 ? "In active" : "Active" }}</a></span>

                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
@endsection
