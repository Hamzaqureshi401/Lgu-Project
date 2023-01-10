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



      