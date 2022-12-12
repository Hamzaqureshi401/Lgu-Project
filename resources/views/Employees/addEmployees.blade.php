@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Emp First Name</label>
                      <input type="text" name="Emp_FirstName" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Emp Last Name</label>
                      <input type="text" name="Emp_LastName" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>DOB</label>
                      <input type="Date" name="DOB" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="number" name="CNIC" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Date Of Joining</label>
                      <input type="Date" name="DateOfJoining" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Date Of Appointment</label>
                      <input type="Date" name="DateOfAppointment" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Specialization</label>
                      <input type="text" name="Specialization" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>UserName</label>
                      <input type="text" name="UserName" class="form-control"required>
                    </div>
                <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="Password" class="form-control"required>
                    </div>
                 <div class="form-group">
                      <label>Gender</label>
                      <input type="text" name="Gender" class="form-control"required>
                    </div>
                  
                <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="Email" class="form-control"required>
                    </div>
                  
                <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="Address" class="form-control"required>
                    </div>
                  
                <div class="form-group">
                      <label>Dpt ID</label>
                      <option>
                      <input type="number" name="Dpt_ID" class="form-control"required>
                    </div>
                 <div class="form-group">
                      <label>Department</label>
                      <select class="form-control" name="Dpt_ID"  required>
                        @foreach($departments as $department)
                        <option value="{{ $department->Dpt_ID }}">{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>
                  
                <div class="form-group">
                      <label>Grade</label>
                      <input type="number" name="Grade" class="form-control"required>
                    </div>
                 <div class="form-group">
                      <label>Contact Number</label>
                      <input type="number" name="Contact_Number" class="form-control"required>
                    </div>
                  
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      