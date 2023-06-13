@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
<style>
    .hidden_form {
        display: none;
    }
</style>
@section('content')
    @include('Forms.formHeader')
    <div class="card-body">
        <div style="background-color: #0D3E02;" class="card-header border border-5 rounded border-dark   mb-4 ">
            <h4 class="text-white text-center">Applied Degree Information</h4>
        </div>
        <div class=" container border border-5 rounded border-dark mb-3 ">
            <div class="form-row pt-3">

                <div class="from-group col-md-6">
                    <input type="hidden" name="id" value="{{ $studentAdmission->ID }}">
                    <label>Degree</label> <br>
                    <select class="form-control custom-select" name="Degree_ID" required>
                        @foreach ($degrees as $degree)
                            <option value="{{ $degree->ID }}"
                                {{ $studentAdmission->Degree_ID == $degree->ID ? 'selected' : '' }}>
                                {{ $degree->DegreeName }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('Degree_ID')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label style="font-size: 13px">Admission Session<span style="color: red">*</span></label>
                    <select name="AdmissionSession" class="custom-select">

                        @foreach ($admissionsession as $admissionsessiondeatils)
                            <option value="{{ $admissionsessiondeatils->SemSession }}"
                                {{ $admissionsessiondeatils->SemSession == $studentAdmission->AdmissionSession ? 'selected' : '' }}>
                                {{ $admissionsessiondeatils->SemSession }}
                            </option>
                        @endforeach
                    </select>
                    @error('AdmissionSession')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        <div style="background-color: #0D3E02;" class="card-header border border-5 rounded border-dark    mb-4 ">
            <h4 class="text-white text-center">Personal Information</h4>
        </div>

        <div class="container border border-5 rounded border-dark">

            <div class="form-row pt-3">
                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Student First Name <span style="color: red">*</span></label>
                    <input type="text" name="Std_FName" id="Std_FName" value="{{ $studentAdmission->Std_FName }}"
                        class="form-control" maxlength=20>
                    <br>
                    @error('Std_FName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group col-md-2">

                    <label style="font-size: 13px">Student Last Name <span style="color: red">*</span></label>
                    <input type="text" name="Std_LName" id="Std_LName" value="{{ $studentAdmission->Std_LName }}"
                        class="form-control" maxlength=15>
                    <br>
                    @error('Std_LName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Father Name <span style="color: red">*</span></label>
                    <input type="text" name="FatherName" value="{{ $studentAdmission->FatherName }}" id="FatherName"
                        class="form-control" maxlength=25>
                    <br>
                    @error('FatherName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Student CNIC <span style="color: red">*</span></label>
                    <input type="text" value="{{ $studentAdmission->CNIC }}" data-inputmask="'mask': '99999-9999999-9'"
                        name="CNIC" id="CNIC" class="form-control" maxlength=15>
                    <br>
                    @error('CNIC')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Student Phone <span style="color: red">*</span></label>
                    <input type="text" data-inputmask="'mask': '0999-9999999'" name="StdPhone" id="StdPhone"
                        value="{{ $studentAdmission->StdPhone }}" class="form-control" maxlength=12>
                    <br>
                    @error('StdPhone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Blood Group <span style="color: red">*</span>
                    </label>
                    <br>
                    <select name="BloodGroup" class="custom-select">
                        <option value="{{ $studentAdmission->BloodGroup }}" selected>{{ $studentAdmission->BloodGroup }}
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


            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Date Of Birth <span style="color: red">*</span></label>
                    <input type="date" name="DOB" id="DOB" value="{{ $studentAdmission->DOB }}"
                        class="form-control">

                    <input type="text" hidden value="{{ $studentAdmission->DOB }}" name="DOB_pre" class="form-control">
                    <br>
                    @error('DOB')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Gender <span style="color: red">*</span></label>
                    <select name="Gender"value="{{ $studentAdmission->Gender }}" class="custom-select">
                        <option value="{{ $studentAdmission->Gender }}" selected>{{ $studentAdmission->Gender }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <br>
                    @error('Gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group col-md-2">

                    <input class="form-control" type="text" name="Student_ID" value="{{ $studentAdmission->ID }}"
                        hidden>

                    <label style="font-size: 13px">Student Password <span style="color: red">*</span></label>
                    <input type="text" name="Password" id="Password" value="{{ $studentAdmission->Password }}"
                        class="form-control" maxlength=12>
                    <br>
                    @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Nationality <span style="color: red">*</span></label>
                    <input type="text" name="Nationality" value="{{ $studentAdmission->Nationality }}"
                        id="Nationality" class="form-control" maxlength=12>
                    <br>
                    @error('Nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Student Email <span style="color: red">*</span></label>
                    <input type="email" value="{{ $studentAdmission->Email }}" name="Email" id="Email"
                        class="form-control" maxlength=25>
                    <br>
                    @error('Email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Parent Occupation <span style="color: red">*</span>
                    </label>
                    <input type="text" value="{{ $studentAdmission->ParentOccupation }}" name="ParentOccupation"
                        id="ParentOccupation" class="form-control" maxlength=30>
                    <br>
                    @error('ParentOccupation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>

            <div class="form-row">
                @php
                    $Category = ['Defence', 'Shaheed', 'Civilian', 'Sports'];
                @endphp

                <div class="form-group col-md-12">
                    <label style="font-size: 13px">Category <span style="color: red">*</span>
                    </label>
                    <select name="Category" class="custom-select">
                        

                        @foreach ($Category as $Category)
                            <option value="{{ $Category }}"
                                 {{ $Category == $studentAdmission->Category ? 'selected' : '' }}>
                                {{ $Category }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('Category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row" id="defence_form">

                <div class="form-group col-md-12">

                    <h6 class="text-danger fw-bold">For Serving Defence/Rangers Personnel</h6>

                </div>
                <div class="form-group col-md-2">
                    <label style="font-size: 13px">No</label>
                    <input type="text" name="defence_No" id="defence_No" value="{{ old('defence_No') }}"
                        class="form-control border border-1 rounded border-dark" placeholder="Enter No" maxlength=20>
                    <br>
                    @error('defence_No')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label style="font-size: 13px">Rank </label>
                    <input type="text" name="defence_Rank" id="defence_Rank" value="{{ old('defence_Rank') }}"
                        class="form-control border border-1 rounded border-dark" placeholder="Enter Rank">
                    <br>
                    @error('defence_Rank')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                {{-- <div class="form-group col-md-2">
                   <label style="font-size: 13px">Father Name <span style="color: red">*</span></label>
                   <input type="text" name="defence_Name" value="{{ old('defence_Name') }}"
                       id="Name" class="form-control border border-1 rounded border-dark"
                       placeholder="Enter Name">
                   <br>
                   @error('defence_Name')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div> --}}

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Serving Since </label>
                    <input type="date" name="defence_serving_since" id="defence_serving_since"
                        value="{{ old('defence_serving_since') }}"
                        class="form-control border border-1 rounded border-dark">
                    <br>
                    @error('defence_serving_since')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">

                    <label style="font-size: 13px">Now Serving In </label>
                    <input type="text" name="defence_serving_In" id="defence_serving_In"
                        value="{{ old('defence_serving_In') }}" class="form-control border border-1 rounded border-dark"
                        placeholder="Enter Serving In">
                    <br>
                    @error('defence_serving_In')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>





                <div class="form-group col-md-4">
                    <label style="font-size: 13px">At</label>
                    <input type="text" name="defence_At" id="defence_At" value="{{ old('defence_At') }}"
                        class="form-control border border-1 rounded border-dark" placeholder="Enter At">
                    <br>
                    @error('defence_At')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label style="font-size: 13px">Station </label>
                    <input type="text" name="defence_Station" id="defence_Station"
                        value="{{ old('defence_Station') }}" class="form-control border border-1 rounded border-dark"
                        placeholder="Enter Station">
                    <br>
                    @error('defence_Station')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group col-md-4">
                    <label style="font-size: 13px">Tel No </label>
                    <input type="number" name="defence_tel_No" id="defence_tel_No" value="{{ old('tel_No') }}"
                        class="form-control border border-1 rounded border-dark" placeholder="Enter tel_No"
                        oninput="maxLengthphone(this)" maxlength="11">
                    <br>
                    @error('defence_tel_No')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>








            </div>

            <div class="form-row" id="Shaheed_form">
                <div class="form-group col-md-12">
                    <h6 class="text-danger fw-bold">For Widows (Widows of Defence Force And Rangers
                        Personnal Only)</h6>
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">I, Mst</label>
                    <input type="text" name="Shaheed_Mst_name" id="Shaheed_Mst_name"
                        value="{{ old('Shaheed_Mst_name') }}" class="form-control border border-1 rounded border-dark"
                        placeholder="Enter Name">
                    <br>
                    @error('Shaheed_Mst_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label style="font-size: 13px">am Widow of No.</label>
                    <input type="text" name="Shaheed_Widow_no" id="Shaheed_Widow_no"
                        value="{{ old('Shaheed_Widow_no') }}" class="form-control border border-1 rounded border-dark"
                        placeholder="Enter Widow Of No">
                    <br>
                    @error('Shaheed_Widow_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Rank </label>
                    <input type="text" name="shaheed_Rank" value="{{ old('shaheed_Rank') }}" id="shaheed_Rank"
                        class="form-control border border-1 rounded border-dark" placeholder="Enter Shaheed Rank">
                    <br>
                    @error('shaheed_Rank')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Shaheed Name</label>
                    <input type="text" name="shaheed_Name" id="shaheed_Name" value="{{ old('shaheed_Name') }}"
                        class="form-control border border-1 rounded border-dark" placeholder="Enter Shaheed Name">
                    <br>
                    @error('shaheed_Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">

                    <label style="font-size: 13px">who Expired on</label>
                    <input type="date" name="Shaheed_Expired_date" id="Shaheed_Expired_date"
                        value="{{ old('Shaheed_Expired_date') }}"
                        class="form-control border border-1 rounded border-dark">
                    <br>
                    @error('Shaheed_Expired_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>






            </div>

            <div class="form-row" id="Civilian_form">
                <div class="form-group col-md-12">

                    <h6 class="text-danger fw-bold">For Cilvilan</h6>
                </div>

                {{-- <div class="form-group col-md-4">
                   <label style="font-size: 13px">Father Name<span style="color: red">*</span></label>
                   <input type="text" name="civilan_name" id="civilan_name"
                       value="{{ old('civilan_name') }}"
                       class="form-control border border-1 rounded border-dark" placeholder="Enter Name">
                   <br>
                   @error('civilan_name')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>
               <div class="form-group col-md-4">
                   <label style="font-size: 13px">Father of<span style="color: red">*</span></label>
                   <input type="text" name="civilian_father" id="civilian_father"
                       value="{{ old('civilian_father') }}"
                       class="form-control border border-1 rounded border-dark"
                       placeholder="Enter Father Name">
                   <br>
                   @error('civilian_father')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror

               </div> --}}
                <div class="form-group col-md-4">
                    <label style="font-size: 13px">am serving in the Office of </label>
                    <input type="text" name="civilian_office" value="{{ old('civilian_office') }}"
                        id="civilian_office" class="form-control border border-1 rounded border-dark"
                        placeholder="Enter civilian office">
                    <br>
                    @error('civilian_office')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label style="font-size: 13px">As (Designation)</label>
                    <input type="text" name="civilian_Designation" id="civilian_Designation"
                        value="{{ old('civilian_Designation') }}"
                        class="form-control border border-1 rounded border-dark">
                    <br>
                    @error('civilian_Designation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group col-md-4">
                    <label style="font-size: 13px">w.e.f</label>
                    <input type="date" name="civilian_wef" id="civilian_wef" value="{{ old('civilian_wef') }}"
                        class="form-control border border-1 rounded border-dark">
                    <br>
                    @error('civilian_wef')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




            </div>


            <div class="form-row" id="Sports_form">
                <div class="form-group col-md-12">

                    <h6 class="text-danger fw-bold">For Sports</h6>
                </div>

                {{-- <div class="form-group col-md-4">
                   <label style="font-size: 13px">Father Name<span style="color: red">*</span></label>
                   <input type="text" name="sports_name" id="sports_name"
                       value="{{ old('sports_name') }}"
                       class="form-control border border-1 rounded border-dark" placeholder="Enter Name">
                   <br>
                   @error('sports_name')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>
               <div class="form-group col-md-4">
                   <label style="font-size: 13px">Father of<span style="color: red">*</span></label>
                   <input type="text" name="sports_father" id="sports_father"
                       value="{{ old('sports_father') }}"
                       class="form-control border border-1 rounded border-dark"
                       placeholder="Enter Father Name">
                   <br>
                   @error('sports_father')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror

               </div> --}}


                <div class="form-group col-md-4">
                    <label style="font-size: 13px">am serving in the Office of </label>
                    <input type="text" name="sports_office" value="{{ old('sports_office') }}" id="sports_office"
                        class="form-control border border-1 rounded border-dark" placeholder="Enter civilian office">
                    <br>
                    @error('sports_office')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label style="font-size: 13px">As (Designation)</label>
                    <input type="text" name="sports_Designation" id="sports_Designation"
                        value="{{ old('sports_Designation') }}" class="form-control border border-1 rounded border-dark">
                    <br>
                    @error('sports_Designation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group col-md-4">
                    <label style="font-size: 13px">w.e.f</label>
                    <input type="date" name="sport_wef" id="sport_wef" value="{{ old('sport_wef') }}"
                        class="form-control border border-1 rounded border-dark">
                    <br>
                    @error('sport_wef')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




            </div>
        </div>


        <div style="background-color: #0D3E02;" class="card-header border border-5 rounded border-dark mt-4 mb-3">
            <h4 class="text-white text-center">Contact Information</h4>
        </div>

        <div class="container border border-5 rounded border-dark ">
            <div class="form-row pt-3">

                <div class="form-group col-md-4">
                    <label style="font-size: 13px">Address <span style="color: red">*</span> </label>
                    <input type="text" value="{{ $studentAdmission->Address }}" name="Address" id="Address"
                        class="form-control">
                    <br>
                    @error('Address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Country <span style="color: red">*</span></label>
                    <select name="country" id="country" onchange="print_state('state',this.selectedIndex);"
                        class="custom-select">

                    </select>

                    <input type="text" hidden value="{{ $studentAdmission->Country }}" name="country_pre"
                        class="form-control">
                    <br>
                    @error('country')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Province <span style="color: red">*</span></label>
                    <select name="state" id="state" value="{{ $studentAdmission->state }}" class="custom-select">

                    </select>
                    <input type="text" hidden value="{{ $studentAdmission->Province }}" name="Province_pre"
                        class="form-control">
                    <br>
                    @error('state')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">City <span style="color: red">*</span> </label>
                    <input type="text" value="{{ $studentAdmission->City }}" name="City" id="City"
                        class="form-control" maxlength=20>
                    <br>
                    @error('City')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Tehsil <span style="color: red">*</span> </label>
                    <input type="text" value="{{ $studentAdmission->Tehsil }}" name="Tehsil" id="Tehsil"
                        class="form-control">
                    <br>
                    @error('Tehsil')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Father Cnic <span style="color: red">*</span></label>
                    <input type="text" data-inputmask="'mask': '99999-9999999-9'" name="FatherCNIC"
                        value="{{ $studentAdmission->FatherCNIC }}" id="FatherCNIC" class="form-control" maxlength=15>
                    <br>
                    @error('FatherCNIC')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Father Phone <span style="color: red">*</span></label>
                    <input type="text" value="{{ $studentAdmission->FatherPhone }}"
                        data-inputmask="'mask': '0999-9999999'" name="FatherPhone" id="FatherPhone" class="form-control"
                        maxlength=13>
                    <br>
                    @error('FatherPhone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Father Email <span style="color: red">*</span>
                    </label>
                    <input type="email" value="{{ $studentAdmission->FatherEmail }}" name="FatherEmail"
                        id="FatherEmail" class="form-control" maxlength=25>
                    <br>
                    @error('FatherEmail')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Guardian Name</label>
                    <input type="text" value="{{ $studentAdmission->GuardianName }}" name="GuardianName"
                        id="GuardianName" class="form-control" maxlength=25>
                    <br>
                    @error('GuardianName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Guardian Cnic</label>
                    <input type="text" data-inputmask="'mask': '99999-9999999-9'" name="GuardianCNIC"
                        value="{{ $studentAdmission->GuardianCNIC }}" id="GuardianCNIC" class="form-control"
                        maxlength=15>
                    <br>
                    @error('GuardianCNIC')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-2">
                    <label style="font-size: 13px">Guardian Phone </label>
                    <input type="text" value="{{ $studentAdmission->GuardianPhone }}"
                        data-inputmask="'mask': '0999-9999999'" name="GuardianPhone" id="GuardianPhone"
                        class="form-control" maxlength=13>
                    <br>
                    @error('GuardianPhone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>
                 @if (session()->has('Emp_session'))
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label style="font-size: 13px">Status <span style="color: red">*</span></label>
                    <select name="Status" class="custom-select select2">
                        <option value="{{ $studentAdmission->Status }}" selected>{{ $studentAdmission->Status }}
                        </option>
                        @if ($studentAdmission->Status == 'In Progress')
                            <option value="On Merit">On Merit</option>
                        @elseif($studentAdmission->Status == 'On Merit')
                            <option value="Completed">Completed</option>
                        @elseif($studentAdmission->Status == 'Completed' && !empty($enrollments))
                            <option value="Admitted">Admitted</option>
                        @elseif($studentAdmission->Status == 'Admitted')
                        @endif
                        <!-- 'Progress->Merit->Completed->Admitted' -->

                        <!-- <option value="Step1">Step1</option> -->



                    </select>
                </div>
                <br>
                @error('Status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @endif
        </div>


        <div class="container border border-5 rounded border-dark mt-3 mb-3">

            <div class="form-row pt-4">

                <div class="form-group col-md-6">
                    <label style="font-size: 13px">Student Files <span style="color: red">*
                            jpeg,png,jpg,pdf</span>
                    </label>
                    <input type="file" name="stdfile" id="stdfile" class="form-control">
                    <input type="text" hidden value="{{ $studentAdmission->Files }}" name="stdfile_pre"
                        id="stdfile_pre" class="form-control">
                    <br>
                    @error('stdfile')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label style="font-size: 13px">Image <span style="color: red">*
                            jpeg,png,jpg</span>
                    </label>
                    <input type="file" name="Image" id="Image" class="form-control">
                    <input type="text" hidden value="{{ $studentAdmission->Image }}" name="image_pre"
                        id="image_pre" class="form-control">
                    <br>
                    @error('Image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="container border border-5 rounded border-dark ">
                @if (session()->has('Emp_session'))
            <div class="form-row pt-3">
                <div class="form-group col-md-6">
                    <label style="font-size: 13px">Class Section <span style="color: red">*</span></label>

                    <select name="ClassSection" class="form-control">
                        <option value="{{ $studentAdmission->ClassSection }}" selected>
                            {{ $studentAdmission->ClassSection }}
                        </option>

                        @foreach (range('A', 'Z') as $letter)
                            <option value="{{ $letter }}" {{ old('ClassSection') == $letter ? 'selected' : '' }}>
                                {{ $letter }}
                            </option>
                        @endforeach
                    </select>
                    <br>
                    @error('ClassSection')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label style="font-size: 13px">Current Semester <span style="color: red">*</span>
                    </label>
                    <input type="number" value="{{ $studentAdmission->CurrentSemester }}" name="CurrentSemester"
                        id="CurrentSemester" class="form-control" maxlength=1>
                    <br>
                    @error('CurrentSemester')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


            </div>
            @endif




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
        @include('Admissions.studentEducation')

        @if (empty($DegreeBatche) && $studentAdmission->Status == 'Completed')
            <div class="form-group">
                <span class="" style="color: red;">Note: Degree Batch Not Found Enrollment will be Failed!</span>
            </div>
        @endif
        @if (empty($DegsemesterCourses) && $studentAdmission->Status == 'Completed')
            <div class="form-group">
                <span class="" style="color: red;">Note: Deg Semester Courses Not Found Enrollment will be
                    Failed!</span>
            </div>
        @endif

        <div class="form-group">
            @foreach ($enrollments as $enrollment)
                <span class="" style="color: red;">Enrolled In:
                    {{ $enrollment->semesterCourse->course->CourseName }}</span>
        </div>
        @endforeach

        <div class="form-group">
            <button id="button" type="submit"
                class="btn btn-primary btn-block submit-form">{{ $button }}</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show/hide the defence_form div based on the initial selection
            toggleDefenceForm();

            // Bind an event handler to the change event of the Category dropdown
            $('select[name="Category"]').change(function() {
                toggleDefenceForm();
            });

            var cat = @json($studentAdmission->Category);
            catFilter(cat);

            // Function to toggle the visibility of the defence_form div
            function toggleDefenceForm() {
                var selectedCategory = $('select[name="Category"]').val();
                catFilter(selectedCategory);

               
            }

            function catFilter(selectedCategory){
                 if (selectedCategory === 'Defence') {
                    $('#Shaheed_form').hide();
                    $('#Civilian_form').hide();
                    $('#defence_form').show();
                    $('#Sports_form').hide();

                } else if (selectedCategory === 'Shaheed') {
                    $('#Shaheed_form').show();
                    $('#Civilian_form').hide();
                    $('#defence_form').hide();
                    $('#Sports_form').hide();

                } else if (selectedCategory === 'Civilian') {
                    $('#Shaheed_form').hide();
                    $('#Civilian_form').show();
                    $('#defence_form').hide();
                    $('#Sports_form').hide();

                } else if (selectedCategory === 'Sports') {
                    $('#Shaheed_form').hide();
                    $('#Civilian_form').hide();
                    $('#defence_form').hide();
                    $('#Sports_form').show();

                } else {
                    $('#defence_form').hide();
                    $('#Shaheed_form').hide();
                    $('#Civilian_form').hide();
                    $('#Sports_form').hide();


                }
            }
        });
    </script>
    @include('Admissions.student_js')
    @include('Forms.formFooter')
@endsection
