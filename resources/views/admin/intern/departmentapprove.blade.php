@extends('layouts.intern')
@section('title','Approve patient') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
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
                    <th scope="col">Approve on</th>
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
                    <td>{{$patient['is_active'] ==0 ?"New":"Active"}}</td>

                    <!-- <td>
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

                    <td>{{ date('j F, Y', strtotime($patient['user_details']['department_active_date'])) }}</td>
                    <td>

                      <!-- <button type="button" class="btn btn-info rounded-pill"><a href="{{route('userProfile',$patient['id'])}}" >View</a></button>

                      <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="{{route('userProfileUpdate',$patient['id'])}}" >{{ isset($patient['is_active']) && $patient['is_active'] ==1 ? "In active" : "Active" }}</a></button>

                       <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="{{route('userProfileApprove',$patient['id'])}}" >{{ isset($patient['status']) && $patient['status'] ==1 ? "Decline" : "Approve" }}</a></button>
                       <button type="button" class="btn btn-warning rounded-pill"><a class="text-white" href="{{route('intern.userSchedule',$patient['id'])}}" >schedule</a></button>

                       
                      <button type="button" class="btn btn-info rounded-pill"><a class="text-white" href="{{route('patientDailyReport',$patient['id'])}}" >Daily report</a></button>

                      <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="{{route('patientCaseDetails',$patient['id'])}}" >Case details</a></button> -->


                     <!--  <span class="badge text-bg-success py-2"><a class="ms-1" href="{{route('userProfileApprove', $patient['id'])}}" >{{ isset($patient['status']) && $patient['status'] ==1 ? "Decline" : "Approve" }}</a></span>

                      <span class="badge text-bg-info bg-blue py-2"><a class="ms-1" href="{{route('intern.userSchedule',$patient['id'])}}" >schedule</a></span>

                      <span class="badge text-bg-info btn-warning py-2"><a class="ms-1" href="{{route('patientDailyReport',$patient['id'])}}" >Daily report</a></span>

                      <span class="badge text-btn-secondary bg-secondary py-2"><a class="ms-1" href="{{route('patientCaseDetails',$patient['id'])}}" >Case details</a></span> -->


                        <span type="button" class="btn btn-outline-primary btn-sm p-1" style=width:95px;> <img src="/images/icone/Schedule.png" style=width:18px;><a class="ms-1" href="{{route('intern.userSchedule',$patient['id'])}}" >schedule</a></span>

                        <span type="button" class="btn btn-outline-primary btn-sm p-1" style=width:110px;><img src="/images/icone/Daily report.png" style=width:18px;><a class="ms-1" href="{{route('patientDailyReport',$patient['id'])}}" >Daily report</a></span>

                        <span type="button" class="btn btn-outline-primary btn-sm p-1" style=width:109px;><img src="/images/icone/Case details.png" style=width:18px;><a class="ms-1" href="{{route('patientCaseDetails',$patient['id'])}}" >Case details</a></span>




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
