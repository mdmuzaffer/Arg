@extends('layouts.master')
@section('title',  __('apilang.slider')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">


                    <h5 class="card-title">{{ __('apilang.add_slider') }}</h5>

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
                    <form method="post" action="{{route('addSlider')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{ __('apilang.titles') }}</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" placeholder="Add title" value="{{old('title')}}">
                        @error('title')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                         </div>
                        
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">{{ __('apilang.description') }}</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" placeholder="Slider description" id="floatingTextarea" style="height: 100px;">{{old('description')}}</textarea>

                          @error('description')
                          <div class="error-message">{{ $message }}</div>
                          @enderror
                          </div>

                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">{{ __('apilang.file_upload') }}</label>
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
                            <input type="checkbox" name="status">
                          </div>
                      </div>


                      <div class="row mb-3">
                         <label for="inputNumber" class="col-sm-2 col-form-label">{{ __('apilang.slider_position') }}</label>
                          <div class="col-sm-4">
                             <select class="form-select" aria-label="Default select example" name="slider_type">
                                <option value="0">Slider position</option>
                                <option value="1" {{ isset($slider) && $slider->slider_type ===1 ? 'selected':''}} >One</option>
                                <option value="2" {{ isset($slider) && $slider->slider_type ===2 ? 'selected':''}} >Two</option>
                                <option value="3" {{ isset($slider) && $slider->slider_type ===3 ? 'selected':''}} >Three</option>
                                <option value="4" {{ isset($slider) && $slider->slider_type ===4 ? 'selected':''}} >Four</option>
                                <option value="5" {{ isset($slider) && $slider->slider_type ===5 ? 'selected':''}} >Five</option>
                              </select>
                          </div>
                      </div>



                      <div class="row mb-3">
                         <label for="inputNumber" class="col-sm-2 col-form-label">{{ __('apilang.label_language1') }}</label>
                          <div class="col-sm-4">
                             <select class="form-select" aria-label="Default select example" name="slider_language">

                                @foreach($language as $lang)
                                <option value="{{ $lang->shortname }}" {{ session()->get('locale') == $lang->shortname ? 'selected' : '' }}>{{ $lang->name }}</option>
                                @endforeach
                               
                              </select>
                          </div>
                      </div>





                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">{{ __('apilang.add_slider') }}</button>
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
