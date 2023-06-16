 <table border="0" style="width:100%; border-collapse: collapse" cellspacing="0" cellpadding="0">
        <tr style="width: 100%">
            <td style="width:50%;"><span>Roll No____________<br>(For Office Use only)</span></td>
        <td colspan="3" align="right"  style="width:50%;"><span>Form No____________</span></td>
        </tr>
        <tr style="width: 100%">
    <td style="width:10%;">
        <img src="{{ public_path('images/lgu_logo.jpg') }}" style="width: 130px; height: 130px" alt="Image">
    </td>
     <td style="width:80%;"><p class="text-left" style="font-size:25px; margin-left: -50px;">Lahore Garrison University</p></td>
       
    <td style="width:10%;">
        <img src="{{ public_path('images/lgu_logo.jpg') }}" style="width: 130px; height: 130px" alt="Image">
    </td>
</tr>
    </table>
    <table border="0" style="width:100%; border-collapse: collapse" cellspacing="0" cellpadding="0">
        <tr ellpadding="0" cellspacing="0" style="width: 100%">
            <td valign="middle" class="text-center" style="width:100%"><b>Programme Applying For:Fa-2024</b></td>
        </tr>
        <tr style="width: 100%" >
            <td ><span class="thead-dark">Persional Details</span></td>
        
        </tr>
       <tr class="row-spacing">
        <td>
            
        </td>
    </tr>
    

   <tr class="row-spacing">
        <td>
            <b style="display: inline;">1.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Applicants Name: <u>{{ strtoupper($data['student']['Std_FName'] ?? '--')}} {{ strtoupper($data['student']['Std_LName'])}}</u></p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">2.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">National Identity Card No: <u>{{ $data['student']['CNIC'] ?? '--'}}</u></p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">3.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Date Of Birth: <u>{{ $data['student']['DOB'] ?? '--'}}</u></p>
            <b style="display: inline;">4.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Nationality: <u>{{ $data['student']['Nationality'] ?? '--'}}</u></p>
            <b style="display: inline;">5.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Religion: <u>{{ $data['student']['Religion'] ?? '--'}}</u></p>
            <b style="display: inline;">6.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Section: <u>{{ $data['student']['Section'] ?? '--'}}</u></p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">7.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Name Of Father: <u>{{ $data['student']['FatherName'] ?? '--'}}</u></p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">8.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Name Of Gardian: <u>{{ $data['student']['GuardianName'] ?? '--'}}</u></p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">9.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">CNIC No. of Father/Guardian: <u>{{ $data['student']['FatherCNIC'] ?? '--'}}</u></p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">10.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Father/Guardian's Address(Govt/Private Service/Place of Work: <u>{{ $data['student']['workAddress'] ?? '--'}}</p>
            <p style="display: inline; margin: 0; margin-left: 5px;">Address: <u>{{ $data['student']['Address'] ?? '--'}}</p>
            <p style="display: inline; margin: 0; margin-left: 5px;">Designation: <u>{{ $data['student']['Designation'] ?? '--'}}</p>
            <p style="display: inline; margin: 0; margin-left: 5px;">TelePhone / Mob: <u>{{ $data['student']['workTel'] ?? '--'}}</p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">11.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Parent Residential Address:  <u>{{ $data['student']['Address'] ?? '--'}}</p></p>
            <p style="display: inline; margin: 0; margin-left: 5px;">Telephone No.Res:  <u>{{ $data['student']['TelNo'] ?? '--'}}</p></p>
        </td>
    </tr>
    <tr class="row-spacing">
        <td>
            <b style="display: inline;">12.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Permanent Address:  <u>{{ $data['student']['perAddress'] ?? '--'}}</p></p>
            <p style="display: inline; margin: 0; margin-left: 5px;">Emergency Telephone No:  <u>{{ $data['student']['emergencyTel'] ?? '--'}}</p></p>
            <p style="display: inline; margin: 0; margin-left: 5px;">E-mail:  <u>{{ $data['student']['Email'] ?? '--'}}</p></p>
            <p style="display: inline; margin: 0; margin-left: 5px;">Blood Group:  <u>{{ $data['student']['BloodGroup'] ?? '--'}}</p></p>
        </td>
    </tr>

    <tr style="width: 100%">
        <td><span class="thead-dark">Qualification</span></td>
    </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" class="table" id="item" style="margin-top: 5px; width:100%">
        <thead class="thead-dark">
        <tr id="table-th" style="border-style: none">
            <th valign="middle" class="text-center" style="width:16%;">Examination Passed</th>
            <th valign="middle" class="text-center" style="width:16%;">Date Started</th>
            <th valign="middle" class="text-center" style="width:16%">Date End</th>
            <th valign="middle" class="text-center" style="width:16%;">Roll No.</th>
            <th valign="middle" class="text-center" style="width:16%;">Total Marks&nbsp;</th>
            <th valign="middle" class="text-center" style="width:16%;">Marks Obtained</th>
        </tr>
        </thead>
       @foreach( $data['education'] as $education)
        <tr class="table-td">
            <td class="text-center">
                {{ $education->InstitutionName }}
            </td>
            <td class="text-left">
                {{ $education->DateStarted ?? '--'}}
            </td>
            <td class="text-center">
                {{ $education->DateEnd ?? '--'}}
            </td>
            <td class="text-center">
                {{ $education->Rollno ?? '--'}}
            </td>
            <td class="text-center">
                {{ $education->TotalMarks ?? '--'}}
            </td>
            <td class="text-center">
                {{ $education->ObtainedMarks ?? '--'}}
            </td>
        </tr>
    @endforeach
    </table>
    <table border="0" style="width:100%; border-collapse: collapse ; margin-top: 50px;" cellspacing="0" cellpadding="0">
            <tr style="width: 100%">
            <td style="width:50%;"><span>Date____________</span></td>
        <td colspan="3" align="right"  style="width:50%;"><span>Signature Of Candidate____________</span></td>
        </tr>
    </table>