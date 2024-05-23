@extends('layouts.master')
@section('title','Sections') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{__('apilang.section') }}</h1>
      <nav class="d-flex justify-content-between">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/dashboard">{{__('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">{{__('apilang.section') }}</li>
        </ol>
        <div class="d-flex justify-content-end mb-3 same-cstm1">
         <a href="{{route('addSection')}}" class="bg text-white p-2 rounded">{{__('apilang.add_section') }}</a>
       </div>
      </nav>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">


                <!--@if(session('fail'))
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
                  @endif -->


                  @if(session('success'))
                    <script>
                        Swal.fire({
                            title: 'Success',
                            text: '{{ session('success') }}',
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
                    <th scope="col">{{__('apilang.id') }}</th>
                    <th scope="col">{{__('apilang.name_formlabel') }}</th>
                    <th scope="col">{{__('apilang.status') }}</th>
                    <!-- <th scope="col">{{__('apilang.date') }}</th> -->
                    <th scope="col">{{__('apilang.action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sections as $key=>$section)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$section->name}}</td>
                    <td>{{ $section->status ==0 ? "Inactive":"Active" }}</td>
                    <!-- <td>{{ date('j F, Y', strtotime($section->created_at)) }}</td> -->

                    <td>
                      <span class="badge text-bg-danger bg-danger py-2 text-white" onclick="deleteConfirmation('{{ route("deleteSection", $section->id)}}')">Delete</span>
                        
                      <span class="badge bg btn-warning py-2"><a class="text-white" href="{{route('addSection',$section->id)}}">{{__('apilang.update') }}</a></span>
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
