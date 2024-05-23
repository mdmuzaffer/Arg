@extends('layouts.master')
@section('title','Slider') 
@section('sub_title','View') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
           <li class="breadcrumb-item"><a href="{{route('homeslider')}}">@yield('title')</a></li>
          <li class="breadcrumb-item active">@yield('sub_title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">

                    <!-- General Form Elements -->
             <br>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <p>{{$slider->title}}</p>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <p>{{$slider->description}}</p>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <img src="/{{$slider->images}}"/ width="200" height="100">
                        </div>

                      </div>

                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Language</label>
                        <div class="col-sm-10">
                          <p>{{$slider->language_code}}</p>
                        </div>
                      </div>


                  </div>

          </div>

        </div>
      </div>
    </section>
  </main>
@endsection
