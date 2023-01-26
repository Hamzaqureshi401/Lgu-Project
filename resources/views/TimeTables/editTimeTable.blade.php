@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  


                  <div class="card-body">
                  <input type="hidden" name="id" value="{{ $timeTable->ID }}">
                   


                      <div class="form-group">
                      <label>Semester / Courses</label>
                      <select class="form-control select2" name="SemCourse_ID"  required>
                        @foreach($semesterCourses as $semesterCourse)
                        <option value="{{ $semesterCourse->ID }}" {{ $semesterCourse->ID == $timeTable->SemCourse_ID ? 'selected' : '' }}>{{ $semesterCourse->semester->SemSession }} / {{ $semesterCourse->course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>

                   
                      @php 
                      $days = [
                      'Monday' , 
                      'Tuesday' , 
                      'Wednesday' , 
                      'Thursday' , 
                      'Friday' , 
                      'Saturday' , 
                      'Sunday'
                      ];
                      @endphp
                     <div class="form-group">
                      <label>Day</label>
                      <select class="form-control select2" name="Day"  value="{{$timeTable->Day}}">
                        @foreach($days as $day)
                        <option value="{{ $day }}" {{ $day == $timeTable->Day ? 'selected' : '' }}>{{ $day}}</option>
                        @endforeach
                      </select>
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
                      <select class="form-control select2" name="Emp_ID"  >
                        @foreach($employees as $employee)
                        <option value="{{ $employee->ID }}"  {{ $employee->ID == $timeTable->Emp_ID ? 'selected' : '' }}>{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      