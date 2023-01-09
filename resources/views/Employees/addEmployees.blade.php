@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  

                  <div class="card-body">
                    <div class="form-group">
                      <label>Emp First Name</label>
                      <input type="text" name="Emp_FirstName" class="form-control" value="{{old('Emp_FirstName')}}" >
                    </div>
                    <div class="form-group">
                      <label>Emp Last Name</label>
                      <input type="text" name="Emp_LastName" class="form-control" value="{{old('Emp_LastName')}}">
                    </div>
                    <div class="form-group">
                      <label>DOB</label>
                      <input type="Date" name="DOB" class="form-control" value="{{old('DOB')}}">
                    </div>
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="number" name="CNIC" class="form-control" value="{{old('CNIC')}}">
                    </div>
                <div class="form-group">
                      <label>Date Of Joining</label>
                      <input type="Date" name="DateOfJoining" class="form-control" value="{{old('DateOfJoining')}}">
                    </div>
                <div class="form-group">
                      <label>Date Of Appointment</label>
                      <input type="Date" name="DateOfAppointment" class="form-control" value="{{old('DateOfAppointment')}}">
                    </div>
                <div class="form-group">
                      <label>Specialization</label>
                      <input type="text" name="Specialization" class="form-control" value="{{old('Specialization')}}">
                    </div>
                <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control" value="{{old('Designation')}}">
                    </div>
                <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{old('Status')}}">
                    </div>
                <div class="form-group">
                      <label>UserName</label>
                      <input type="text" name="UserName" class="form-control" value="{{old('UserName')}}">
                    </div>
                <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="Password" class="form-control" value="{{old('Password')}}">
                    </div>
                 <div class="form-group">
                      <label for="gender">Gender</label>
                      <select name="Gender" class="form-control">
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
                      <input type="email" name="Email" class="form-control" value="{{old('Email')}}">
                    </div>
                  
                <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="Address" class="form-control" value="{{old('Address')}}">
                    </div>
                  
                 <div class="form-group">
                      <label>Department</label>
                      <select class="form-control" name="Dpt_ID"  >
                        @foreach($departments as $department)
                        <option value="{{ $department->ID }}">{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>
                  
                <div class="form-group">
                      <label>Grade</label>
                      <input type="number" name="Grade" class="form-control" value="{{old('Grade')}}">
                    </div>
                 <div class="form-group">
                      <label>Contact Number</label>
                      <input type="number" name="Contact_Number" class="form-control" value="{{old('Contact_Number')}}">
                    </div>
                  
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>

@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      