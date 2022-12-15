@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                  
                  <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->Sem_ID }}">{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control" name="Emp_ID"  >
                        @foreach($employees as $employee)
                        <option value="{{ $employee->Emp_ID }}">{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Campus Limit</label>
                      <input type="number" name="CampusLimit" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Degree / Course</label>
                      <select class="form-control" name="DegCourse_ID"  >
                        @foreach($degreeCourses as $degreeCourse)
                        <option value="{{ $degreeCourse->DegCourses_ID }}">{{ $degreeCourse->DegreeName }} / {{ $degreeCourse->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Quiz Weightage</label>
                      <input type="text" name="QuizWeightage" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Assignment Weightage</label>
                      <input type="text" name="AssignmentWeightage" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Presentation Weightage</label>
                      <input type="text" name="PresentationWeightage" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Mid Weightage</label>
                      <input type="text" name="MidWeightage" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>FinalWeightage</label>
                      <input type="text" name="FinalWeightage" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Section</label>
                      <input type="text" name="Section" class="form-control">
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      