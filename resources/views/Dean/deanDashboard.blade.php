@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
       <!-- Main Content -->
      
        <section class="section">
          <div class="row ">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <a href="{{ route('allowed.EmpCourses') }}">
                          <h5 class="font-15">Courses Offered</h5>
                          <h2 class="mb-3 font-18">{{ $course }}</h2>
                          </a>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <!-- <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                       
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <a href="{{ route('allowed.EmpStudent') }}">
                          <h5 class="font-15"> Enrolled Students</h5>
                          <h2 class="mb-3 font-18">{{ $enrollment }}</h2>
                          </a>
                          
                        </div>
                      </div>
                      
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                       <!--  <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <a href="{{ route('allowed.SemesterCourses') }}">
                          <h5 class="font-15">Courses Enrollment</h5>
                          <h2 class="mb-3 font-18">{{ $enrollment }}</h2>
                        </a>
                          
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <!-- <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div> -->
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
                <div class="card-header">
                  <h4>New Students Admission</h4>
                  <div class="card-header-form">
                    <form>
                     <!--  <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div> -->
                    </form>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive px-4 py-4">
                    <table class="table table-striped dataTable">
                      <thead>
                     <tr>
                        <th>Student</th>
                        <th>Status</th>
                        <th>Degree</th>
                        <th>Semester</th>
                        <th>City</th>

                      </tr>
                      </thead>
                      <tbody>
                      @foreach($std as $student)
                      <tr>
                        <td>{{ $student->Std_FName ?? '--' }} 
                            {{ $student->Std_LName ?? '--' }}</td>
                        <td><p class="badge badge-info badge-shadow" style="color:white;">{{ $student->Status ?? '--' }}</p></td>
                        <td>{{ $student->degree->DegreeName ?? '--' }}</td>
                        <td>{{ $student->CurrentSemester ?? '--' }}</td>
                        <td>{{ $student->City ?? '--' }}</td>
                      </tr> 
                      @endforeach
                      </tbody>                   
                    </table>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          
           <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header ">
                  <h4>Attendance</h4>
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
                <div class="card-body px-4 py-4">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>100-80</th>
                        <th>80-75</th>
                        <th>75-70</th>
                        <th>70-65</th>
                        <th>65-60</th>
                        <th>Lessthen 60</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                   <tr>
                      <td>{{ $att['100-80']}}</td> 
                      <td>{{ $att['80-75']}}</td> 
                      <td>{{ $att['75-70']}}</td> 
                      <td>{{ $att['70-65']}}</td> 
                      <td>{{ $att['65-60']}}</td> 
                      <td>{{ $att['Lessthen 60']}}</td>    
                      </tr>
                      </tbody>                    
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


           <div class="row">
              <div class="col-xl-3 col-lg-6 degreeWise">
                <div class="card l-bg-green">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Degree Wise Students</h4>
                      <span>{{$degrees->pluck('id')->count()}}</span>
                      <!-- <div class="progress mt-1 mb-1" data-height="8">
                        <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                        <span class="text-nowrap">Since last month</span>
                      </p> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 departmentWise">
                <div class="card l-bg-cyan">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Dtp Wise Students</h4>
                      <span>{{$departments->pluck('id')->count()}}</span>
                     <!--  <div class="progress mt-1 mb-1" data-height="8">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                        <span class="text-nowrap">Since last month</span>
                      </p> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 genderWise">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Gender Wise Strength</h4>
                      <span>{{$degreeBatches->pluck('id')->count()}}</span>
                      <!-- <div class="progress mt-1 mb-1" data-height="8">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                        <span class="text-nowrap">Since last month</span>
                      </p> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 degreeWiseShort">
                <div class="card l-bg-orange">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Deg Ws Sht-Att Strnth</h4>
                      <span>{{'0'}}</span>
                     <!--  <div class="progress mt-1 mb-1" data-height="8">
                        <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                        <span class="text-nowrap">Since last month</span>
                      </p> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="degreeW" style="display: none;">
            @include('Dean.degreeWise')
          </div>
          <div class="departmentW" style="display: none;">
             @include('Dean.departmentWise')>
           </div>
              <div class="genderW" style="display: none;">
              @include('Dean.genderWise')
            </div>
               <div class="degreeWiseS" style="display: none;">
               @include('Dean.degreeWiseShort-Att Strength')
             </div>

</div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        
    <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
   <script type="text/javascript">
    var toggle = '';
    $(document).on('click', '.degreeWise', function() {
      if(toggle != ''){
        toggle.toggle();
      }
      toggle = $('.degreeW');
        toggle.toggle();
    });
    $(document).on('click', '.departmentWise', function() {
      if(toggle != ''){
        toggle.toggle();
      }
      toggle = $('.departmentW');
        toggle.toggle();
    });
    $(document).on('click', '.genderWise', function() {
      if(toggle != ''){
        toggle.toggle();
      }
      toggle = $('.genderW');
        toggle.toggle();
    });
    $(document).on('click', '.degreeWiseShort', function() {
      if(toggle != ''){
        toggle.toggle();
      }
      toggle = $('.degreeWiseS');
        toggle.toggle();
    });
    
   </script>   
   
 

@endsection   
