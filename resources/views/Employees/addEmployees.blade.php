@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Forms.formHeader')
    <form id="myForm" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <div class="row">

                    <div class="col-6">
                        <label>Emp First Name</label>
                        <input type="text" name="Emp_FirstName" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Emp_FirstName') }}">
                    </div>

                    <div class="col-6">
                        <label>Emp Last Name</label>
                        <input type="text" name="Emp_LastName" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Emp_LastName') }}">

                    </div>

                </div>
            </div>
            <div class="form-group">

                <div class="row">
                    <div class="col-6">
                        <label>DOB</label>
                        <input type="Date" name="DOB" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('DOB') }}">
                    </div>

                    <div class="col-6">
                        <label>CNIC</label>
                        <input type="tel" name="CNIC" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark cnic"
                            data-inputmask="'mask': '99999-9999999-9'" maxlength="15" value="{{ old('CNIC') }}">
                    </div>

                </div>

            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label>Date Of Joining</label>
                        <input type="Date" name="DateOfJoining" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('DateOfJoining') }}">
                    </div>

                    <div class="col-6">
                        <label>Date Of Appointment</label>
                        <input type="Date" name="DateOfAppointment" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark"
                            value="{{ old('DateOfAppointment') }}">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label>Specialization</label>
                        <input type="text" name="Specialization" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark"
                            value="{{ old('Specialization') }}">
                    </div>
                    <div class="col-6">
                        <label>Designation</label>
                        <input type="text" name="Designation" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Designation') }}">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label>Status</label>
                        <input type="number" name="Status" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Status') }}">
                    </div>

                    <div class="col-6">

                        <label>UserName</label>
                        <input type="text" name="UserName" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('UserName') }}">
                    </div>
                </div>
            </div>




            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label>Password</label>
                        <input type="password" name="Password" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Password') }}">
                    </div>

                    <div class="col-6">
                        <label for="gender">Gender</label>
                        <select name="Gender" class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark">
                            <option value="">Please select one…</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="non-binary">Non-Binary</option>
                            <option value="other">Other</option>
                            <option value="Prefer not to answer">Perfer not to Answer</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label>Email</label>
                        <input type="email" name="Email" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Email') }}">
                    </div>
                    <div class="col-6">
                        <label>Address</label>
                        <input type="text" name="Address" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Address') }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">

                    <div class="col-6">
                        <label>Department</label>
                        <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="Dpt_ID">
                            @foreach ($departments as $department)
                                <option value="{{ $department->ID }}">{{ $department->Dpt_Name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label>Grade</label>
                        <input type="number" name="Grade" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('Grade') }}">
                    </div>

                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label>Contact Number</label>
                        <input type="tel" name="Contact_Number" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark cnic"
                            data-inputmask="'mask': '9999-9999999'" value="{{ old('Contact_Number') }}">
                    </div>

                    <div class="col-6">
                        <label>Defualt Url</label>
                        <input type="text" name="DefualtUrl" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('DefualtUrl') }}">
                    </div>
                </div>
            </div>

            <button id="button" type="submit"
                class="btn bg_lgu_green text-white btn-block submit-form"">{{ $button }}</button>
    </form>
    @include('Forms.formFooter')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <script type="text/javascript">
        $(document).ready(function($) {
            $('.cnic').click(function() {
                $(":input").inputmask();
            });
        });
    </script>
@endsection
