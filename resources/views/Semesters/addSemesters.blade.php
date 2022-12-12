@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Sem Session</label>
                      <input type="text" name="SemSession" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Year</label>
                      <input type="number" name="Year" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Sem Start Date</label>
                      <input type="Date" name="SemStartDate" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Sem End Date</label>
                      <input type="Date" name="SemEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Enrollment Start Date</label>
                      <input type="Date" name="EnrollmentStartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Enrollment End Date</label>
                      <input type="Date" name="EnrollmentEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Exam Start Date</label>
                      <input type="Date" name="ExamStartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Exam End Date</label>
                      <input type="Date" name="ExamEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I mid StartDate</label>
                      <input type="Date" name="I_mid_StartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I mid EndDate</label>
                      <input type="Date" name="I_mid_EndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I final StartDate</label>
                      <input type="Date" name="I_final_StartDate" class="form-control"required>
                    </div>
                 <div class="form-group">
                      <label>I final EndDate</label>
                      <input type="Date" name="I_final_EndDate" class="form-control"required>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      