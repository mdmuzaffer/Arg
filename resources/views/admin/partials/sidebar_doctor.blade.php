@php
$currentUrl = Request::url();
@endphp

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <!-- <a class="nav-link " href="{{route('doctor')}}"> -->
          <a class="{{$currentUrl == route('doctor') ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('doctor')}}">
          <i class="bi bi-speedometer2"></i>
          <span>{{ __('apilang.dashboard') }}</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="{{$currentUrl == route('userDepartmentPending') || Str::startsWith($currentUrl, url('user-profile/')) || Str::startsWith($currentUrl, url('user-schedule/')) || Str::startsWith($currentUrl, url('patient-daily-reports/')) || Str::startsWith($currentUrl, url('patient-all-therapy/')) || Str::startsWith($currentUrl, url('patient-case-details/'))? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('userDepartmentPending')}}">
            <i class="bi bi-layout-text-window-reverse"></i>
           <span>{{ __('apilang.patient') }}</span>
        </a>
      </li>


    <!--   <li class="nav-item">

        <a class="{{ Str::of($currentUrl)->contains(['doctor/patient-department-pending', 'doctor/approve-department', 'doctor/decline-department','doctor/approve-patients','doctor/inactive-patient', 'doctor/patient-schedule', 'patient-daily-reports', 'patient-case-details']) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-hospital"></i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        
        <ul id="components-nav" class="nav-content collapse {{ Str::of($currentUrl)->contains(['doctor/patient-department-pending', 'doctor/approve-department', 'doctor/decline-department','doctor/approve-patients','doctor/inactive-patient', 'doctor/patient-schedule', 'patient-daily-reports', 'patient-case-details','userDepartmentPending']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav"> 

          <li>
            <a href="{{route('userDepartmentPending')}}" class="{{$currentUrl == route('userDepartmentPending') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Pending</span>
            </a>
          </li>



          <hr class="lineHr">
            <li>

               <a href="{{route('doctor.approveDepartment')}}" class="{{ Str::of($currentUrl)->contains(['doctor/approve-department', 'doctor/patient-schedule', 'patient-daily-reports', 'patient-case-details']) ? 'active' : '' }}">

              <i class="bi bi-arrow-return-right"></i><span>Approved</span>
            </a>
          </li>
          <hr class="lineHr">

          <li>
            <a href="{{route('doctor.declineDepartment')}}" class="{{$currentUrl == route('doctor.declineDepartment') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Declined</span>
            </a>
          </li>

          <hr class="lineHr">
          <li>
            <a href="{{route('doctor.approvePatients')}}" class="{{$currentUrl == route('doctor.approvePatients') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Active</span>
            </a>
          </li>
          <hr class="lineHr">

          <li>
            <a href="{{route('doctor.Denypatients')}}" class="{{$currentUrl == route('doctor.Denypatients') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Discharge</span>
            </a>
          </li>
        </ul>
      </li> -->

    </ul>

  </aside>