@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Emp First Name</label>
                      <input type="text" name="Emp_FirstName" class="form-control" onkeydown="return /[a-z]/i.test(event.key)">
                    </div>
                    <div class="form-group">
                      <label>Emp Last Name</label>
                      <input type="text" name="Emp_LastName" class="form-control"onkeydown="return /[a-z]/i.test(event.key)">
                    </div>
                    <div class="form-group">
                      <label>DOB</label>
                      <input type="Date" name="DOB" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="tel" name="CNIC" class="form-control cnic"   data-inputmask="'mask': '99999-9999999-9'" maxlength="15">
                    </div>
                <div class="form-group">
                      <label>Date Of Joining</label>
                      <input type="Date" name="DateOfJoining" class="form-control">
                    </div>
                <div class="form-group">
                      <label>Date Of Appointment</label>
                      <input type="Date" name="DateOfAppointment" class="form-control">
                    </div>
                <div class="form-group">
                      <label>Specialization</label>
                      <input type="text" name="Specialization" class="form-control">
                    </div>
                <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control">
                    </div>
                <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control">
                    </div>
                <div class="form-group">
                      <label>UserName</label>
                      <input type="text" name="UserName" class="form-control">
                    </div>
                <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="Password" class="form-control">
                    </div>
                 <div class="form-group">
                      <label for="gender">Gender</label>
                      <select name="Gender" class="form-control select2">
                        <option value="">Please select one…</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="non-binary">Non-Binary</option>
                        <option value="other">Other</option>
                        <option value="Prefer not to answer">Perfer not to Answer</option>
                      </select>
                    </div>
                  
                <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="Email" class="form-control">
                    </div>
                  
                <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="Address" class="form-control">
                    </div>
                  
                 <div class="form-group">
                      <label>Department</label>
                      <select class="form-control select2" name="Dpt_ID"  >
                        @foreach($departments as $department)
                        <option value="{{ $department->ID }}">{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>
                  
                <div class="form-group">
                      <label>Grade</label>
                      <input type="number" name="Grade" class="form-control">
                    </div>
                 <div class="form-group">
                      <label>Contact Number</label>
                      <input type="tel" name="Contact_Number" class="form-control cnic"  data-inputmask="'mask': '9999-9999999'">
                    </div>
                  
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">
  $(document).ready(function($){
  $('.cnic').click(function(){
 $(":input").inputmask();
});
});       
</script>    
@endsection



      