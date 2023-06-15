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
        <tr>
        <td>
            <b style="display: inline;">1.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Applicants Name:</p>
        </td>
        </tr>
         <tr>
         <td>
            <b style="display: inline;">2.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">National Identity Card No:</p>
        </td>
        </tr>
         <tr>
         <td>
            <b style="display: inline;">3.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Applicants Name:</p>
            <b style="display: inline;">4.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Applicants Name:</p>
            <b style="display: inline;">5.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Applicants Name:</p>
            <b style="display: inline;">6.</b>
            <p style="display: inline; margin: 0; margin-left: 5px;">Applicants Name:</p>
        </td>
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
       
            <tr class="table-td">
                <td class="text-center" style="border-style: none">
                    {{ "1" }}
                </td>
                <td class="text-left" style="border-style: none">
                    {{ "Convenience Product" }}
                </td>
                <td class="text-center" style="border-style: none">
                    {{ "999,999.99" }}
                </td>
                <td style="text-align:center;border-style: none">
                    {{ "1" }}
                </td>

                <td style="text-align:center;border-style: none">
                    {{ "999,999.99" }}
                </td>
                 <td style="text-align:center;border-style: none">
                    {{ "999,999.99" }}
                </td>
                

            </tr>
        
    </table>

    
</body>
</html>