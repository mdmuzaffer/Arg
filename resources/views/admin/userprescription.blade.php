@extends(auth()->user()->role === 2 ? 'layouts.doctor' : (auth()->user()->role === 3 ? 'layouts.intern' : 'layouts.master'))
@section('title','Patient')
@section('subtitle','Prescription') 
@section('content')

    <main id="main" class="main">

    <div class="pagetitle ms-5">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active"><a href="{{route('userProfile',$user->id)}}">@yield('title')</a></li>
          <li class="breadcrumb-item active">@yield('subtitle')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row d-flex justify-content-center">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">


              @if($user->status == 1)
                @if(!$user->prescription->isEmpty())
                  @foreach($user->prescription as $key=>$prescription)

                  <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                      <label for="name" class="form-label fw-bold">Pricption {{$key}}</label> 
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 mb-3">
                      <span><a href="/{{ $prescription->treatment_pdf}}">View pricption</a></span>
                    </div>
                  </div>
                  @endforeach
                @endif
              @endif

              @if($user->status == 1)
                @if(!$user->prescription->isEmpty())
                    <span style="border:1px solid #337abe;" type="button" class="btn btn-sm btn-outline-primary">
                        <img src="/images/icone/Case details.png" style="width:18px;">
                        <a class="ms-1" href="/{{ $user->prescription[0]->treatment_pdf}}">Prescription</a>
                    </span>
                @endif

               @endif

            </div>
        </div>
        </div>

      </div>
    </section>

  </main>


@endsection
