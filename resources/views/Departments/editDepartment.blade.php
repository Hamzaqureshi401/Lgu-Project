 @extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $department->ID }}">
                    <div class="form-group">
                      <label>Dpt Name</label>
                      <input type="text" name="Dpt_Name" class="form-control" value="{{ $department->Dpt_Name }} " onkeydown="return /[a-z]/i.test(event.key)">
                    </div>
                    <div class="form-group">
                      <label>Dpt Full Name</label>
                      <input type="text" name="Dpt_FullName" class="form-control" value="{{ $department->Dpt_FullName }}" required onkeydown="return /[a-z]/i.test(event.key)">
                    </div>

                    <div class="form-group">
                      <label>Select Hod Employee</label>
                      <select class="form-control select2" name="HODUID"  >
                        @foreach($employees as $employee)
                        <option></option>
                        <option value="{{ $employee->ID }}" {{ $department->HODUID == $employee->ID ? 'selected' : '' }}>{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Select Dean Employee</label>
                      <select class="form-control select2" name="DeanUID"  >
                        @foreach($employees as $employee)
                        <option></option>
                        <option value="{{ $employee->ID }}" {{ $department->DeanUID == $employee->ID ? 'selected' : '' }}>{{ $employee->Emp_FirstName }} {{ $employee->Emp_LastName }}</option>
                        @endforeach
                      </select>
                    </div>


                    
                    <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{ $department->Status }}" required>
                    </div>
                  <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </div>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')


      