@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    

                     <div class="form-group">
                      <label>Degree / Batch</label>
                      <select class="form-control select2" name="DegBatches_ID"  >
                        @foreach($degreeCourses as $degreeCourse)
                        <option value="{{ $degreeCourse->ID }}">{{ $degreeCourse->DegreeName }} / {{ $degreeCourse->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control select2" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}">{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                     <div class="form-group">
                      <label>Semester Fee</label>
                      <input type="number" name="SemesterFee" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tutuion Fee</label>
                      <input type="number" name="Tuition_Fee" class="form-control">
                    </div>
                    <!--  <div class="form-group">
                      <label>Semester Fee</label>
                      <input type="number" name="SemesterFee" class="form-control">
                    </div> -->
                    <div class="form-group">
                      <label>Magazine Fee</label>
                      <input type="number" name="Magazine_Fee" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Exam Fee</label>
                      <input type="number" name="Exam_Fee" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Society Fee</label>
                      <input type="number" name="Society_Fee" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Misc Fee</label>
                      <input type="number" name="Misc_Fee" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>Registration Fee</label>
                      <input type="number" name="Registration_Fee" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Practical charges</label>
                      <input type="number" name="Practical_charges" class="form-control">
                    </div>
                     <div class="form-group">
                      <label>SSports Fund</label>
                      <input type="number" name="Sports_Fund" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Fee Type</label>
                      <input type="number" name="FeeType" class="form-control">
                    </div>
                   
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      