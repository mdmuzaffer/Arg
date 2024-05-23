@extends('layouts.master')
@section('title', __('apilang.intern')) 
@section('sub_title', __('apilang.add'))
@section('content')

    <main id="main" class="main">
    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{  __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active"><a href="{{route('interns')}}">@yield('title')</a></li>
          <li class="breadcrumb-item active">@yield('sub_title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">@yield('title')</h5>

                  <!-- @if(session('message'))
                   <div class="col-lg-6 d-flex justify-content-end">
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                  </div>
                  @endif


                  @if(session('success'))
                   <div class="col-lg-6 d-flex justify-content-end">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                  </div>
                  @endif -->

                  @if(session('success'))
                    <script>
                        Swal.fire({
                            title: 'Success',
                            text: 'Added intern',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        })
                    </script>
                  @endif

              <!-- Table with stripped rows -->
                  <div class="card-body">
                   
                      <form method="post" action="{{route('addInterns')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                         <div class="col-xl-5 col-lg-5 col-md-12">
                             <div class="row">
                                 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                      <label for="name" class="form-label fw-bold">{{  __('apilang.first_name') }}</label> 
                                 </div>
                                 <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="First name">
                                @error('name')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                                </div>
                             </div>

                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                  <label for="email" class="form-label fw-bold">{{  __('apilang.label_email') }}</label> 
                              </div>
                              <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                               <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <label for="mobile" class="form-label fw-bold">{{  __('apilang.label_mobile') }}</label> 
                              </div>
                              <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                               <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile">
                             
                                @error('mobile')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                                 </div>
                            </div>

                            <div class="row mt-4">
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <label for="checkbox" class="form-label fw-bold">{{  __('apilang.status') }}</label> 
                              </div>
                              <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                               <input class="form-check-input" type="checkbox" name="status">
                              </div>
                            </div>
                         </div>

                         <div class="col-xl-5 col-lg-5 col-md-12">
                          <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <label for="lastname" class="form-label fw-bold">{{ __('apilang.last_name') }}</label> 
                              </div>
                              <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                               <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Last name">
                             
                                @error('lastname')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                                </div>

                          </div>

                          <div class="row">
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <label for="section" class="form-label fw-bold">{{ __('apilang.section') }}</label> 
                              </div>
                              <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">

                               <select class="form-select p-2 rounded" name="intern_section[]">
                                  @foreach($sections as $section)
                                  <option value="{{$section->id}}">{{$section->name}}</option>
                                  @endforeach
                                </select>

                              </div>

                                @error('section')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                          </div>

                            <div class="row">

                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <label for="bplow" class="form-label fw-bold">{{ __('apilang.file_upload') }}</label> 
                              </div>
                              <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                               <input class="form-control push-img text-white" type="file" name="image" id="image" onchange="preview()">
                              
                                @error('bp_low')
                                  <div class="error-message">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                         </div>

                         <div class="add-btn mt-3 d-flex justify-content-start">
                          <button class="add-button" type="submit"><a class="text-white fw-bold">{{ __('apilang.add') }}</a></button>
                      </div>

                     </div>

                    </form>

                </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
@endsection
