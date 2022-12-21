@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endpush  

 <div class="section-body bg-warning">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-success d-flex justify-content-center">
                    <h4 style="color: white;">Reporting Panel</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Assesment Detail</h6>
                        <span class="font-weight-bold mb-0 font-20">1,562</span>
                      </div>
                      <i class="fas fa-address-card card-icon col-orange font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart1" height="80"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Student 365</h6>
                        <span class="font-weight-bold mb-0 font-20">895</span>
                      </div>
                      <i class="fas fa-diagnoses card-icon col-green font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart2" height="80"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Dpt Fct Sheet</h6>
                        <span class="font-weight-bold mb-0 font-20">+22.58%</span>
                      </div>
                      <i class="fas fa-chart-bar card-icon col-indigo font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart3" height="80"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Sec Wise Report</h6>
                        <span class="font-weight-bold mb-0 font-20">$2,687</span>
                      </div>
                      <i class="fas fa-hand-holding-usd card-icon col-cyan font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart4" height="80"></canvas>
                  </div>
                </div>
              </div>
          </div>

           <div class="row justify-content-center">
               <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Student Attendance</h6>
                        <span class="font-weight-bold mb-0 font-20">$2,687</span>
                      </div>
                      <i class="fas fa-hand-holding-usd card-icon col-cyan font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart5" height="80"></canvas>
                  </div>
                </div>
              </div>
               <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Classes Time Table</h6>
                        <span class="font-weight-bold mb-0 font-20">$2,687</span>
                      </div>
                      <i class="fas fa-hand-holding-usd card-icon col-cyan font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart6" height="80"></canvas>
                  </div>
                </div>
              </div>
               <div class="col-xl-3 col-lg-6">
                <div class="card">
                  <div class="card-bg">
                    <div class="p-t-20 d-flex justify-content-between">
                      <div class="col">
                        <h6 class="mb-0">Courses</h6>
                        <span class="font-weight-bold mb-0 font-20">$2,687</span>
                      </div>
                      <i class="fas fa-hand-holding-usd card-icon col-cyan font-30 p-r-30"></i>
                    </div>
                    <canvas id="cardChart7" height="80"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/bundles/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
  <!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/widget-data.js') }}"></script>

@endsection   
