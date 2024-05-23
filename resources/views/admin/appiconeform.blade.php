@extends('layouts.master')
@section('title', __('apilang.app_icon')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item"><a href="{{route('appIcone')}}">@yield('title')</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">


                    <h5 class="card-title">{{ __('apilang.app_icon') }}</h5>

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

                    @php
                      $id = isset($appicones) && $appicones->id ? $appicones->id : '';
                    @endphp

                    <!-- General Form Elements -->
                    <form method="post" action="{{route('addAppicone', $id)}}" enctype="multipart/form-data">
                      @csrf

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{ __('apilang.app_type') }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="app_type" class="form-control" placeholder="App type" value="{{ old('app_type', isset($appicones) && $appicones->app_type ?  $appicones->app_type :'' )}}">
                          @error('app_type')
                            <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>

                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{ __('apilang.titles') }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="app_title" class="form-control" placeholder="App title" value="{{ old('app_title', isset($appicones) && $appicones->app_title ?  $appicones->app_title :'' )}}">
                          @error('app_title')
                            <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>

                      </div>

                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">{{ __('apilang.description') }}</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="app_description" placeholder="Description" id="floatingTextarea" style="height: 100px;">{{ old('app_description', isset($appicones) && $appicones->app_description ?  $appicones->app_description :'' )}}</textarea>

                          @error('app_description')
                            <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>

                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">{{ __('apilang.app_icon') }}</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="file" name="image" id="formFile">
                          @error('image')
                            <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>


                      <div class="row mb-3">
                       <label for="inputNumber" class="col-sm-2 col-form-label">{{ __('apilang.status') }}</label>
                        <div class="col-sm-10">
                          <input type="checkbox" name="status" {{ isset($appicones) && $appicones->status ===1 ? 'checked':''}}>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">{{ __('apilang.save') }}</button>
                        </div>
                      </div>

                    </form><!-- End General Form Elements -->

                  </div>

          </div>

        </div>
      </div>
    </section>


  </main>
@endsection
