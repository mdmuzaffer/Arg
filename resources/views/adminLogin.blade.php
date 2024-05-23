<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arogyadhama</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL::asset('image/icone/logo_fevicon.png')}}" rel="icon">
  <link href="{{ URL::asset('image/icone/logo_fevicon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('admin/backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('admin/backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('admin/backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('admin/backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('admin/backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('admin/backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('admin/backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="pages-login.html">
  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('admin/backend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <section id="log-in" class="log-in">
      <div class="log-in-main">
        <div class="container-fluid">
          <div class="row log-h">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 bg-log d-flex align-items-center">
              <div class="log-in-logo d-flex justify-content-center">
                <img class="w-50" src="{{ URL::asset('admin/backend/assets/img/3 2.png')}}">
              </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 d-flex align-items-center justify-content-center">
              <div class="log-in-fields shadow  rounded w-50 relative mx-auto">
                <div class="leaf-img">
                  <img class="w-50" src="{{ URL::asset('admin/backend/assets/img/leaf.png')}}">
                </div>
                  <div class="log-in-heading">
                    <h4 class="fw-bold log">Login as a Admin User</h4>
                  </div>
                  <div class="form-fields">


                    <form method="POST" class="was-validated" action="{{ route('login') }}">
                     @csrf

                      <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Email</label>


                        <input id="uname" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Username" name="email" value="{{ old('email') }}" required  >

                       @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>


                      <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>

                          <input placeholder="Password" id="pwd" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                        @if(session('error'))
                         <span class="invalid-feedback" role="alert">
                                  <strong>{{ session('error') }}</strong>
                              </span>
                        @endif

                      </div>

                      <div class="submit-btn d-flex justify-content-center mb-2">
                         <button class="btn-primary log-btn w-50 rounded" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>

                  <div class="forget-password d-flex justify-content-center mb-2">
                    <span class="forget badge py-2">
                      <a class="text-blue" href="{{route('forget.password')}}"> Forget your password</a>
                    </span>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


  <style>
  span.forget.badge.py-2 a:hover {
    color: #77c60c;
  }
  </style>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('admin/backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL::asset('admin/backend/assets/js/main.js')}}"></script>

</body>

</html>