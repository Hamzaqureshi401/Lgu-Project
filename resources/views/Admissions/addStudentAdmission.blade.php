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
         <label style="font-size: 13px">Student Password <span style="color: red">*</span></label>
         <input type="text" name="Password" id="Password" value="{{ old('Password') }}" class="form-control"
            maxlength=12>
         <br>
         @error('Password')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Student First Name <span style="color: red">*</span></label>
         <input type="text" name="Std_FName" id="Std_FName" value="{{ old('Std_FName') }}" class="form-control"
            maxlength=20
            onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
            >
         <br>
         @error('Std_FName')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Student Last Name <span style="color: red">*</span></label>
         <input type="text" name="Std_LName" id="Std_LName" value="{{ old('Std_LName') }}" class="form-control"
            maxlength=15
            onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
            >
         <br>
         @error('Std_LName')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Class Section <span style="color: red">*</span></label>
         <input type="text" name="ClassSection" value="{{ old('ClassSection') }}" id="ClassSection"
            class="form-control" maxlength=1>
         <br>
         @error('ClassSection')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">CNIC <span style="color: red">*</span></label>
         <input type="number" value="{{ old('CNIC') }}" name="CNIC"
            id="CNIC" class="form-control" maxlength=15>
         <br>
         @error('CNIC')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Nationality <span style="color: red">*</span></label>
         <input type="text" name="Nationality" value="{{ old('Nationality') }}" id="Nationality"
            class="form-control" maxlength=12>
         <br>
         @error('Nationality')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Date Of Birth <span style="color: red">*</span></label>
         <input type="date" name="DOB" id="DOB" value="{{ old('DOB') }}" class="form-control">
         <br>
         @error('DOB')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <div class="form-group">
            <label style="font-size: 13px">Gender <span style="color: red">*</span></label>
            <select name="Gender" value="{{ old('Gender') }}" class="custom-select">
               <option value="{{ old('Gender') }}" selected>{{ old('Gender') }}</option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               <option value="Other">Other</option>
            </select>
         </div>
         <br>
         @error('Gender')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Student Email <span style="color: red">*</span></label>
         <input type="email" value="{{ old('Email') }}" name="Email" id="Email" class="form-control"
            maxlength=25>
         <br>
         @error('Email')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Father Name <span style="color: red">*</span></label>
         <input type="text" name="FatherName" value="{{ old('FatherName') }}" id="FatherName"
            class="form-control" maxlength=25>
         <br>
         @error('FatherName')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Father Cnic <span style="color: red">*</span></label>
         <input type="text" data-inputmask="'mask': '99999-9999999-9'" name="FatherCNIC"
            value="{{ old('FatherCNIC') }}" id="FatherCNIC" class="form-control" maxlength=15>
         <br>
         @error('FatherCNIC')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Guardian Name</label>
         <input type="text" value="{{ old('GuardianName') }}" name="GuardianName" id="GuardianName"
            class="form-control" maxlength=25>
         <br>
         @error('GuardianName')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Guardian Cnic</label>
         <input type="text" data-inputmask="'mask': '99999-9999999-9'" name="GuardianCNIC"
            value="{{ old('GuardianCNIC') }}" id="GuardianCNIC" class="form-control" maxlength=15>
         <br>
         @error('GuardianCNIC')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Student Phone <span style="color: red">*</span></label>
         <input type="text" data-inputmask="'mask': '0999-9999999'" name="StdPhone" id="StdPhone"
            value="{{ old('StdPhone') }}" class="form-control" maxlength=12>
         <br>
         @error('StdPhone')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Father Phone <span style="color: red">*</span></label>
         <input type="text" value="{{ old('FatherPhone') }}" data-inputmask="'mask': '0999-9999999'"
            name="FatherPhone" id="FatherPhone" class="form-control" maxlength=13>
         <br>
         @error('FatherPhone')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Guardian Phone </label>
         <input type="text" value="{{ old('GuardianPhone') }}" data-inputmask="'mask': '0999-9999999'"
            name="GuardianPhone" id="GuardianPhone" class="form-control" maxlength=13>
         <br>
         @error('GuardianPhone')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Parent Occupation <span style="color: red">*</span>
         </label>
         <input type="text" value="{{ old('ParentOccupation') }}" name="ParentOccupation"
            id="ParentOccupation" class="form-control" maxlength=30>
         <br>
         @error('ParentOccupation')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Address <span style="color: red">*</span> </label>
         <input type="text" value="{{ old('Address') }}" name="Address" id="Address" class="form-control">
         <br>
         @error('Address')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Tehsil <span style="color: red">*</span> </label>
         <input type="text" value="{{ old('Tehsil') }}" name="Tehsil" id="Tehsil" class="form-control">
         <br>
         @error('Tehsil')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">City <span style="color: red">*</span> </label>
         <input type="text" value="{{ old('City') }}" name="City" id="City" class="form-control"
            maxlength=20>
         <br>
         @error('City')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <div class="form-group">
            <label style="font-size: 13px">Country <span style="color: red">*</span></label>
            <select name="country" id="country" value="{{ old('country') }}"
               onchange="print_state('state',this.selectedIndex);" class="custom-select">

                        <option value="{{ old('country') }}" selected>{{ old('country') }}
                        </option>

                    </select>
                </div>
                <br>
                @error('country')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label style="font-size: 13px">Province <span style="color: red">*</span></label>
                    <select name="state" id="state" value="{{ old('state') }}" class="custom-select">
                        <option value="{{ old('state') }}" selected>{{ old('state') }}
                        </option>
                    </select>
                </div>
                <br>
                @error('state')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label style="font-size: 13px">Degree<span style="color: red">*</span></label>
                <select name="Degree_ID" class="custom-select">
                    @foreach ($degree as $degreeid)
                        <option value="{{ $degreeid->ID }}" {{ old('Degree_ID') === $degreeid->ID ? 'selected' : ' ' }}>
                            {{ $degreeid->DegreeName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            @error('ID')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label style="font-size: 13px">Current Semester <span style="color: red">*</span>
                </label>
                <input type="number" value="{{ old('CurrentSemester') }}" name="CurrentSemester" id="CurrentSemester"
                    class="form-control" min="1" max="8">
                <br>
                @error('CurrentSemester')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label style="font-size: 13px">Status <span style="color: red">*</span></label>
                    <select name="Status" class="custom-select">
                        <option value="{{ old('Status') }}" selected>{{ old('Status') }}</option>
                        <option value="In Progress">In Progress</option>
                    </select>
                </div>
                <br>
                @error('Status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


      <div class="form-group">
         <label style="font-size: 13px">Admission Session<span style="color: red">*</span></label>
         <select name="AdmissionSession" class="custom-select">
            @foreach ($admissionsession as $admissionsessiondeatils)
            <option value="{{ $admissionsessiondeatils->ID }}" {{old('AdmissionSession')===$admissionsessiondeatils->ID ? "selected":" " }}>
               {{ $admissionsessiondeatils->SemSession }}
            </option>
            @endforeach
         </select>
         @error('AdmissionSession')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>


      <div class="form-group">
         <label style="font-size: 13px">Blood Group <span style="color: red">*</span>
         </label>
         <select name="BloodGroup" class="custom-select">
            <option value="{{ old('BloodGroup') }}" selected>{{ old('BloodGroup') }}
            </option>
            <option value="A+">A Positive</option>
            <option value="A-">A Negative</option>
            <option value="B+">B Positive</option>
            <option value="B-">B Negative</option>
            <option value="O+">O Positive</option>
            <option value="O-">O Negative</option>
            <option value="AB+">AB Positive</option>
            <option value="AB-">AB Negative</option>
         </select>
         <br>
         @error('BloodGroup')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Father Email <span style="color: red">*</span>
         </label>
         <input type="email" value="{{ old('FatherEmail') }}" name="FatherEmail" id="FatherEmail"
            class="form-control" maxlength=25>
         <br>
         @error('FatherEmail')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Student Files <span style="color: red">*
         jpeg,png,jpg,pdf</span>
         </label>
         <input type="file" value="{{ old('stdfile') }}" name="stdfile" id="stdfile" class="form-control">
         <br>
         @error('stdfile')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <div class="form-group">
         <label style="font-size: 13px">Image <span style="color: red">*
         jpeg,png,jpg</span>
         </label>
         <input type="file" value="{{ old('Image') }}" name="Image" id="Image" class="form-control">
         <br>
         @error('Image')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      </div>
      <hr style="background-color: black">
      <div class="card-header text-center">
         <h4>Student Qualification</h4>
      </div>
      <hr style="background-color: black">
      <br>
      {{--
      <div class="card-body">
         <table class="table">
            <thead style="font-size: 12px">
               <tr>
                  <th scope="col">Examination
                     Passed
                  </th>
                  <th scope="col">Name of Board
                     i.e (BISE Lahore)
                  </th>
                  <th scope="col">Passing Year
                  </th>
                  <th scope="col">Roll No.
                  </th>
                  <th scope="col">Total Marks
                  </th>
                  <th scope="col">Marks Obtained</th>
                  <th scope="col">Marks Percentage</th>
                  <th scope="col">Institution Appeared</th>
               </tr>
            </thead>
            <tbody >
               <tr >
                  <th scope="row">
                     <input style="margin-top: 10px;" type="email" value="{{ old('FatherEmail') }}"
                        name="FatherEmail" id="FatherEmail" class="form-control"
                        maxlength=25>
                     <br>
                     @error('FatherEmail')
                     <div class="alert-danger">{{ $message }}</div>
                     @enderror
                  </th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
               </tr>
            </tbody>
         </table>
      </div>
      --}}
      <div class="row">
         <div class="pl-3 pt-3" style="width: 12.5%;">
            <label for="matric_examination" style="font-size: 0.8rem; font-weight: bold;">Examination <br>
            Passed</label>
            <select name="matric_examination" id="matric_examination" class="form-control my-2 select2 ">
               <option value="Matric" {{old('matric_examination')==="Matric"?"selected":" "}}>Matric</option>
               <option value="O-Level"  {{old('matric_examination')==="O-Level"?"selected":" "}}>O-Level</option>
            </select>
            <select name="fsc_examination" id="fsc_examination" class="form-control  my-2  select2">
               <option value="FSC Pre-Eng" {{old('fsc_examination')==="FSC Pre-Eng"?"selected":" "}} >FSC Pre-Eng</option>
               <option value="FSC Pre-Med" {{old('fsc_examination')==="FSC Pre-Med"?"selected":" "}}>FSC Pre-Med</option>
               <option value="ICS" {{old('fsc_examination')==="ICS"?"selected":" "}}>ICS</option>
               <option value="FA" {{old('fsc_examination')==="FA"?"selected":" "}}>FA</option>
               <option value="D.Com" {{old('fsc_examination')==="D.Com"?"selected":" "}}>D.Com</option>
               <option value="DAE" {{old('fsc_examination')==="DAE"?"selected":" "}}>DAE</option>
               <option value="A-Level" {{old('fsc_examination')==="A-Level"?"selected":" "}}>A-Level</option>
            </select>
            <input type="text" class="form-control mt-2  " name="becholars_examination" value="{{old('becholars_examination')}}"
               id="becholars_examination" placeholder="BSc/BSCS/B.com/BA">
            <input type="text" class="form-control mt-2  " name="master_examination" value="{{old('master_examination')}}" id="master_examination"
               placeholder="MA/MSc/M.Com/MBA">
            <input type="text" class="form-control mt-2  " name="masters_examination" value="{{old('masters_examination')}}"
               id="masters_examination" placeholder="MS/M-Phil">
         </div>
         <div class="pl-3 pt-3" style="width: 12.5%;">
            <label for="matric_examination" style="font-size: 0.8rem; font-weight: bold;">Date Started <br> i.e
            (2019) </label>
            <input type="number" class="form-control my-2  " value="{{old('matric_board')}}" name="matric_board"
            id="matric_board" placeholder="" max="{{date("Y")}}">
            <input type="number" class="form-control my-2  " value="{{old('fsc_board')}}" name="fsc_board" id="fsc_board"
            placeholder="" max="{{date("Y")}}">
            <input type="number" class="form-control mt-2  " value="{{old('becholars_board')}}" name="becholars_board"
            id="becholars_board" placeholder="" max="{{date("Y")}}">
            <input type="number" class="form-control mt-2  " value="{{old('master_board')}}" name="master_board"
            id="master_board" placeholder="" max="{{date("Y")}}">
            <input type="number" class="form-control mt-2  " value="{{old('masters_board')}}" name="masters_board"
            id="masters_board" placeholder="" max="{{date("Y")}}">
         </div>
         <div class="pl-3 pt-3" style="width: 12.5%;">
            <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Date Ended</label>
            <br>
            <br>
            <input type="number" class="form-control my-2" value="{{old('matric_passing_year')}}" min="1971" max="{{date("Y")}}"
            name="matric_passing_year" id="matric_passing_year" placeholder="{{date("Y")}}">

            <input type="number" class="form-control my-2  " value="{{old('fsc_passing_year')}}" min="1971" max="{{date("Y")}}"
            name="fsc_passing_year" id="fsc_passing_year" placeholder="{{date("Y")}}">

            <input type="number" class="form-control mt-2  " value="{{old('becholars_passing_year')}}" name="becholars_passing_year"
            id="becholars_passing_year" placeholder="{{date("Y")}}" min="1971" max="{{date("Y")}}">

            <input type="number" class="form-control mt-2  " value="{{old('master_passing_year')}}" name="master_passing_year"
            id="master_passing_year" placeholder="{{date("Y")}}" min="1971" max="{{date("Y")}}">

            <input type="number" class="form-control mt-2  " value="{{old('masters_passing_year')}}" name="masters_passing_year"
            id="masters_passing_year" placeholder="{{date("Y")}}" min="1971" max="{{date("Y")}}">

         </div>
         <div class="pl-3 pt-3" style="width: 12.5%;">
            <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Roll No.</label>
            <br>
            <br>
            <input type="number" class="form-control my-2" value="{{old('matric_rollno')}}" name="matric_rollno"
               id="matric_rollno" placeholder="123456">

            <input type="number" class="form-control my-2" value="{{old('fsc_rollno')}}" name="fsc_rollno" id="fsc_rollno"
               placeholder="123456">

            <input type="number" class="form-control mt-2  " value="{{old('becholars_rollno')}}" name="becholars_rollno"
               id="becholars_rollno" placeholder="123456">

            <input type="number" class="form-control mt-2  " value="{{old('master_rollno')}}" name="master_rollno"
               id="master_rollno" placeholder="123456">

            <input type="number" class="form-control mt-2  " value="{{old('masters_rollno')}}" name="masters_rollno"
               id="masters_rollno" placeholder="123456">

         </div>
         <div class="pl-3 pt-3" style="width: 12.5%;">
            <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Total Marks</label>
            <br>
            <br>
            <input type="number" class="form-control my-2" value="{{old('matric_total_marks')}}" min="1" max="1100"
               name="matric_total_marks" id="matric_total_marks" placeholder="1100">

            <input type="number" class="form-control my-2  " value="{{old('fsc_total_marks')}}" min="1" max="1100"
               name="fsc_total_marks" id="fsc_total_marks" placeholder="1100">

            <input type="number" class="form-control mt-2  " value="{{old('becholars_total_marks')}}" min="1" max="1100"
               name="becholars_total_marks" id="becholars_total_marks" placeholder="1100">

            <input type="number" class="form-control mt-2  " value="{{old('master_total_marks')}}" min="1" max="1100"
               name="master_total_marks" id="master_total_marks" placeholder="1100">

            <input type="number" class="form-control mt-2  " value="{{old('masters_total_marks')}}" min="1" max="1100"
               name="masters_total_marks" id="masters_total_marks" placeholder="1100">

         </div>
         <div class="pl-3 pt-3" style="width: 12.5%;">
            <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Marks Obtained</label>
            <br>
            <br>
            <input type="number" class="form-control  my-2" value="{{old('matric_marks_obtained')}}" name="matric_marks_obtained"
               id="matric_marks_obtained" placeholder="700">

            <input type="number" class="form-control my-2  " value="{{old('fsc_marks_obtained')}}" name="fsc_marks_obtained"
               id="fsc_marks_obtained" placeholder="700">

            <input type="number" class="form-control mt-2  " value="{{old('becholars_marks_obtained')}}" name="becholars_marks_obtained"
               id="becholars_marks_obtained" placeholder="700">

            <input type="number" class="form-control mt-2  " value="{{old('master_marks_obtained')}}" name="master_marks_obtained"
               id="master_marks_obtained" placeholder="700">

            <input type="number" class="form-control mt-2  " value="{{old('masters_marks_obtained')}}" name="masters_marks_obtained"
               id="masters_marks_obtained" placeholder="700">

         </div>
         <div class="pl-3 pt-3" style="width: 12.5%;">
            <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Marks
            Percentage</label>
            <br>
            <br>
            <input type="number" class="form-control  my-2" value="" name="matric_percentage"
               id="matric_percentage" READONLY placeholder="90%">
            <input type="number" class="form-control my-2  " value="" name="fsc_percentage"
               id="fsc_percentage" READONLY placeholder="90%">
            <input type="number" class="form-control mt-2  " value="" name="becholars_percentage"
               id="becholars_percentage" READONLY placeholder="90%">
            <input type="number" class="form-control mt-2  " value="" name="master_percentage"
               id="master_percentage" READONLY placeholder="90%">
            <input type="number" class="form-control mt-2  " value="" name="masters_percentage"
               id="masters_percentage" READONLY placeholder="90%">
         </div>
         <div class="pl-3 pb-4" style="width: 12%;">
            <label for="Institution" style="font-size: 0.8rem; font-weight: bold;">Institution Appeared</label>
            <br><br>
            <input type="text" class="form-control my-2  " value="{{old('matric_appeared')}}" name="matric_appeared"
               id="matric_appeared" placeholder="Bise Lahore">
               
            <input type="text" class="form-control my-2  " value="{{old('fsc_appeared')}}" name="fsc_appeared"
               id="fsc_appeared" placeholder="Bise Lahore">

            <input type="text" class="form-control mt-2  " value="{{old('becholars_appeared')}}" name="becholars_appeared"
               id="becholars_appeared" placeholder="">

            <input type="text" class="form-control mt-2  " value="{{old('master_appeared')}}" name="master_appeared"
               id="master_appeared" placeholder="">

            <input type="text" class="form-control mt-2  " value="{{old('masters_appeared')}}" name="masters_appeared"
               id="masters_appeared" placeholder="">

         </div>
      </div>
      <div class="form-group">
         <button id="button" type="submit"
            class="btn btn-primary btn-block submit-form">{{ $button }}</button>
      </div>
   </div>
</form>
@include('Forms.formFooter')
@include('Admissions.student_js')
@endsection
@include('js.form_submit_script')