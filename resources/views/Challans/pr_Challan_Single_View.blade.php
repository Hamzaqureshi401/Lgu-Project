@push('styles')
<style type="text/css">
    .bnk{
        text-align:center; 
        border:2px solid #000; 
        padding-top:5px; 
        padding-bottom:5px; 
        background-color:#ccc; 
        font-weight:bold;
    }
</style>
@endpush
    <td>
        <table >
            <tr>
                   <div class="d-flex justify-content-center bg-dark">
                      <h6>INSTALLMENT-l-FA-2022</h6><br>
                    </div>
                     <img class="img-fluid" src="{{ asset('images/LOGO-Final-V2.png') }}" alt="Order Header Image" width="470px" height="200px"/>
                    <div>
                     <img class="img-fluid" src="{{ asset('images/IMG548hbl.jpg') }}" alt="Order Header Image" width="40px" height="30px"/ style="float:left; max-width: 20%;"/>
                    
                        <p style=" line-height: 1.5em;
                            height: 3em;
                            overflow: hidden;">
                          
                          To be Paid Under Account No 2310-70000910-03 Lhr
                          Garrison University HBL Bank, Phase VI,DHA Lhr
                        </p>
                    </div>
                 <div class="row">
                      <div class="col-md-6 text-left">
                        <address>
                          <strong>Challan To:
                          </strong><br>
                          
                            @php
                          $programe = explode('/' , Session::get('user'))
                          @endphp
                          

                          {{ session::get('Std_FName') }} {{ session::get('Std_LName') }}<br>
                          Roll#:{{ $programe[2] }}<br>
                          Semester: {{ $programe[0] }}<br>
                          Category: {{ $challan->Type ?? '--' }}<br>
                          Degree:{{ $programe[1]}}<br>
                           <br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Challan # {{ $challan->ID ?? '--' }}</strong><br>
                          
                        </address>
                        <address>
                          <strong>{{ "Issue date" }}:</strong><br>
                         {{ $challan->IssueDate ?? '--' }}
                          
                        </address>
                        <address>
                          <strong>Due Date:</strong><br>
                         {{ $challan->DueDate ?? '--' }}<br><br>
                        </address>
                      </div>
                    </div>
                    <div>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center; border:2px solid #000; padding-top:5px; padding-bottom:5px; background-color:#ccc; font-weight:bold;">Bank Copy</td>
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
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">2</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Magazine Fee</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">3</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Exam Fee</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">4</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Society Fund</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">5</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Misc. Fee</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">6</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Registration Fee</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">7</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Partical Charges</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">8</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Sports Fund</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">9</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Security</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">10</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Admission Office</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">11</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">ID Card Fee</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>
                             <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">12</td>
                                <td width="65%" style=" font-size:14px; border:1px solid #000;">Migration Fee</td>
                                <td width="20%" style="text-align:right; border:1px solid #000;">1500</td>
                            </tr>

                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                       <table style="width: 100%;">
                            <tr>
                                <td width="80%" style="text-align:center; font-size:14px; border:1px solid #000;">Total Amount</td>
                                <td width="20%" style="text-align:center; border:1px solid #000;">1500</td>
                            </tr>
                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:30px;"></td>
            </tr>

            <tr>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Depositor Signature</td>
                <td style="width:5%; "></td>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Bank Signature</td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:15px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;">
                    <strong style="font-size:14px;">TERMS</strong>
                    <p style="font-size:12px;"> Amount deposit is non-refundable. Deposit can be made in any Branch of MCB. </p>
                </td> 
            </tr>
            
        </table>
    </td>

