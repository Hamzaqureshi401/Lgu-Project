@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                    <div class="form-group">
                      <label>Degree Batch</label>
                      <select class="form-control select2" name="DegBatches_ID"  required>
                        @foreach($degreeBatches as $degreeBatche)
                        <option value="{{ $degreeBatche->ID }}">{{ $degreeBatche->degree->DegreeName ?? '' }} / {{ $degreeBatche->batch->SemSession ?? '' }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester Course </label>
                      <select class="form-control select2" name="SemCourse_ID"  required>
                        @foreach($semesterCourses as $semesterCourse)
                        <option value="{{ $semesterCourse->ID }}">{{ $semesterCourse->semester->SemSession }}/{{ $semesterCourse->course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Class Section </label>
                      <select class="form-control select2" name="Section"  required>
                        @foreach (range('A', 'Z') as $letter)
                    <option value="{{ $letter }}">{{ $letter }} </option>
                    @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Employee </label>
                      <select class="form-control select2" name="Emp_ID"  required>
                        @foreach($employees as $employee)
                        <option value="{{ $employee->ID }}">{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      