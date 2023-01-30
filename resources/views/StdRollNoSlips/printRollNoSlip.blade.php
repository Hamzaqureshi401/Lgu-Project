@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    <style>
        @media screen and (max-width: 663px) {
            .lguhead1 {

                font-size: 20px;

            }

            .lguhead2 {

                font-size: 20px;

            }
            .containerdown
            {
                flex-direction:column !important ;
                text-align: center !important;

            }


        }
    </style>

<body class="A4 landscape">
   <!-- Each sheet element should have the class "sheet" -->
   <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
      <!-- Write HTML just like a web page -->
      <div class="html-content" id="printableArea">

            <!-- Main Content -->
            <section class="section">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="padding-20">
                                <div class="page-content">
                                    <!-- Panel Example 1 -->
                                    <div class="panel">
                                        <header class="panel-heading">
                                            <div class="col-lg-12">
                                                <div class="col-lg-9">
                                                </div>
            
                                            </div>
                                        </header>
                                        <form method="post" action="https://e.lgu.edu.pk/Exam/igradeMarksEntered">
                                            <div class="panel-body containerdown d-flex flex-row">
                                                <div>
            
                                                    <img src="{{ asset('images/lgu_logo.jpg') }}"
                                                        alt="lgu logo"style="height:100px;width:100px;" />
                                                </div>
            
                                                <div>
            
                                                    <h1 class="lguhead1" style="text-align:center;margin:0px;padding-top:15px;">
                                                        LAHORE GARRISON UNIVERSITY
                                                    </h1>
                                                    <h3 class="lguhead2" class="panel-title" style="text-align:center;margin:0px;">
                                                        |STUDENT ADMIT CARD | Fa-2022 Mid Term Exam |
                                                    </h3>
                                                </div>
            
                                            </div>
                                            <div class="row pt-5 pb-5">
                                                <div class="col-6">
                                                    <h5>Std Roll No: </h5>
                                                    <h5>Name: </h5>
                                                    <h5>Section: </h5>
                                                </div>
                                                <div class="col-6">
                                                    <h5>Exam Type: </h5>
                                                    <h5>Father Name: </h5>
                                                    <h5>CNIC :</h5>
                                                </div>
                                            </div>
                                            <div class="tab-content tab-bordered" id="myTab3Content">
                                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                                    aria-labelledby="home-tab2">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>COURSE</th>
                                                                                    <th>CENTRE</th>
                                                                                    <th>DATE</th>
                                                                                    <th>TIME</th>
                                                                                    <th>GR.</th>
                                                                                    <th>ROOM</th>
                                                                                    <th>INSTRUCTOR</th>
                                                                                    <th>%</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>#</td>
                                                                                    <td>stdrollno</td>
                                                                                    <td>studentname</td>
                                                                                    <td>Class Participation Theory (5)</td>
                                                                                    <td>Assignment Theory (10)</td>
                                                                                    <td>Quiz Theory (10)</td>
                                                                                    <td>Mid Term Theory (25)</td>
                                                                                    <td>Final Term Theory (50)</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
            
                                                    <h4 style="color: red;margin-top:30px;">Note: Errors and Omissions are
                                                        expected</h4>
                                                    <h6 style="color: black;font-weight:bold;">VERIFY your Roll No Slip DATE
                                                        | TIME from Exam Date Sheet</h6>
                                                    <h6 style="color: black;font-weight:bold;">Instructions For Candidates :
                                                    </h6>
                                                    <p style="color:black;padding:0px;margin:0px;">
            
                                                        1. Bring this Admit Card & Student Identity Card during the
                                                        examination and show when required.
                                                    </p>
                                                    <p style="color:black;padding:0px;margin:0px;">
            
                                                        2. No student will be allowed to enter the Examination Hall 30
                                                        minutes after the start of paper.
                                                    </p>
                                                    <p style="color:black;padding:0px;margin:0px;">
            
                                                        3. No student will be allowed to leave the Examination Hall
                                                        before the half time is over.
                                                    </p>
                                                    <p style="color:black;padding:0px;margin:0px;">
            
                                                        4. Mobile Phones & Other Valuables are not allowed in the
                                                        examination centre.
                                                    </p>
                                                    <p style="color:black;padding:0px;margin:0px;">
            
                                                        5. In case of loss of admit card, student can get duplicate
                                                        admit card after paying prescribed fee.
                                                    </p>
                                                    <p style="color:rgb(255, 0, 0);padding:0px;margin:0px;font-weight:bolder;">
            
                                                        6. FORGING IS SERIOUS OFFENCE AND WILL RESULT IN SERIOUS
                                                        DISCIPLINARY ACTION
                                                    </p>
                                                    <p style="color:rgb(0, 0, 0);padding:0px;margin:0px;font-weight:bolder;">
            
                                                        For any correction/information, please visit the Examination
                                                        Office, Lahore Garrison University
                                                        No candidate will be entertained after due date
                                                    </p>
            
                                                    <br>
                                                    <p style="color:rgb(0, 0, 0);padding:0px;margin:0px;font-weight:bolder;">
            
                                                        PRINT DATE |TIME: {{ now()->format('Y-m-d h:i:s A') }}
            
                                                    </p>
            
                                                    <br>
                                                    <h6 style="color:rgb(0, 0, 0);font-weight:bolder;">
            
                                                        For any correction/information, please visit the Examination Office,
                                                        No candidate will be entertained after due date.<br>
                                                        Powered by : LGU ERP OFFICE- {{ now()->format('Y-m-d h:i:s A') }}
            
                                                    </h6>
            
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </section>

      </div>
   <hr>

</body>

<body>
   <section>
       <div class="bg-white text-center" style=" margin-left: 50px; margin-bottom: 90px; width:93%;">
  <a class="btn btn-warning btn-icon icon-left" style="color: white; margin: 10px;" onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print Slip</a>
  
</div>
   </section>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;
       var originalContents = document.body.innerHTML;
   
       document.body.innerHTML = printContents;
   
       window.print();
   
       document.body.innerHTML = originalContents;
    }
   
</script>
@endsection
