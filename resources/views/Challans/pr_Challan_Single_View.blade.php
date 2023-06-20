@php
   
    $programe = explode('/', $challan->Registration->Student->StdRollNo);
@endphp

<td style="border: 5px dotted #000; padding: 10px;">
    <table>
        <tr>
            <div class="d-flex justify-content-center bg-dark" style="width: 100%">
                <span class="fw-bold fs-6">INSTALLMENT-l-FA-2022</span><br>
            </div>
            <img class="img-fluid" src="{{ asset('images/LOGO-Final-V2.png') }}" alt="Order Header Image" height="200px"
                width="330px" />
            <div class="row">
                <div class="col-2">
                    <img class="img-fluid" src="{{ asset('images/IMG548hbl.jpg') }}" alt="Order Header Image"
                        width="40px" height="40px" style="position: relative; top: 5px;" />
                </div>
                <div class="col-10 ">
                    <div style="width: 200px;">
                        <p style=" font-size: 8px; line-height: 2em;">
                            To be Paid Under Account No 2310-70000910-03 Lhr
                            Garrison University HBL Bank, Phase VI,DHA Lhr
                        </p>
                    </div>
                </div>
            </div>
            <td>
                <!-- <div class="col-md-6 text-left">
               <div class="invoice-detail-item">
                  <span class="fs-6">Challan To</span>
                  <div class="invoice-detail-value">
                    {{ $challan->Registration->Student->Std_FName}} {{$challan->Registration->Student->Std_LName}}
                     <br>
                  Roll#:{{ $challan->Registration->Student->StdRollNo }}<br>
                  <p style="font-size: 13px;">
                    Semester: {{ $challan->Registration->Student->CurrentSemester}}
                  </p>
                  Category: {{ $challan->Registration->Student->Category?? '--' }}<br>
                  Degree:{{ $challan->Registration->Student->DegreeName }}<br>
                  </div>
                </div>
               
               </div>
               <div class="col-md-6 text-right">
               <div class="invoice-detail-item">
                  <div class="invoice-detail-name"> <strong>Challan # {{ $challan->ID ?? '--' }}</strong><br></div>
                  <div class="invoice-detail-value"> <strong>{{ 'Issue date' }}:</strong><br>
                 {{ $challan->IssueDate ?? '--' }}<br>
                  <strong>Due Date:</strong><br>
                 {{ $challan->DueDate ?? '--' }}
               </div>
                </div>
                
               </div> -->
                <div class="row">
                    <div class="col-3 font-weight-bold text-left" style="font-size:10px;">
                        Challan to:
                    </div>
                    <div class="col-4" style="font-size:10px;">
                        {{ $challan->Registration->Student->Std_FName}} {{$challan->Registration->Student->Std_LName}}
                    </div>
                    <div class="col-3 font-weight-bold" style="font-size:10px;">
                        Challan #:
                    </div>
                    <div class="col-2" style="font-size:10px;">
                        <span class="" style="width: 40px; overflow: hidden; overflow-wrap: break-word;">
                            {{ $challan->ID ?? '--' }}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 font-weight-bold" style="font-size:10px;">
                        Roll No:
                    </div>
                    <div class="col-4" style="font-size:10px;">
                        {{ $challan->Registration->Student->StdRollNo }}
                    </div>
                    <div class="col-3 font-weight-bold" style="font-size:10px;">
                        Issue Date:
                    </div>
                    <div class="col-2" style="font-size:10px;">
                        {{ $challan->IssueDate ?? '--' }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 font-weight-bold" style="font-size:10px;">
                        Semester:
                    </div>
                    <div class="col-4" style="font-size:10px;">
                        {{ $challan->registration->student->AdmissionSession ?? '--'}}
                    </div>
                    <div class="col-3 font-weight-bold" style="font-size:10px;">
                        Due Date:
                    </div>
                    <div class="col-2" style="font-size:10px;">
                        {{ $challan->DueDate ?? '--' }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 font-weight-bold" style="font-size:10px;">
                        Category:
                    </div>
                    <div class="col-4" style="font-size:10px;">
                        {{ $challan->Registration->Student->Category?? '--' }}
                    </div>
                    <div class="col-3 font-weight-bold" style="font-size:10px;">
                        Degree:
                    </div>
                    <div class="col-2" style="font-size:10px;">
                        {{ $challan->registration->student->degree->DegreeName ?? '--' }}
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <!-- <td colspan="3" style="text-align:center; border:2px solid #000; padding-top:5px; padding-bottom:5px; background-color:#ccc; font-weight:bold;">Bank Copy</td> -->
        </tr>
        <tr>
            <td colspan="3" style="width:100%; height:3px;"></td>
        </tr>
        <tr>
            <td colspan="3">
                <table style="width: 100%;">
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000; font-size:14px;">Sr.#</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Particulars</td>
                        <td width="20%" style="text-align:center; border:1px solid #000; font-size:14px;">Amount</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">1</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Tution Fee</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Tuition_Fee ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">2</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Magazine Fee</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Magazine_Fee ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">3</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Exam Fee</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Exam_Fee ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">4</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Society Fund</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Society_Fee ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">5</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Misc. Fee</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Misc_Fee ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">6</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Registration Fee</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Registration_Fee ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">7</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Partical Charges</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Practical_charges ?? '--' }}</td>
                    </tr>
                    <tr>
                        <td width="15%" style="text-align:center; border:1px solid #000;">8</td>
                        <td width="65%" style=" font-size:14px; border:1px solid #000;">Sports Fund</td>
                        <td width="20%" style="text-align:right; border:1px solid #000;">
                            {{ $challan->ChallanDetail->Sports_Fund ?? '--' }}</td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        @php
            $totalamount= 
            $challan->ChallanDetail->Tuition_Fee
            +
            $challan->ChallanDetail->Magazine_Fee
            +
            $challan->ChallanDetail->Exam_Fee
            +
            $challan->ChallanDetail->Society_Fee
            +
            $challan->ChallanDetail->Misc_Fee
            +
            $challan->ChallanDetail->Registration_Fee
            +
            $challan->ChallanDetail->Practical_charges
            +
            $challan->ChallanDetail->Sports_Fund
        @endphp

        <tr>
            <td colspan="3">
                <table style="width: 100%;">
                    <tr>
                        <td width="80%" style="text-align:center; font-size:14px; border:1px solid #000;">Total
                            Amount</td>
                        <td width="20%" style="text-align:center; border:1px solid #000;">
                             {{$totalamount}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:100%; height:10px;"></td>
        </tr>
        <tr>
            <td>
                <div class="row" style="font-size:10px;">
                    <div class="col-6 text-left">Already Paid: 0.00</div>
                    <div class="col-6 text-right">Pre.OutStandings:{{ $previousBalance ?? '0.00'}}</div>
                    <div class="col-6 text-left">Scholarship: {{ $challan->Scholarship ?? 0 }}  </div>
                    <div class="col-6 text-right font-weight-bold"><span style="font-size:12px; border-style : solid;">Grand Total:<span style="font-size:12px; font-weight: bold;">{{ $challan->Amount - $challan->Scholarship + $previousBalance }}</span>

                        </span></div>
                    <div class="col-12 text-center">Rs.20/- per day to charged after due date</div>
                    <!--  <div class="col-3 font-weight-bold text-left" style="font-size:10px;">
                  </div>
                  <div class="col-4" style="font-size:10px;">
                      
                  </div>
                  <div class="col-3 font-weight-bold" style="font-size:10px;">
                      Pre.OutStandings:
                  </div>
                  <div class="col-2" style="font-size:10px;">
                      <span class="" style="width: 40px; overflow: hidden; overflow-wrap: break-word;">
                      0.00
                      </span>
                  </div> -->
                </div>
                <!--
               <div class="row">
                 <div class="col-md-6 text-left">
                  <div class="invoice-detail-item">
                     <div class="invoice-detail-name">Already Paid</div>
                     <div class="invoice-detail-value">0.00</div>
                   </div>
                   <div class="invoice-detail-item">
                     <div class="invoice-detail-name"></div>
                     <div class="invoice-detail-value invoice-detail-value-lg">{{ $challan->Amount ?? '--' }}</div>
                   </div>
                 </div>
                 <div class="col-md-6 text-right">
                  <div class="invoice-detail-item">
                     <div class="invoice-detail-name">Scholarship</div>
                     <div class="invoice-detail-value">0.00</div>
                   </div>
                   <div class="invoice-detail-item">
                     <div class="invoice-detail-name">Grand Total</div>
                     <div class="invoice-detail-value">0.00</div>
                   </div>
                 </div> -->
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width:100%; height:15px;"></td>
        </tr>
        <tr>
            <td>
                <div class="invoice-detail-item">
                    <!-- <p>Rs.20/- per day to charged after due date</p> -->
                    <p class="text-center" style="border-style : solid;">Bank Copy</p>
                </div>
            </td>
        </tr>
    </table>
</td>
