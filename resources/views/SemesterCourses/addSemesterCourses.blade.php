@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                  
                  <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control select2" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}">{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Employee</label>
                      <select class="form-control select2" name="Emp_ID"  >
                        @foreach($employees as $employee)
                        <option value="{{ $employee->ID }}">{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Campus Limit</label>
                      <input type="number" name="CampusLimit" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Degree / Batch</label>
                      <select class="form-control select2" name="DegCourse_ID"  >
                        @foreach($degreeCourses as $degreeCourse)
                        <option value="{{ $degreeCourse->ID }}">{{ $degreeCourse->DegreeName }} / {{ $degreeCourse->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Section</label>
                      <input type="text" name="Section" class="form-control" maxlength="1" onkeydown="return /[a-z]/i.test(event.key)">
                    </div>
                    <div class="form-group">
                      <label>Course</label>
                      <select class="form-control select2" name="Course_ID"  >
                        @foreach($courses as $course)
                        <option value="{{ $course->ID }}">{{ $course->CourseName }} </option>
                        @endforeach
                      </select>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      