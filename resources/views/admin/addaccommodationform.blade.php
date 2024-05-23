@extends('layouts.master')
@section('title', __('apilang.label_accommodation'))
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active"><a href="{{route('accommodation')}}">@yield('title')</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">


                    <h5 class="card-title">{{ __('apilang.add_accommodation') }}</h5>

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

                    <!-- General Form Elements -->

                    @php

                      $id = isset($accommodations) && $accommodations->id ? $accommodations->id : '';

                    @endphp
                    <form method="post" action="{{ route('addAccommodation', $id) }}">

                      @csrf
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">{{ __('apilang.name_formlabel') }}</label>
                        <div class="col-sm-8">
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', isset($accommodations) && $accommodations->name ?  $accommodations->name :'' )}}">
                       
                          @error('name')
                          <div class="error-message">{{ $message }}</div>
                          @enderror

                         </div>
                        
                      </div>

                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-3 col-form-label">{{ __('apilang.description') }}</label>
                          <div class="col-sm-8">

                            <input type="text" name="description" class="form-control" placeholder="Description" value="{{ old('name', isset($accommodations) && $accommodations->description ?  $accommodations->description :'' )}}">

                            @error('description')
                              <div class="error-message">{{ $message }}</div>
                            @enderror
                          
                          </div>
                      </div>

                      <div class="row mb-3">
                         <label for="inputNumber" class="col-sm-2 col-form-label">{{ __('apilang.status') }}</label>
                          <div class="col-sm-10">
                            <input type="checkbox" name="status" {{ isset($accommodations) && $accommodations->status =='1' ? 'checked':''}}>
                          </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
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
