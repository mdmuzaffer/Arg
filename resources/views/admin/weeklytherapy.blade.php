@extends('layouts.master')
@section('title', __('apilang.weekly_schedule')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav class="d-flex justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <!-- <div class="d-flex justify-content-between align-items-center mb-3 same-cstm">
            <a style="height:40px;" href="{{ route('addweeklyschedule') }}" class="bg text-white p-2 rounded">{{__('apilang.add_therapy') }}</a>
        </div> -->
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
              
              <!-- Table with stripped rows -->

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


                

              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">{{__('apilang.id')}}</th>
                    <th scope="col">{{__('apilang.name_formlabel')}}</th>
                    <th scope="col">{{__('apilang.status')}}</th>
                    <th scope="col">{{__('apilang.date')}}</th>
                    <th scope="col">{{__('apilang.action')}}</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($days as $key=>$day)

                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{ $day->day}}</td>
                    <td>{{ $day->status =='0' ? "Inactive":"Active" }}</td>
                    <td>{{ date('j F, Y', strtotime($day->created_at)) }}</td>
                    <td>

                    <!-- <span class="badge text-bg-danger bg-danger py-2 text-white" onclick="deleteConfirmation('{{ route("deleteTherapy", $day->id)}}')">{{__('apilang.delete') }}</span> -->

                    <span class="badge bg btn-warning py-2"><a class="text-white" href="{{route('daySchedule',$day->id)}}">{{__('apilang.schedule') }}</a></span>

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
