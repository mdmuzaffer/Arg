@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title','Profile') 
@section('content')

    <main id="main" class="main">


    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('patientCaseDetails', $casedetail->user_id)}}">Patient</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div>
        <section id="case-details" class="case-details">

            <form method="post" action="{{route('patientCasedetailUpdate', $casedetail->id)}}" id="CaseDetails">
            @csrf


                @if(session('fail'))
                 <div class="col-lg-6">
                  <div class="alert alert-danger">
                      {{ session('fail') }}
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

            <div class="case-details-section">

                <div class="container">
                    <div class="case-details-heading mb-4">
                        <h4>Case Details</h4>
                    </div>
                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ isset($casedetail) && $casedetail->user_id ? $casedetail->user_id :''}}">
                      <input type="hidden" name="visitId" value="{{ isset($casedetail) && $casedetail->user_visit_id ? $casedetail->user_visit_id :''}}">
                      <input type="hidden" name="doctorId" value="{{ isset($casedetail) && $casedetail->doctor_id ? $casedetail->doctor_id :''}} ">
                      <input type="hidden" name="date" value="{{ isset($casedetail) && $casedetail->date ? $casedetail->date :''}} ">

                        <div class="col-xl-10 col-lg-10 col-md-12">
                            <div class="text-area">
                                  <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">IP No</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="ip_no" rows="3" required>{{ isset($casedetail) && $casedetail->ipsection_id ? $casedetail->ipsection_id :''}}</textarea>
                                  </div>
                                @error('ip_no')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-12">
                            <div class="text-area">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Chief Complain</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea2" name="chef_complain" rows="3" required>{{ isset($casedetail) && $casedetail->chief_complaints ? $casedetail->chief_complaints :''}}</textarea>
                                </div>

                                @error('chef_complain')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-12">
                            <div class="text-area">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Medical History</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea3" name="medical_history" rows="3" required>{{ isset($casedetail) && $casedetail->medical_history ? $casedetail->medical_history :''}}</textarea>
                                </div>

                                @error('medical_history')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-12">
                            <div class="text-area">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Final Diagnosis</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="fined_diagnois" rows="3" required>{{ isset($casedetail) && $casedetail->final_diagnosis ? $casedetail->final_diagnosis :''}}</textarea>
                                </div>

                                @error('fined_diagnois')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <button class="add-button" type="submit"><a class="text-white">Update</a></button>
                </div>
            </div>
          </form>
          <br>
        </section>

    </main>
@endsection
