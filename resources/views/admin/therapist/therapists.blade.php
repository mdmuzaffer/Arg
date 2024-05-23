@extends('layouts.master')
@section('title', __('apilang.therapist')) 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav class="d-flex align-items-center justify-content-between">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
        <div class="d-flex justify-content-between align-items-center same-cstm">
                  <a style="height:35px;" class="bg text-white p-2 rounded" href="{{route('addTherapist')}}">{{ __('apilang.add') }}</a>
                </div>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

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
                                  <option value="15">15</option>
                                  <option value="20">20</option>
                                  <option value="25">25</option>
                                  <option value="40">40</option>
                                </select>
                              </label>
                            </div>
                          </div>

                            <div class="col-xl-3 col-lg-3 col-md-12">
                              <div class="header-right d-flex align-items-center gap-2">
                                  <div class="search-bar-wrap">
                                    <p class="mb-0">{{__('apilang.section')}}</p>
                                      <select class="p-1 w-50 border" name="section" id="internSection">
                                        <option value="">{{__('apilang.all')}}</option>
                                        @foreach($sections as $section)
                                        <option value="{{$section->id}}"{{ isset($filterdata) && !empty($filterdata['section']) && $filterdata['section'] == $section['id'] ?'selected':''}}>{{$section->name}}</option>
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
                            <th>@sortablelink('id', trans('apilang.id'))</th>
                            <th>@sortablelink('firstname', trans('apilang.name_formlabel'))</th>
                            <th>@sortablelink('email', trans('apilang.label_email'))</th>
                            <th>@sortablelink('mobile_no', trans('apilang.label_mobile'))</th>
                            <th>@sortablelink('section_id', trans('apilang.section'))</th>
                            <th>@sortablelink('status', trans('apilang.status'))</th>
                            <th scope="col">{{__('apilang.date')}}</th>
                            <th scope="col">{{__('apilang.action')}}</th>
                        </thead>
                        <tbody>
                            @foreach($therapists as $therapist)

                            <tr style="border:2px solid #eee; padding:8px;">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $therapist->firstname }}</td>
                                <td>{{ $therapist->email }}</td>
                                <td>{{ $therapist->mobile_no }}</td>
                                <td>{{ isset($therapist->sections) ? $therapist->sections->name: '' }}</td>
                                <td>{{ $therapist->status == 0 ? 'Inactive' : 'Active' }}</td>
                                <td>{{ date('j M, Y', strtotime($therapist->created_at)) }}</td>

                                <td style="padding-left:5px;">                  
                                  <!-- <span class="badge text-bg-warning py-2"><a class="text-white" href="{{route('therapistView',$therapist->id)}}">{{ __('apilang.view') }}</a></span> -->
                                  <span class="badge text-bg-danger bg-danger py-2 text-white" style="cursor: pointer;" onclick="deleteConfirmation('{{ route("therapistDelete", $therapist->id)}}')">{{ __('apilang.delete') }}</span>
                                  <span class="badge bg text-white py-2"><a class="text-white" href="{{route('therapistUpdate',$therapist->id)}}">{{ __('apilang.update') }}</a></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        <div class="pageintaion-count my-2">Displaying {{$therapists->count()}} of {{ $therapists->total() }} User(s).</div>
                        <div class="pageintaion-pages">{!! $therapists->appends(Request::except('page'))->render() !!}</div>
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
