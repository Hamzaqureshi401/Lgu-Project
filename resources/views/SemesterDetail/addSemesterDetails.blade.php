@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label>Degree</label>
                      <select class="form-control" name="Degree_ID"  >
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->Degree_ID }}">{{ $degree->DegreeName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->Sem_ID }}">{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Semester No</label>
                      <input type="number" name="SemesterNo" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Semester Fee</label>
                      <input type="number" name="SemesterFee" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Per Semester</label>
                      <input type="number" name="PerSemester" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Per Course</label>
                      <input type="number" name="PerCourse" class="form-control">
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      