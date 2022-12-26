
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $employee->ID }}">
                 <div class="form-group">
                      <label>Emp First Name</label>
                      <input type="text" name="Emp_FirstName" class="form-control"  value="{{ $employee->Emp_FirstName}}" >
                    </div>
                    <div class="form-group">
                      <label>Emp Last Name</label>
                      <input type="text" name="Emp_LastName" class="form-control" value="{{ $employee->Emp_LastName}}" >
                    </div>
                    <div class="form-group">
                      <label>DOB</label>
                      <input type="Date" name="DOB" class="form-control" value="{{ $employee->DOB}}" >
                    </div>
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="text" name="CNIC" class="form-control" value="{{ $employee->CNIC }}" >
                    </div>
                <div class="form-group">
                      <label>Date Of Joining</label>
                      <input type="Date" name="DateOfJoining" class="form-control" value="{{ $employee->DateOfJoining}}" >
                    </div>
                <div class="form-group">
                      <label>Date Of Appointment</label>
                      <input type="Date" name="DateOfAppointment" class="form-control" value="{{ $employee->DateOfAppointment}}" >
                    </div>
                <div class="form-group">
                      <label>Specialization</label>
                      <input type="text" name="Specialization" class="form-control" value="{{ $employee->Specialization}}" >
                    </div>
                <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control" value="{{ $employee->Designation}}" >
                    </div>
                <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{ $employee->Status}}" >
                    </div>
                <div class="form-group">
                      <label>UserName</label>
                      <input type="text" name="UserName" class="form-control" value="{{ $employee->UserName}}" >
                    </div>
                <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="Password" class="form-control" value="{{ $employee->Password}}" >
                    </div>
                 <div class="form-group">
                      <label>Gender</label>
                      <input type="text" name="Gender" class="form-control" value="{{ $employee->Gender}}" >
                    </div>
                  
                <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="Email" class="form-control" value="{{ $employee->Email}}" >
                    </div>
                  
                <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="Address" class="form-control" value="{{ $employee->Address}}" >
                    </div>
                  
               <div class="form-group">
                      <label>Department</label>
                      <select class="form-control" name="Dpt_ID"  >
                        @foreach($departments as $department)
                        <option value="{{ $department->ID }}"{{ $department->ID == $employee->Dpt_ID ? 'selected' : '' }} >{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>
                  
                <div class="form-group">
                      <label>Grade</label>
                      <input type="number" name="Grade" class="form-control" value="{{ $employee->Grade}}" >
                    </div>
                 <div class="form-group">
                      <label>Contact Number</label>
                      <input type="number" name="Contact_Number" class="form-control" value="{{ $employee->Contact_Number}}" >
                    </div>
                <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </form>
                



      