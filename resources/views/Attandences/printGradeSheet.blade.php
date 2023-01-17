@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
<!-- Main Content -->
<div class="row">
   <div class="col-12 col-md-6 col-lg-12">
      <div class="card">
         <div aria-hidden="true" style="" class="floatThead-container">
            <table class="" style="">
               <thead>
                  <tr>
                     <th width="15%">
                        <img class="img-fluid" src="{{ asset('images/lgu_logo.jpg') }}"
                           alt="Order Header Image"style=" height: 115px;        margin-bottom: 18px;        margin-left: 58px;" />
                     </th>
                     <th width="55%">
                        <h1 style="text-align:center">
                           Lahore Garrison University
                        </h1>
                        <h3 class="panel-title" style="text-align:center">
                           Award List - I GRADE MARKS ENTRY { Fa-2021 }
                        </h3>
                     </th>
                     <th width="30%" rowspan="3">
                        <h1 class="stamp" style=" margin-bottom: 39px">
                           Not Submitted
                        </h1>
                     </th>
                  </tr>
               </thead>
            </table>
         </div>
      </div>
   </div>
</div>
<section class="section" id="printableArea">
   <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-info">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-info d-flex justify-content-center">
                              <h4 style="color: white;">Courses Info</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ 'Create Short Attandence Report' }}</button> -->
                           </div>
                        </div>
                     </div>
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
                                             <th>Course Code</th>
                                             <td> {{ $SemesterCourse->course->CourseCode ?? '--' }}</td>
                                          </tr>
                                          <tr>
                                             <th>Courses Name</th>
                                             <td>{{ $SemesterCourse->course->CourseName ?? '--' }}</td>
                                          </tr>
                                          <tr>
                                             <th>Credit Hours</th>
                                             <td>{{ $SemesterCourse->course->CreditHours ?? '--' }}</td>
                                          </tr>
                                          <th>Asessment</th>
                                          <td>{{ $type ?? '--' }}</td>
                                          </tr>
                                       </thead>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
         <div class="card">
            <div  class="padding-20">
            </div>
         </div>
      </div>
   </div>
   <div class="card">
      <div class="card-body p-0">
         <div class="table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Grades :</th>
                     <th>A </th>
                     <th>A-</th>
                     <th>B+ </th>
                     <th>B </th>
                     <th>B-</th>
                     <th>C+ </th>
                     <th>C </th>
                     <th>C-</th>
                     <th>D </th>
                     <th>F </th>
                     <th>Mean </th>
                     <th>Adj. Mean </th>
                  </tr>
                  <tr>
                     <th>
                        Ranges
                     </th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                  <tr>
                     <th>Frequency :</th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                  </tr>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-success">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-success d-flex justify-content-center">
                              <h4 style="color: white;">Student Result</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ 'Create Short Attandence Report' }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel"
                     aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                              </div>
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Student Roll No. </th>
                                             <th>Student Name </th>
                                             <th>Class Participation Theory
                                                {{ 't' }} 
                                             </th>
                                             <th>Assignment Theory {{ 't' }} </th>
                                             <th>Quiz Theory {{ 't' }} </th>
                                             <th>Mid Term Theory {{ 't' }} </th>
                                             <th>Final Term Theory {{ 't' }} </th>
                                             <th>Total </th>
                                             <th>Grade</th>
                                             <th>I Grade</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($enrollments as $enrollment)
                                          <tr>
                                             <td>{{ $enrollment->student->StdRollNo }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>
                                                <div class="form-group">
                                                   @php
                                                   $grades = ['Actual Grade', 'Grade', 'Igrade'];
                                                   @endphp
                                                   <select class="form-control" name="Dpt_ID"
                                                      required>
                                                      <option value="Abscent" selected>Absent
                                                      </option>
                                                      @foreach ($grades as $grade)
                                                      <option value="{{ $grade }}">
                                                         {{ $grade }}
                                                      </option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-danger">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-danger d-flex justify-content-center">
                              <h4 style="color: white;">Student Result Excluded from Grade</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ 'Create Short Attandence Report' }}</button> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel"
                     aria-labelledby="home-tab2">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                              </div>
                              <div class="card-body p-0">
                                 <div class="table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Student Roll No. </th>
                                             <th>Student Name </th>
                                             <th>Class Participation Theory
                                                {{ 't' }} 
                                             </th>
                                             <th>Assignment Theory {{ 't' }} </th>
                                             <th>Quiz Theory {{ 't' }} </th>
                                             <th>Mid Term Theory {{ 't' }} </th>
                                             <th>Final Term Theory {{ 't' }} </th>
                                             <th>Total </th>
                                             <th>Grade</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($enrollments as $enrollment)
                                          <tr>
                                             <td>{{ $enrollment->student->StdRollNo }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName }}
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-md-6 col-lg-12">
         <div class="card">
            <div class="padding-20">
               <div class="section-body bg-info">
                  <div class="row">
                     <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                           <div class="card-header bg-info d-flex justify-content-center">
                              <h4 style="color: white;">Final Igrade Marks</h4>
                              <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ 'Create Short Attandence Report' }}</button> -->
                           </div>
                        </div>
                     </div>
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
                                             <th>Roll no</th>
                                             <th>Igrade Marks</th>
                                          </tr>
                                          <tr>
                                             <td></td>
                                             <td></th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="bg-white text-center" style=" margin-left: 50px; margin-bottom: 90px; width:93%;">
   <a class="btn btn-warning btn-icon icon-left" style="color: white; margin: 10px;"
      onclick="printDiv('printableArea')"><i class="fas fa-print"></i> Print</a>
</div>
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