@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
       <!-- Main Content -->
      
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-2 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Booked</h5>
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
                          <h2 class="mb-3 font-18">{{ $enrollment }}</h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
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
                          <h5 class="font-15">SCHOLARSHIP</h5>
                          <h2 class="mb-3 font-18">128</h2>
                          <p class="mb-0"><span class="col-green">18%</span>
                            Increase</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/booked.jpg" alt="">
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
                          <h5 class="font-15">PREVIOUS BALANCES</h5>
                          <h2 class="mb-3 font-18">$48,697</h2>
                          <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/scholarship.png"  style="margin-top: 20px; margin-bottom: 20px;" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">RECIEVEABLE</h5>
                          <h2 class="mb-3 font-18">$48,697</h2>
                          <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/balance.png"  style="max-width: 100px; max-height: 100px" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        

<!-- @include('Dean.charts') -->

          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="row">
                  <div class="col-12">
                <div class="card">
                  <div class="card-header bg-danger d-flex justify-content-center">
                    <h4 style="color: white;">Collection Summary</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> Create Short Attandence Report</button> -->
                  </div>
                </div>
              </div>
                <div class="card-body col-6">
                  <div class="card-header">
                  <h4>New Admission Student</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Date</th>
                        <th>Amount</th>
                       
                      </tr>
                      <tr>
	                      <td>{{ "Status" }}</td>
	                      <td>{{ "Status" }}</td>
	                     
                      </tr>                     
                    </table>
                  </div>
                </div>

                <div class="card-body col-6">
                  <div class="card-header">
                  <h4>Regular Student</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Amount</th>
                        <th>Date</th>
                        
                      </tr>
                      <tr>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                       
                      </tr>                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>

           <div class="row">
            <div class="col-12">
              <div class="card">
                 <div class="col-12">
                <div class="card">
                  <div class="card-header bg-info d-flex justify-content-center">
                    <h4 style="color: white;">Category Wise</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> Create Short Attandence Report</button> -->
                  </div>
                </div>
              </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
	                        <th>Category Wise</th>
	                        <th>Students</th>
	                        <th>Amount Booked  </th>
	                        <th>Previuos Balances  </th>
                          <th>Receivable</th>
                          <th>Scolarship</th>
                          <th>Received</th>
                          
                      </tr>
                      <tr>
	                      <td>{{ "Status" }}</td>
	                      <td>{{ "Status" }}</td>
	                      <td>{{ "Status" }}</td>
	                      <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-12">
              <div class="card">
                 <div class="col-12">
                <div class="card">
                  <div class="card-header bg-warning d-flex justify-content-center">
                    <h4 style="color: white;">Department Wise</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> Create Short Attandence Report</button> -->
                  </div>
                </div>
              </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                         <th>Department Wise</th>
                          <th>Students</th>
                          <th>Amount Booked  </th>
                          <th>Previuos Balances  </th>
                          <th>Receivable</th>
                          <th>Scolarship</th>
                          <th>Received</th>
                      </tr>
                      <tr>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                        <td>{{ "Status" }}</td>
                       
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


     


        </section>
    
      
   
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>

@endsection   
