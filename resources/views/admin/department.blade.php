@extends('layouts.master')
@section('title','Departments') 
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
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">@yield('title') </h5>

              <div class="d-flex justify-content-end mb-3">
                <a href="{{route('addDepartment')}}" class="bg text-white p-2 rounded">Add Department</a>
              </div>


                    @if(session('fail'))
                       <div class="col-lg-6">
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                      </div>
                      @endif

                      <!-- @if(session('success'))
                       <div class="col-lg-6">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                      </div>
                      @endif -->


                  @if(session('success'))
                    <script>
                        Swal.fire({
                            title: 'Success',
                            text: 'it working fine',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        })
                    </script>
                  @endif


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($departments as $key=>$department)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$department->name}}</td>
                    <td>{{ $department->status ==0 ? "Inactive":"Active" }}</td>
                    <td>{{ date('j F, Y', strtotime($department->created_at)) }}</td>

                   <td>

                      <span class="badge text-bg-danger bg-danger py-2 text-white" onclick="deleteConfirmation('{{ route("deleteDepartment", $department->id)}}')">Delete</span>
                      
                      <span class="badge text-bg-info btn-warning py-2"><a class="text-white" href="{{route('addDepartment',$department->id)}}">Update</a></span>


                    </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


  </main>
@endsection
