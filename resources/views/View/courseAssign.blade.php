@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
<div class="card-body">
   <div class="row">
      <div class="form-group col-md-6 col-12">
         <label>Course Code</label>
         <input type="text"  class="form-control" value="{{ $courses->CourseCode }} "readonly>
      </div>
      <div class="form-group col-md-6 col-12">
         <label>Course Name</label>
         <input type="text"  class="form-control" value="{{ $courses->CourseName }}" readonly>
      </div>
      <div class="form-group col-md-6 col-12">
         <label>Credit Hours</label>
         <input type="tel" id="CreditHours" data-inputmask="'mask': '9-9-99'" placeholder="Example 9-9-09" maxlength=6 class="form-control" value="{{ $courses->CreditHours }}" readonly>
      </div>
      <div class="form-group col-md-6 col-12">
         <label>Lecture Type</label>
         <input type="text"  class="form-control" value="{{ $courses->LectureType }}" readonly>
      </div>
       <div class="form-group col-md-12 col-12">
         <label>Employee</label>
         <select class="form-control" name="Emp_ID[]"  >
            @foreach($employees as $employee)
            <option value="{{ $employee->ID }}">{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group col-md-6 col-12">
         <label>Section</label>
         <select class="form-control" name="Section"  required>
            @foreach (range('A', 'Z') as $l) 
            <option value="{{ $l }}">{{ $l }}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group col-md-6 col-12">
         <label>Instructions</label>
         <textarea type="text"  class="form-control" value="{{ $courses->LectureType }}"></textarea>
      </div>
   </div>
   <div class="section-body bg-danger">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="card-header bg-danger d-flex justify-content-center">
               <h4 style="color: white;">Merge</h4>
               <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> Create Short Attandence Report</button> -->
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="form-group col-md-2 col-12">
         <label>Course Code</label>
         <div class="pretty p-switch p-slim">
            <input type="checkbox" name="Status[]">
              <div class="state p-success">
                <label></label>
              </div>
            </div>
      </div>

    </div>
  
   <div class="section-body bg-info">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="card-header bg-info d-flex justify-content-center">
               <h4 style="color: white;">Time Table</h4>
               <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> Create Short Attandence Report</button> -->
            </div>
         </div>
      </div>
   </div>
   <div class="row" id="clon">
      @php 
      $days = ['Monday' , 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday' , 'Saturday' , 'Sunday'];
      @endphp
      <div class="form-group col-md-2 col-12">
         <label>Day</label>
         <select class="form-control" name="Day[]"  >
            @foreach($days as $day)
            <option value="{{ $day }}">{{ $day}}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group col-md-2 col-12">
         <label>Start Time</label>
         <input type="time" name="StartTime[]" class="form-control">
      </div>
      <div class="form-group col-md-2 col-12">
         <label>End Time</label>
         <input type="time" name="EndTime[]" class="form-control">
      </div>
      <div class="form-group col-md-2 col-12">
         <label>Building</label>
         <input type="text" name="Building[]" class="form-control">
      </div>
      <div class="form-group col-md-2 col-12">
         <label>Room</label>
          <select class="form-control" name="Section[]"  required>
            @foreach (range(1, 100) as $l) 
            <option value="{{ $l }}">{{ $l }}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group col-md-2 col-12">
        <label>Copy Row</label>
        <a style="color: white;" class="btn btn-warning btn-block clone">{{ 'Add New Row' }}</a>
      </div>
   </div>
   <div id="copied"></div>
   
   <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
</div>
</div>
@include('Forms.formFooter')   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.clone').click(function(){
  var a = $("#clon").clone().appendTo('#copied');
});
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection

