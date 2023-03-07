@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

<section class="section">
   <div class="section-body">
      <div class="section-body">
        @if(!empty($student))
         <div class="row d-none">
         @else
         <div class="row">
          @endif
            <div class="col-12 col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4>{{ $title ?? '' }}</h4>
                  </div>
                  <form id="myForm" action="{{ route('find.Student') ?? '' }}" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="card-body">
                        <div class="row">
                           <div class="form-group col-md-4 col-12">
                              <label>Semester</label>
                              <select class="form-control select2" name="SemSession"  required>
                                 @foreach($Semester as $Semester)
                                 <option value="{{ $Semester->SemSession }}">{{ $Semester->SemSession }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-4 col-12">
                              <label>Degree</label>
                              <select class="form-control select2" name="DegreeName"  required>
                                 @foreach($Degree as $Degree)
                                 <option value="{{ $Degree->DegreeName }}">{{ $Degree->DegreeName }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-4 col-12">
                              <label>Roll Number</label>
                              <input 
                              type="number" 
                              name="Rollno" 

                                 placeholder="Example 001" 
                                 class="form-control"  
                                 value="{{ old('Rollno') }}" 
                                 required 
                                 > 
                           </div>
                        </div>
                        <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button ?? 'Submit' }}</button>

                  </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-sm-4">
            <!--  -->
            <div class="col-12 col-md-12 col-lg-4">
               <div class="card author-box">
                  <div class="card-body">
                     <div class="author-box-center">
                        <img alt="image" src="{{ asset('assets/img/user.jpg') }}" class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                           <a href="#">{{ $student->Std_FName ?? '--'}}{{ $student->Std_LName ?? '--'}}</a>
                        </div>
                        <div class="author-box-job">{{ $student->StdRollNo ?? '--'}}</div>
                     </div>
                    <!--  <div class="text-center">
                        <div class="author-box-description">
                           <p>
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                              minus quod dignissimos.
                           </p>
                        </div>
                        <div class="mb-2 mt-3">
                           <div class="text-small font-weight-bold">Follow Hasan On</div>
                        </div>
                        <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                        </a>
                        <div class="w-100 d-sm-none"></div>
                     </div> -->
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                     <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                     <div class="py-4">
                        <p class="clearfix">
                           <span class="float-left">
                           Father Name
                           </span>
                           <span class="float-right text-muted">
                           {{ $student->FatherName ?? '--' }}
                           </span>
                        </p>
                        <p class="clearfix">
                           <span class="float-left">
                           Phone
                           </span>
                           <span class="float-right text-muted">
                           {{ $student->StdPhone ?? '--' }}
                           </span>
                        </p>
                        <p class="clearfix">
                           <span class="float-left">
                           Mail
                           </span>
                           <span class="float-right text-muted">
                           {{ $student->Email ?? '--' }}
                           </span>
                        </p>
                        <p class="clearfix">
                           <span class="float-left">
                           Cnic
                           </span>
                           <span class="float-right text-muted">
                           {{ $student->CNIC ?? '--' }}
                           </span>
                        </p>
                        <p class="clearfix">
                           <span class="float-left">
                           Address
                           </span>
                           <span class="float-right text-muted">
                           {{ $student->Address ?? '--' }}
                           </span>
                        </p>
                        <p class="clearfix">
                           <span class="float-left">
                           Class Section
                           </span>
                           <span class="float-right text-muted">
                           {{ $student->Email ?? '--' }}
                           </span>
                        </p>
                        <!-- <p class="clearfix">
                           <span class="float-left">
                           Dgree
                           </span>
                           <span class="float-right text-muted">
                           {{ $student->Email ?? '--' }}
                           </span>
                           </p> -->
                        <p class="clearfix">
                           <span class="float-left">
                           Registration No
                           </span>
                           <span class="float-right text-muted">
                           <a>{{ $Registration->ID ?? '--' }}</a>
                           </span>
                        </p>
                     </div>
                  </div>
               </div>
<!--                <div class="card">
                  <div class="card-header">
                     <h4>Skills</h4>
                  </div>
                  <div class="card-body">
                     <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                        <li class="media">
                           <div class="media-body">
                              <div class="media-title">Java</div>
                           </div>
                           <div class="media-progressbar p-t-10">
                              <div class="progress" data-height="6">
                                 <div class="progress-bar bg-primary" data-width="70%"></div>
                              </div>
                           </div>
                        </li>
                        <li class="media">
                           <div class="media-body">
                              <div class="media-title">Web Design</div>
                           </div>
                           <div class="media-progressbar p-t-10">
                              <div class="progress" data-height="6">
                                 <div class="progress-bar bg-warning" data-width="80%"></div>
                              </div>
                           </div>
                        </li>
                        <li class="media">
                           <div class="media-body">
                              <div class="media-title">Photoshop</div>
                           </div>
                           <div class="media-progressbar p-t-10">
                              <div class="progress" data-height="6">
                                 <div class="progress-bar bg-green" data-width="48%"></div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div> -->
            </div>
            @if(!empty($semesterSession))
            <div class="col-12 col-md-12 col-lg-8">
               <div class="card">
                  <div class="padding-20">
                     <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                              aria-selected="true">Enrollments</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                              aria-selected="false">Exam/Igrade</a>
                        </li>
                     </ul>
                     <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                           <form method="post" class="needs-validation">
                              <div class="card-header">
                                 <h4>Semester Session</h4>
                              </div>
                              <div class="card-body">
                                 <ul>
                                    @foreach($semesterSession as $key => $sem)
                                    <a >
                                       <li class="showr badge badge-info badge-shadow" data-id="{{ $key }}">{{ $sem }}</li>
                                    </a>
                                    @endforeach
                                 </ul>
                                 @foreach($EnrollBySem as $enrollment)
                                 <div class="table-responsive tb" id="{{ $loop->index }}">
                                    <table class="table table-striped table-datatable" id="sortable-table">
                                       <thead>
                                          <tr>
                                             <th class="text-center">
                                                <i class="fas fa-th"></i>
                                             </th>
                                             <th>Student</th>
                                             <th>Semester Course</th>
                                             <th>Mid</th>
                                             <th>Final</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                             

                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($enrollment  as $enrollment)
                                          <tr>
                                             <td>
                                                <div class="sort-handler">
                                                   <i class="fas fa-th"></i>
                                                </div>
                                             </td>
                                             <td>{{ $enrollment->student->Std_FName ?? '--' }} {{ $enrollment->student->Std_LName ?? '--' }}</td>
                                             <td>{{ $enrollment->SemesterCourse->semester->SemSession ?? '--' }}/{{ $enrollment->SemesterCourse->course->CourseName ?? '--' }}</td>
                                             <td>{{ $enrollment->Is_i_mid  ?? '--'}}</td>
                                             <td>{{ $enrollment->Is_i_final  ?? '--'}}</td>
                                             <td>{{ $enrollment->Status  ?? '--'}}</td>
                                             <td>
                                                <div class="card-body">
                                                </div>
                                             </td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                                 @endforeach
                                 @endif
                                 <!--                                  <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                       <label>Name</label>
                                       <input type="text" class="form-control" name="Name" value="John">
                                       <div class="invalid-feedback">
                                          Please fill in the first name
                                       </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                       <label>FATHER NAME</label>
                                       <input type="text" class="form-control" name="FATHERNAME" value="Deo">
                                       <div class="invalid-feedback">
                                          Please fill in the last name
                                       </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                       <label>REGITRATION NO</label>
                                       <input type="text" class="form-control" name="REGITRATIONNO" value="Deo">
                                       <div class="invalid-feedback">
                                          Please fill in the last name
                                       </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                       <label>CNIC</label>
                                       <input type="text" class="form-control" name="CNIC" value="John">
                                       <div class="invalid-feedback">
                                          Please fill in the first name
                                       </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                       <label>EMAIL</label>
                                       <input type="text" class="form-control" name="EMAIL" value="Deo">
                                       <div class="invalid-feedback">
                                          Please fill in the last name
                                       </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                       <label>MOBILE NO.</label>
                                       <input type="text" class="form-control" name="MOBILENO" value="Deo">
                                       <div class="invalid-feedback">
                                          Please fill in the last name
                                       </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                       <label>ADDRESS</label>
                                       <input type="text" class="form-control" name="ADDRESS" value="John">
                                       <div class="invalid-feedback">
                                          Please fill in the first name
                                       </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                       <label>CLASSS SECTION</label>
                                       <input type="text" class="form-control" name="CLASSSSECTION" value="Deo">
                                       <div class="invalid-feedback">
                                          Please fill in the last name
                                       </div>
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                       <label>DEGREE</label>
                                       <input type="text" class="form-control" name="DEGREE" value="Deo">
                                       <div class="invalid-feedback">
                                          Please fill in the last name
                                       </div>
                                    </div>
                                    </div> -->
                              </div>
                              @if(!empty($student))
                              <div class="card-footer text-right">
                                 <a href="{{ route('download.FactSheet' , $student->ID) }}" class="btn btn-sm btn-primary">Get Fact Sheet </a>
                              </div>
                              @endif
                           </form>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">

                            <table class="table table-striped table-datatable" id="sortable-table">
                                       <thead>
                                          <tr>
                                             <th class="text-center">
                                                <i class="fas fa-th"></i>
                                             </th>
                                             <th>Course</th>
                                             <th>Date</th>
                                             <th>Status</th>
                                             <th>Type</th>
                                             <th>Remarks</th>
                                             <!-- <th>Image</th> -->
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @if(!empty($StudentIgrade))
                                          @foreach($StudentIgrade  as $enrollment)
                                          <tr>
                                             <td>
                                                <div class="sort-handler">
                                                   <i class="fas fa-th"></i>
                                                </div>
                                             </td>
                                             <td>{{ $enrollment->enrollment->semsterCourse->course->CourseName ?? '--'}}</td>
                                             <td>{{ $enrollment->Date ?? '--' }}/{{ $enrollment->SemesterCourse->course->CourseName ?? '--' }}</td>
                                             <td>{{ $enrollment->Status  ?? '--'}}</td>
                                             <td>{{ $enrollment->Type  ?? '--'}}</td>
                                             <td>{{ $enrollment->Remarks  ?? '--'}}</td>
                                             
                                          </tr>
                                          @endforeach
                                          @endif
                                       </tbody>
                                    </table>
                           <!-- <form method="post" class="needs-validation">
                              <div class="card-header">
                                 <h4>Edit Profile</h4>
                              </div>
                              <div class="card-body">
                                 <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                       <label>First Name</label>
                                       <input type="text" class="form-control" value="John">
                                       <div class="invalid-feedback">
                                          Please fill in the first name
                                       </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                       <label>Last Name</label>
                                       <input type="text" class="form-control" value="Deo">
                                       <div class="invalid-feedback">
                                          Please fill in the last name
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                       <label>Email</label>
                                       <input type="email" class="form-control" value="test@example.com">
                                       <div class="invalid-feedback">
                                          Please fill in the email
                                       </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                       <label>Phone</label>
                                       <input type="tel" class="form-control" value="">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-12">
                                       <label>Bio</label>
                                       <textarea
                                          class="form-control summernote-simple">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias minus quod dignissimos.</textarea>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group mb-0 col-12">
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                          <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                          <div class="text-muted form-text">
                                             You will get new information about products, offers and promotions
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer text-right">
                                 <button class="btn btn-primary">Save Changes</button>
                              </div>
                           </form> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script type="text/javascript">
    var toggle = '';
    $(document).on('click', '.showr', function() {
      
       var click = $(this).data('id');
        console.log(click);
        $('#'+click).toggle();
       
      });

     $('.tb').toggle();
     
   
    
   </script>   
@endsection