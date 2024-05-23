@php
    use App\Helpers\UserHelper;
@endphp

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="javaScript::void()" class="logo d-flex align-items-center">
        <img src="{{ URL::asset('admin/backend/assets/img/dhaam-logo.png')}}" alt="">

       
      </a>
      
    </div>
    <div class="header-heading d-flex justify-content-start align-items-center">
    <i class="bi bi-list toggle-sidebar-btn"></i>
      <span class="d-none d-lg-block">



@if(auth()->check())
  @if(auth()->user()->role ==1)
      {{ __('Admin') }}
    @elseif(auth()->user()->role ==2)
         {{ __('Doctor') }}
    @else
        {{ __('Intern') }}
    @endif
@endif


</span>
</div>
    <!-- End Logo -->


    <div class="col-md-1">
      <form id="language-form" action="{{ route('langSwitch') }}" method="POST">
        @csrf
        <select class="form-control Langchange" name="langSwitch" onchange="this.form.submit()">

          @foreach( UserHelper::languageSwitch() as $language)
          <option value="{{ $language->shortname}}" {{ session()->get('locale') ==  $language->shortname ? 'selected' : '' }}>{{ $language->name}}</option>
          @endforeach
        </select>
      </form>
    </div>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" data="md">


          @if(auth()->check())
            @if(auth()->user()->role ==1)

              <img src="{{URL::asset(Auth::user()->image ? Auth::user()->image : 'admin/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">

              @elseif(auth()->user()->role ==2)
                   <img src="{{URL::asset(isset($doctor->profile_photo) && !empty($doctor->profile_photo) ? $doctor->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile">
              @else
                  <img src="{{URL::asset(isset($intern->profile_photo) && !empty($intern->profile_photo) ? $intern->profile_photo : 'admin/assets/img/profile-img.jpg')}}" alt="Profile">
              @endif
          @endif


            <span class="d-none d-md-block dropdown-toggle ps-2">@if(!empty(Auth::user()->name)){{Auth::user()->name}}@endif</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>@if(!empty(Auth::user()->name)){{Auth::user()->name}}@endif</h6>
              <span>@if(!empty(Auth::user()->email)){{Auth::user()->email}}@endif</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>



            <li>

              @if(auth()->check())
                @if(auth()->user()->role ==1)
                   <a class="dropdown-item d-flex align-items-center" href="{{route('adminProfile')}}">
                @elseif(auth()->user()->role ==2)
                   <a class="dropdown-item d-flex align-items-center" href="{{route('doctor.profile')}}">
                @else
                    <a class="dropdown-item d-flex align-items-center" href="{{route('intern.profile')}}">
                @endif
              @endif


                <i class="bi bi-person"></i>
                <span>{{__('apilang.my_profile')}}</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                      {{ __('apilang.logout') }}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
