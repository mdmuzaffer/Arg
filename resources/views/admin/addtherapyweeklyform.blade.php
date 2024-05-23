@extends('layouts.master')
@section('title', __('apilang.add')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item"><a href="{{route('weeklyschedule')}}">{{ __('apilang.therapy') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
                    <h5 class="card-title">@yield('title')</h5>


                   @if(session('fail'))
                      <div class="alert alert-danger">
                          {{ session('fail') }}
                      </div>
                    @endif
                    @if(session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                    @endif

                    <!-- General Form Elements -->

                  <div class="row mx-0">
                  <div class="col-lg-12 col-md-12 col-12">

                    <form method="post" action="{{ route('addweeklyschedule',$therapy->id??'') }}">
                      @csrf
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">{{__('apilang.start_time')}}</label>
                        <div class="col-sm-8">
                           <input type="time" name="start_time" id="time-inputstart" class="without_ampm form-control" placeholder="Start time" required value="{{ substr($therapy->therapy_start_time ??'', 0, 5) }}" />
                          @error('start_time')
                          <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">{{__('apilang.end_time')}}</label>
                        <div class="col-sm-8">

                          <input type="time" name="end_time" id="time-inputend" class="without_ampm form-control" placeholder="End time" required  value="{{ substr($therapy->therapy_end_time ??'', 0, 5) }}" />

                          @error('end_time')
                          <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                    <div class="row mb-3">
                        <label for="department" class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-8">
                        <select class="form-select form-control" aria-label="Default select example" name="therapyDepartment" id="therapyDepartmentweekly" required>
                            <option value="">Select department</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" {{ isset($therapy->department_id) && $therapy->department_id == $department->id ? 'selected' : '' }} >{{$department->name}}</option>
                            @endforeach
                        </select>
                      </div>
                     </div>

                    <div class="row mb-3">
                        <label for="therapy" class="col-sm-3 col-form-label">{{ __('apilang.therapy') }}</label>
                      <div class="col-sm-8">
                            <select class="form-control selectpicker" data-live-search="true" name="Selectedtherapy_id" id="Selectedtherapyweekly" required>
                                 <option value="">Select therapy</option>

                                  @if($departmentTherapy)
                                    @foreach($departmentTherapy as $key=>$therapys)
                                      <option value="{{$therapys->id}}"  {{ isset($therapy->therapy_id) && $therapy->therapy_id == $therapys->id ? 'selected' : '' }}>{{$therapys->therapy_name}}</option>
                                    @endforeach

                                  @endif
                            </select>

                          @error('Selectedtherapy_id')
                          <div class="error-message">{{ $message }}</div>
                          @enderror

                      </div>
                    </div>


                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-3 col-form-label">Day name</label>
                          <div class="col-sm-8">
                            <select class="form-select p-2 rounded" aria-label="Default select example" name="day">

                              @foreach($weekday as $day)
                             
                              <option value="{{ $day->id }}" {{ isset($therapy->day_id) && $therapy->day_id == $day->id ? 'selected' : '' }}>{{ $day->day }}</option>


                              @endforeach
                            </select>
                          </div>
                          @error('day')
                            <div class="error-message">{{ $message }}</div>
                          @enderror
                      </div>


                      <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="checkbox" class="form-label fw-bold">{{__('apilang.status')}}</label> 
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                         <input class="form-check-input" type="checkbox" name="status" {{ isset($therapy) && $therapy->status =='1' ? 'checked':''}}>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                          <button type="submit" class="btn btn-primary">{{__('apilang.save')}}</button>
                        </div>
                      </div>

                    </form><!-- End General Form Elements -->

                  </div>
                </div>
                  </div>
          </div>

        </div>
      </div>
    </section>


  </main>
@endsection
