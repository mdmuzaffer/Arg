@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title', __('apilang.schedule'))
@section('content')


@php 
use Carbon\Carbon;
$day = 1;
$startWeek = Carbon::now()->startOfWeek();
$therapyDate = $startWeek->addDays($day)->toDateString();


@endphp

<main id="main" class="main">

    <div class="pagetitle">
        <h1>@yield('title')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('userProfile', $patient->id)}}">{{ __('apilang.patient') }}</a></li>
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


        <div class="row mx-0">
           <div class="col-lg-12 col-md-12 col-12">

            <form method="post" id="userSchedule" action="javaScript::void()">



                <style>

                </style>
                <div class="row schedule-form-row">
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <p class="fw-bold">{{ __('apilang.patient_name') }}</p>
                            </div>
                            <div class="col field-form">
                                <p>{{$patient->name}}</p>
                                <input type="hidden" value="{{$patient->id}}" id="patientId" name="patientId">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <p class="fw-bold">{{ __('apilang.patient_email') }}</p>
                            </div>
                            <div class="col field-form">
                                <p>{{$patient->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <p class="fw-bold">{{ __('apilang.select_doctor') }}</p>
                            </div>
                            <div class="col field-form">
                                <div class="multi-input d-flex align-items-center">
                                    <select class="form-control selectpicker" data-live-search="true" name="selectDoctor_type" id="selectDoctor_type" placeholder="Select Doctor" id="selectDoctor_type">
                                        @foreach($doctors as $doctor)
                                        <option value="{{$doctor->user_id}}">{{$doctor->firstname}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                               <label for="startTime" class="form-label">{{ __('apilang.start_time') }}</label>
                            </div>
                            <div class="col field-form">
                               <input type="time" id="time-inputstart" class="without_ampm form-control" placeholder="Start time" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <label for="endTime" class="form-label">{{ __('apilang.end_time') }}</label>
                            </div>
                            <div class="col field-form">
                                <input type="time" id="time-inputend" class="without_ampm form-control" placeholder="End time" required  />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <label for="therapy" class="form-label">{{ __('apilang.intern') }}</label>
                            </div>
                            <div class="col field-form">
                                <select class="form-control selectpicker" data-live-search="true"  id="SelectedtherapyIntern" required>
                                     <option value="">Select intern</option>
                                     @foreach($interns as $key=>$intern)
                                     <option value="{{$intern->id}}">{{$intern->firstname}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <label for="therapy" class="form-label">{{ __('apilang.therapy') }}</label>
                            </div>
                            <div class="col field-form" id="myTherapySection">
                                <select class="form-control selectpicker" data-live-search="true" name="Selectedtherapy" id="Selectedtherapy" required>
                                     <option value="">Select therapy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <label for="venu" class="form-label">{{ __('apilang.venue') }}</label>
                            </div>
                            <div class="col field-form">
                                <select class="form-control" id="departMentVenu" required>
                                     <option value="">Select Venue</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <label for="therapy" class="form-label">{{ __('apilang.therapist') }}</label>
                            </div>
                            <div class="col field-form">
                                <select class="form-control selectpicker" data-live-search="true" id="SelectedtherapyDoctor" required>
                                     <option value="">Select Therapist</option>
                                     @foreach($therapists as $key=>$therapist)
                                     <option value="{{$therapist->id}}">{{$therapist->firstname}}</option>
                                     @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <label for="checkbox" class="form-label">{{ __('apilang.schedule') }}</label>
                            </div>
                            <div class="col field-form d-flex">
                                <div class="col">
                                    <input type="checkbox" class="form-check-input" id="checkAll" />
                                    <label class="form-check-label" for="inlineCheckbox">{{ __('apilang.all') }}</label>
                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox1" name="noofdays[]" value="1">
                                        <label class="form-check-label mb-0" for="inlineCheckbox1">{{ __('apilang.tue') }}</label>
                                    </div>
                                    <p class="week_date">{{ Carbon::now()->startOfWeek()->addDays(1)->format('d-m-Y') }}</p>
                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox2" name="noofdays[]" value="2">
                                        <label class="form-check-label mb-0" for="inlineCheckbox2">{{ __('apilang.wed') }}</label>
                                        
                                    </div>
                                    <p class="week_date">{{ Carbon::now()->startOfWeek()->addDays(2)->format('d-m-Y') }}</p>

                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox3" name="noofdays[]" value="3">
                                        <label class="form-check-label mb-0" for="inlineCheckbox3">{{ __('apilang.thur') }}</label>
                                        
                                    </div>
                                    <p class="week_date">{{ Carbon::now()->startOfWeek()->addDays(3)->format('d-m-Y') }}</p>

                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox4" name="noofdays[]" value="4">
                                        <label class="form-check-label mb-0" for="inlineCheckbox4">{{ __('apilang.fri') }}</label>
                                        
                                    </div>
                                    <p class="week_date">{{ Carbon::now()->startOfWeek()->addDays(4)->format('d-m-Y') }}</p>

                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox5" name="noofdays[]" value="5">
                                        <label class="form-check-label mb-0" for="inlineCheckbox5">{{ __('apilang.sat') }}</label>
                                       
                                    </div>
                                    <p class="week_date">{{ Carbon::now()->startOfWeek()->addDays(5)->format('d-m-Y') }}</p>

                                </div>
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox6" name="noofdays[]" value="6">
                                        <label class="form-check-label mb-0" for="inlineCheckbox6">{{ __('apilang.sun') }}</label>
                                    </div>
                                    <p class="week_date">{{ Carbon::now()->startOfWeek()->addDays(6)->format('d-m-Y') }}</p>

                                </div>

                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input otherCheckbox" type="checkbox" id="inlineCheckbox7" name="noofdays[]" value="7">
                                        <label class="form-check-label mb-0" for="inlineCheckbox7">{{ __('apilang.mon') }}</label>
                                    </div>
                                    <p class="week_date">{{ Carbon::now()->startOfWeek()->addDays(7)->format('d-m-Y') }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div" id="PrecautionMedicine">
                                <label class="form-check-label" for="inlineCheckbox71">{{ __('apilang.label_prescription') }} +</label>
                            </div>
                            <div class="col field-form" id="medicineField">
                                <textarea class="w-100" id="addMedicine" name="medicine" rows="4" cols="50" placeholder="Add prescription"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 d-flex">
                        <div class="d-flex align-items-center w-100">
                            <div class="label-div">
                                <label class="form-check-label" for="inlineCheckbox7">{{ __('apilang.add_notes') }}</label>
                            </div>
                            <div class="col field-form d-flex">
                                <textarea class="w-100" id="addNotes" name="notes" rows="4" cols="50" placeholder="{{ __('apilang.your_message') }}" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12" style="display:none">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select form-control" aria-label="Default select example" name="therapyDepartment" id="therapyDepartment" required>
                            <option value="">Select department</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach

                        </select>
                     </div>

                </div>
                <div class="row">
                    <div class="row ">
                        <div class="col-lg-9 col-md-12 col-12">
                            <div id="checkboxError" class="error checkboxError"></div>
                            <div id="message" style="display: none;">Button is disabled.</div>
                        </div>
                    </div>


                    <p id="result1"></p>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="submit-btn d-flex mb-4 ms-4">
                                <button class="add-button" type="submit" id="SubmitTherapy"><a class="text-white">Submit</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" id="defaultData">
                @include('admin.userstherapy')
                </div>
            </div>
        </div>

    </section>
</main>
@endsection



