@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Course Code</label>
                      <input type="text" name="CourseCode" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input type="text" name="CourseName" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Credit Hours</label>
                      <input type="number" name="CreditHours" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Lecture Type</label>
                      <input type="text" name="LectureType" class="form-control"required>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      