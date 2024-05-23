@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title', __('apilang.therapy')) 
@section('content')

    <main id="main" class="main">
    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item"><a href="{{route('userProfile', $patient->id)}}">{{  __('apilang.patient') }}</a></li>
          <li class="breadcrumb-item active">@yield('title')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              

              @if(session('success'))
               <div class="col-lg-6">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              </div>
              @endif

              <!-- Table with stripped rows -->
          
              <table style="width: 100%; border:1px solid #eee">

                <form>
                  <div class="row my-3 d-flex align-items-end">

                    <div class="col-xl-1 col-lg-1 col-md-1">
                        <div class="datatable-dropdown">
                          <label>
                            <select class="datatable-selector" name="table_size" id="table_size">
                              <option value="10" {{ isset($filterData) && !empty($filterData) && $filterData['table_size']==='10'?'selected':''}}>10</option>
                              <option value="15" {{ isset($filterData) && !empty($filterData) && $filterData['table_size']==='15'?'selected':''}}>15</option>
                              <option value="20" {{ isset($filterData) && !empty($filterData) && $filterData['table_size']==='20'?'selected':''}}>20</option>
                              <option value="25" {{ isset($filterData) && !empty($filterData) && $filterData['table_size']==='25'?'selected':''}}>25</option>
                              <option value="40" {{ isset($filterData) && !empty($filterData) && $filterData['table_size']==='40'?'selected':''}}>40</option>
                            </select>
                          </label>
                        </div>
                    </div>
                     <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="header-right d-flex align-items-center gap-2">
                          <div class="search-bar-wrap w-50">
                            <input type="date" id="therapy-date" name="therapy-date" value="{{ isset($filterData['therapy-date']) ? date('Y-m-d', strtotime($filterData['therapy-date'])) : '' }}">
                          </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-7 col-md-12 d-flex justify-content-end align-items-end">
                        <div class="datatable-search">
                            <input type="text" name="search" class="form-control search-bar rounded-pill" placeholder="{{  __('apilang.search_here') }}" value="{{ request()->get('search') }}">
                        </div>
                      <button type="submit" class="btn bg text-white rounded-pill" id="showAllTherapy">{{  __('apilang.search') }}</button>
                    </div>
                  </div>
                </form>

                    <thead>
                        <th>@sortablelink('Sn', trans('apilang.sr_no'))</th>
                        <th>@sortablelink('Therapy', trans('apilang.therapy'))</th>
                        <th>@sortablelink('Start time', trans('apilang.start_time'))</th>
                        <th>@sortablelink('End time', trans('apilang.end_time'))</th>
                        <th>@sortablelink('Doctor', trans('apilang.doctor'))</th>
                        <th>@sortablelink('date', trans('apilang.date'))</th>
                    </thead>
                    <tbody>
                        @foreach($patientTherapys as $patientTherapy)

                        <tr style="border:2px solid #eee; padding:8px;">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $patientTherapy->therapy->therapy_name }}</td>
                            <td>{{ $patientTherapy->start_time }}</td>
                            <td>{{ $patientTherapy->end_time }}</td>
                            <td>{{ isset($patientTherapy->doctor) ? $patientTherapy->doctor->firstname: '' }}</td>
                            <!-- <td>{{ date('j M, Y', strtotime($patientTherapy->date)) }}</td> -->
                            <td>{{ $patientTherapy->date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                 <div class="pagination-wrap">
                    @php
                        $currentPage = $patientTherapys->currentPage();
                        $itemsPerPage = $patientTherapys->perPage();
                        $countOnCurrentPage = ($currentPage - 1) * $itemsPerPage + $patientTherapys->count();
                    @endphp
                    <div class="pageintaion-count">Displaying {{ $countOnCurrentPage }} of {{ $patientTherapys->total() }} therapy(s).</div>
                    <div class="pageintaion-pages">{!! $patientTherapys->appends(Request::except('page'))->render() !!}</div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
@endsection
