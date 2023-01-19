@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 

                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $semesterCourse->ID }}">
                    <div class="form-group">
                      <label>Course Code</label>
                      <input type="text" class="form-control" value="{{ $semesterCourse->course->CourseCode }} " readonly>
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input type="text"  class="form-control" value="{{ $semesterCourse->course->CourseName }}"  readonly>
                    </div>
                    <div class="form-group">
                      <label>Final Term %</label>
                      <input type="number" name="FinalTerm" class="form-control" value="{{ 50 }}" placeholder="Enter Total Marks"  readonly>
                    </div>
                    <div class="form-group">
                      <label>Mid Term %</label>
                      <input type="number" name="MidTerm" class="form-control" value="25" placeholder="Enter Total Marks"  readonly>
                    </div>

                    @if(empty($SemesterCourseWeightage->first()))

                   <div class="form-group">
                      <label>Quiz %</label>
                      <input type="number" name="Quiz" class="form-control" value="{{old('Quiz')}}" placeholder="Enter Total Marks" >
                    </div>
                    <div class="form-group">
                      <label>Assignment % </label>
                      <input type="number" name="Assignment" class="form-control" value="{{old('Assignment')}}" placeholder="Enter Total Marks" >
                    </div>
                    <div class="form-group">
                      <label>Class Participation %</label>
                      <input type="number" name="ClassParticipation" class="form-control" value="{{old('ClassParticipation')}}" placeholder="Enter Total Marks" >
                    </div>
                     <div class="form-group">
                      <label>Attandence %</label>
                      <input type="number" name="Attandence" class="form-control" value="{{old('Attandence')}}" placeholder="Enter Total Marks" >
                    </div>
                    <div class="form-group">
                      <label>Lecture Type </label>
                      <input type="number" name="LectureType" class="form-control" value="0" placeholder="Enter Total Marks" >
                    </div>

                   <input type="hidden" name="type" value="FinalTerm-MidTerm-Quiz-Assignment-ClassParticipation-Attandence">
                   
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               
               @else
               @foreach($SemesterCourseWeightage as $SemesterCourseWeightag)
                <div class="form-group">
                      <label>{{$SemesterCourseWeightag->Type}} %</label>
                      <input type="number" name="Quiz" class="form-control" value="{{ $SemesterCourseWeightag->Weightage }}" placeholder="Enter Total Marks" readonly>
                    </div>
                           
               
               @endforeach
               @endif
    </div>
                
@include('Forms.formFooter')   

@endsection



      