@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title', __('apilang.patient')) 
@section('content')


    <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{__('apilang.patient') }}</h1>
      <nav>
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
                        // text: 'it working fine',
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
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12">

                                        <div class="header-right d-flex align-items-center gap-2">
                                          <div class="search-bar-wrap w-50">
                                            <p class="mb-0 fs-5">{{__('apilang.patient_status') }}</p>
                                          <select class="p-1 rounded w-100 patientFilter" name="patient-status" id="patientStatus">
                                            <option value="">{{__('apilang.all') }}</option>
                                            <option value="0" {{ isset($filterdata) && !empty($filterdata) && $filterdata['patient-status']==='0'?'selected':''}}>{{__('apilang.new') }}</option>
                                            <option value="1" {{ isset($filterdata) && !empty($filterdata) && $filterdata['patient-status']==='1'?'selected':''}}>{{__('apilang.active') }}</option>
                                            <option value="2" {{ isset($filterdata) && !empty($filterdata) && $filterdata['patient-status']==='2'?'selected':''}}>{{__('apilang.inactive') }}</option>
                                            <option value="3" {{ isset($filterdata) && !empty($filterdata) && $filterdata['patient-status']==='3'?'selected':''}}>{{__('apilang.discharge') }}</option>
                                        </select>
                                          </div>
                                        </div>
                                    </div>

                                     <div class="col-xl-4 col-lg-4 col-md-12">
                                  
                                        <div class="header-right d-flex align-items-center gap-2">
                                          <div class="search-bar-wrap w-50">
                                            <p class="mb-0 fs-5">{{__('apilang.section_status') }}</p>
                                              <select class="p-1 rounded w-100 patientFilter" name="section-status" id="sectionStatus">
                                                <option value="">{{__('apilang.all') }}</option>
                                                <option value="0" {{ isset($filterdata) && !empty($filterdata) && $filterdata['section-status']==='0'?'selected':''}}>{{__('apilang.pending') }}</option>
                                                <option value="1" {{ isset($filterdata) && !empty($filterdata) && $filterdata['section-status']==='1'?'selected':''}}>{{__('apilang.approve') }}</option>
                                                <option value="2" {{ isset($filterdata) && !empty($filterdata) && $filterdata['section-status']==='2'?'selected':''}}>{{__('apilang.decline') }}</option>
                                              </select>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12">
                    
                                      <div class="header-right d-flex align-items-center gap-2">
                                         <div class="search-bar-wrap w-50">
                                           <p class="mb-0 fs-5">{{__('apilang.section') }}</p>
                                            <select class="p-1 rounded w-100 patientFilter" name="section" id="section">
                                            <option value="">{{__('apilang.all') }}</option>
                                            @foreach($sections as $section)
                                            <option value="{{$section->id}}"{{ isset($filterdata) && !empty($filterdata) && $filterdata['section'] == $section['id'] ?'selected':''}}>{{$section->name}}</option>
                                             @endforeach
                                     </select>
                              </div>
                          </div>
                        </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 d-flex justify-content-end align-items-end">
                                <div class="datatable-search">
                                  <input type="text" name="search" class="form-control search-bar rounded-pill patientSearchfilter" placeholder="{{__('apilang.search_here') }}" value="{{ request()->get('search') }}">
                              </div>
                                <button type="submit" class="bg text-white p-2 rounded-pill w-25" id="searchButton">{{__('apilang.search') }}</button>
                            </div>
                        </div>


                      </form>

                        <thead>
                           <!--  <th>
                              <button id="deleteSelected">All</button>

                              <select class="select-option">
                                <option value="patientStatus">Patient status</option>
                                <option value="sectionStatus">Section status</option>
                              </select>

                            </th> -->
                            <th>@sortablelink('id', trans('apilang.id'))</th>
                            <th>@sortablelink('name', trans('apilang.name_formlabel'))</th>
                            <th>@sortablelink('email', trans('apilang.label_email'))</th>
                            <th>@sortablelink('section', trans('apilang.section'))</th>
                            <th>@sortablelink('created_at', trans('apilang.date'))</th>
                            <th>@sortablelink('status', trans('apilang.status'))</th>
                            <th scope="col">{{__('apilang.section_status')}}</th>
                            <th scope="col">{{__('apilang.action')}}</th>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)

                            <tr>
                              
                               <!--  <td><input type="checkbox" name="patient_id[]" value="{{$patient->id}}" class="toggleCheckbox"></td> -->

                                <td>{{ $loop->index + 1 }}</td>
                                <td >{{ $patient->name }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ isset($patient->sections) ? $patient->sections[0]->name: '' }}</td>

                                 <td>{{ date('j M, Y', strtotime($patient->created_at)) }}</td>
                                <td>
                                    <select class="form-select patient-status statusPatient" id="statusPatient" name="statuspatient" data-userid="{{$patient['id']}}">
                                      <option value="0" {{ $patient->status == 0 ? 'selected' : '' }}>{{__('apilang.new') }}</option>
                                      <option value="1" {{ $patient->status == 1 ? 'selected' : '' }}>{{__('apilang.active') }}</option>
                                      <option value="2" {{ $patient->status == 2 ? 'selected' : '' }}>{{__('apilang.inactive') }}</option>
                                      <option value="3" {{ $patient->status == 3 ? 'selected' : '' }}>{{__('apilang.discharge') }}</option>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-select section-status sectionStatus" id="sectionStatus" name="sectionStatus" data-userid="{{$patient['id']}}">
                                      <option value="0" {{ $patient->sectionMaping->status == 0 ? 'selected' : '' }}>{{__('apilang.pending') }}</option>
                                      <option value="1" {{ $patient->sectionMaping->status == 1 ? 'selected' : '' }}>{{__('apilang.approve') }}</option>
                                      <option value="2" {{ $patient->sectionMaping->status == 2 ? 'selected' : '' }}>{{__('apilang.decline') }}</option>
                                    </select>
                                </td>
                                <td>                  
                      

                        <span  class="badge text-bg-warning bg-warning py-2"><a class="text-white" href="{{route('userProfile',$patient['id'])}}" >{{__('apilang.view') }}</a></span>

                        <!-- <span  class="badge text-bg-info bg-blue text-white py-2"><a class="text-white" onclick="statusConfirmation('{{ route("userProfileUpdate", $patient['id'])}}', 'In active')">{{ $patient->status == 0 ? 'New' : ($patient->status == 1 ? 'Active' : ($patient->status == 2 ? 'Inactive' : 'Discharge')) }}</a></span> -->

                        
                       
                       <!--  <span   class="badge text-btn-secondary bg-secondary text-white py-2" data-userid="{{$patient['id']}}" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#verticalycentered_{{$patient['id']}}">
                                    Section status</span> -->
                       

                       <!--  @if($patient->status == 1)
                        <span type="button" class="btn  btn-outline-primary btn-sm p-1" style=width:95px;> <img src="images/icone/Schedule.png" style=width:18px;><a class="ms-1"  href="{{route('userSchedule',$patient['id'])}}" >schedule</a></span>

                        <span type="button" class="btn  btn-outline-primary btn-sm p-1" style=width:110px;><img src="images/icone/Daily report.png" style=width:18px;><a class="ms-1" href="{{route('patientDailyReport',$patient['id'])}}" >Daily report</a></span>

                        <span type="button" class="btn  btn-outline-primary btn-sm p-1" style=width:109px;><img src="images/icone/Case details.png" style=width:18px;><a class="ms-1" href="{{route('patientCaseDetails',$patient['id'])}}" >Case details</a></span>
                        @endif -->

                                  <div class="modal fade" id="verticalycentered_{{$patient['id']}}" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Change section status</h5>

                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                         <p class="departmentStatusMsg"></p>
                                        <form id="changeDepartment">
                                          @csrf
                                          <input type="hidden" class="userId" value="{{$patient['id']}}">
                                          <div class="modal-body">
                                            <div class="col-sm-10">
                                              <select class="form-select" aria-label="Default select example" name="departmentStatus" id="departmentStatus">
                                                <option value="0">Pending</option>
                                                <option value="1">Approve</option>
                                                <option value="2">Decline</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary patientDepartmentStatus" id="patientDepartmentStatus">Save changes</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrap">
                        <div class="pageintaion-count">Displaying {{$patients->count()}} of {{ $patients->total() }} Patient(s).</div>
                        <div class="pageintaion-pages">{!! $patients->appends(Request::except('page'))->render() !!}</div>
                    </div>                    
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
@endsection