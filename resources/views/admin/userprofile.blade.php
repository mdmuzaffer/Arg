@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title', __('apilang.patient'))
@section('subtitle', __('apilang.profile_label')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle ms-5">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active"><a href="{{route('userDepartmentPending')}}">@yield('title')</a></li>
          <li class="breadcrumb-item active">@yield('subtitle')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row d-flex justify-content-center">
        <div class="col-xl-3 col-md-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{URL::asset(isset($user->userDetails->profile_photo) && !empty($user->userDetails->profile_photo) ? $user->userDetails->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
              <h2>@if(!empty($user->name)){{$user->name}}@endif</h2>
              <h3>@if(!empty($user->email)){{$user->email}}@endif</h3>
            </div>
          </div>

          @if($user->status == 1 && $user->sectionMaping->status ==1)
          <div class="card">
            <div class="card-body pt-4 d-flex justify-content-center  align-items-center">
                <span style="border:1px solid #337abe;" type="button" class=" w-50 btn  btn-outline-primary btn-sm  p-1 me-2"> <a class="ms-1"  href="{{route('userSchedule',$user['id'])}}" >{{__('apilang.schedule') }}</a></span>

                <span style="border:1px solid #337abe;" type="button" class=" w-50 btn  btn-outline-primary btn-sm  p-1 me-2"><a class="ms-1" href="{{route('patientDailyReport',$user['id'])}}" >{{__('apilang.daily_report') }}</a></span>


            </div>
            <div class="card-body  d-flex justify-content-center align-items-center">
            <span style="border:1px solid #337abe;" type="button" class="w-50 btn btn-sm btn-outline-primary me-2"><a class="ms-1" href="{{route('patientallTherapy',$user['id'])}}" >{{__('apilang.all_therapy') }}</a></span>
            <span style="border:1px solid #337abe;" type="button" class="w-50 btn  btn-outline-primary btn-sm  p-1"><a class="ms-1" href="{{route('patientCaseDetails',$user['id'])}}" >{{__('apilang.case_details') }}</a></span>

           </div>
          </div>
           @endif


           @if($user->status == 1)
              @if(!$user->prescription->isEmpty())
                <div class="card">
                  <div class="card-body pt-4 d-flex justify-content-center  align-items-center">
                    <div class="row">
                        @foreach($user->prescription as $key=>$prescription)
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 mb-3">
                            <span><a href="/{{ $prescription->treatment_pdf}}">{{__('apilang.view_pricption') }} {{$key+1}}</a></span>
                          </div>
                        @endforeach

                    </div>
                  </div>
                </div>
              @endif
            @endif

        </div>

        <div class="col-xl-9 col-md-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">{{__('apilang.overview') }}</button>
                </li>

                  <!-- @if(session('message'))
                   <div class="col-lg-6 d-flex justify-content-end">
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                  </div>
                  @endif -->


                  @if(session('message'))
                    <script>
                        Swal.fire({
                            title: 'error',
                            text: '{{ session('message') }}',
                            icon: 'error',
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        })
                    </script>
                  @endif


                  @if(session('success'))
                   <div class="col-lg-6 d-flex justify-content-end">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                  </div>
                  @endif
                

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane show active profile-overview" id="profile-overview">
                  <h5 class="card-title">{{__('apilang.profile_details') }}</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label ">{{__('apilang.label_full_name') }}</div>
                    <div class="col-lg-3 col-md-3">@if(!empty($user->name)){{$user->name}}@endif</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_email') }}</div>
                    <div class="col-lg-3 col-md-3">@if(!empty($user->email)){{$user->email}}@endif</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_mobile') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->mobile_no) && !empty($user->mobile_no ) ? $user->mobile_no : "No" }}</div>
                    
                    <!-- <div class="col-lg-3 col-md-3 label">Status</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->is_active) && $user->is_active ==1  ? "Active" : "In Active" }}</div> -->
                    
                  </div>
                  

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.is_active') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->is_active) && $user->status ==1  ? "Yes" : "No" }}</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.profile_complete') }} </div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->profile_complete) && $user->profile_complete ==1  ? "Yes" : "No" }}</div>
                  </div><hr>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.first_name') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->full_name) && !empty($user->userDetails->full_name) ? $user->userDetails->full_name : 'No' }}</div>


                     <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_whats_no') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->whats_no) && !empty($user->userDetails->whats_no) ? $user->userDetails->whats_no : 'No' }}</div>


                  </div>


                   <!--  <form method="post" action="{{route('userSectionUpdate',$user->id)}}">
                    @csrf
                      <input type="hidden" name="userId" value="{{$user->id}}">

                      <div class="row">
                          <div class="col-lg-3 col-md-4 label d-flex align-items-center">{{ __('apilang.section') }}</div>
                          <div class="col-lg-3 col-md-4 d-flex align-items-center">
                              <div class="lvl-name">
                                {{ isset($user->sections[0]->name) && !empty($user->sections[0]->name) ? $user->sections[0]->name : 'No' }}
                              </div>
                          </div>

                          <div class="col-lg-4 col-md-4  d-flex justify-content-end">
                              <select style="width:74%;" class="form-select p-2 rounded" aria-label="Default select example" name="section_type">
                                @foreach($sections as $section)
                                  <option value="{{$section->id}}" @if(isset($user->sections[0]->id) && $user->sections[0]->id == $section->id) selected @endif>{{$section->name}}</option>
                                 @endforeach
                              </select>
                          </div>
                          <div class="col-lg-2 col-md-8">
                              <div class="department-btn">
                                  <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                              </div>
                          </div>

                      </div>
                    </form>  -->

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_age') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->age) && !empty($user->userDetails->age) ? $user->userDetails->age : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_pincode') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->pincode) && !empty($user->userDetails->pincode) ? $user->userDetails->pincode : 'No' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_gender') }} </div>
                    <div class="col-lg-3 col-md-3">{{ (isset($user->userDetails->gender) && $user->userDetails->gender == 1) ? "Male" : ((isset($user->userDetails->gender) && $user->userDetails->gender == 2) ? "Female" : "Other") }}
                    </div>
                   
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_address1') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->address) && !empty($user->userDetails->address) ? $user->userDetails->address : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_state') }} </div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->state) && !empty($user->userDetails->state) ? $user->userDetails->state : 'No' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_language1') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->language->name) && !empty($user->userDetails->language->name) ? $user->userDetails->language->name : 'No' }}</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.label_accommodation') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->userDetails->accommodation->name) && !empty($user->userDetails->accommodation->name) ? $user->userDetails->accommodation->name : 'No' }}</div>
                 </div>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.section_status') }}</div>
                    <div class="col-lg-3 col-md-3">{{ (isset($user->sectionMaping->status) && $user->sectionMaping->status == 1) ? "Approve" : ((isset($user->sectionMaping->status) && $user->sectionMaping->status == 0) ? "Pending" : "Decline") }}</div>
                    <div class="col-lg-3 col-md-3 label">{{ __('apilang.active_date') }}</div>
                    <div class="col-lg-3 col-md-3">{{ isset($user->sectionMaping->section_active_date) && !empty($user->sectionMaping->section_active_date) ? $user->sectionMaping->section_active_date : 'No' }}</div>
                  </div>
                  
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>


@endsection
