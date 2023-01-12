@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  


                  <div class="card-body">
                  <input type="hidden" name="id" value="{{ $timeTable->ID }}">
                    <div class="form-group">
                      <label>Semester / Courses</label>
                      <select class="form-control" name="SemCourse_ID"  >
                        @foreach($semesterCourses as $semestercourse)
                        <option value="{{ $semestercourse->ID }}">{{ $semestercourse->semester->SemSession }} / {{ $semestercourse->course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Day</label>
                      <input type="number" name="Day" class="form-control" value="{{$timeTable->Day}}">
                    </div>
                    <div class="form-group">
                      <label>Start Time</label>
                      <input type="time" name="StartTime" class="form-control" value="{{$timeTable->StartTime}}">
                    </div>
                    <div class="form-group">
                      <label>End Time</label>
                      <input type="time" name="EndTime" class="form-control" value="{{$timeTable->EndTime}}">
                    </div>
                    <div class="form-group">
                      <label>Building</label>
                      <input type="text" name="Building" class="form-control"  value="{{$timeTable->Building}}">
                    </div>
                    <div class="form-group">
                      <label>Room</label>
                      <input type="number" name="Room" class="form-control"  value="{{$timeTable->Room}}">
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                      <input type="number" name="Type" class="form-control"  value="{{$timeTable->Type}}">
                    </div>
                    <div class="form-group">
                      <label>Employee</label>
                      <select class="form-control" name="Emp_ID"  >
                        @foreach($employees as $employee)
                        <option value="{{ $employee->ID }}">{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      