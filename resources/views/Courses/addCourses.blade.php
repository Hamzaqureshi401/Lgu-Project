@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                    <div class="form-group">
                      <label>Course Code</label>
                      <input type="text" name="CourseCode" class="form-control" value="{{ old('CourseCode') }}">
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input type="text" name="CourseName" class="form-control" value="{{ old('CourseName') }}">
                    </div>
                    <div class="form-group">
                      <label>Credit Hours</label>
                      <input type="number" name="CreditHours" class="form-control"  value="{{ old('CreditHours') }}">
                    </div>
                    <div class="form-group">
                      <label>Lecture Type</label>
                      <input type="text" name="LectureType" class="form-control"  value="{{ old('LectureType') }}">
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                
@include('Forms.formFooter')   
@include('js.form_submit_script')             
@endsection




      