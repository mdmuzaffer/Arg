@extends('layouts.master')
@section('title', __('apilang.add_section')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item"><a href="{{route('sections')}}">{{ __('apilang.section') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">

                    <h5 class="card-title">Add Section</h5>

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
                    <form method="post" action="{{route('addSection',isset($section) && $section->id ?  $section->id :'' )}}" enctype="multipart/form-data">
                      @csrf
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{ __('apilang.name_formlabel') }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', isset($section) && $section->name ?  $section->name :'' )}}">
                          @error('name')
                            <div class="error-message">{{ $message }}</div>
                          @enderror

                        </div>
                        
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">{{ __('apilang.description') }}</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" placeholder="Section description" id="floatingTextarea" style="height: 100px;">{{ old('description', isset($section) && $section->description ?  $section->description :'' )}}</textarea>
                        </div>

                          @error('description')
                          <div class="error-message">{{ $message }}</div>
                        @enderror

                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">{{__('apilang.file_upload')}}</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="file" name="image" id="formFile">
                        </div>

                        @error('image')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                              <label for="checkbox" class="form-label fw-bold">{{__('apilang.status')}}</label> 
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
                         <input class="form-check-input" type="checkbox" name="status" {{ isset($section) && $section->status =='1' ? 'checked':''}}>
                        </div>
                      </div>


                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn bg text-white">{{__('apilang.add_section')}}</button>
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
