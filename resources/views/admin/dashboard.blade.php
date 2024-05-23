@extends('layouts.master')
@section('title','Dashboard') 
@section('content')

@php
    use App\Helpers\UserHelper;
@endphp

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{__('apilang.dashboard') }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('apilang.home_label') }}</a></li>
          <li class="breadcrumb-item active">{{__('apilang.dashboard') }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

          <form class="d-flex" method="get">
            <table class="filter_table">
              <tbody>
                <tr>
                  <td>
                    <div class='picker'>
                      <label for="fromperiod">Filter data From</label>
                      <input type="text" id="fromperiod" name="start_date" value="{{old('start_date')}}">
                      <label for="toperiod">to</label>
                      <input type="text" id="toperiod" name="end_date" value="{{old('end_date')}}">
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <button class="filter_btn bg text-white" type="submit">Search</button>
          </form>

        </div>
      </div>
    </section>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">

          <div class="row">


            <!-- Sales Card -->
            <div class="col">
              <div class="card info-card sales-card card-bg">

                <div class="card-body">

                 <!--  <h5 class="card-title text-center">{{ UserHelper::getTotalUsers(null) }}</h5> -->
                  <h5 class="card-title text-center">{{ $getTotalUsers }}</h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="ps-3">
                      <h6 class="patient-heading text-center">{{__('apilang.total_patient')}}</h6>
                    </div>
                  </div>
                
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col">
              <div class="card info-card sales-card card-bg">

                <div class="card-body">
                   <!-- <h5 class="card-title text-center">{{ UserHelper::dischargePatient() }}</h5> -->
                   <h5 class="card-title text-center">{{ $dischargePatient }}</h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="ps-3">
                      <h6 class="patient-heading text-center">{{__('apilang.discharge_patient')}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <!-- Customers Card -->


            <div class="col">
              <div class="card info-card sales-card card-hover ">

                <div class="card-body">
                  <h5 class="card-title text-center">{{ $newPatient }}</h5>

                  <div class="d-flex align-items-center justify-content-center">
                    <div class="ps-3">
                      <h6 class="patient-heading text-center">{{__('apilang.new_patient')}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Customers Card -->
            <div class="col">
              <div class="card info-card sales-card card-bg">
                <div class="card-body">
                  <h5 class="card-title text-center">{{ $getTotalDoctor}}</h5>
                  <div class="d-flex align-items-center justify-content-center">
                    <div class="ps-3">
                      <h6 class="patient-heading text-center">{{__('apilang.total_doctor')}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card info-card sales-card card-bg">

                <div class="card-body">
                  <h5 class="card-title text-center">{{ $getTotalIntern }}</h5>

                  <div class="d-flex align-items-center justify-content-center">
                    <div class="ps-3">
                      <h6 class="patient-heading text-center">{{__('apilang.total_intern')}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>


            <!-- Reports -->
            <div class="row d-flex">
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="card">

                  <div class="card-body">
                    <h5 class="card-title">{{__('apilang.reports')}} <span>/{{__('apilang.today')}}</span></h5>

                    <!-- Line Chart -->
                    <div class="card chart-container">
                      <canvas id="chart"></canvas>
                    </div>

                    <script>
                      const ctx = document.getElementById("chart").getContext('2d');
                      const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                          labels: ["jan", "feb", "mar", "apr",
                            "may", "june", "july", "aug", "sept", "oct", "nov", "dec"],
                          datasets: [{
                            label: '{{__('apilang.patient')}}',
                            backgroundColor: 'rgba(119,198,12)',
                            borderColor: 'rgb(47, 128, 237)',
                            data: [<?=$monthlyPatient?>],
                            
                          }]
                        },
                        options: {
                          scales: {
                            yAxes: [{
                              ticks: {
                                beginAtZero: true,
                              }
                            }]
                          }
                        },
                      });
                    </script>
                    <!-- End Line Chart -->

                  </div>
                </div>

              </div>


              <!-- End Reports -->
              <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">

                 <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">{{__('apilang.doctor')}}</h5>
                        <div id="pie-chart-apex"></div>
                        <script>
                          var optionsPieChart = {
                            
                            series: [<?=$sectiondoctors?>],
                            chart: {
                              type: 'pie',
                              height: 360,
                            },
                            theme: {
                              monochrome: {
                                enabled: true,
                                color: '#31316A',
                              }
                            },

                            labels: ['Section A-Neurology & Oncology', 'Section B-Pulmonology & Cardilogy', 'Section C-Psychiatry', 'Section D-Rheumatology', 'Section E-Spinal Disorders','Section F-Metabolic Disorders','Section G-Gastroenterology','Section H-Endocrinology',' Section PPH-Promotion Of Positive Health'],

                            responsive: [{
                              breakpoint: 480,
                              options: {
                                chart: {
                                  width: 200
                                },
                                legend: {
                                  position: 'bottom'
                                }
                              }
                            }],
                            tooltip: {
                              fillSeriesColor: false,
                              onDatasetHover: {
                                highlightDataSeries: false,
                              },
                              theme: 'light',
                              style: {
                                fontSize: '12px',
                                fontFamily: 'Inter',
                              },
                              y: {
                                formatter: function (val) {
                                  return "Total " + val + " Doctor"
                                }
                              }
                            },
                          };

                          var pieChartEl = document.getElementById('pie-chart-apex');
                          if (pieChartEl) {
                            var pieChart = new ApexCharts(pieChartEl, optionsPieChart);
                            pieChart.render();
                          }
                        </script>
                      </div>
                    </div>
                
              </div>


            </div>

            <!-- Recent Sales -->

          </div><!-- End Recent Sales -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->

      </div>
    </section>
  </main>


  @endsection
