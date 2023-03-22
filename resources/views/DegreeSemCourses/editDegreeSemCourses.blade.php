@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                 <div class="card-body">
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{ $degreeSemCoursees->ID }}">
                      <label>Degree Batch</label>
                      <select class="form-control select2" name="DegBatches_ID"  required>
                        @foreach($degreeBatches as $degreeBatche)
                        <option value="{{ $degreeBatche->ID }}"
                          {{ $degreeBatche->ID == $degreeSemCoursees->DegBatches_ID ? 'selected' : '' }}
                          >{{ $degreeBatche->degree->DegreeName ?? '--' }} / {{ $degreeBatche->batch->SemSession  ?? '--'}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester Course</label>
                      <select class="form-control select2" name="SemCourse_ID"  required>
                        @foreach($semesterCourses as $semesterCourse)
                        <option 
                        value="{{ $semesterCourse->ID }}" 
                        {{ $degreeSemCoursees->SemCourse_ID == $semesterCourse->ID ? 'selected' : '' }}>{{ $semesterCourse->semester->SemSession }}/{{ $semesterCourse->course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>

                     <div class="form-group">
                      <label>Class Section </label>
                      <select class="form-control select2" name="Section"  required>
                        @foreach (range('A', 'Z') as $letter)
                    <option value="{{ $letter }}" {{ $letter == $degreeSemCoursees->Section ? 'selected' : '' }}>{{ $letter }} </option>
                    @endforeach
                      </select>
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
             </form>
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')


      