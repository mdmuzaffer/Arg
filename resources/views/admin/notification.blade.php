@extends('layouts.master')
@section('title', __('apilang.notifications')) 
@section('content')


    <main id="main" class="main">
      <div class="pagetitle">
        <h1>@yield('title')</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label') }}</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </nav>
      </div>

    <section id="push-notification-section" class="push-notification-section">
      <div class="container">

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

          <form method="post" action="{{route('sendnotification')}}" enctype="multipart/form-data">
          @csrf
           <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 shadow p-3 mb-5 bg-body rounded">
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="row mb-4">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex align-items-center">
                <div class="input-heads mr-2">
                  <span class="fw-bold mr-2">{{__('apilang.type')}}:</span>
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="multi-input d-flex align-items-center">
                  <select class="form-select p-2 rounded" aria-label="Default select example" name="notification_type">

                    <!-- <option selected value="">Reminder/Offers/Event</option> -->
                    @foreach($notificationTitle as $key=>$notification)
                    <option value="{{$notification->notification_type}}">{{$notification->notification_title}}</option>
                    @endforeach

                  </select>
                </div>
              </div>
            </div>



            <div class="row mb-4 ">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex align-items-center">
                <div class="input-heads mr-2">
                  <span class="fw-bold mr-2">{{__('apilang.section')}}</span>
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="multi-input d-flex align-items-center">
                  <select class="form-select p-2 rounded" aria-label="Default select example" name=
                  "notification_section[]" multiple>
                    <option selected value="">Select</option>
                    @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>


            <div class="row mb-4">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex align-items-center">
                <div class="input-heads mr-2">
                  <span class="fw-bold mr-2">{{__('apilang.assigned_to')}}:</span>
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="multi-input d-flex align-items-center">
                  <select class="form-select p-2 rounded" aria-label="Default select example" name="notification_assigned[]" multiple>
                    <option selected value="">Select</option>
                    <option value="2">Doctors</option>
                    <option value="3">Interns</option>
                    <option value="4">Participant</option>
                  </select>
                </div>
              </div>
            </div>



            <div class="row mb-4">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex align-items-center">
                <div class="input-heads mr-2">
                  <span class="fw-bold mr-2">{{__('apilang.patient')}}:</span>
                </div>
              </div>
              <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="multi-input d-flex align-items-center">

                    <select class="form-control selectpicker" data-live-search="true" name="users[]" id="users" multiple>
                        <option value="" >Select</option>
                        @if($users)
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
              </div>
            </div>       

            <div class="row mb-4">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-flex align-items-center img-up">
                <div class="input-heads mr-2">
                  <span class="fw-bold mr-2">{{__('apilang.label_image')}}</span>
                </div>
              </div>
              <div class=" col-xl-8 col-lg-8 col-md-12 col-sm-12 img-down">
                <div class="mb-5">
                  <input class="form-control push-img text-white" type="file" id="formFile" name="image" onchange="preview()">
                  <!-- <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button> -->
                </div>
                <img id="frame" src="" class="img-fluid" />
              </div>
            </div>
            <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
              <div class="input-heads mr-2">
                <span class="fw-bold mr-2">{{__('apilang.description')}}:</span>
              </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4">
              <div class="multi-input d-flex align-items-center">
                <textarea class="form-control" aria-label="With textarea" name="notification_description">{{old('notification_description')}}</textarea>
              </div>

                @error('notification_description')
                  <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
          </div>
          </div>
          
          <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 p-0">
              <div class="input-heads mr-2">
                
                <div class="">
                      <button type="submit" class="bg text-white p-2 rounded">Send Notification</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="row dp-top">

            </div>
            
          </div>
          
          
          
            </div>


        </div> 
           
        </form>    
      </div>
    </section>
  </main>

@endsection
