@php
$currentUrl = Request::url();
@endphp

@role('Admin')

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @canany(['add-user', 'delete-user', 'update-user','view-user'])

      <li class="nav-item">
        <a class="{{$currentUrl == route('dashboard') ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('dashboard')}}">
        <i class="bi bi-speedometer2"></i>
          <span>{{ __('apilang.dashboard') }}</span>
        </a>
      </li>

      <!-- End Dashboard Nav -->
     <!--  <li class="nav-item">
        <a class="{{$currentUrl == route('departments') ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('departments')}}">
        <i class="bi bi-diagram-3"></i>
          <span>Department</span>
        </a>
      </li> -->

      <li class="nav-item">
        <a class="{{ $currentUrl == route('sections') || $currentUrl == route('addSection') || Str::startsWith($currentUrl, url('add-section/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('sections') }}">

          <i class="bi-intersect"></i>
          <span>{{ __('apilang.section') }}</span>
          
        </a>
      </li>

      <li class="nav-item">

        <a href="{{route('doctors')}}" class="{{ Str::startsWith($currentUrl, url('doctors/')) || $currentUrl == route('doctoradd') || Str::startsWith($currentUrl, url('doctor-update/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}">

        <!-- <img src="{{URL::asset('/sidebar-icons/doctor.svg')}}" width="16" height="16" fill="#ffffff" > -->

        <i class="bi bi-person-workspace"></i>
          <span>{{__('apilang.doctor') }}</span>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{route('therapist')}}" class="{{ Str::startsWith($currentUrl, url('therapist/')) ||  $currentUrl == route('addTherapist') || Str::startsWith($currentUrl, url('therapist-update/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}">
        <i class="bi bi-briefcase"></i>

          <span>{{ __('apilang.therapist') }}</span>
        </a>
      </li>


      <li class="nav-item">
        <a href="{{route('interns')}}" class="{{ Str::startsWith($currentUrl, url('interns/')) ||  $currentUrl == route('addInterns') || Str::startsWith($currentUrl, url('intern-update/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}">
        <i class="bi bi-people"></i>

          <span>{{ __('apilang.intern') }}</span>
        </a>
      </li><!-- End Contact Page Nav -->


      <li class="nav-item">

          <a class="{{$currentUrl == route('userDepartmentPending') || Str::startsWith($currentUrl, url('user-profile/')) || Str::startsWith($currentUrl, url('user-schedule/')) || Str::startsWith($currentUrl, url('patient-daily-reports/')) || Str::startsWith($currentUrl, url('patient-all-therapy/')) || Str::startsWith($currentUrl, url('patient-case-details/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('userDepartmentPending')}}">

            <i class="bi bi-layout-text-window-reverse"></i>
          <span>{{ __('apilang.patient') }}</span>
        </a>
      </li>


    <!--  <li class="nav-item">
        <a class="{{ Str::of($currentUrl)->contains(['user-department-pending', 'approve-department', 'decline-department','approve-patients','inactive-patients', 'user-schedule','patient-daily-reports','patient-case-details']) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-hospital"></i>
        </i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        
        <ul id="components-nav" class="nav-content collapse {{ Str::of($currentUrl)->contains(['user-department-pending', 'approve-department', 'decline-department','approve-patients','inactive-patients', 'user-schedule','patient-daily-reports','patient-case-details']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{route('userDepartmentPending')}}" class="{{$currentUrl == route('userDepartmentPending') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Pending</span>
            </a>
          </li>
          <hr class="lineHr">

            <li>
            <a href="{{route('approveDepartment')}}" class="{{ Str::of($currentUrl)->contains(['approve-department', 'user-schedule','patient-daily-reports','patient-case-details']) ? 'active' : '' }}">

              <i class="bi bi-arrow-return-right"></i><span>Approved</span>
            </a>
          </li>
          <hr class="lineHr">

          <li>
            <a href="{{route('declineDepartment')}}" class="{{$currentUrl == route('declineDepartment') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Declined</span>
            </a>
          </li>
          <hr class="lineHr">

          <li>
            <a href="{{route('approvePatients')}}" class="{{$currentUrl == route('approvePatients') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Active</span>
            </a>
          </li>
          <hr class="lineHr">

          <li>
            <a href="{{route('inactivePatients')}}" class="{{$currentUrl == route('inactivePatients') ? 'active' : '' }}">
              <i class="bi bi-arrow-return-right"></i><span>Discharge</span>
            </a>
          </li>
        </ul>
      </li> -->

      <li class="nav-item">
          <a class="{{$currentUrl == route('notification') ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('notification')}}">
          <i class="bi bi-bell"></i>

          <span>{{ __('apilang.notification') }}</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="{{$currentUrl == route('therapy') || Str::startsWith($currentUrl, url('add-therapy/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('therapy')}}">
        <i class="bi bi-heart-pulse"></i>

           <span>{{ __('apilang.therapy') }}</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="{{$currentUrl == route('weeklyschedule') || Str::startsWith($currentUrl, url('add-weekly-schedule/')) || Str::startsWith($currentUrl, url('day-schedule/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('weeklyschedule')}}">
        <i class="bi bi-calendar"></i>
           <span>{{ __('apilang.weekly_schedule') }}</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="{{$currentUrl == route('homeslider') || Str::startsWith($currentUrl, url('view-slider/')) || Str::startsWith($currentUrl, url('add-slider/')) || Str::startsWith($currentUrl, url('slider-update/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('homeslider')}}">
        <i class="bi-sliders"></i>
          <span>{{ __('apilang.slider') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="{{$currentUrl == route('accommodation') || Str::startsWith($currentUrl, url('add-accommodation/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('accommodation')}}">
        <i class="bi bi-hospital"></i>
          <span>{{ __('apilang.accomudations') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="{{$currentUrl == route('appIcone') || Str::startsWith($currentUrl, url('add-appicone/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('appIcone')}}">
          <i class="bi bi-list"></i>
          <span>{{ __('apilang.app_icon') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="{{$currentUrl == route('appLanguages') || Str::startsWith($currentUrl, url('add-language/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('appLanguages')}}">
          <i class="bi bi-translate"></i>
          <span>{{ __('apilang.languages') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="{{$currentUrl == route('paymentDetail') || Str::startsWith($currentUrl, url('payment-detail/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('paymentDetail')}}">
          <i class="bi bi-currency-rupee"></i>
          <span>{{ __('apilang.payment_details') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="{{$currentUrl == route('usersLog') || Str::startsWith($currentUrl, url('users-log/')) ? 'nav-link collapsed active' : 'nav-link collapsed' }}" href="{{ route('usersLog')}}">
          <i class="bi-clock-history"></i>
          <span>{{ __('apilang.user_logs') }}</span>
        </a>
      </li>

      <!-- End Blank Page Nav -->

    @endcanany
    </ul>

  </aside>

  @endrole('Admin')