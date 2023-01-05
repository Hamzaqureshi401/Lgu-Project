                  <div class="col-lg-4" 
                  style="border-top-style: dotted;
                  border-right-style: solid;
                  border-bottom-style: dotted;
                  border-left-style: solid;">
                    <div class="d-flex justify-content-center bg-dark" style="color: white;">
                      <h6>INSTALLMENT-l-FA-2022</h6><br>

                      
                    </div>
                     <img class="img-fluid" src="{{ asset('images/LOGO-Final-V2.webp') }}" alt="Order Header Image" width="470px" height="200px"/>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
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
                     <img class="img-fluid" src="{{ asset('images/IMG548hbl.jpg') }}" alt="Order Header Image" width="40px" height="30px"/ style="float:left; max-width: 20%;"/>
                    
                        <h1 style="float:right; font-size: 9px;">
                          <!-- <strong></strong><br> -->
                          To be Paid Under Account No 2310-70000910-03 Lhr <br>
                          Garrison University HBL Bank, Phase VI,DHA Lhr
                        </h1>
                    </div>
                    <!-- <div class="section-title">Challan Summary</div> -->
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md"  style="border-top-style: dotted;
                  border-right-style: solid;
                  border-bottom-style: solid;
                  border-left-style: solid;">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Particulars</th>
                          <th class="text-right">Amount</th>
                          
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Tution Fee</td>
                          <td class="text-right">{{ $challan->Amount ?? '--' }}</td>
                          
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Magazine Fee</td>
                          <td class="text-right">0.00</td>
                          
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Exam Fee</td>
                          <td class="text-right">0.00</td>
                          
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Society Fund</td>
                          <td class="text-right">0.00</td>
                          
                        </tr><tr>
                          <td>3</td>
                          <td>Misc. Fee</td>
                          <td class="text-right">0.00</td>
                          
                        </tr><tr>
                          <td>3</td>
                          <td>Registration Fee</td>
                          <td class="text-right">0.00</td>
                          
                        </tr><tr>
                          <td>3</td>
                          <td>Partical Charges</td>
                          <td class="text-right">0.00</td>
                          
                        </tr><tr>
                          <td>3</td>
                          <td>Sports Fund</td>
                          <td class="text-right">0.00</td>
                          
                        </tr><tr>
                          <td>3</td>
                          <td>Security</td>
                          <td class="text-right">0.00</td>
                          
                        </tr><tr>
                          <td>3</td>
                          <td>Admission Office</td>
                          <td class="text-right">0.00</td>
                          
                        </tr><tr>
                          <td>3</td>
                          <td>ID CARD FEE</td>
                          <td class="text-right">0.00</td>
                          
                        </tr>
                        </tr><tr>
                          <td>3</td>
                          <td>Migration Fee</td>
                          <td class="text-right">0.00</td>
                          
                        </tr>
                      </table>
                    </div>
                    <div class="">
                      <br>
                    <div class="row">
                     <!--  <div class="col-md-6 text-md-left">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Already Paid</div>
                          <div class="invoice-detail-value">$670.99</div>
                           <div class="invoice-detail-name">Total Payable</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">$685.99</div>
                        </div>
                      </div> -->
                       <div class="col-md-6 text-md-left">
                       <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Pre.outStandings</div>
                          <div class="invoice-detail-value">0.00</div>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total Pyable</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">{{ $challan->Amount ?? '--' }}</div>
                        </div>
                      </div>
                      <div class="col-md-6 text-md-right">
                       <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Pre.outStandings</div>
                          <div class="invoice-detail-value">0.00</div>
                        </div>
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Scholarship</div>
                          <div class="invoice-detail-value">0.00</div>
                        </div>
                      </div>
                    </div>

                      <div class=" text-center">
                       
                        
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                         
                          <p>Rs.20/- per day to charged after due date</p>
                          <p class="text-center" style="border-style : solid;">Bank Copy</p>
                        </div>
                      </div>
                    </div>
                </div>


                   



