@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')


      <div class="">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
             
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="padding-20">

                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                       
                       
                        <form method="post" class="needs-validation">
                          
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-4 col-12">
                                <a href="{{ route('assessment.Detail')}}" class="btn btn-sm btn-secondary form-control">Assesment Detail</a>
                              </div>

                               <div class="form-group col-md-4 col-12">
                                <a href="{{ route('student.365View')}}" class="btn btn-sm btn-warning form-control">Student 365</a>
                              </div>

                               <div class="form-group col-md-4 col-12">
                                <a href="{{ route('department.FactSheet')}}" class="btn btn-sm btn-success form-control">Department Fact Sheet</a>
                              </div>
                             
                              </div>

                              <div class="row">
                              <div class="form-group col-md-4 col-12">
                                <a href="{{ route('deg.Semester.Wise.Report')}}" class="btn btn-sm btn-primary form-control">Deg Semester Wise Report</a>
                              </div>

                               <div class="form-group col-md-4 col-12">
                                <a href="{{ route('student.Attendance')}}" class="btn btn-sm btn-danger form-control">Student Attendence</a>
                              </div>

                               <div class="form-group col-md-4 col-12">
                                <a href="{{ route('course.Time.Table')}}" class="btn btn-sm btn-info form-control">Check Class Time Table</a>
                              </div>
                             
                              </div>

                              <div class="row">
                              <div class="form-group  col-12">
                                <a href="" class="btn btn-sm btn-light form-control">Courses Time Table</a>
                              </div>

                              
                             
                              </div>
                            </div>
                
                        </form>
                      </div>
       
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>



@endsection   
