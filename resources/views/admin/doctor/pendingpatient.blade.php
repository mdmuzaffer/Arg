@extends('layouts.doctor')
@section('title','Pending patient') 
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
                   <!--  <td>
                      {{ isset($patient['user_details']['department']['name']) && !empty($patient['user_details']['department']['name']) ? $patient['user_details']['department']['name'] : "Not selected" }}
                    </td> -->
                    <td>{{$patient['is_active'] ==0 ?"Inactive":"Active"}}</td>
                   
                    <!-- <td>
                      @if(isset($patient['user_details']['department_status']) && $patient['user_details']['department_status'] !== null)
                        @if($patient['user_details']['department_status'] == 0)
                            {{ __('Pending') }}
                        @elseif($patient['user_details']['department_status'] == 1)
                            {{ __('Approve') }}
                        @elseif($patient['user_details']['department_status'] == 2)
                            {{ __('Decline') }}
                        @endif
                    @endif
                    </td>  -->


                    <td>{{ date('j F, Y', strtotime($patient['created_at'])) }}</td>
                    <td>
                      <!--
                      <button type="button" class="btn btn-danger rounded-pill">Delete</button>
                      <button type="button" class="btn btn-warning rounded-pill">Update</button>
                       -->
                      

                     <!--  <button type="button" class="btn btn-info rounded-pill"><a href="{{route('doctor.userProfile',$patient['id'])}}" >View</a></button>

                      <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="{{route('doctor.patientProfileUpdate',$patient['id'])}}" >{{ isset($patient['is_active']) && $patient['is_active'] ==1 ? "In active" : "Active" }}</a></button>

                       <button type="button" data-userid="{{$patient['id']}}" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#verticalycentered_{{$patient['id']}}">
                          Department status
                        </button> -->



                      <span class="badge text-bg-info btn-warning text-white py-2"><a class="text-white" href="{{route('doctor.userProfile',$patient['id'])}}" >View</a></span>

                      <span class="badge text-bg-info bg-blue text-white py-2"><a class="text-white" href="{{route('doctor.patientProfileUpdate',$patient['id'])}}" >{{ isset($patient['is_active']) && $patient['is_active'] ==1 ? "In active" : "Active" }}</a></span>

                      <span class="badge text-btn-secondary bg-secondary text-white py-2" data-userid="{{$patient['id']}}" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#verticalycentered_{{$patient['id']}}">
                          Section status</span>


                        <div class="modal fade" id="verticalycentered_{{$patient['id']}}" tabindex="-1" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Change department status</h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                               <p class="departmentStatusMsg"></p>
                              <form id="changeDepartment">
                                @csrf
                                <input type="hidden" class="userId" value="{{$patient['id']}}">
                                <div class="modal-body">
                                  <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="departmentStatus" id="departmentStatus">
                                      <option value="0">Pending</option>
                                      <option value="1">Approve</option>
                                      <option value="2">Decline</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary patientDepartmentStatus" id="patientDepartmentStatus">Save changes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

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
