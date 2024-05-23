@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title',  __('apilang.case_title')) 
@section('content')

    <main id="main" class="main">


    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{  __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item"><a href="{{route('userProfile', $patient->id)}}">{{  __('apilang.patient') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div>
        

        @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: 'Added case details',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            })
        </script>
        @endif
            <section id="case-details" class="case-details">

            <form method="post" action="{{route('patientCaseDetails')}}" id="CaseDetails">
            @csrf
            <div class="case-details-section">

                <div class="container">
                    <div class="case-details-heading mb-4">
                        <h4>{{  __('apilang.case_title') }}</h4>
                    </div>
                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ $patient->id }}">
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="text-area">
                                  <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{__('apilang.ip_no') }}</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="ip_no" rows="3" required>{{ old('ip_no')}}</textarea>
                                  </div>
                                @error('ip_no')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="text-area">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{__('apilang.chief_complain') }}</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" name="chef_complain" rows="3" required>{{ old('chef_complain') }}</textarea>
                                </div>

                                @error('chef_complain')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="text-area">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{__('apilang.medical_history') }}</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea3" name="medical_history" rows="3" required>{{ old('medical_history') }}</textarea>
                                </div>

                                @error('medical_history')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="text-area">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{__('apilang.Illness_history') }}</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea4" name="Illness_history" rows="3" required>{{ old('Illness_history') }}</textarea>
                                </div>

                                @error('Illness_history')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="text-area">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">{{__('apilang.final_diagnosis') }}</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="fined_diagnois" rows="3" required>{{ old('fined_diagnois') }}</textarea>
                                </div>

                                @error('fined_diagnois')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <button class="add-button" type="submit"><a class="text-white">{{__('apilang.add_case_details') }}</a></button>
                </div>
            </div>
          </form>
          <br>
        </section>


        <!-- case details -->
        <section>
           
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="bottom-table table-responsive-md table-responsive-sm">
                  <table class="table">
                    <thead class="bg-ch">
                      <tr>
                        <th class="text-white" scope="col">{{__('apilang.id') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.ip_no') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.chief_complain') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.medical_history') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.final_diagnosis') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.patient') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.Illness_history') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.date') }}</th>
                        <th class="text-white" scope="col">{{__('apilang.action') }}</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($caseDetails as $key=>$case)
                      <tr>
                        <th scope="row">{{ $key+1}}</th>
                        <td>{{$case->ipsection_id}}</td>
                        <!-- <td>{{$case->chief_complaints}}</td> -->
                         <td>{{ Str::limit($case->chief_complaints, $limit = 20, $end = '...') }} </td>
                        <td>{{ Str::limit($case->medical_history, $limit = 20, $end = '...') }}</td>
                        <td>{{ Str::limit($case->final_diagnosis, $limit = 20, $end = '...') }}</td>
                        <td>{{ $case->user_name}}</td>
                        <td>{{ Str::limit($case->history_present_illness?? '' , $limit = 20, $end = '...') }}</td>
                        <td>{{ $case->date}}</td>
                        <td>
                        
                        <span class="badge text-bg-warning py-2"><a class="text-white" href="{{route('patientCasedetailView', $case->id)}}">view</a></span>
                        <span class="badge text-bg-danger bg-danger py-2 text-white" onclick="deleteConfirmation('{{route("patientCasedetailDelete", $case->id)}}')">Delete</span>

                        <!-- <span class="badge text-bg-info btn-warning py-2"><a class="text-white" href="{{route('patientCasedetailUpdate', $case->id)}}">Update</a></span> -->

                        <span class="badge text-bg-info btn-warning py-2" title="Can't update"><a class="text-white" href="javascript::void()">Update</a></span>

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            
        </section>


    </main>
@endsection
