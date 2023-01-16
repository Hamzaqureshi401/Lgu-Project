@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')


@endpush

      <div class="">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <div class="card-body 
                        fas fa-book-reader " style="font-size: 80px;" 
                        ></div>
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <h6>Course : {{ $semetserCourse->course->CourseName ?? '--'}}</h6>
                        <h6>Course Code: {{ $semetserCourse->course->CourseCode ?? '--'}}</h6>
                        <h6>Section : {{ $semetserCourse->Section ?? '--'}}</h6>
                        <h6>Lecture : {{ $semetserCourse->CourseName ?? '--'}}</h6>
                        <h6>Quiz : {{ $semetserCourse->CourseName ?? '--'}}</h6>
                        <h6>Assignment : {{ $semetserCourse->CourseName ?? '--'}}</h6>
                        <h6>Makeup Classes : {{ $semetserCourse->CourseName ?? '--'}}</h6>
                      </div> 
                      <!-- <div class="author-box-job">Web Developer</div> -->
                    </div>
                   
                  </div>
                </div>
                
               
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                   
                    <div class="tab-content tab-bordered" id="myTab3Content">
                     
                     <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                              <div class="form-group col-md-6 col-12">
                               <a href="{{ route('clasees.Shedule' , $semetserCourse->ID)}}" class="btn btn-success btn-block " style="color:white;">Mark Attandence</a>
                              </div>
                              <div class="form-group col-md-6 col-12">
                               <a href="{{ route('view.Emp.Attendence' )}}" class="btn btn-info btn-block" style="color:white;">View Attandence</a>
                              </div>
                            </div>
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
