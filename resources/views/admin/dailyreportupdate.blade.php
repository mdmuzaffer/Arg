
@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title', __('apilang.daily_report')) 
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label')}}</a></li>
          <li class="breadcrumb-item"><a href="{{route('patientDailyReport', $report->user_id)}}">{{__('apilang.patient')}}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div>

  <form method="post" action="{{route('patientDailyreportUpdate', $report->id)}}" id="dailyReport">
    @csrf
    <section id="daily-report" class="daily-report">
      <div class="daily-reports-section">
         <div class="container">
             <div class="reports-heading mb-4">
                 <h4>@yield('title')</h4>
             </div>

                @if(session('fail'))
                 <div class="col-lg-12">
                  <div class="alert alert-danger">
                      {{ session('fail') }}
                  </div>
                </div>
                @endif

                @if(session('success'))
                 <div class="col-lg-12">
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                </div>
                @endif

              <!-- @if(session('success'))
                <script>
                    Swal.fire({
                        title: 'Success',
                        text: 'it working fine',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                </script>
              @endif -->


             <div class="row">
                 <div class="col-xl-6 col-lg-6 col-md-12">

                  <input type="hidden" name="patientId" value="{{ isset($report) && $report->user_id ? $report->user_id : '' }}">
                  <input type="hidden" name="visitId" value="{{ isset($report) && $report->user_visit_id ? $report->user_visit_id : '' }}">

                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                              <label for="pulserate" class="form-label fw-bold">{{__('apilang.label_pulse_rate')}}</label> 
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                         <input type="text" class="form-control" id="pulserate" name="pulse_rate" value="{{isset($report) && $report->pulse ? $report->pulse : '' }}" maxlength="5">
                        </div>

                          @error('pulse_rate')
                            <div class="error-message">{{ $message }}</div>
                          @enderror
                    </div>


                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                          <label for="exampleInputEmail1" class="form-label fw-bold">{{__('apilang.label_blood_pressure') }}</label> 
                      </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                       <input type="text" class="form-control" id="bloodPreser" name="bp_up" value="{{isset($report) && $report->bp_up ? $report->bp_up : '' }}">
                      </div>

                        @error('weight')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_diastolic_pressure')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                       <input type="text" class="form-control" id="diastolicPressure" name="diastolic_pressure" value="{{isset($report) && $report->diastolic_pressure ? $report->diastolic_pressure : '' }}" maxlength="3">
                      </div>

                        @error('diastolic_pressure')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                              <label for="exampleInputEmail1" class="form-label fw-bold">{{__('apilang.label_respiratory_rate') }}</label> 
                        </div>
                       <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                         <input type="text" class="form-control" id="respiratory" name="respiratory_rate" value="{{isset($report) && $report->respiratory_rate ? $report->respiratory_rate : '' }}">
                        </div>

                          @error('respiratory_rate')
                            <div class="error-message">{{ $message }}</div>
                          @enderror
                    </div>


                    <div class="row">
                     <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="label_bhramari_time" class="form-label fw-bold">{{__('apilang.label_bhramari_time')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="label_bhramari_time" name="bhramari_time" value="{{isset($report) && $report->bhramari_time ? $report->bhramari_time : '' }}" maxlength="20">
                      </div>
                        @error('bhramari_time')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>



                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-12">


                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_weight') }}</label> 
                       </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                        <input type="text" class="form-control" id="weight" name="weight" value="{{isset($report) && $report->weight ? $report->weight : '' }}">
                       </div>

                      @error('weight')
                        <div class="error-message">{{ $message }}</div>
                      @enderror
                    </div>

                  <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_height') }}</label> 
                      </div>
                     <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="height" name="height" value="{{isset($report) && $report->height ? $report->height : '' }}" >
                      </div>

                        @error('height')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                  </div>


                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_bmi')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="bplow" name="bmi" value="{{isset($report) && $report->bmi ? $report->bmi : '' }}" maxlength="10">
                      </div>

                        @error('bmi')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>



                      <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_medications')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="medications" name="medications" value="{{isset($report) && $report->medications ? $report->medications : '' }}" maxlength="30">
                      </div>

                        @error('medications')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="remarks" class="form-label fw-bold">{{__('apilang.label_remarks')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="remarks" name="remarks" value="{{isset($report) && $report->remarks ? $report->remarks : '' }}" maxlength="225">
                      </div>
                        @error('remarks')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>




                    <div class="row">

                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="remarks" class="form-label fw-bold">{{__('apilang.date') }}</label> 
                      </div>
                     <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input class="form-control me-1" type="date" name="date" value="{{isset($report) && $report->date ? $report->date : '' }}">
                      </div>
                        @error('date')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>


                 </div>

                 <div class="add-btn mt-3 d-flex justify-content-end">
                  <button class="add-button" type="submit"><a class="text-white">{{__('apilang.update')}}</a></button>
                  
                </div>

             </div>
         </div>
        </div>
    </section>

  <!-- search-table-data -->


</form>

</main>

@endsection
