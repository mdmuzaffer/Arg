@extends('layouts.master')
@section('title', __('apilang.doctor')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav class="d-flex justify-content-between align-items-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="d-flex justify-content-between align-items-center same-cstm">
                <a style="height:35px;" class="bg text-white p-2 rounded" href="{{route('doctoradd')}}">{{ __('apilang.add') }}</a>
         </div>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
               

                 <!--  @if(session('message'))
                   <div class="col-lg-6 d-flex justify-content-end">
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                  </div>
                  @endif


                  @if(session('success'))
                   <div class="col-lg-6 d-flex justify-content-end">
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
                  <div class="card-body">
             
                    <table>
                      <form>

                        <div class="row mb-3 d-flex align-items-end">
                         <div class="col-xl-1 col-lg-1 col-md-1">
                            <div class="datatable-dropdown">
                              <label>
                                <select class="datatable-selector" name="table_size" id="table_size">
                                  <option value="10">10</option>
                                  <option value="15">15</option><option value="20">20</option>
                                  <option value="25">25</option>
                                  <option value="40">40</option>
                                </select>
                              </label>
                            </div>
                          </div>

                            <div class="col-xl-4 col-lg-4 col-md-12">
                              <div class="header-right d-flex align-items-center gap-2">
                                  <div class="search-bar-wrap">
                                    <p class="mb-0">{{__('apilang.section') }}</p>
                                      <select class="p-2 border w-50" name="section" id="doctorSection">
                                        <option value="">{{__('apilang.all') }}</option>
                                        @foreach($sections as $section)
                                        <option value="{{$section->id}}"{{ isset($filterdata) && !empty($filterdata['section']) && $filterdata['section'] == $section['id'] ?'selected':''}}>{{$section->name}}</option>
                                        @endforeach
                                      </select>
                                  </div>


                              </div>
                            </div>

                               <div class="col-xl-7 col-lg-7 col-md-12 d-flex justify-content-end align-items-end">
                                    <div class="datatable-search">
                                      <input type="text" name="search" class="form-control search-bar rounded-pill" placeholder="{{__('apilang.search_here') }}" value="{{ request()->get('search') }}">
                                  </div>

                                    <button type="submit" class="bg text-white p-2 rounded-pill" id="searchDoctor">{{__('apilang.search') }}</button>
                                </div>
                            </div>
                          </form>

                        <thead>
                            <th>@sortablelink('id', trans('apilang.id'))</th>
                            <th>@sortablelink('name', trans('apilang.name_formlabel'))</th>
                            <th>@sortablelink('email', trans('apilang.label_email'))</th>
                            <th>@sortablelink('section', trans('apilang.section'))</th>
                            <th>@sortablelink('status', trans('apilang.status'))</th>
                            <th scope="col">{{__('apilang.date')}}</th>
                            <th scope="col">{{__('apilang.action')}}</th>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)

                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ isset($doctor->sections) ? $doctor->sections[0]->name: '' }}</td>
                                <td>{{ $doctor->status == 0 ? 'New' : ($doctor->status == 1 ? 'Active' : ($doctor->status == 2 ? 'Inactive' : 'Discharge')) }}</td>
                                <td>{{ date('j M, Y', strtotime($doctor->created_at)) }}</td>

                                <td>                  
                      

                                <span class="badge text-bg-warning py-2"><a class="text-white" href="{{ route('doctorview',$doctor->id)}}">{{__('apilang.view') }}</a></span>

                              <span class="badge text-bg-danger bg-danger py-2 text-white" style="cursor: pointer;"  onclick="deleteConfirmation('{{ route("doctorDelete", $doctor->id)}}')">{{__('apilang.delete') }}</span>
                              
                              <span class="badge bg btn-warning py-2 text-white"><a class="text-white" href="{{ route('doctorupdate',$doctor->id)}}">{{__('apilang.update') }}</a></span>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        <div class="pageintaion-count">Displaying {{$doctors->count()}} of {{ $doctors->total() }} User(s).</div>
                        <div class="pageintaion-pages">{!! $doctors->appends(Request::except('page'))->render() !!}</div>
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
