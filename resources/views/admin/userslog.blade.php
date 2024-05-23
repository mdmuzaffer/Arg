@extends('layouts.master')
@section('title', __('apilang.user_logs')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav class="d-flex justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{__('apilang.id')}}</th>
                    <th scope="col">{{__('apilang.user_name')}}</th>
                    <th scope="col">{{__('apilang.ip') }}</th>
                    <th scope="col">{{__('apilang.location') }}</th>
                    <th scope="col">{{__('apilang.login_date') }}</th>
                    <th scope="col">{{__('apilang.logout_date') }}</th>
                    <th scope="col">{{__('apilang.duration') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($usersLogs as $key=>$log)

                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$log->user->name ?? 'Null'}}</td>
                    <td>{{$log->ip ?? 'Null'}}</td>
                    <td>{{$log->location}}</td>
                    <td>{{ $log->login_date ? date('j F, Y H:i:s', strtotime($log->login_date)) : 'Null' }}</td>
                    <td>{{ $log->logout_date ? date('j F, Y H:i:s', strtotime($log->logout_date)) : 'Null' }}</td>
                    <td>{{$log->duration ?? 'Null'}}</td>

                  </tr>
                  @endforeach

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <div class="pagination-wrap">
                  <div class="pageintaion-count my-2">Displaying {{$usersLogs->count()}} of {{ $usersLogs->total() }} entries(s).</div>
                  <div class="pageintaion-pages">{!! $usersLogs->appends(Request::except('page'))->render() !!}</div>
              </div> 

            </div>
          </div>

        </div>
      </div>
    </section>


  </main>
@endsection
