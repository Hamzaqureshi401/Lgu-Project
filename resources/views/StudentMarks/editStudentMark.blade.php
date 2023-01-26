@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 
                   <div class="card-body">
                   <input type="hidden" name="id" value="{{ $studentMark->ID }}">
                     <div class="form-group">
                      <label>Semester Course</label>
                      <select class="form-control" name="SemCourses_ID"  required>
                        @foreach($semesterCourses as $semesterCourse)
                        <option value="{{ $semesterCourse->ID }}"  {{ $studentMark->SemCourse_ID == $semesterCourse->ID ? 'selected' : '' }}>{{ $semesterCourse->semester->SemSession }} / {{ $semesterCourse->course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>

                     <div class="form-group">
                      <label>Obtained Marks</label>
                      <input type="number" name="ObtainedMarks" class="form-control" value="{{ $studentMark->ObtainedMarks }}">
                    </div>

                    <div class="form-group">
                      <label>Enrolled</label>
                      <select class="form-control" name="Enroll_ID"  required>
                        @foreach($enrollments as $enrollment)
                        <option value="{{ $enrollment->ID }}"  {{ $studentMark->Enroll_ID == $enrollment->ID ? 'selected' : '' }}>{{ $enrollment->student->Std_FName }} {{ $enrollment->student->Std_LName }}</option>
                        @endforeach
                      </select>
                    </div>

                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>

@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      