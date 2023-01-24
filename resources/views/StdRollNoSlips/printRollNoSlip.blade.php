@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
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
                           <div <="" div="">
                        </div>
                  </div>
                  </header>
                  <form method="post" action="https://e.lgu.edu.pk/Exam/igradeMarksEntered">
                     <div class="panel-body">
                        <div class="example table-responsive">
                           <div aria-hidden="true" style="" class="floatThead-container">
                              <table class="" style="">
                                 <thead>
                                    <tr>
                                       <th width="2%">
                                          <img class="img-fluid" src="{{ asset('images/lgu_logo.jpg') }}" alt="Order Header Image"style=" height: 115px;        margin-bottom: 18px;        margin-left: 58px;"/>
                                       </th>
                                       <th width="55%">
                                          <h1 style="text-align:center">
                                             LAHORE GARRISON UNIVERSITY
                                          </h1>
                                          <h3 class="panel-title" style="text-align:center">
                                             |STUDENT ADMIT CARD | Fa-2022 Mid Term Exam |
                                          </h3>
                                       </th>
                                    </tr>
                                 </thead>
                              </table>
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
                              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
@endsection