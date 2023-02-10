@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endpush                      <!-- Main Content -->
      <div class="">
        <section class="section">
          <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Courses Offered</h5>
                          <h2 class="mb-3 font-18">258</h2>
                          <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Enrolled Students</h5>
                          <h2 class="mb-3 font-18">1,287</h2>
                          <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Courses Enrollment</h5>
                          <h2 class="mb-3 font-18">128</h2>
                          <p class="mb-0"><span class="col-green">18%</span>
                            Increase</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
<!-- @include('Dean.charts') -->
<div class="section-body bg-danger">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-danger d-flex justify-content-center">
                    <h4 style="color: white;">EXAM SUBMISSION</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="">
        <section class="section">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ "Final Exam" }}</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="search" class="search-inp form-control" id="myInputTextField" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">                 
                    <div class="table-responsive">
                      
                      <form method="post" action="https://e.lgu.edu.pk/result/AdvanceSearch">
                           <table class="table table-striped table-hover table-datatable
                       form-control-sm" id="tableExport">
                             <!--  <thead>
                                  <tr>
                                      <th colspan="10" class="bg-danger" style="text-align:center;color:white;"><b>EXAM SUBMISSION</b></th>
                                  </tr>
                              </thead> -->
                              <tbody>
                                  <tr>
                                      <td>Pending Review</td>
                                      <td>HoD-Approved</td>
                                      <td>Pending</td>
                                      <td>HoD Rejected</td>
                                      <td>CoE-Rejected</td>
                                      <td>CoE-Approved</td>
                                      <td>Rejected-Igrade</td>
                                      <td><b>Absolute Grading Awards</b></td>
                                      <td><b>Relative Grading Awards</b></td>
                                      <td>Total Awards</td>
                                  </tr>
                                  <tr>
                                      <td><a href="">0</a></td>
                                      <td><a href="">0</a></td>
                                      <td><a href="">0</a></td>
                                      <td><a href="">0</a></td>
                                      <td><a href="">0</a></td>
                                      <td><a href="">0</a></td>
                                      <td><a href="">0</a></td>
                                      <td><a href="">0</a> </td>
                                      <td><a href="">0</a> </td>
                                      <td><a href="">0</a></td>
                                  </tr>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <td colspan="2" style="text-align:center">Advance Search</td>
                                      <td colspan="5"><input type="number" class="form-control" name="id" placeholder="Enter Award Id"></td>
                                      <td colspan="3">
                                        <!-- <button type="submit" class="btn btn-success form-control waves-effect waves-light waves-round">Submit</button> -->
                                      </td>
                                  </tr>
                              </tfoot>
                          </table>
                      </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

 <div class="section-body bg-success">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-success d-flex justify-content-center">
                    <h4 style="color: white;">I GRAD SUBMISSION</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="">
        <section class="section">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ "I Grade Student" }}</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="search" class="search-inp form-control" id="myInputTextField" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">                 
                    <div class="table-responsive">
                      
                      <form method="post" action="https://e.lgu.edu.pk/result/AdvanceSearch">
                           <table class="table table-striped table-hover table-datatable
                       form-control-sm" id="tableExport">
                             <!--  <thead>
                                  <tr>
                                      <th colspan="10" class="bg-danger" style="text-align:center;color:white;"><b>EXAM SUBMISSION</b></th>
                                  </tr>
                              </thead> -->
                              <tbody>
                                <tr>
                                    <td>ExamType</td>
                                    <td>Total Applications</td>
                                    <td>Pending</td>
                                    <td>HoD</td>
                                    <td>Dean</td>
                                    <td>CoE</td>
                                    <td>Rejected</td>
                                    <td>Hod Rejected</td>
                                    <td>Dean Rejected</td>
                                    <td>ELIGIBLE APPLICATIONS</td>
                                    <td>MARKS-UPDATED</td>
                                    <td>MARKS-PENDING</td>
                                </tr>
                                <tr>
                                    <td>Mid-Term</td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    
                                </tr>
                                <tr>
                                    <td>Final-Term</td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                    <td><a href="">0</a></td>
                                   

                                </tr>
                            </tbody>
                             
                          </table>
                      </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
    
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net"></a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
<!-- <script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
 -->
@endsection   
