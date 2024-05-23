@extends('layouts.master')
@section('title', __('apilang.payment')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav class="d-flex justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="d-flex justify-content-end mb-3 same-cstm">
            <a href="{{ route('addPayment') }}" class="bg text-white p-2 rounded">{{__('apilang.payment') }}</a>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

                
                  @if(session('fail'))
                   <div class="col-lg-6">
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                  </div>
                  @endif


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
                    <th scope="col">{{__('apilang.id')}}</th>
                    <th scope="col">{{__('apilang.payment_details')}}</th>
                    <th scope="col">{{__('apilang.price') }}</th>
                    <th scope="col">{{__('apilang.status') }}</th>
                    <th scope="col">{{__('apilang.date') }}</th>
                    <th scope="col">{{__('apilang.action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($payments as $key=>$payment)

                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$payment->payment_detail_name }}</td>
                    <td>{{$payment->price}}</td>
                    <td>{{ isset($payment->status) && $payment->status == 1 ? "Active" : "Inactive" }}</td>
                    <td>{{ date('j F, Y', strtotime($payment->created_at)) }}</td>
                    <td>


                     <span class="badge text-bg-danger bg-danger py-2 text-white" style="cursor: pointer;" onclick="deleteConfirmation('{{ route("deletePayment", $payment->id)}}')">{{__('apilang.delete') }}</span>
                     
                    <span class="badge bg btn-warning py-2"><a class="text-white" href="{{route('addPayment',$payment->id)}}">{{__('apilang.update') }}</a></span>

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
