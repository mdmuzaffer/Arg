@extends('layouts.master')
@section('title', __('apilang.payment_details')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active"><a href="{{route('addPayment')}}">@yield('title')</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">


                    <h5 class="card-title">{{ __('apilang.payment_details') }}</h5>

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
                      $id = isset($payments) && $payments->id ? $payments->id : '';
                    @endphp

                    <!-- General Form Elements -->
                    <form method="post" action="{{route('addPayment', $id)}}" enctype="multipart/form-data">
                      @csrf

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{ __('apilang.payment_details') }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" placeholder="payment name" value="{{ old('name', isset($payments) && $payments->payment_detail_name ?  $payments->payment_detail_name :'' )}}">

                          @error('name')
                            <div class="error-message">{{ $message }}</div>
                          @enderror

                        </div>

                      </div>

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{ __('apilang.price') }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price', isset($payments) && $payments->price ?  $payments->price :'' )}}">
                        @error('price')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                         <label for="inputNumber" class="col-sm-2 col-form-label">{{ __('apilang.status') }}</label>
                          <div class="col-sm-10">
                            <input type="checkbox" name="status" {{ isset($payments) && $payments->status ==1 ? 'checked':''}}>
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
