@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                    <input type="hidden" name="id" value="{{ $semesterDetail->ID }}">
                 <div class="card-body">
                   <div class="form-group">
                      <label>Degree / Course</label>
                      <select class="form-control select2" name="DegBatches_ID"  >
                        @foreach($degreeCourses as $degreeCourse)
                        <option value="{{ $degreeCourse->ID }}" {{ $semesterDetail->DegBatches_ID == $degreeCourse->ID ? 'selected' : '' }}>{{ $degreeCourse->degree->DegreeName }} / {{ $degreeCourse->batch->SemSession }} </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control select2" name="Sem_ID"  >
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
                      <label>Tution Fee</label>
                      <input type="text" name="Tuition_Fee" class="form-control" value="{{ $semesterDetail->Tuition_Fee }}"required>
                    </div>
                     
                    <div class="form-group">
                      <label>Magazine Fee</label>
                      <input type="number" name="Magazine_Fee" class="form-control" value="{{ $semesterDetail->Magazine_Fee }}">
                    </div>
                    <div class="form-group">
                      <label>Exam Fee</label>
                      <input type="number" name="Exam_Fee" class="form-control" value="{{ $semesterDetail->Exam_Fee }}">
                    </div>
                     <div class="form-group">
                      <label>Society Fee</label>
                      <input type="number" name="Society_Fee" class="form-control" value="{{ $semesterDetail->Society_Fee }}">
                    </div>
                    <div class="form-group">
                      <label>Misc Fee</label>
                      <input type="number" name="Misc_Fee" class="form-control" value="{{ $semesterDetail->Misc_Fee }}">
                    </div>
                     <div class="form-group">
                      <label>Registration Fee</label>
                      <input type="number" name="Registration_Fee" class="form-control" value="{{ $semesterDetail->Registration_Fee }}">
                    </div>
                    <div class="form-group">
                      <label>Practical charges</label>
                      <input type="number" name="Practical_charges" class="form-control" value="{{ $semesterDetail->Practical_charges }}">
                    </div>
                     <div class="form-group">
                      <label>SSports Fund</label>
                      <input type="number" name="Sports_Fund" class="form-control" value="{{ $semesterDetail->Sports_Fund }}">
                    </div>
                    <div class="form-group">
                      <label>Fee Type</label>
                      <input type="number" name="FeeType" class="form-control" value="{{ $semesterDetail->FeeType }}">
                    </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
          
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      