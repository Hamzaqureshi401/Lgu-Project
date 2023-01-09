@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 

                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $courses->ID }}">
                    <div class="form-group">
                      <label>Course Code</label>
                      <input type="text" name="CourseCode" class="form-control" value="{{ $courses->CourseCode }} "required>
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input type="text" name="CourseName" class="form-control" value="{{ $courses->CourseName }}" required>
                    </div>
                    <div class="form-group">
                      <label>Credit Hours</label>
                      <input type="number" name="CreditHours" class="form-control" value="{{ $courses->CreditHours }}" required>
                    </div>
                    <div class="form-group">
                      <label>Lecture Type</label>
                      <input type="text" name="LectureType" class="form-control" value="{{ $courses->LectureType }}" required>
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
    
                
@include('Forms.formFooter')   
@include('js.form_submit_script')             
@endsection



      