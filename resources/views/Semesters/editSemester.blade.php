@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
<div class="card-body">
                    <input type="hidden" name="id" value="{{ $semester->ID }}">
                  <div class="form-group">
                      <label>Sem Session</label>
                      <input type="text" value="{{ $semester->SemSession }}" name="SemSession" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Year</label>
                      <input type="number" value="{{ $semester->Year }}" name="Year" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Sem Start Date</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->SemStartDate))  }}" name="SemStartDate" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Sem End Date</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->SemEndDate ))  }}" name="SemEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Enrollment Start Date</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->EnrollmentStartDate)) }}" name="EnrollmentStartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Enrollment End Date</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->EnrollmentEndDate))  }}" name="EnrollmentEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Exam Start Date</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->ExamStartDate))  }}" name="ExamStartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Exam End Date</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->ExamEndDate))  }}" name="ExamEndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I mid StartDate</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->I_mid_StartDate))  }}" name="I_mid_StartDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I mid EndDate</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->I_mid_EndDate))  }}" name="I_mid_EndDate" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>I final StartDate</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->I_final_StartDate)) }}" name="I_final_StartDate" class="form-control"required>
                    </div>
                 <div class="form-group">
                      <label>I final EndDate</label>
                      <input type="Date" value="{{ date('Y-m-d', strtotime($semester->I_final_EndDate)) }}" name="I_final_EndDate" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Current Semester Status</label>
                      <select class="form-control select2" name="Current_Semester">
                              <option {{$semester->Current_Semester==0?"required":" "}} value="0">0</option>
                              <option {{$semester->Current_Semester==1?"required":" "}} value="1">1</option>
      
                      </select>
                  </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              
          </div>      
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      