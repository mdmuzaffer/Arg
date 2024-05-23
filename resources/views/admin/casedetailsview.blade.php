@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title','Case details') 
@section('content')

    <main id="main" class="main">




    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('patientCaseDetails', $caseDetails[0]->user_id)}}">Patient</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div>

        <section id="case-details" class="case-details">
            <div class="case-details-section">

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


                @if(session('success'))
                <script>
                    Swal.fire({
                        title: 'Success',
                        text: 'it working fine',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    })
                </script>
                @endif

                <div class="container">
                    <div class="case-details-heading mb-4">
                        <h4>Case View</h4>
                    </div>


                    @foreach($caseDetails as $key=>$case)
                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ $patient->id }}">
                        <div class="col-xl-10 col-lg-10 col-md-12">
                            <div class="text-area">
                                  <div class="mb-3 d-flex align-items-center">
                                    <h5 class="me-2">IP No</h5>
                                    <p class="mt-2">{{$case->ipsection_id}}</p>
                                  </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ $patient->id }}">
                        <div class="col-xl-10 col-lg-10 col-md-12 mb-3 border p-2">
                            <div class="text-area">
                                  <div class="mb-3">
                                    <h5>Chief Complain</h5>
                                    <p>{{$case->chief_complaints}}</p>
                                  </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ $patient->id }}">
                        <div class="col-xl-10 col-lg-10 col-md-12 mb-3 border p-2">
                            <div class="text-area">
                                  <div class="mb-3">
                                    <h5>Medical History</h5>
                                    <p>{{ $case->medical_history }}</p>
                                  </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ $patient->id }}">
                        <div class="col-xl-10 col-lg-10 col-md-12 mb-3 border p-2">
                            <div class="text-area">
                                  <div class="mb-3">
                                    <h5>Final Diagnosis</h5>
                                    <p>{{ $case->final_diagnosis }}</p>
                                  </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ $patient->id }}">
                        <div class="col-xl-10 col-lg-10 col-md-12 mb-3 border p-2">
                            <div class="text-area">
                                  <div class="mb-3 d-flex">
                                    <h5 class="me-2">Patient -</h5>
                                    <p>{{ $case->user_name}}</p>
                                  </div>


                                  <div class="text-area">
                                  <div class="mb-3 d-flex">
                                    <h5 class="me-2">Doctor -</h5>
                                    <p>{{ $case->doctor_name}}</p>
                                  </div>


                                    <div class="mb-7 d-flex">
                                        <h5 class="me-2">Date -</h5>
                                        <p>{{ $case->date}} </p>
                                  </div>
                                  
                           </div>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                      <input type="hidden" name="patientId" value="{{ $patient->id }}">
                        <div class="col-xl-10 col-lg-10 col-md-12">
                            
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </section>

    </main>
@endsection
