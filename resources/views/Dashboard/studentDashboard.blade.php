@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
       <!-- Main Content -->
      @php 
      $user = explode('/' , Session::get('user')) ?? '--';
      @endphp

        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">ENROLLED SEMESTER</h5>
                          <h2 class="mb-3 font-18">{{ $user[0] }}</h2>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <!-- <img src="assets/img/banner/1.png" alt=""> -->
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
                          <h5 class="font-15">OUTSTANDING</h5>
                          @if(!empty($challans->Amount))
                          <h2 class="mb-3 font-18">{{$challans->sum('Amount') ?? '--'}}</h2>
                          @else
                          <h2 class="mb-3 font-18">{{"0"}}</h2>
                          @endif
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <!-- <img src="assets/img/banner/outstanding.jpg" alt=""> -->
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
                          <h5 class="font-15">CHALLANS</h5>
                          
                          <a href="{{ route('all.Challans') }}" class="btn btn-sm btn-success">Get Challan</a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <!-- <img src="assets/img/banner/inv.png" alt="" style="max-width: 105px; max-height: 150px;"> -->
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
                          <h5 class="font-15">USER</h5>
                          <h2 class="mb-3 font-18">{{ Session::get('user') }}</h2>
                          <p class="mb-0"><span class="col-green">{{ Session::get('Std')->Std_FName }} {{ Session::get('std')->Std_LName ?? '--'}} </span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <!-- <img src="assets/img/banner/4.png" alt=""> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<!-- @include('Dean.charts') -->

          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-header">
                  <h4>Academic Calender</h4>
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
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Activity</th>
                        <th>Date</th>
                      </tr>
                      <tr>
                        <th>{{ 'Semester Start'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->SemStartDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Semester End'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->SemEndDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Enrollment Start'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->EnrollmentStartDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Enrollment End'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->EnrollmentEndDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Exam Start'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->ExamStartDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Exam End'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->ExamEndDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Mid Start'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->I_mid_StartDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Mid End'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->I_mid_EndDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Final Start'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->I_final_StartDate)) ?? '--'}}</th>
                      </tr>
                      <tr>
                        <th>{{ 'Final End'}}</th>
                        <th>{{ date('Y-m-d', strtotime($semester->I_final_EndDate)) ?? '--'}}</th>
                      </tr>
                                          
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Current Enrollment</h4>
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
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                            <th>COURSE NAME</th>
                            <th>TEACHER NAME</th>
                            <th>T/L</th>
                            <th>P</th>
                            <th>A</th>
                            
                            <th>CONSOLIDATE %</th>
                        </tr>
                        @foreach($enrollments as $enrollment)
                        @php 
                       
                        $present =  $attendences->where(['Enroll_ID' => $enrollment->ID , 'Status' => 1])->count();
                        $absent = $attendences->where(['Enroll_ID' => $enrollment->ID, 'Status' => 0])->count() ;
                        @endphp
                        <tr>
                            <td>{{ $enrollment->semesterCourse->course->CourseName ?? '--' }}</td>
                            <td>{{  $enrollment->semesterCourse->emplyee->Emp_FirstName  ?? '--'}}  {{  $enrollment->semesterCourse->emplyee->Emp_LastName ?? '--' }}</td>
                            <td>{{ "Status" }}</td>
                            <td>{{ $present }}</td>
                             <td>{{ $absent }}</td>
                             @if($present != 0)
                              <td>{{ ($present/($absent + $present))*100 }} %</td>
                              @else
                              <td>{{ '--' }}</td>
                              @endif
                        </tr>
                        @endforeach
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
