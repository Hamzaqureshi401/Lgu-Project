
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $employee->Emp_ID }}">
                 <div class="form-group">
                      <label>Emp First Name</label>
                      <input type="text" name="Emp_FirstName" class="form-control"  value="{{ $employee->Emp_FirstName}}" required>
                    </div>
                    <div class="form-group">
                      <label>Emp Last Name</label>
                      <input type="text" name="Emp_LastName" class="form-control" value="{{ $employee->Emp_LastName}}" required>
                    </div>
                    <div class="form-group">
                      <label>DOB</label>
                      <input type="Date" name="DOB" class="form-control" value="{{ $employee->DOB}}" required>
                    </div>
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="number" name="CNIC" class="form-control" value="{{ $employee->CNIC}}" required>
                    </div>
                <div class="form-group">
                      <label>Date Of Joining</label>
                      <input type="Date" name="DateOfJoining" class="form-control" value="{{ $employee->DateOfJoining}}" required>
                    </div>
                <div class="form-group">
                      <label>Date Of Appointment</label>
                      <input type="Date" name="DateOfAppointment" class="form-control" value="{{ $employee->DateOfAppointment}}" required>
                    </div>
                <div class="form-group">
                      <label>Specialization</label>
                      <input type="text" name="Specialization" class="form-control" value="{{ $employee->Specialization}}" required>
                    </div>
                <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control" value="{{ $employee->Designation}}" required>
                    </div>
                <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{ $employee->Status}}" required>
                    </div>
                <div class="form-group">
                      <label>UserName</label>
                      <input type="text" name="UserName" class="form-control" value="{{ $employee->UserName}}" required>
                    </div>
                <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="Password" class="form-control" value="{{ $employee->Password}}" required>
                    </div>
                 <div class="form-group">
                      <label>Gender</label>
                      <input type="text" name="Gender" class="form-control" value="{{ $employee->Gender}}" required>
                    </div>
                  
                <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="Email" class="form-control" value="{{ $employee->Email}}" required>
                    </div>
                  
                <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="Address" class="form-control" value="{{ $employee->Address}}" required>
                    </div>
                  
                <div class="form-group">
                      <label>Dpt ID</label>
                      <input type="number" name="Dpt_ID" class="form-control" value="{{ $employee->Dpt_ID}}" required>
                    </div>
                  
                <div class="form-group">
                      <label>Grade</label>
                      <input type="number" name="Grade" class="form-control" value="{{ $employee->Grade}}" required>
                    </div>
                 <div class="form-group">
                      <label>Contact Number</label>
                      <input type="number" name="Contact_Number" class="form-control" value="{{ $employee->Contact_Number}}" required>
                    </div>
                <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </form>
                



      