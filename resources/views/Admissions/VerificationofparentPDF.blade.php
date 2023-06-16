<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OPOSsum') }}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            /* border-collapse: collapse; */
            width: 100%;
            font-size: 13px;
            /* border-spacing:3px; */
            /* margin:0; */
        }

        .borderof1px {
            border: 1px solid black;
        }
    </style>
</head>

<body>


    <table class="borderof1px">
        <tr>
            <td style="width: 200px;"><img src="{{ asset('assets/img/lgu_logo.jpg') }}"
                    style="max-width: 130px; max-height: 85px" alt="Image"></td>
            <th style="text-align: left; font-size:18px !important;">LAHORE GARRISON UNIVERISTY (LGU)<br><u>VERIFICATION
                    OF PARENT'S CATEGORY</u>
            </th>
            <td>

                <table>
                    <tr>
                        (Tick the Relevant Box)
                    </tr>
                    <tr>
                        <td class="borderof1px">Serving Officer/JCOs/OR</td>
                        <td class="borderof1px" style="width:30px;"></td>
                    </tr>

                    <tr>
                        <td class="borderof1px">Retd Officer/JCOs/OR</td>
                        <td class="borderof1px" style="width:30px;"></td>
                    </tr>

                    <tr>
                        <td class="borderof1px">Defence Paid Category</td>
                        <td class="borderof1px" style="width:30px;"></td>
                    </tr>

                    <tr>
                        <td class="borderof1px">Civilian</td>
                        <td class="borderof1px" style="width:30px;"></td>
                    </tr>
                    <tr>
                        <td class="borderof1px">Shaheed</td>
                        <td class="borderof1px" style="width:30px;"></td>
                    </tr>

                </table>

            </td>
        </tr>
        <tr>
            <table style="margin-top:10px;" class="borderof1px">
                <tr>
                    <td>Student's Name: ____________________________</td>
                    <td>for Admission to Class: _________________________</td>

                </tr>
                <tr>
                    <td>This Certify that: </td>

                </tr>

            </table>
        </tr>
    </table>

    <table style="margin-top:6px;" class="borderof1px">
        <tr>
            <th style="text-align:left">1: For Serving Defence/Rangers Personal:</th>
        </tr>
        <tr class="borderof1px">
            <td>No:____________</td>
            <td>Rank:_________________</td>
            <td>Name:_____________________</td>
        </tr>
        <tr>
            <td>serving in the Army/Navy/PAF/Rangers since:_____________________</td>
            <td>now serving in:_____________________(Unit/Fmn)</td>

        </tr>
        <tr>
            <td>at:_____________________</td>
            <td>Station:_____________________</td>
            <td>Tel No:____________</td>

        </tr>

    </table>



    <table class="borderof1px">
        <tr>
            <th style="text-align:left">2: For Retired Personal:</th>
        </tr>
        <tr class="borderof1px">
            <td>I,No:____________</td>
            <td>Rank:_________________</td>
            <td colspan="2">Retired from Army/Navy/PAF/Rangers on :_____________________</td>
        </tr>
        <tr>
            <td>after serving for :_____________________</td>
            <td>Years:_________</td>
            <td>Months:_________</td>
            <td>Days From:___________</td>



        </tr>
        <tr>
            <td>to:_____________________</td>
            <td colspan="2">Cause of Discharge:__________________________</td>
        </tr>
        <tr>
            <td colspan="3" style="font-weight: bold;padding-top: 5px;color:red;">(Attach photocopy of retirement
                order/discharge certificate)</td>

        </tr>
        <tr>
            <td colspan="3" style="padding-top:5px;color:red;"><span style="font-weight: bold;">Note:</span> Original
                Dischrage
                Certificate at the time of Admission.</td>
        </tr>

    </table>


    <table class="borderof1px">
        <tr>
            <th colspan="4" style="text-align:left;">3: For Widows (Widows of Defence Force and Rangers Personal
                Only):</th>
        </tr>

        <tr class="borderof1px">
            <td>I,Mst.:______________</td>
            <td>am Widow of No:_______________</td>
            <td>Rank:_________________</td>
            <td>Name:____________________</td>

        </tr>

        <tr class="borderof1px">
            <td colspan="2">Who Expired on:______________</td>
            <td colspan="2"><span style="font-weight: bold;color:red;">Note:(Photocopy of pension book
                    attached)</span></td>


        </tr>



    </table>


    <table class="borderof1px">
        <tr>
            <th colspan="4" style="text-align:left;">4: For Civilians Paid out of Defence Estimate:</th>
        </tr>

        <tr class="borderof1px">
            <td colspan="4"><span style="font-weight: bold;color:red;">Note:(If you belong to the category of
                    civilians paid out pf Defence Estimate. Please complete following )</span></td>

        </tr>

        <tr class="borderof1px">
            <td colspan="2">Name:______________</td>
            <td colspan="2">Father of:_______________(student name)</td>
        </tr>
        <tr>
            <td colspan="2">am serving in the office of :_________________________________________________</td>
            <td colspan="2">as:______________(Designation)</td>

        </tr>
        <tr>
            <td colspan="2">w.e.f:_______________</td>
            <td colspan="2"><span style="font-weight: bold;color:red;">(attach letter from Department)</span></td>

        </tr>


    </table>

    <table class="borderof1px">
        <tr>
            <th colspan="4" style="text-align:left;">5: For LGU/LGES Staff :</th>
        </tr>
        <tr>
            <th colspan="4" style="text-align:left;font-weight:bold;">(a) Civilian Staff</th>
        </tr>
        <tr>
            <td>Name :_______________</td>
            <td>Designation :_______________</td>
            <td>Grade :_______________</td>
            <td colspan="2">Name of School/College/Campus Where employed:____________________</td>


        </tr>
        <tr>
            <th colspan="4" style="text-align:left;font-weight:bold;">(b) Defence Staff</th>
        </tr>
        <tr>
            <td colspan="2">No :_______________</td>
            <td colspan="2">Rank :_______________</td>
            <td colspan="">Name :_______________</td>
        </tr>

        <tr>
            <td colspan="2">Designation :_______________</td>
            <td colspan="">Name of School/College/Campus Where employed:____________________</td>

        </tr>
    </table>




    <table class="borderof1px">
        <tr>
            <th colspan="4" style="text-align:left;">6: My following Childern are also studying in Garrison
                Institution</th>
        </tr>
        <tr>
            <table>
                <tr>
                    <th class="borderof1px">S.No</th>
                    <th class="borderof1px">Year of Admission</th>
                    <th class="borderof1px">Name of Student</th>
                    <th class="borderof1px">Class/Section</th>
                    <th class="borderof1px">Name of School/College</th>
                </tr>

                <tr>
                    <td class="borderof1px" style="text-align: center;">1</td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                </tr>

                <tr>
                    <td class="borderof1px" style="text-align: center;">2</td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                </tr>

                <tr>
                    <td class="borderof1px" style="text-align: center;">3</td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                </tr>

                <tr>
                    <td class="borderof1px" style="text-align: center;">4</td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                    <td class="borderof1px"></td>
                </tr>
            </table>
        </tr>
    </table>

    <table style="margin-top: 10px;">
        <tr>
            <td colspan="2">Date:______________</td>
            <td colspan="2">Signature of Parent :______________</td>

        </tr>

    </table>

    <table style="margin-top: 10px;">
        <tr style="text-align: center">
            <td><span style="font-weight: bold">COUNTERSIGNED</span></td>
        </tr>
    </table>

    <table style="margin-top: 10px;">
        <tr style="text-align: left">
            <td>____________________________________________________________________________________________________________
            </td>
        </tr>
        <tr>
            <td>For Serving Personal</td>
        </tr>
        <tr>
            <td style="text-align: right">Signature of OC Unit/Head of Department/ Institution(With Stamp)</td>
        </tr>
        <tr>
          <td>

            Date: ____________
          </td>
        </tr>

    </table>

</body>

</html>
