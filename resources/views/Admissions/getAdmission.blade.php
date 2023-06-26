<!DOCTYPE html>
<html lang="en">


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Lahore Garrison University</title>
    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/bundles/fullcalendar/fullcalendar.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}"> --}}


    <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' width="5px" height="2px" type='image/x-icon'
        href='{{ asset('images/LOGO-Final-V2.png') }}' />

    <!-- Normalize or reset CSS with your favorite library -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css"> --}}

    <!-- Load paper.css for happy printing -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> --}}

    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>


    <style>
        @page {
            size: A4 landscape
        }

        .hidden_form {
            display: none;
        }
    </style>

    <!-- Custom style CSS -->


</head>

<body>
    <div class="loader"></div>
    <div id="app">


        <div class="container mt-5">
            <!-- Main Content -->
            @include('Forms.formHeader')
                <div class="card-body">


                    <div style="background-color: #0D3E02;"
                        class="card-header border border-5 rounded border-dark   mb-4 ">
                        <h4 class="text-white text-center">Applied Degree Information</h4>
                    </div>
                    <div class=" container border border-5 rounded border-dark mb-3 ">

                        <div class="form-row pt-3">
                            <br>
                            <div class="form-group col-md-6">
                                <label style="font-size: 13px">Degree<span style="color: red">*</span></label>
                                <select name="Degree_ID"
                                    class="custom-select border border-1 rounded border-dark border border-1 rounded border-dark">
                                    @foreach ($degree as $degreeid)
                                        <option value="{{ $degreeid->ID }}"
                                            {{ old('Degree_ID') === $degreeid->ID ? 'selected' : ' ' }}>
                                            {{ $degreeid->DegreeName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ID')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-md-6">

                                <label style="font-size: 13px">Admission Session<span
                                        style="color: red">*</span></label>
                                <select name="AdmissionSession"
                                    class="custom-select border border-1 rounded border-dark border border-1 rounded border-dark">
                                    @foreach ($admissionsession as $admissionsessiondeatils)
                                        <option value="{{ $admissionsessiondeatils->SemSession }}"
                                            {{ old('AdmissionSession') === $admissionsessiondeatils->SemSession ? 'selected' : ' ' }}>
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
                    <br>

                    <div style="background-color: #0D3E02;"
                        class="card-header border border-5 rounded border-dark    mb-4 ">
                        <h4 class="text-white text-center">Personal Information</h4>
                    </div>
                    <div class="form-row container border border-5 rounded border-dark">

                        <div class="form-row pt-3">
                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Student First Name <span
                                        style="color: red">*</span></label>
                                <input type="text" name="Std_FName" id="Std_FName" value="{{ old('Std_FName') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your first name" maxlength=20>
                                <br>
                                @error('Std_FName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Student Last Name <span
                                        style="color: red">*</span></label>
                                <input type="text" name="Std_LName" id="Std_LName" value="{{ old('Std_LName') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your last name" maxlength=15>
                                <br>
                                @error('Std_LName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Father Name <span style="color: red">*</span></label>
                                <input type="text" name="FatherName" value="{{ old('FatherName') }}" id="FatherName"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your father name" maxlength=25>
                                <br>
                                @error('FatherName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">

                                <label style="font-size: 13px">Student CNIC <span style="color: red">*</span></label>
                                <input type="number" value="{{ old('CNIC') }}" name="CNIC" id="CNIC"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your CNIC" oninput="maxLengthCheck(this)" maxlength="13">
                                <br>



                                <script>
                                    function maxLengthCheck(object) {
                                        if (object.value.length > object.maxLength)
                                            object.value = object.value.slice(0, object.maxLength)
                                    }

                                    function maxLengthphone(object) {
                                        if (object.value.length > object.maxLength)
                                            object.value = object.value.slice(0, object.maxLength)
                                    }
                                </script>
                                @error('CNIC')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">

                                <label style="font-size: 13px">Student Phone <span style="color: red">*</span></label>
                                <input type="number" name="StdPhone" id="StdPhone" value="{{ old('StdPhone') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your phone number" oninput="maxLengthphone(this)"
                                    maxlength="11">
                                <br>
                                @error('StdPhone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Blood Group <span style="color: red">*</span>
                                </label>
                                <select name="BloodGroup"
                                    class="custom-select border border-1 rounded border-dark border border-1 rounded border-dark">
                                    <option value="{{ old('BloodGroup') }}" selected>{{ old('BloodGroup') }}
                                    </option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB+</option>
                                </select>
                                <br>
                                <br>
                                @error('BloodGroup')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Date Of Birth <span style="color: red">*</span></label>
                                <input type="date" name="DOB" id="DOB" value="{{ old('DOB') }}"
                                    class="form-control border border-1 rounded border-dark">
                                <br>
                                @error('DOB')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Gender <span style="color: red">*</span></label>
                                <select name="Gender" value="{{ old('Gender') }}"
                                    class="custom-select border border-1 rounded border-dark">
                                    <option value="{{ old('Gender') }}" selected>{{ old('Gender') }}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <br>
                                <br>
                                @error('Gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Student Password <span
                                        style="color: red">*</span></label>
                                <input type="text" name="Password" id="Password" value="{{ old('Password') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your password" maxlength=12>
                                <br>
                                @error('Password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Nationality <span style="color: red">*</span></label>
                                <input type="text" name="Nationality" value="{{ old('Nationality') }}"
                                    id="Nationality" class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your Nationality" maxlength=12>
                                <br>
                                @error('Nationality')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">

                                <label style="font-size: 13px">Student Email <span style="color: red">*</span></label>
                                <input type="email" value="{{ old('Email') }}" name="Email" id="Email"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your Email" maxlength=25>
                                <br>
                                @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Parent Occupation <span style="color: red">*</span>
                                </label>
                                <input type="text" value="{{ old('ParentOccupation') }}" name="ParentOccupation"
                                    id="ParentOccupation" class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter your ParentOccupation " maxlength=30>
                                <br>
                                @error('ParentOccupation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-12">
                                @php
                                    $Category = ['Defence', 'Shaheed', 'Civilian', 'Sports'];
                                @endphp

                                <label style="font-size: 13px">Category <span style="color: red">*</span>
                                </label>
                                <select name="Category" class="custom-select border border-1 rounded border-dark">
                                    <option value="{{ old('Category') }}" selected>{{ old('Category') }}
                                    </option>
                                    @foreach ($Category as $Category)
                                        <option value="{{ $Category }}">{{ $Category }}</option>
                                    @endforeach
                                </select>
                                <br>
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
                                <input type="text" name="defence_No" id="defence_No"
                                    value="{{ old('defence_No') }}"
                                    class="form-control border border-1 rounded border-dark" placeholder="Enter No"
                                    maxlength=20>
                                <br>
                                @error('defence_No')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label style="font-size: 13px">Rank </label>
                                <input type="text" name="defence_Rank" id="defence_Rank"
                                    value="{{ old('defence_Rank') }}"
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
                                    value="{{ old('defence_serving_In') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter Serving In">
                                <br>
                                @error('defence_serving_In')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>





                            <div class="form-group col-md-4">
                                <label style="font-size: 13px">At</label>
                                <input type="text" name="defence_At" id="defence_At"
                                    value="{{ old('defence_At') }}"
                                    class="form-control border border-1 rounded border-dark" placeholder="Enter At">
                                <br>
                                @error('defence_At')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label style="font-size: 13px">Station </label>
                                <input type="text" name="defence_Station" id="defence_Station"
                                    value="{{ old('defence_Station') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter Station">
                                <br>
                                @error('defence_Station')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-md-4">
                                <label style="font-size: 13px">Tel No </label>
                                <input type="number" name="defence_tel_No" id="defence_tel_No"
                                    value="{{ old('tel_No') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter tel_No" oninput="maxLengthphone(this)" maxlength="11">
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
                                    value="{{ old('Shaheed_Mst_name') }}"
                                    class="form-control border border-1 rounded border-dark" placeholder="Enter Name">
                                <br>
                                @error('Shaheed_Mst_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">am Widow of No.</label>
                                <input type="text" name="Shaheed_Widow_no" id="Shaheed_Widow_no"
                                    value="{{ old('Shaheed_Widow_no') }}"
                                    class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter Widow Of No">
                                <br>
                                @error('Shaheed_Widow_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Rank </label>
                                <input type="text" name="shaheed_Rank" value="{{ old('shaheed_Rank') }}"
                                    id="shaheed_Rank" class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter Shaheed Rank">
                                <br>
                                @error('shaheed_Rank')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label style="font-size: 13px">Shaheed Name</label>
                                <input type="text" name="shaheed_Name" id="shaheed_Name"
                                    value="{{ old('shaheed_Name') }}"
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
                                <input type="date" name="civilian_wef" id="civilian_wef"
                                    value="{{ old('civilian_wef') }}"
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
                                <input type="text" name="sports_office" value="{{ old('sports_office') }}"
                                    id="sports_office" class="form-control border border-1 rounded border-dark"
                                    placeholder="Enter civilian office">
                                <br>
                                @error('sports_office')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label style="font-size: 13px">As (Designation)</label>
                                <input type="text" name="sports_Designation" id="sports_Designation"
                                    value="{{ old('sports_Designation') }}"
                                    class="form-control border border-1 rounded border-dark">
                                <br>
                                @error('sports_Designation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label style="font-size: 13px">w.e.f</label>
                                <input type="date" name="sport_wef" id="sport_wef"
                                    value="{{ old('sport_wef') }}"
                                    class="form-control border border-1 rounded border-dark">
                                <br>
                                @error('sport_wef')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>




                        </div>




                        <div style="background-color: #0D3E02;"
                            class="card-header border border-5 rounded border-dark">
                            <h4 class="text-white text-center">Contact Information</h4>
                        </div>
                        
                        <div class="form-row container border border-5 rounded border-dark mb-3 mt-3">

                            <div class="form-row pt-3">
                                <div class="form-group col-md-4">
                                    <label style="font-size: 13px">Address <span style="color: red">*</span> </label>
                                    <input type="text" value="{{ old('Address') }}" name="Address"
                                        id="Address" class="form-control border border-1 rounded border-dark"
                                        placeholder="Enter your Address">
                                    <br>
                                    @error('Address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">

                                    <label style="font-size: 13px">Country <span style="color: red">*</span></label>
                                     @if(!empty( old('country')))
                                     <input type="text" value="{{ old('country') }}" name="country"
                                         class="form-control border border-1 rounded border-dark"
                                        placeholder="Enter your country">
                                        @else(empty( old('country')))
                                    <select name="country" id="country" value="{{ old('country') }}"
                                        onchange="print_state('state',this.selectedIndex);"
                                        class="custom-select border border-1 rounded border-dark">

                                        <option value="{{ old('country') }}" selected>{{ old('country') }}
                                        </option>

                                    </select>
                                    @endif
                                    <br>
                                    <br>
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2"> 
                                    @if(!empty( old('state')))
                                    <label style="font-size: 13px">State <span style="color: red">*</span></label>
                                     <input type="text" value="{{ old('state') }}" name="state"
                                         class="form-control border border-1 rounded border-dark"
                                        placeholder="Enter your state">
                                        @else(empty( old('state')))
                                    <label style="font-size: 13px">Province <span style="color: red">*</span></label>
                                    <select name="state" id="state" value="{{ old('state') }}"
                                        class="custom-select border border-1 rounded border-dark">
                                        <option value="{{ old('state') }}" selected>{{ old('state') }}
                                        </option>
                                    </select>
                                    @endif
                                    <br>
                                    <br>
                                    @error('state')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label style="font-size: 13px">City <span style="color: red">*</span> </label>
                                    <input type="text" value="{{ old('City') }}" name="City"
                                        id="City" class="form-control border border-1 rounded border-dark"
                                        placeholder="Enter your city" maxlength=20>
                                    <br>
                                    @error('City')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-2">

                                    <label style="font-size: 13px">Tehsil <span style="color: red">*</span> </label>
                                    <input type="text" value="{{ old('Tehsil') }}" name="Tehsil"
                                        id="Tehsil" class="form-control border border-1 rounded border-dark"
                                        placeholder="Enter your Tehsil">
                                    <br>
                                    @error('Tehsil')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-2">

                                    <label style="font-size: 13px">Father Cnic <span
                                            style="color: red">*</span></label>
                                    <input type="number" name="FatherCNIC" value="{{ old('FatherCNIC') }}"
                                        id="FatherCNIC" class="form-control border border-1 rounded border-dark"
                                        oninput="maxLengthCheck(this)" maxlength="13" placeholder="Your Father CNIC">
                                    <br>
                                    @error('FatherCNIC')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group col-md-2">
                                    <label style="font-size: 13px">Father Phone <span
                                            style="color: red">*</span></label>
                                    <input type="number" value="{{ old('FatherPhone') }}" name="FatherPhone"
                                        id="FatherPhone" class="form-control border border-1 rounded border-dark"
                                        oninput="maxLengthphone(this)" maxlength="11"
                                        placeholder="Enter Your Father PhoneNo">
                                    <br>
                                    @error('FatherPhone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label style="font-size: 13px">Father Email <span style="color: red">*</span>
                                    </label>
                                    <input type="email" value="{{ old('FatherEmail') }}" name="FatherEmail"
                                        id="FatherEmail" class="form-control border border-1 rounded border-dark"
                                        maxlength=25 placeholder="Enter Your Father Email">
                                    <br>
                                    @error('FatherEmail')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-2">
                                    <label style="font-size: 13px">Guardian Name</label>
                                    <input type="text" value="{{ old('GuardianName') }}" name="GuardianName"
                                        id="GuardianName" class="form-control border border-1 rounded border-dark"
                                        maxlength=25 placeholder="Enter Your Guardian name">
                                    <br>
                                    @error('GuardianName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">

                                    <label style="font-size: 13px">Guardian Cnic</label>
                                    <input type="number" name="GuardianCNIC" value="{{ old('GuardianCNIC') }}"
                                        id="GuardianCNIC" class="form-control border border-1 rounded border-dark"
                                        oninput="maxLengthCheck(this)" maxlength="13"
                                        placeholder="Enter your father CNIC">
                                    <br>
                                    @error('GuardianCNIC')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-2">
                                    <label style="font-size: 13px">Guardian Phone </label>
                                    <input type="number" value="{{ old('GuardianPhone') }}" name="GuardianPhone"
                                        id="GuardianPhone" class="form-control border border-1 rounded border-dark"
                                        oninput="maxLengthphone(this)" maxlength="11"
                                        placeholder="Enter your Guardian PhoneNo">
                                    <br>
                                    @error('GuardianPhone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label style="font-size: 13px">Status <span style="color: red">*</span></label>
                                    <select name="Status" class="custom-select border border-1 rounded border-dark">
                                        <option value="In Progress" selected>In Progress</option>
                                    </select>
                                </div>
                                <br>
                                @error('Status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>
                    </div>
                    <div class="form-row mt-5">
                       <div class="form-group col-md-6">
  <label style="font-size: 13px">Student Files <span style="color: red">* jpeg,png,jpg,pdf</span></label>
  <input type="file" name="stdfile" id="stdfile" class="form-control border border-1 rounded border-dark">
  <br>
  @error('stdfile')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @if(old('stdfile'))
  <div>Previously uploaded file: {{ old('stdfile') }}</div>
  @endif
</div>

<div class="form-group col-md-6">
  <label style="font-size: 13px">Image <span style="color: red">* jpeg,png,jpg</span></label>
  <input type="file" name="Image" id="Image" class="form-control border border-1 rounded border-dark">
  <br>
  @error('Image')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @if(old('Image'))
  <div>Previously uploaded image: {{ old('Image') }}</div>
  @endif
</div>


                    </div>

                    <div style="background-color: #0D3E02;" class="card-header border border-5 rounded border-dark">
                        <h4 class="text-white text-center ">Student Qualification</h4>
                    </div>
                    <br>
                    <table class="table table-striped table-responsive " id="sortable-table">
                        <thead>
                            <tr>
                                <th class="text-center ">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Examination Passed</th>
                                <th>Institution Appeared</th>
                                <th>Roll No.</th>
                                <th>Date Started <br>i.e (2019)</th>
                                <th>Date Ended</th>
                                <th>Total Marks</th>
                                <th>Marks Obtained</th>


                            </tr>
                        </thead>
                        <tbody>

                            @include('Admissions.studentEducationTr')



                        </tbody>
                    </table>
                </div>
                <div class="container">

                    <div class="form-group ">
                        <a style="color:aliceblue; background-color: #0D3E02;font-weight:800;"
                            class="btn btn-block tr_clone_add">Add New Row </a>

                    </div>


                    <div class="form-group">
                        <button
                            style="background-color: #FDBF1E;color:rgb(0, 0, 0)
                            ;font-weight:800;"
                            id="button" type="submit"
                            class="btn btn-block submit-form ">{{ $button }}</button>
                            <!-- <a class="btn btn-block" onclick="generatePDF()">Generate PDF</a> -->

                    </div>
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

                // Function to toggle the visibility of the defence_form div
                function toggleDefenceForm() {
                    var selectedCategory = $('select[name="Category"]').val();

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







        @include('Forms.formFooter')
        @include('Admissions.student_js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(".tr_clone_add").live('click', function() {
 var $tr = $('#tr_clone');
    var $clone = $tr.clone();
    
    // Clear previously selected examination
     // Remove previously selected option
    //$clone.find('select[name="examination[]"]').prop('selectedIndex', -1);
   
    
    $clone.find(':text').val('');
    $tr.after($clone);
    $clone.addClass('bg-success');
    $clone.find('.tr_remove').removeClass('d-none');
            });
            
        $(".tr_remove").live('click', function() {
            $(this).closest('tr').remove(); // Remove the corresponding table row
        });
        </script>

    </div>

    </div>
    </div>

    <!-- General JS Scripts -->

    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/toastr.js') }}"></script>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/sweetalert.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script> --}}


    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/datatables.js') }}"></script>





    <script type="text/javascript">
        @if (session('successToaster'))

            var msg = "{{ session('successToaster') }}";
            var title = "{{ session('title') }}";

            iziToast.success({
                title: title,
                message: msg,
                position: 'topRight'
            });
        @elseif (session('errorToaster'))
            var msg = "{{ session('errorToaster') }}";
            var title = "{{ session('title') }}";
            iziToast.error({
                title: title,
                message: msg,
                position: 'topRight'
            });
        @elseif (session('infoToaster'))
            var msg = "{{ session('infoToaster') }}";
            var title = "{{ session('title') }}";
            iziToast.info({
                title: title,
                message: msg,
                position: 'topRight'
            });
        @elseif (session('warningToaster'))
            var msg = "{{ session('warningToaster') }}";
            var title = "{{ session('title') }}";
            iziToast.warning({
                title: title,
                message: msg,
                position: 'topRight'
            });
        @endif

        function generatePDF() {
  var doc = new jsPDF();

  // Get the form element
  var formElement = document.getElementById('myForm');

  // Get all form fields
  var formFields = formElement.elements;

  // Loop through form fields and add them to the PDF
  for (var i = 0; i < formFields.length; i++) {
    var field = formFields[i];
    var fieldName = field.name;
    var fieldValue = field.value;

    // Add the field name and value to the PDF
    doc.text(fieldName + ': ' + fieldValue, 10, 10 + i * 10);
  }

  // Save the PDF
  doc.save('form.pdf');
}


    </script>



</body>


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->

</html>
{{-- @include('js.form_submit_script') --}}
