@extends('layouts.master')
@section('title','Add Department') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">

                    <h5 class="card-title">Add Department</h5>

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
                    <form method="post" action="{{route('addDepartment',isset($department) && $department->id ?  $department->id :'' )}}" enctype="multipart/form-data">
                      @csrf
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ isset($department) && $department->name ?  $department->name :'' }}">
                        </div>

                        @error('name')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                        
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" placeholder="Slider description" id="floatingTextarea" style="height: 100px;">{{ isset($department) && $department->description ?  $department->description :'' }}</textarea>
                        </div>

                          @error('description')
                          <div class="error-message">{{ $message }}</div>
                        @enderror

                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="file" name="image" id="formFile">
                        </div>

                        @error('image')
                          <div class="error-message">{{ $message }}</div>
                        @enderror
                      </div>


                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Add Department</button>
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
