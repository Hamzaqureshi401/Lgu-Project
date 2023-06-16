<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'OPOSsum') }}</title>

<style>
body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    color: #212529;
    text-align: left;
    background-color: #fff;
}
.bg-refund{
    color:#fff;
    background:#ff7e30;
    border-color:#ff7e30
}
.table{
    width: 100%!important;
    border-style: none;
}
.thead-dark {
    color: white;
    border-color: #343a40;
    background-color: #343a40;

}
#table-th th{
    font-size: 12px!important;
}
.text-center{
    text-align: center;
}
.text-left{
    text-align: left;
}
.text-right{
    text-align: right;
}
.table-td td{
    font-size: 12px!important;
}
p {
    margin-top: 0;
    margin-bottom: 0rem;
    font-size: 12px;
}

hr{
    margin-bottom: 0;
}
#item tr  td {
    padding-top: 6px !important;
    padding-bottom: 6px !important;
    vertical-align: middle !important;
}
#item tr th{
    font-size: 12px;
    padding-top: 8px !important;
    padding-bottom: 8px !important;
    vertical-align: middle !important;
}

td{
    border-style: none;
}
th{
    border-style: none;
}

.text-bold {
    font-weight: bold;
    font-size: 12px;
}

span {
    font-size: 12px;
}

tr td span{
    /*width: 80px !important;*/
    /*height: 60px !important;*/
    text-align: center;
    vertical-align: middle;
    font-size: 12px;
    cursor: pointer;
    padding: 10px 20px;
    color: black;
    display: inline-block;
    font-weight: 400;
    margin-top: 10px;
}
.active{
    border-radius: 10px;
    color: white;
    padding: 10px 25px;
    background-color: black;
}
.rad-info-box .heading {
    font-size: 1.2em;
    font-weight: 300;
    text-transform: uppercase;
}
.row-spacing td {
        padding-bottom: 10px;
    }
    .underline {
        text-decoration: underline;
    }
    .table-td td {
        border: 1px solid black;
        padding: 5px;
    }
</style>
</head>
<body>
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





<!-- First Form End -->

 <table border="0" style="width:100%; border-collapse: collapse ; margin-top: 230px;" cellspacing="0" cellpadding="0">
   <tr ellpadding="0" cellspacing="0" style="width: 100%">
      <td valign="middle" class="text-center" style="width:100%"><b>DECLARATION BY THE CANDIDATE</b></td>
   </tr>
    <tr class="row-spacing">
        <td>
            
        </td>
   <tr class="row-spacing">
      <td>
         <p  style="font-size: 14px;">I <u>{{ strtoupper($data['student']['Std_FName'] ?? '--')}} {{ strtoupper($data['student']['Std_LName'])}}</u> S/0, D/0 <u>{{ $data['student']['FatherName'] ?? '--'}}</u> do solemnly declare that</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(a) I am applying for admission to Lahore Garrison University, Lahore with the consent of my father/guardian.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(b)I have not taken admission in any other college University.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(c) I have neither been expelled from any institution nor have any disciplinary action taken against for any offence.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(d)All the documents attached with this application are genuine and that if at any stage these are found to be false/forged, the University reserves the right to cancel my admission and take disciplinary action against me.
            I have carefully read the rules of attendance/penalties for absence as given in the University Prospectus, and that shall have no objection if:
         </p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(a)l am stuck off the college rules on account of any continuous absence for 5 or more days in a calendar</p>
      </td>
   </tr>
   <tr style="width: 100%">
      <td style="width:50% padding-bottom: 30px;;"><span>Date____________</span></td>
      <td colspan="3" align="right" style="width: 50%; padding-top: 50px;">
    <span style="border-top: 1px solid black;">Signature of Candidate</span>
</td>
   </tr>
   <tr ellpadding="0" cellspacing="0" style="width: 100%">
      <td style="width:50%;"><span></span></td>
      <td colspan="3" align="right"  style="width:50%;"><span>Name____________</span></td>
   </tr>
</table>


<table border="0" style="width:100%; border-collapse: collapse ; margin-top: 5px;" cellspacing="0" cellpadding="0">
   <tr ellpadding="0" cellspacing="0" style="width: 100%">
      <td valign="middle" class="text-center" style="width:100%"><b>DECLARATION BY THE FATHER/GUARDIAN</b></td>
   </tr>
    <tr class="row-spacing">
        <td>
            
        </td>
   <tr class="row-spacing">
      <td>
         <p  style="font-size: 14px;">I <u>{{ $data['student']['FatherName'] ?? '--'}}</u> father/guardian of <u>{{ strtoupper($data['student']['Std_FName'] ?? '--')}} {{ strtoupper($data['student']['Std_LName'])}}</u></p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px;">take upon me the responsibility of paying all University dues, i.e., tuition fee, fines, etc, according to the University Rules and Regulation on time. I shall also be responsible to make good any loss to the University resulting from breakage of laboratory apparatus, etc., or any damage to University property caused by my son/daughter/ward..</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px;">I solemnly declare that all the particulars of the candidate given in this application from are true to the best of my knowledge and belief.
I understand that in case my son/daughter ward becomes a member of political student organization not authorized by this University, discretion to expel my son/word from the college on the basis of violation of Universitv discipline rules and to withhold his admission to the University Exam on the basis of insufficient attendance/poor performance in Send-Up Exams, as University Rules, I assure the University Authorities of my cooperation in case I am asked to see them in connection with any matter concerning my son/daughter/word. have an objection if:-</p>
      </td>
   </tr>
   <tr >
      <td >
         <p style="font-size: 14px; margin-left: 30px;">           (a) My son/daughter/ward is struck off university rules on account of his/her absence for continuous 05 or more days in a calendar months.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">           (b) Admission of my son/daughter/ward to the University Exam is with held on account of his/her failure to complete the minimum attendance (i.e, 80%).
         </p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">           (c) Admission of my son/daughter/ward to the University Exam is with held on account of his/her failure in Send-Up Pre-University Exam.
</p>
      </td>
   </tr>
   <tr style="width: 100%">
      <td style="width:50%;"><span>Date____________</span></td>
      <td colspan="3" align="right" style="width: 50%;">
    <span style="border-top: 1px solid black;">Signature of Father/Guardian</span>
</td>
   </tr>
   <tr ellpadding="0" cellspacing="0" style="width: 100%">
      <td style="width:50%;"><span></span></td>
      <td colspan="3" align="right"  style="width:50%;"><span>Name____________</span></td>
   </tr>
</table>

 <table border="0" style="width:100%; border-collapse: collapse ;" cellspacing="0" cellpadding="0">
   <tr ellpadding="0" cellspacing="0" style="width: 100%">
      <td  style="width:100%"><b>Documents to be attached:</b></td>
   </tr>
    <tr class="row-spacing">
        <td>
            
        </td>
   <tr class="row-spacing">
      <td>
         <p  style="font-size: 14px;">Please attach two set of photocopies duly attested:</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(1) Academic Certificates and Mark Sheets.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(2) Character Certificate from last Attended Institute.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(3) Computerized National Identity Card (if applicable) or Form B.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(4) No Objection Certificate/Migration Certificate (Equivalent certificate).
         </p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(5) Father/Guardian's Computerized Identity Card.</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(6) Discharge Certificate (for armed force/defence paid/retail personnel's).</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 30px;">(7) Photographs size 1.5" 1.5" (4 copies).</p>
      </td>
   </tr>
   <tr>
      <td>
         <p style="font-size: 14px; margin-left: 20px;">Note: The Application will not be accepted unless accompanied by the above listed documents.</p>
      </td>
   </tr>
  
</table>
    




</body>
</html>