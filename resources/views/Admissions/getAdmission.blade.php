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
    <style>
        @page {
            size: A4 landscape
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
            <form id="myForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                    <div class=" container border border-5 rounded border-dark mb-3">

                        <div class="card-header border border-5 rounded border-dark   bg-success mb-4 ">
                            <h4 class="text-white text-center">Applied Degree Information</h4>
                        </div>
                    <div class="form-row ">
                        <br>
                        <div class="form-group col-md-6">
                            <label style="font-size: 13px">Degree<span style="color: red">*</span></label>
                            <select name="Degree_ID" class="custom-select border border-1 rounded border-dark border border-1 rounded border-dark">
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

                            <label style="font-size: 13px">Admission Session<span style="color: red">*</span></label>
                            <select name="AdmissionSession" class="custom-select border border-1 rounded border-dark border border-1 rounded border-dark">
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

                    <div class="form-row container border border-5 rounded border-dark">
                        <div class="card-header border border-5 rounded border-dark   bg-success mb-4 ">
                            <h4 class="text-white text-center">Personal Information</h4>
                        </div>

                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Student First Name <span style="color: red">*</span></label>
                            <input type="text" name="Std_FName" id="Std_FName" value="{{ old('Std_FName') }}"
                                class="form-control border border-1 rounded border-dark" maxlength=20>
                            <br>
                            @error('Std_FName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Student Last Name <span style="color: red">*</span></label>
                            <input type="text" name="Std_LName" id="Std_LName" value="{{ old('Std_LName') }}"
                                class="form-control border border-1 rounded border-dark" maxlength=15>
                            <br>
                            @error('Std_LName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Father Name <span style="color: red">*</span></label>
                            <input type="text" name="FatherName" value="{{ old('FatherName') }}" id="FatherName"
                                class="form-control border border-1 rounded border-dark" maxlength=25>
                            <br>
                            @error('FatherName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">

                            <label style="font-size: 13px">Student CNIC <span style="color: red">*</span></label>
                            <input type="number" value="{{ old('CNIC') }}" name="CNIC" id="CNIC"
                                class="form-control border border-1 rounded border-dark" oninput="maxLengthCheck(this)" maxlength="13">
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
                                class="form-control border border-1 rounded border-dark" oninput="maxLengthphone(this)" maxlength="11">
                            <br>
                            @error('StdPhone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Blood Group <span style="color: red">*</span>
                            </label>
                            <select name="BloodGroup" class="custom-select border border-1 rounded border-dark border border-1 rounded border-dark">
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
                            <select name="Gender" value="{{ old('Gender') }}" class="custom-select border border-1 rounded border-dark">
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
                            <label style="font-size: 13px">Student Password <span style="color: red">*</span></label>
                            <input type="text" name="Password" id="Password" value="{{ old('Password') }}"
                                class="form-control border border-1 rounded border-dark" maxlength=12>
                            <br>
                            @error('Password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Nationality <span style="color: red">*</span></label>
                            <input type="text" name="Nationality" value="{{ old('Nationality') }}"
                                id="Nationality" class="form-control border border-1 rounded border-dark" maxlength=12>
                            <br>
                            @error('Nationality')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">

                            <label style="font-size: 13px">Student Email <span style="color: red">*</span></label>
                            <input type="email" value="{{ old('Email') }}" name="Email" id="Email"
                                class="form-control border border-1 rounded border-dark" maxlength=25>
                            <br>
                            @error('Email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Parent Occupation <span style="color: red">*</span>
                            </label>
                            <input type="text" value="{{ old('ParentOccupation') }}" name="ParentOccupation"
                                id="ParentOccupation" class="form-control border border-1 rounded border-dark" maxlength=30>
                            <br>
                            @error('ParentOccupation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-2">
                            @php
                                $Category = ['Defence', 'Shaheed', 'Civilion', 'Sports'];
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

                </div>






                <div class="form-row container border border-5 rounded border-dark mb-5 mt-4">
                    <div class="card-header border border-5 rounded border-dark   bg-success mb-4 ">
                        <h4 class="text-white text-center">Contact Information</h4>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label style="font-size: 13px">Address <span style="color: red">*</span> </label>
                            <input type="text" value="{{ old('Address') }}" name="Address" id="Address"
                                class="form-control border border-1 rounded border-dark">
                            <br>
                            @error('Address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">

                            <label style="font-size: 13px">Country <span style="color: red">*</span></label>
                            <select name="country" id="country" value="{{ old('country') }}"
                                onchange="print_state('state',this.selectedIndex);" class="custom-select border border-1 rounded border-dark">

                                <option value="{{ old('country') }}" selected>{{ old('country') }}
                                </option>

                            </select>
                            <br>
                            <br>
                            @error('country')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Province <span style="color: red">*</span></label>
                            <select name="state" id="state" value="{{ old('state') }}"
                                class="custom-select border border-1 rounded border-dark">
                                <option value="{{ old('state') }}" selected>{{ old('state') }}
                                </option>
                            </select>
                            <br>
                            <br>
                            @error('state')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">City <span style="color: red">*</span> </label>
                            <input type="text" value="{{ old('City') }}" name="City" id="City"
                                class="form-control border border-1 rounded border-dark" maxlength=20>
                            <br>
                            @error('City')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">

                            <label style="font-size: 13px">Tehsil <span style="color: red">*</span> </label>
                            <input type="text" value="{{ old('Tehsil') }}" name="Tehsil" id="Tehsil"
                                class="form-control border border-1 rounded border-dark">
                            <br>
                            @error('Tehsil')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-2">

                            <label style="font-size: 13px">Father Cnic <span style="color: red">*</span></label>
                            <input type="number" name="FatherCNIC" value="{{ old('FatherCNIC') }}" id="FatherCNIC"
                                class="form-control border border-1 rounded border-dark" oninput="maxLengthCheck(this)" maxlength="13">
                            <br>
                            @error('FatherCNIC')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Father Phone <span style="color: red">*</span></label>
                            <input type="number" value="{{ old('FatherPhone') }}" name="FatherPhone"
                                id="FatherPhone" class="form-control border border-1 rounded border-dark" oninput="maxLengthphone(this)" maxlength="11">
                            <br>
                            @error('FatherPhone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Father Email <span style="color: red">*</span>
                            </label>
                            <input type="email" value="{{ old('FatherEmail') }}" name="FatherEmail"
                                id="FatherEmail" class="form-control border border-1 rounded border-dark" maxlength=25>
                            <br>
                            @error('FatherEmail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Guardian Name</label>
                            <input type="text" value="{{ old('GuardianName') }}" name="GuardianName"
                                id="GuardianName" class="form-control border border-1 rounded border-dark" maxlength=25>
                            <br>
                            @error('GuardianName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">

                            <label style="font-size: 13px">Guardian Cnic</label>
                            <input type="number" name="GuardianCNIC" value="{{ old('GuardianCNIC') }}"
                                id="GuardianCNIC" class="form-control border border-1 rounded border-dark" oninput="maxLengthCheck(this)"
                                maxlength="13">
                            <br>
                            @error('GuardianCNIC')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label style="font-size: 13px">Guardian Phone </label>
                            <input type="number" value="{{ old('GuardianPhone') }}" name="GuardianPhone"
                                id="GuardianPhone" class="form-control border border-1 rounded border-dark" oninput="maxLengthphone(this)"
                                maxlength="11">
                            <br>
                            @error('GuardianPhone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-2">
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

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label style="font-size: 13px">Student Files <span style="color: red">*
                                    jpeg,png,jpg,pdf</span>
                            </label>
                            <input type="file" value="{{ old('stdfile') }}" name="stdfile" id="stdfile"
                                class="form-control border border-1 rounded border-dark">
                            <br>
                            @error('stdfile')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label style="font-size: 13px">Image <span style="color: red">*
                                    jpeg,png,jpg</span>
                            </label>
                            <input type="file" value="{{ old('Image') }}" name="Image" id="Image"
                                class="form-control border border-1 rounded border-dark">
                            <br>
                            @error('Image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>

                    <div class="card-header border border-5 rounded border-dark   bg-success">
                        <h4 class="text-white text-center ">Student Qualification</h4>
                    </div>
                    <br>
                        <table class="table table-striped  " id="sortable-table">
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
                        <div class="form-group">
                            <a class="btn btn-success btn-block tr_clone_add" style="color:white;">Add New Row </a>

                        </div>


                        <div class="form-group">
                            <button id="button" type="submit"
                                class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                        </div>
                    </div>
            </form>
            @include('Forms.formFooter')
            @include('Admissions.student_js')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

            <script type="text/javascript">
                $(".tr_clone_add").live('click', function() {
                    var $tr = $('#tr_clone').closest('#tr_clone');
                    var $clone = $tr.clone();
                    $clone.find(':text').val('');
                    $tr.after($clone);
                    $clone.addClass('bg-success');
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
    </script>

</body>


<!-- basic-form.html  21 Nov 2019 03:54:41 GMT -->

</html>
{{-- @include('js.form_submit_script') --}}
