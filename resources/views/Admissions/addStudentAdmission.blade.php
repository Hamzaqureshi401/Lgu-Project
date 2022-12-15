@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                 <div class="card-body">
                                <div class="form-group">
                                    <label style="font-size: 13px">Student Password <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="Password" id="Password" value="{{ old('Password') }}"
                                        class="form-control" maxlength=12>

                                    <br>
                                    @error('Password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Student First Name <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="Std_FName" id="Std_FName" value="{{ old('Std_FName') }}"
                                        class="form-control"  maxlength=20>

                                    <br>
                                    @error('Std_FName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Student Last Name <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="Std_LName" id="Std_LName" value="{{ old('Std_LName') }}"
                                        class="form-control"  maxlength=15>

                                    <br>
                                    @error('Std_LName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Class Section <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="ClassSection" value="{{ old('ClassSection') }}"
                                        id="ClassSection" class="form-control"  maxlength=1>

                                    <br>
                                    @error('ClassSection')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">CNIC <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('CNIC') }}"
                                        data-inputmask="'mask': '99999-9999999-9'" name="CNIC" id="CNIC"
                                        class="form-control"  maxlength=15>

                                    <br>
                                    @error('CNIC')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Nationality <span style="color: red">*</span></label>
                                    <input type="text" name="Nationality" value="{{ old('Nationality') }}"
                                        id="Nationality" class="form-control"  maxlength=12>

                                    <br>
                                    @error('Nationality')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Date Of Birth <span
                                            style="color: red">*</span></label>
                                    <input type="date" name="DOB" id="DOB" value="{{ old('DOB') }}"
                                        class="form-control" >

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
                                    <label style="font-size: 13px">Student Email <span
                                            style="color: red">*</span></label>
                                    <input type="email" value="{{ old('Email') }}" name="Email" id="Email"
                                        class="form-control"  maxlength=25>

                                    <br>
                                    @error('Email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Father Name <span
                                            style="color: red">*</span></label>
                                    <input type="text" name="FatherName" value="{{ old('FatherName') }}"
                                        id="FatherName" class="form-control"  maxlength=25>

                                    <br>
                                    @error('FatherName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Father Cnic <span
                                            style="color: red">*</span></label>
                                    <input type="text" data-inputmask="'mask': '99999-9999999-9'"
                                        name="FatherCNIC" value="{{ old('FatherCNIC') }}" id="FatherCNIC"
                                        class="form-control"  maxlength=15>

                                    <br>
                                    @error('FatherCNIC')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Guardian Name</label>
                                    <input type="text" value="{{ old('GuardianName') }}" name="GuardianName"
                                        id="GuardianName" class="form-control" maxlength=25>

                                    <br>
                                    @error('GuardianName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Guardian Cnic</label>
                                    <input type="text" data-inputmask="'mask': '99999-9999999-9'"
                                        name="GuardianCNIC" value="{{ old('GuardianCNIC') }}" id="GuardianCNIC"
                                        class="form-control" maxlength=15>

                                    <br>
                                    @error('GuardianCNIC')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Student Phone <span
                                            style="color: red">*</span></label>
                                    <input type="text" data-inputmask="'mask': '0999-9999999'" name="StdPhone"
                                        id="StdPhone" value="{{ old('StdPhone') }}" class="form-control" 
                                        maxlength=12>

                                    <br>
                                    @error('StdPhone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Father Phone <span
                                            style="color: red">*</span></label>
                                    <input type="text" value="{{ old('FatherPhone') }}"
                                        data-inputmask="'mask': '0999-9999999'" name="FatherPhone" id="FatherPhone"
                                        class="form-control"  maxlength=13>

                                    <br>
                                    @error('FatherPhone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Guardian Phone </label>
                                    <input type="text" value="{{ old('GuardianPhone') }}"
                                        data-inputmask="'mask': '0999-9999999'" name="GuardianPhone"
                                        id="GuardianPhone" class="form-control" maxlength=13>

                                    <br>
                                    @error('GuardianPhone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label style="font-size: 13px">Parent Occupation <span style="color: red">*</span>
                                    </label>
                                    <input type="text" value="{{ old('ParentOccupation') }}"
                                        name="ParentOccupation" id="ParentOccupation" class="form-control"
                                        maxlength=30>

                                    <br>
                                    @error('ParentOccupation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Address <span style="color: red">*</span> </label>
                                    <input type="text" value="{{ old('Address') }}" name="Address"
                                        id="Address" class="form-control">

                                    <br>
                                    @error('Address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Tehsil <span style="color: red">*</span> </label>
                                    <input type="text" value="{{ old('Tehsil') }}" name="Tehsil" id="Tehsil"
                                        class="form-control">

                                    <br>
                                    @error('Tehsil')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">City <span style="color: red">*</span> </label>
                                    <input type="text" value="{{ old('City') }}" name="City" id="City"
                                        class="form-control" maxlength=20>

                                    <br>
                                    @error('City')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>






                                <div class="form-group">
                                    <div class="form-group">
                                        <label style="font-size: 13px">Country <span
                                                style="color: red">*</span></label>
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
                                        <label style="font-size: 13px">Province <span
                                                style="color: red">*</span></label>
                                        <select name="state" id="state" value="{{ old('state') }}"
                                            class="custom-select">
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
                                    <div class="form-group">
                                        <label style="font-size: 13px">Degree<span style="color: red">*</span></label>
                                        <select name="Degree_ID" value="{{ old('Degree_ID') }}"
                                            class="custom-select">
                                            <option value="{{ old('Degree_ID') }}" selected>{{ old('Degree_ID') }}
                                            </option>
                                            @foreach ($degree as $degreeid)
                                                <option value="{{ $degreeid->Degree_ID }}">
                                                    {{ $degreeid->DegreeName }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <br>
                                    @error('Degree_ID')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Current Semester <span style="color: red">*</span>
                                    </label>
                                    <input type="number" value="{{ old('CurrentSemester') }}"
                                        name="CurrentSemester" id="CurrentSemester" class="form-control" maxlength=1>

                                    <br>
                                    @error('CurrentSemester')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <div class="form-group">
                                        <label style="font-size: 13px">Status <span
                                                style="color: red">*</span></label>
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
                                    <label style="font-size: 13px">Admission Session <span style="color: red">*</span>
                                    </label>
                                    <input type="text" value="{{ old('AdmissionSession') }}"
                                        name="AdmissionSession" id="AdmissionSession" class="form-control"
                                        maxlength=15>

                                    <br>
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
                                    <input type="email" value="{{ old('FatherEmail') }}" name="FatherEmail"
                                        id="FatherEmail" class="form-control" maxlength=25>

                                    <br>
                                    @error('FatherEmail')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                                <div class="form-group">
                                    <label style="font-size: 13px">Student Files <span style="color: red">*
                                            jpeg,png,jpg,pdf</span>
                                    </label>
                                    <input type="file" value="{{ old('stdfile') }}" name="stdfile"
                                        id="stdfile" class="form-control">

                                    <br>
                                    @error('stdfile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="font-size: 13px">Image <span style="color: red">*
                                            jpeg,png,jpg</span>
                                    </label>
                                    <input type="file" value="{{ old('Image') }}" name="Image" id="Image"
                                        class="form-control">

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
                                                    Passed</th>
                                                <th scope="col">Name of Board
                                                    i.e (BISE Lahore)</th>
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
                                </div> --}}


                                <div class="row" >
                                    <div class="pl-3 pt-3" style="width: 12.5%;">
                                      <label for="matric_examination" style="font-size: 0.8rem; font-weight: bold;">Examination <br> Passed</label>
                                       <select name="matric_examination" id="matric_examination" class="form-control my-2  ">
                                        <option value="Matric">Matric</option>
                                        <option value="O-Level">O-Level</option>
                                      </select>
                                      <select name="fsc_examination" id="fsc_examination" class="form-control  my-2  ">
                                        <option value="FSC Pre-Eng" >FSC Pre-Eng</option>
                                        <option value="FSC Pre-Med">FSC Pre-Med</option>
                                        <option value="ICS">ICS</option>
                                        <option value="FA">FA</option>
                                        <option value="D.Com">D.Com</option>
                                        <option value="DAE">DAE</option>
                                        <option value="A-Level">A-Level</option>
                                      </select>
                                      <input type="text" class="form-control mt-2  " name="becholars_examination" id="becholars_examination" placeholder="BSc/BSCS/B.com/BA" >
                                      <input type="text" class="form-control mt-2  " name="master_examination" id="master_examination" placeholder="MA/MSc/M.Com/MBA" >
                                      <input type="text" class="form-control mt-2  " name="masters_examination" id="masters_examination" placeholder="MS/M-Phil" >
                                    </div>
                                    <div class="pl-3 pt-3" style="width: 12.5%;">
                                      <label for="matric_examination" style="font-size: 0.8rem; font-weight: bold;">Date Started <br> i.e (2019) </label>
                                      <input type="number" class="form-control my-2  " value=""  name="matric_board" id="matric_board" placeholder="">
                                      <input type="number" class="form-control my-2  " value=""  name="fsc_board" id="fsc_board" placeholder="">
                                      <input type="number" class="form-control mt-2  " value="" name="becholars_board" id="becholars_board" placeholder="">
                                      <input type="number" class="form-control mt-2  " value="" name="master_board" id="master_board" placeholder="">
                                      <input type="number" class="form-control mt-2  " value="" name="masters_board" id="masters_board" placeholder="">
                                    </div>
                                    <div class="pl-3 pt-3" style="width: 12.5%;">
                                      <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Date Ended</label>
                                      <br>
                                      <br>
                                      <input type="number" class="form-control my-2" value=""  min="1971" max="2021"  name="matric_passing_year" id="matric_passing_year" placeholder="2019" >
                                      <input type="number" class="form-control my-2  " value=""  min="1971" max="2021"  name="fsc_passing_year" id="fsc_passing_year" placeholder="2021" >
                                      <input type="number" class="form-control mt-2  " value=""  name="becholars_passing_year" id="becholars_passing_year" placeholder="2021" >
                                      <input type="number" class="form-control mt-2  " value=""  name="master_passing_year" id="master_passing_year" placeholder="2021" >
                                      <input type="number" class="form-control mt-2  " value=""  name="masters_passing_year" id="masters_passing_year" placeholder="2021" >
                                    </div>
                                    <div class="pl-3 pt-3" style="width: 12.5%;">
                                      <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Roll No.</label>
                                      <br>
                                      <br>
                                      <input type="number" class="form-control my-2" value=""  name="matric_rollno" id="matric_rollno" placeholder="123456" >
                                      <input type="number" class="form-control my-2" value=""  name="fsc_rollno" id="fsc_rollno" placeholder="123456" >
                                      <input type="number" class="form-control mt-2  " value="" name="becholars_rollno" id="becholars_rollno" placeholder="123456" >
                                      <input type="number" class="form-control mt-2  " value="" name="master_rollno" id="master_rollno" placeholder="123456" >
                                      <input type="number" class="form-control mt-2  " value="" name="masters_rollno" id="masters_rollno" placeholder="123456" >
                                    </div>
                                    <div class="pl-3 pt-3" style="width: 12.5%;">
                                      <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Total Marks</label>
                                      <br>
                                      <br>
                                      <input type="number" class="form-control my-2" value=""   min="1" max="1100" name="matric_total_marks" id="matric_total_marks" placeholder="1100" >
                                      <input type="number" class="form-control my-2  " value=""   min="1" max="1100" name="fsc_total_marks" id="fsc_total_marks" placeholder="1100" >
                                      <input type="number" class="form-control mt-2  " value=""  min="1" max="1100"  name="becholars_total_marks" id="becholars_total_marks" placeholder="1100" >
                                      <input type="number" class="form-control mt-2  " value="" min="1" max="1100" name="master_total_marks" id="master_total_marks" placeholder="1100" >
                                      <input type="number" class="form-control mt-2  " value="" min="1" max="1100"  name="masters_total_marks" id="masters_total_marks" placeholder="1100" >
                                    </div>
                                    <div class="pl-3 pt-3" style="width: 12.5%;">
                                      <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Marks Obtained</label>
                                      <br>
                                      <br>
                                      <input type="number" class="form-control  my-2" value=""   name="matric_marks_obtained" id="matric_marks_obtained" placeholder="700" >
                                      <input type="number" class="form-control my-2  " value=""  name="fsc_marks_obtained" id="fsc_marks_obtained" placeholder="700" >
                                      <input type="number" class="form-control mt-2  " value="" name="becholars_marks_obtained" id="becholars_marks_obtained" placeholder="700" >
                                      <input type="number" class="form-control mt-2  " value="" name="master_marks_obtained" id="master_marks_obtained" placeholder="700" >
                                      <input type="number" class="form-control mt-2  " value="" name="masters_marks_obtained" id="masters_marks_obtained" placeholder="700" >
                                    </div>
                                    <div class="pl-3 pt-3" style="width: 12.5%;">
                                      <label for="matric_examinationw" style="font-size: 0.8rem; font-weight: bold;">Marks Percentage</label>
                                      <br>
                                      <br>
                                      <input type="number" class="form-control  my-2" value=""  name="matric_percentage" id="matric_percentage" READONLY placeholder="90%" >
                                      <input type="number" class="form-control my-2  " value=""  name="fsc_percentage" id="fsc_percentage" READONLY  placeholder="90%" >
                                      <input type="number" class="form-control mt-2  " value="" name="becholars_percentage" id="becholars_percentage" READONLY  placeholder="90%" >
                                      <input type="number" class="form-control mt-2  " value="" name="master_percentage" id="master_percentage" READONLY  placeholder="90%" >
                                      <input type="number" class="form-control mt-2  " value="" name="masters_percentage" id="masters_percentage" READONLY  placeholder="90%" >
                                    </div>
                                    <div class="pl-3 pb-4" style="width: 12%;">
                                      <label for="Institution" style="font-size: 0.8rem; font-weight: bold;">Institution Appeared</label>
                                      <br><br>
                                      <input type="text" class="form-control my-2  " value=""  name="matric_appeared" id="matric_appeared" placeholder="Bise Lahore">
                                      <input type="text" class="form-control my-2  " value=""  name="fsc_appeared" id="fsc_appeared" placeholder="Bise Lahore">
                                      <input type="text" class="form-control mt-2  " value="" name="becholars_appeared" id="becholars_appeared" placeholder="">
                                      <input type="text" class="form-control mt-2  " value="" name="master_appeared" id="master_appeared" placeholder="">
                                      <input type="text" class="form-control mt-2  " value="" name="masters_appeared" id="masters_appeared" placeholder="">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                   <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                                </div>

                        </div>
                    </form>
@include('Forms.formFooter') 
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <script type= "text/javascript" src = "{{ URL::asset('assets/js/countries.js') }}"></script>
<script language="javascript">
    print_country("country");
</script>



<script>
    $(":input").inputmask();
</script>


<script>
  function fillAddress(){
  if ($("#homepostalcheck").is(":checked")) {
    $('#permanent_address').val($('#present_address').val());
    $('#permanent_city').val($('#present_city').val());
    $('#permanent_province').val($('#present_province').val());
    $('#permanent_address').prop('readonly', true);
    $('#permanent_city').prop('readonly', true);
    $('#permanent_province').prop('readonly', true);
    if($('#permanent_address').val() == ""){
      $('#permanent_address').removeAttr('readonly')
    }
    if($('#permanent_city').val() == ""){
      $('#permanent_city').removeAttr('readonly')
    }
    if($('#permanent_province').val() == ""){
      $('#permanent_province').removeAttr('readonly')
    }
  } else {
    $('#permanent_address').removeAttr('readonly');
    $('#permanent_city').removeAttr('readonly')
    $('#permanent_province').removeAttr('readonly')
  }
}
$('#homepostalcheck').click(function(){
  fillAddress();
})
  function matric_wait(){
    if ($("#matric_wait").is(":checked") || $("#matric_waits").is(":checked")) {
      $('#matric_marks_obtained').val("0");
      $('#matric_percentage').val("0");
      $('#matric_marks_obtained').prop('readonly', true);
    }
    else{
      $('#matric_marks_obtained').val("");
      $('#matric_percentage').val("");
      $('#matric_marks_obtained').prop('readonly', false);
    }
  }

$('#matric_wait').click(function(){
  matric_wait();
})
$('#matric_waits').click(function(){
  matric_wait();
})

function fsc_wait(){
    if ($("#fsc_wait").is(":checked") || $("#fsc_waits").is(":checked")) {
      $('#fsc_marks_obtained').val("0");
      $('#fsc_percentage').val("0");
      $('#fsc_marks_obtained').prop('readonly', true);
    }
    else{
      $('#fsc_marks_obtained').val("");
      $('#fsc_percentage').val("");
      $('#fsc_marks_obtained').prop('readonly', false);
    }
  }

$('#fsc_wait').click(function(){
  fsc_wait();
})
$('#fsc_waits').click(function(){
  fsc_wait();
})


function becholars_wait(){
    if ($("#becholars_wait").is(":checked") || $("#becholars_waits").is(":checked")) {
      $('#becholars_marks_obtained').val("0");
      $('#becholars_percentage').val("0");
      $('#becholars_marks_obtained').prop('readonly', true);
    }
    else{
      $('#becholars_marks_obtained').val("");
      $('#becholars_percentage').val("");
      $('#becholars_marks_obtained').prop('readonly', false);
    }
  }

$('#becholars_wait').click(function(){
  becholars_wait();
})
$('#becholars_waits').click(function(){
  becholars_wait();
})


function master_wait(){
    if ($("#master_wait").is(":checked") || $("#master_waits").is(":checked")) {
      $('#master_marks_obtained').val("0");
      $('#master_percentage').val("0");
      $('#master_marks_obtained').prop('readonly', true);
    }
    else{
      $('#master_marks_obtained').val("");
      $('#master_percentage').val("");
      $('#master_marks_obtained').prop('readonly', false);
    }
  }

$('#master_wait').click(function(){
  master_wait();
})
$('#master_waits').click(function(){
  master_wait();
})

function masters_wait(){
    if ($("#masters_wait").is(":checked") || $("#masters_waits").is(":checked")) {
      $('#masters_marks_obtained').val("0");
      $('#masters_percentage').val("0");
      $('#masters_marks_obtained').prop('readonly', true);
    }
    else{
      $('#masters_marks_obtained').val("");
      $('#masters_percentage').val("");
      $('#masters_marks_obtained').prop('readonly', false);
    }
  }

$('#masters_wait').click(function(){
  masters_wait();
})
$('#masters_waits').click(function(){
  masters_wait();
})

</script>

<script>
  $(document).ready(function(){
    $('#matric_marks_obtained').on('change', function(){
        var total_marks=$('#matric_total_marks').val();
        var marks_obtaind=$('#matric_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#matric_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#matric_percentage').empty();
        $('#matric_percentage').val(count.toFixed(2));
        }
    });
    $('#fsc_marks_obtained').on('change', function(){
        var total_marks=$('#fsc_total_marks').val();
        var marks_obtaind=$('#fsc_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#fsc_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#fsc_percentage').empty();
        $('#fsc_percentage').val(count.toFixed(2));
        }
    });
    $('#becholars_marks_obtained').on('change', function(){
        var total_marks=$('#becholars_total_marks').val();
        var marks_obtaind=$('#becholars_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#becholars_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#becholars_percentage').empty();
        $('#becholars_percentage').val(count.toFixed(2));
        }
    });
    $('#master_marks_obtained').on('change', function(){
        var total_marks=$('#master_total_marks').val();
        var marks_obtaind=$('#master_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#master_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#master_percentage').empty();
        $('#master_percentage').val(count.toFixed(2));
        }
    });
    $('#masters_marks_obtained').on('change', function(){
        var total_marks=$('#masters_total_marks').val();
        var marks_obtaind=$('#masters_marks_obtained').val();
        if(parseInt(marks_obtaind) > parseInt(total_marks)){
          alert("Obtained Marks Should be less than "+total_marks);
          $('#masters_marks_obtained').val("");
        }
        else{
        var count = (marks_obtaind/total_marks)*100;
        $('#masters_percentage').empty();
        $('#masters_percentage').val(count.toFixed(2));
        }
    });
});
  </script>

  <script>
    var count = 0;
    $(".Courses_Class_Validation").change((function() {
        $("#error_message").html("");
        var i = $(this);
        if (parseInt($(this).val()) > 3) i.val("");
        else {
            if ("" == $(this).val()) count -= 1, $(".Courses_Class_Validation").each((function() {
                $(this).prop("readonly", !1)
            }));
            else if (count <= 3) {
                var e = !1;
                $(".Courses_Class_Validation").each((function() {
                    $(this).val() == i.val() && $(this).attr("id") != i.attr("id") && (e = !0, $(".Courses_Class_Validation").each((function() {
                        $(this).prop("readonly", !1)
                    })))
                })), 0 == e ? count += 1 : (3 == count && (count -= 1), i.val(""))
            }
            console.log(count, "===> COunt"), 3 == count ? $(".Courses_Class_Validation").each((function() {
                "" == $(this).val() && ($(this).val(""), $(this).prop("readonly", !0))
            })) : $(".Courses_Class_Validation").each((function() {
                $(this).prop("readonly", !1)
            }))
        }
    }));
    </script>


       <script>

        if($(document).width()>450){
          $('#academic_tab_mob_view').remove();
        }
        else{
          $('#academic_destop_view').remove();
        }

    </script>
    <script>
      var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
      };
      </script>
      <script>
      var loadFile = function(event) {
        const fi = document.getElementById('fileToUpload');
              // Check if any file is selected.
              if (fi.files.length > 0) {
                  for (const i = 0; i <= fi.files.length - 1; i++) {

                      const fsize = fi.files.item(i).size;
                      const file = Math.round((fsize / 1024));
                      // The size of the file.
                      if (file >= 5120) {
                          alert(
                            "File too Big, please select a file less than 6MB");
                      }
                      else {
                          var image = document.getElementById('output');
                          image.src = URL.createObjectURL(event.target.files[0]);
                      }
                  }
              }
      };
      </script>



@endsection
@include('js.form_submit_script')
