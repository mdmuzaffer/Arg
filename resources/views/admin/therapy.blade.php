@extends('layouts.master')
@section('title', __('apilang.therapy')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav class="d-flex justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="d-flex justify-content-between align-items-center mb-3 same-cstm">
                    <a style="height:40px;" href="{{ route('addTherapy') }}" class="bg text-white p-2 rounded">{{__('apilang.add_therapy') }}</a>
                </div>
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


                
            <div class="card-body" id="loginDoctor" data-logindoctor="{{Auth::user()->id}}">
              <table>

              <form>
                  <div class="row mb-3 d-flex align-items-end">
                    <div class="col-xl-1 col-lg-1 col-md-1">
                      <div class="datatable-dropdown">
                        <label>
                          <select class="datatable-selector" name="table_size" id="table_size">
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="40">40</option>
                          </select>
                        </label>
                      </div>
                    </div>

                      <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="header-right align-items-center gap-2">
                            <div class="search-bar-wrap">
                              <p class="mb-0">{{__('apilang.department')}}</p>
                                <select class="p-1 w-50 border" name="department" id="internSection">
                                  <option value="">{{__('apilang.all')}}</option>
                                  @foreach($departments as $department)
                                  <option value="{{$department->id}}"{{ isset($filterdata) && !empty($filterdata['department']) && $filterdata['department'] == $department['id'] ?'selected':''}}>{{$department->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                      </div>

                         <div class="col-xl-8 col-lg-8 col-md-12 d-flex justify-content-end align-items-end">
                              <div class="datatable-search">
                                <input type="text" name="search" class="form-control search-bar rounded-pill" placeholder="{{ __('apilang.search_here') }}" value="{{ request()->get('search') }}">
                            </div>

                              <button type="submit" class="bg text-white p-2 rounded-pill" id="searchIntern">{{ __('apilang.search') }}</button>
                          </div>
                      </div>
                  </form>

                <thead>
                  <tr>
                    <th scope="col">{{__('apilang.id')}}</th>
                    <th scope="col">{{__('apilang.name_formlabel')}}</th>
                    <th scope="col">{{__('apilang.department')}}</th>
                    <th scope="col">{{__('apilang.status')}}</th>
                    <th scope="col">{{__('apilang.date')}}</th>
                    <th scope="col">{{__('apilang.action')}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($therapies as $key=>$therapy)

                  @php
                      // Make sure therapyDepartment relationship is loaded
                      $therapy->load('therapyDepartment');
                  @endphp

                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$therapy->therapy_name}}</td>
                    <td>{{ $therapy->therapyDepartment->name ?? 'N/A' }}</td>
                    <td>{{ $therapy->status =='0' ? "Inactive":"Active" }}</td>
                    <td>{{ date('j F, Y', strtotime($therapy->created_at)) }}</td>
                    <td>


                     <!--  <span class="badge text-bg-warning py-2"><a class="text-white" href="javaScript::void()">View</a></span> -->

                   <!--  <span class="badge text-bg-danger bg-danger py-2"><a class="text-white" href="{{route('deleteTherapy',$therapy->id)}}">Delete</a></span> -->

                    <span class="badge text-bg-danger bg-danger py-2 text-white" onclick="deleteConfirmation('{{ route("deleteTherapy", $therapy->id)}}')">{{__('apilang.delete') }}</span>

                    <span class="badge bg btn-warning py-2"><a class="text-white" href="{{route('addTherapy',$therapy->id)}}">{{__('apilang.update') }}</a></span>

                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>

              <div class="pagination-wrap">
                  <div class="pageintaion-count my-2">Displaying {{$therapies->count()}} of {{ $therapies->total() }} User(s).</div>
                  <div class="pageintaion-pages">{!! $therapies->appends(Request::except('page'))->render() !!}</div>
              </div> 

            </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


  </main>
@endsection
