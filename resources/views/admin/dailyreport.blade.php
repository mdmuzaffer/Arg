
@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title', __('apilang.daily_report')) 
@section('content')

      <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label')}}</a></li>
          <li class="breadcrumb-item"><a href="{{route('userProfile', $patient->id)}}">{{__('apilang.patient')}}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div>

  <form method="post" action="{{route('patientDailyReport')}}" id="dailyReport">
    @csrf
    <section id="daily-report" class="daily-report">
      <div class="daily-reports-section">
         <div class="container">
             <div class="reports-heading mb-4">
                 <h4 class="fw-bolder">@yield('title')</h4>
             </div>

                @if(session('fail'))
                 <div class="col-lg-6">
                  <div class="alert alert-danger">
                      {{ session('fail') }}
                  </div>
                </div>
                @endif

              @if(session('success'))
                <script>
                    Swal.fire({
                        title: 'Success',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                </script>
              @endif

             <div class="row">
                 <div class="col-xl-5 col-lg-5 col-md-12">

                  <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                            <label for="pulserate" class="form-label fw-bold">{{__('apilang.label_pulse_rate')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                       <input type="text" class="form-control" id="pulserate" name="pulse_rate" value="{{ old('pulse_rate') }}" maxlength="6">
                      </div>

                        @error('pulse_rate')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                  </div>

                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                          <label for="bloodPresser" class="form-label fw-bold">{{__('apilang.label_blood_pressure')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="bloodPresser" name="bp_up" value="{{ old('bp_up') }}" maxlength="6">
                      </div>

                        @error('weight')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_diastolic_pressure')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="diastolicPressure" name="diastolic_pressure" value="{{ old('diastolic_pressure') }}" maxlength="6">
                      </div>

                        @error('diastolic_pressure')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>


                      <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                              <label for="respiratory" class="form-label fw-bold">{{__('apilang.label_respiratory_rate')}}</label> 
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                         <input type="text" class="form-control" id="respiratory" name="respiratory_rate" value="{{ old('respiratory_rate') }}" maxlength="6">
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
                       <input type="text" class="form-control" id="label_bhramari_time" name="bhramari_time" value="{{ old('bhramari_time') }}" maxlength="20">
                      </div>
                        @error('bhramari_time')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>


                 </div>
                 <div class="col-xl-5 col-lg-5 col-md-12">


                    <div class="row">
                       <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                             <label for="weight" class="form-label fw-bold">{{__('apilang.label_weight')}}</label> 
                       </div>
                       <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                        <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" maxlength="5" >
                       </div>
                       <input type="hidden" name="patientId" value="{{ $patient->id }}">

                      @error('weight')
                        <div class="error-message">{{ $message }}</div>
                      @enderror

                   </div>

                  <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="height" class="form-label fw-bold">{{__('apilang.label_height')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="height" name="height" value="{{ old('height') }}" maxlength="5">
                      </div>

                        @error('height')
                          <div class="error-message">{{ $message }}</div>
                        @enderror

                  </div>

                   <!--  <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_blood_low')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="bplow" name="bp_down" value="{{ old('bp_down') }}" maxlength="3">
                      </div>
                        @error('bp_low')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div> -->



                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.label_bmi')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                       <input type="text" class="form-control" id="bplow" name="bmi" value="{{ old('bmi') }}" maxlength="10">
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
                       <input type="text" class="form-control" id="medications" name="medications" value="{{ old('medications') }}" maxlength="30">
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
                       <input type="text" class="form-control" id="remarks" name="remarks" value="{{ old('remarks') }}" maxlength="225">
                      </div>
                        @error('remarks')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <label for="bplow" class="form-label fw-bold">{{__('apilang.date')}}</label> 
                      </div>
                      <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                        <input class="form-control me-1" type="date" name="date" >
                      </div>
                      @error('date')
                        <div class="error-message">{{ $message }}</div>
                      @enderror
                    </div>


                 </div>

                 <div class="add-btn mt-3 d-flex justify-content-end">
                  <button class="add-button" type="submit"><a class="text-white fw-bold">{{__('apilang.add_daily_report')}}</a></button>
              </div>              


             </div>
         </div>
        </div>
    </section>

  <!-- search-table-data -->

</form>


  <!-- daily-reports-table -->
  <section id="table-sec" class="table-sec">
    <div class="row mt-5">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="bottom-table table-responsive-md table-responsive-sm">
          <table class="table daily-report">
            <thead class="bg-ch">
              <tr>
                <th class="text-white" scope="col">{{__('apilang.sr_no') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_weight') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_height') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_blood_pressure') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_diastolic_pressure') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_pulse_rate') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_bmi') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_medications') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_respiratory_rate') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_bhramari_time') }}</th>
                <th class="text-white" scope="col">{{__('apilang.label_remarks') }}</th>
                <th class="text-white" scope="col">{{__('apilang.date') }}</th>
                <th class="text-white" scope="col">{{__('apilang.action') }}</th>
              </tr>
            </thead>
            <tbody>

              @foreach($dailyReports as $key=>$report)
              <tr>
                <th scope="row">{{ $key+1}}</th>
                <td>{{$report->weight}}</td>
                <td>{{$report->height}}</td>
                <td>{{$report->bp_up}}</td>
                <td>{{$report->diastolic_pressure}}</td>
                <td>{{$report->pulse}}</td>
                <td>{{$report->bmi}}</td>
                <td>{{$report->medications}}</td>
                <td>{{$report->respiratory_rate}}</td>
                <td>{{$report->bhramari_time}}</td>
                <td>{{$report->remarks}}</td>
                <td>{{$report->date}}</td>

                <td>
                  <span class="badge text-bg-danger bg-danger py-2 text-white" onclick="deleteConfirmation('{{route("patientDailyreportDelete", $report->id)}}')">{{__('apilang.delete') }}</span>

                  <span class="badge text-bg-info btn-warning py-2"><a class="text-white" href="{{route('patientDailyreportUpdate', $report->id)}}">{{__('apilang.update') }}</a></span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

</main>

@endsection
