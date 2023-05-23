@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')          
 <div class="card-body">       
                <input type="hidden" name="SemCourse_ID" value="{{ $semesterCourse->ID }}">
                 <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control select2" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}" {{ $semesterCourse->Sem_ID == $semester->ID ? 'selected' : '' }}>{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                   <!--  <div class="form-group">
                      <label>Employee</label>
                      <input type="text" name="Emp_ID" value="{{ $semesterCourse->Emp_ID }}">
                     <input type="text" name=""  class="form-control" value="{{ $semesterCourse->employee->Emp_FirstName ?? '--' }}" readonly>
                    </div> -->
                    <div class="form-group">
                      <label>Campus Limit</label>
                      <input type="number" name="CampusLimit" value="{{ $semesterCourse->CampusLimit }}" class="form-control">
                    </div>

                     <!-- <div class="form-group">
                      <label>Degree / Course</label>
                      <select class="form-control select2" name="DegCourse_ID"  >
                        @foreach($degreeCourses as $degreeCourse)
                        <option value="{{ $degreeCourse->ID }}" {{ $semesterCourse->DegBatches_ID == $degreeCourse->ID ? 'selected' : '' }}>{{ $degreeCourse->degree->DegreeName }} / {{ $degreeCourse->batch->SemSession }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Section</label>
                      <input type="text" name="Section" value="{{ $semesterCourse->Section }}" class="form-control" onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                    </div> -->
                    <div class="form-group">
                      <label>Course</label>
                      <select class="form-control select2" name="Course_ID"  >
                        @foreach($courses as $course)
                        <option value="{{ $course->ID }}" {{ $semesterCourse->Course_ID == $course->ID ? 'selected' : '' }}>{{ $course->CourseName }} </option>
                        @endforeach
                      </select>
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
            
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')


      