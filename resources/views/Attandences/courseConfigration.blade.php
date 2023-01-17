@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 

                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $semesterCourse->course->ID }}">
                    <div class="form-group">
                      <label>Course Code</label>
                      <input type="text" class="form-control" value="{{ $semesterCourse->course->CourseCode }} "required readonly>
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input type="text"  class="form-control" value="{{ $semesterCourse->course->CourseName }}" required readonly>
                    </div>
                    <div class="form-group">
                      <label>Final Term %</label>
                      <input type="tel" name="FinalTerm" class="form-control" value="{{ $semesterCourse->course->CreditHours }}" required>
                    </div>
                    <div class="form-group">
                      <label>Mid Term %</label>
                      <input type="tel" name="MidTerm" class="form-control" value="{{ $semesterCourse->course->CreditHours }}" required>
                    </div>
                   <div class="form-group">
                      <label>Quiz %</label>
                      <input type="tel" name="Quiz" class="form-control" value="{{ $semesterCourse->course->CreditHours }}" required>
                    </div>
                    <div class="form-group">
                      <label>Assignment % </label>
                      <input type="tel" name="Assignment" class="form-control" value="{{ $semesterCourse->course->CreditHours }}" required>
                    </div>
                    <div class="form-group">
                      <label>Class Participation %</label>
                      <input type="tel" name="ClassParticipation" class="form-control" value="{{ $semesterCourse->course->CreditHours }}" required>
                    </div>
                   
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
    
                
@include('Forms.formFooter')   

@endsection



      