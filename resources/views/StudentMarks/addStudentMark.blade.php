@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                   
                     <div class="form-group">
                      <label>Semester Course</label>
                      <select class="form-control" name="SemCourses_ID"  required>
                        @foreach($semesterCourses as $semesterCourse)
                        <option value="{{ $semesterCourse->ID }}">{{ $semesterCourse->semester->SemSession }} / {{ $semesterCourse->course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>

                     <div class="form-group">
                      <label>Obtained Marks</label>
                      <input type="number" name="ObtainedMarks" class="form-control" >
                    </div>

                    <div class="form-group">
                      <label>Enrolled</label>
                      <select class="form-control" name="Enroll_ID"  required>
                        @foreach($enrollments as $enrollment)
                        <option value="{{ $enrollment->ID }}">{{ $enrollment->student->Std_FName }} {{ $enrollment->student->Std_LName }}</option>
                        @endforeach
                      </select>
                    </div>

                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      