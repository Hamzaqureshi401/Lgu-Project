@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                    <input type="hidden" name="id" value="{{ $semesterDetail->ID }}">
                 <div class="card-body">
                   <div class="form-group">
                      <label>Degree</label>
                      <select class="form-control" name="Degree_ID"  >
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->ID }}" {{ $degree->ID == $semesterDetail->Degree_ID ? 'selected' : '' }}>
                          {{ $degree->DegreeName }}
                        </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}"{{ $semester->ID == $semesterDetail->Sem_ID ? 'selected' : '' }}>{{ $semester->SemSession }} </option>
                        @endforeach
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label>Semester Fee</label>
                      <input type="text" name="SemesterFee" class="form-control" value="{{ $semesterDetail->SemesterFee }}"required>
                    </div>
                    <div class="form-group">
                      <label>Per Semester</label>
                      <input type="number" name="PerSemester" class="form-control" value="{{ $semesterDetail->PerSemester }}"required>
                    </div>
                    <div class="form-group">
                      <label>Per Course</label>
                      <input type="text" name="PerCourse" class="form-control" value="{{ $semesterDetail->PerCourse }}"required>
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
          
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      