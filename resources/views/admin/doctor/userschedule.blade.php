@extends('layouts.doctor')
@section('title','Schedule') 
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

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

        <div class="row">
            <div class="col-lg-9 col-md-12 col-12">

            <form method="post" id="userSchedule" action="javaScript::void()">
                <div class="row mt-4">
                    <div class="col">
                        <div class="patient-name">
                            <p> Patient Name</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="patient-name">
                            <p class="fw-bold">{{$patient->name}}</p>
                            <input type="hidden" value="{{$patient->id}}" id="patientId" name="patientId">
                        </div>
                    </div>

                    <div class="col">
                        <div class="patient-name">
                            <p> Patient Email</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="patient-name">
                            <p class="fw-bold">{{$patient->email}}</p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="patient-name">
                            <p>Select Doctor</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="multi-input d-flex align-items-center">
                            <select class="form-select p-2 rounded" name="selectDoctor_type" placeholder="Select Doctor"
                                id="selectDoctor_type">
                                @foreach($doctors as $doctor)
                                <option value="{{$doctor->user_id}}">{{$doctor->firstname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!--left-side- SECOND-ROW -->
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">Date</label>
                        <input id="myTime" type="date" class="form-control" name="text" required>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                         <label for="exampleInputEmail1" class="form-label">Start Time</label>
                        <!-- <input type="time" class="form-control" step="2" />  -->
                       <input type="text" id="time-input" placeholder="Start time" class="form-control timeStartend" required>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">End Time</label>
                        <input type="text" id="time-inputend" placeholder="End time"  class=" form-control timeStartend" required>
                        <div id="endTimeError" class="error endTimeError" for="time-inputend"></div>

                    </div>
                </div>
                <!-- left-side THIRD ROW -->
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">Department</label>
                        <select class="form-select" aria-label="Default select example" name="therapyDepartment" id="therapyDepartment" required>
                            <option value="">Select department</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-12" style="display: none;" id="dietTherapy">
                        <label for="exampleInputEmail1" class="form-label">Group</label>
                        <select class="form-select" aria-label="Default select example" name="therapyDepartmentGroup" id="therapyDepartmentGroup" required>
                            <option value="">Select group</option>
                            @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">Therphy</label>
                        <select class="form-select" aria-label="Default select example" id="Selectedtherapy" required>
                             <option value="">Select therapy</option>
                        </select>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">Vanue</label>

                         <select class="form-select" aria-label="Default select example" id="departMentVenu" required>
                             <option value="">Select Venue</option>
                        </select>
                    </div>
                </div>

                <!-- left-side FOURTH ROW -->
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-end">
                        <div class="checkbx d-flex">
                            <label for="exampleInputEmail1" class="form-label">Check/No</label>
                            <input type="checkbox" class="form-check-input" id="checkAll" />
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">Therapist</label>
                        <select class="form-select" aria-label="Default select example" id="SelectedtherapyDoctor" required>
                             <option value="">Select Therapist</option>
                        </select>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="exampleInputEmail1" class="form-label">Intern</label>

                        <select class="form-select" aria-label="Default select example" id="SelectedtherapyIntern" required>
                             <option value="">Select intern</option>
                        </select>
                    </div>
                </div>


                <!-- left-side FIFTH ROW -->
                <div class="row mt-5 mx-4">
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox2" name="noofdays[]" value="1">
                            <label class="form-check-label" for="inlineCheckbox2">1</label>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox2" name="noofdays[]" value="2">
                            <label class="form-check-label" for="inlineCheckbox2">2</label>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox3" name="noofdays[]" value="3">
                            <label class="form-check-label" for="inlineCheckbox3">3</label>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox4" name="noofdays[]" value="4">
                            <label class="form-check-label" for="inlineCheckbox4">4</label>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox5" name="noofdays[]" value="5">
                            <label class="form-check-label" for="inlineCheckbox5">5</label>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox6" name="noofdays[]" value="6">
                            <label class="form-check-label" for="inlineCheckbox6">6</label>
                        </div>
                    </div>

                    <div class="col-lg-1 col-md-1 col-sm-1">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox7" name="noofdays[]" value="7">
                            <label class="form-check-label" for="inlineCheckbox7">7</label>
                        </div>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-lg-9 col-md-12 col-12">
                        <div id="checkboxError" class="error checkboxError"></div>
                    </div>
                </div>

               <div class="row ">
                    <div class="col-lg-9 col-md-12 col-12">
                        <div class="row mt-4">
                            <div class="col">
                                <div class="patient-name" id="PrecautionMedicine">
                                    <label class="form-check-label" for="inlineCheckbox71">Prescription +</label>
                                </div>
                            </div>
                            <div class="col" id="medicineField" style="display:none">
                                <div class="patient-name">
                                    <textarea id="addMedicine" name="medicine" rows="2" cols="50" placeholder="Add prescription"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-lg-9 col-md-12 col-12">
                        <div class="row mt-4">
                            <div class="col">
                                <div class="patient-name">
                                    <label class="form-check-label" for="inlineCheckbox7">Add notes</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="patient-name">
                                    <textarea id="addNotes" name="notes" rows="4" cols="50" placeholder="Enter your message" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p id="result1"></p>
                <div class="row mt-4">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="submit-btn d-flex justify-content-end">
                            <button class="add-button" type="submit" id="SubmitTherapy"><a class="text-white">Submit</a></button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- right-side-details -->
            <div class="col-lg-3 col-md-12 col-sm-12 border-start" id="defaultData">

                <div class="row mt-4">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                      <span>Department</span>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                      <span>Therapy</span>
                  </div>
                </div>

          <!-- right-side-SECOND-ROW -->
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                      <span>Date</span>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-12">
                      <span>Start Time </span>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <span>End Time</span>
                  </div>
                </div>
              <hr>
                @include('admin.userstherapy')
            </div>

        </div>

    </section>
  </main>
@endsection
