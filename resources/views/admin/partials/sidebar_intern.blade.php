@php
$currentUrl = Request::url();
@endphp

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
          <a class="{{$currentUrl == route('intern') ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('intern')}}">
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
        <a class="{{ Str::of($currentUrl)->contains(['intern/patient-department-pending', 'intern/approve-department', 'intern/decline-department','intern/approve-patients','intern/inactive-patient', 'intern/patient-schedule','patient-daily-reports','patient-case-details']) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-hospital"></i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        
        <ul id="components-nav" class="nav-content collapse {{ Str::of($currentUrl)->contains(['intern/patient-department-pending', 'intern/approve-department', 'intern/decline-department','intern/approve-patients','intern/inactive-patient', 'intern/patient-schedule','patient-daily-report','patient-case-details','user-department-pending']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav"> 

            <li>
            <a href="{{route('userDepartmentPending')}}" class="{{$currentUrl == route('userDepartmentPending') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Pending</span>
            </a>
          </li>

          <li>

            <a href="{{route('intern.approveDepartment')}}" class="{{ Str::of($currentUrl)->contains(['intern/approve-department', 'intern/patient-schedule','patient-daily-report','patient-case-details']) ? 'active' : '' }}">

              <i class="bi bi-arrow-return-right"></i><span>Approved</span>
            </a>
          </li>

          <li>
            <a href="{{route('intern.declineDepartment')}}" class="{{$currentUrl == route('intern.declineDepartment') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Declined</span>
            </a>
          </li>

          <li>
            <a href="{{route('intern.approvePatients')}}" class="{{$currentUrl == route('intern.approvePatients') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Active</span>
            </a>
          </li>
          <li>
            <a href="{{route('intern.Denypatients')}}" class="{{$currentUrl == route('intern.Denypatients') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Discharge</span>
            </a>
          </li>
        </ul>
      </li> -->

    </ul>

  </aside>
