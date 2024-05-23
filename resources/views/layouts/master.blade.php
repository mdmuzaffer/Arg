<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


  <title>{{ trans('apilang.app_name') ?: 'Arogyadhama' }} || @yield('title')</title>

  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
  <link type="text/css" href="{{ URL::asset('admin/backend/assets/vendor/apexcharts/apexcharts.css')}}" rel="stylesheet">
    
    <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>


  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('admin/backend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->


  @include('../admin/partials.header')


  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

  @include('../admin/partials.sidebar')

  <!-- End Sidebar -->

 <!-- Main content -->

  @yield('content')

  <!-- End main content -->

  <!-- ======= Footer ======= -->

  @include('../admin/partials.footer')

  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('admin/backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ URL::asset('admin/backend/assets/vendor/php-email-form/validate.js')}}"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL::asset('admin/backend/assets/js/main.js')}}"></script>
  <script src="{{ URL::asset('admin/assets/js/jquery.js')}}"></script>

  @if(isset($route_type) && $route_type =='schedule')
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> 
  @endif

    @if(isset($route_type) && $route_type =='selectpicker')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="{{ URL::asset('admin/backend/assets/css/selectpicker.css')}}" rel="stylesheet">
  @endif

  @if(isset($page_type) && $page_type =='admin')
  <script src="{{asset('admin/custom/developer.js')}}"></script>
  <script src="{{asset('admin/custom/design.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  @endif

  @if(isset($route_type) && $route_type =='dashboard')
  <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <script>
      
     $(document).ready(function() {
    // Initialize Datepicker
        $("#fromperiod").datepicker({
            defaultDate: null, // Set defaultDate to null to clear the default date
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: function(selectedDate) {
                $("#toperiod").datepicker("option", "minDate", selectedDate);
            }
        });

        $("#toperiod").datepicker({
            defaultDate: null, // Set defaultDate to null to clear the default date
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: "yy-mm-dd",
            onClose: function(selectedDate) {
                $("#fromperiod").datepicker("option", "maxDate", selectedDate);
            }
        });

        // Clear Datepicker inputs
        $("#fromperiod").val(''); // Clear the value of fromperiod input
        $("#toperiod").val('');   // Clear the value of toperiod input

        // Previous Month button click event
        $("#prevMonth").click(function() {
          var currentDate = new Date();
          var currentMonth = currentDate.getMonth();
          var currentYear = currentDate.getFullYear();

          // If it's January, subtract a year and set the month to December
          if (currentMonth === 0) {
              currentYear -= 1;
              currentMonth = 11; // December
          } else {
              currentMonth -= 1; // Subtract one month
          }

          currentDate.setFullYear(currentYear);
          currentDate.setMonth(currentMonth);

          $("#fromperiod").datepicker("setDate", currentDate);
          $("#toperiod").datepicker("setDate", currentDate);
        });

    });


    </script>

  @endif

  <script>
    $(document).ready(function() {
      //$(".datatable-dropdown").empty();

      $(".datatable-dropdown label").contents().filter(function() {
        return this.nodeType === 3 && this.textContent.trim() === "entries per page";
      }).remove();

      
    });
</script>

</body>

</html>