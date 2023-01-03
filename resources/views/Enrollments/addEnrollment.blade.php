@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
                      <!-- Main Content -->
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-right">
                      <ul>
                        <li>
                          Roll Number: {{ Session::get('user') }}
                        </li>
                        <li>
                          @php
                          $programe = explode('/' , Session::get('user'))
                          @endphp
                          Program:{{ $programe[1] }}
                        </li>
                        <li>
                          Academic Standing:{{  $acdRule['academic_Standing'] }}
                        </li>
                        </ul>
                  </div>
                </div>
              </div>
           
                  
                <div class="col-12 col-md-6 col-lg-6">  
                  <div class="card">
                    <div class="card-header d-flex justify-content-right">
                      <ul>
                        <li>
                          Student Name: {{ Session::get('Std_FName') }}
                        </li>
                        <li>
                          Term:{{ $programe[0] }}
                        </li>
                        <li>
                          Allowed Credit Hours: {{ $acdRule['creditHoursAllowed']}}
                        </li>
                         <li>
                          Remaining Credit Hours: {{  $acdRule['creditHoursAllowed'] - $getTotalCreditHours}}
                        </li>
                        </ul>
                 
                </div>
              </div>
              </div>
               </div>
             </div>
              <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="padding-20">
                   
                    <div class="section-body bg-danger">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header bg-danger d-flex justify-content-center">
                              <h4 style="color: white;">Courses Offered</h4>
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                         <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h4>Courses</h4>
                                <div class="card-header-form">
                                  <form>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Search">
                                      <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                              <div class="card-body p-0">
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                    <tr>
                                      <th>Action</th>
                                      <th>Course Code</th>
                                      <th>Courses Name</th>
                                      <th>Cedit Hours</th>
                                      <th>Degree Name</th>
                                      <th>Semester Session</th>
                                      <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($semesterCourses as $semesterCourse)
                                    @if  (in_array($semesterCourse->ID, $enrollmentsArray))
                                    <tr>
                                       <td>
                                        
                                         @if($acdRule['enrollmentAllowed'] == true &&
                                         $getTotalCreditHours     <= $acdRule['creditHoursAllowed']
                                         && $enrollments->sum('Status') == 0
                                         )
                                          <a href="{{ route('store.Enrollment' , $semesterCourse->ID) }}" class="btn btn-sm btn-primary">Add Course</a>
                                          @else
                                          <button class="btn btn-sm btn-primary" disabled>
                                            Add Course
                                          </button>
                                          @endif
                                          
                                        
                                      </td>
                                      <td >{{ $semesterCourse->course->CourseCode ?? '--' }}  
                                        <!-- <div class="badge badge-success">Active</div> -->
                                      </td>
                                      <td>{{ $semesterCourse->course->CourseName ?? '--'}}</td>
                                      <td>{{ $semesterCourse->course->CreditHours ?? '--'}}</td>
                                      <td>{{ $semesterCourse->degreeBatches->degree->DegreeName ?? '--'}}</td>
                                      <td>{{ $semesterCourse->semester->SemSession ?? '--'}}</td>
                                      <td>{{ "Status" }}</td>
                                    </tr>  
                                    @endif
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
                   
              <div class="col-12 col-md-6 col-lg-6">  
                  <div class="card">
                    <div  class="padding-20">
                     <div class="section-body bg-success">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header bg-success d-flex justify-content-center">
                              <h4 style="color: white;">Courses Enrolled</h4>
                               
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                         <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h4>Courses</h4>
                                <div class="card-header-form">
                                  <form>
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Search">
                                      <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                              <div class="card-body p-0">
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                    <tr>
                                      <th>Action</th>
                                      <th>Courses Code</th>
                                      <th>Courses Name</th>
                                      <th>CRDHR</th>
                                    </tr>
                                     </thead>
                                    <tbody>
                                    @foreach($enrollments as $enrollment)
                                    <tr>
                                     <!--  <td >{{ "Status" }}  
                                        <div class="badge badge-success">Active</div>
                                      </td> -->
                                      <td>
                                        @if( $enrollments->sum('Status') == 0
                                         )
                                           <a href="{{ route('store.Enrollment' , $enrollment->SemCourses_ID . '-true') }}" class="btn btn-sm btn-danger">Drop Course</a>
                                          @else
                                          <button class="btn btn-sm btn-danger" disabled>
                                            Drop Course
                                          </button>
                                          @endif
                                      </td>
                                      <td>{{ $enrollment->semesterCourse->course->CourseCode ?? '--' }}</td>
                                      <td>{{ $enrollment->semesterCourse->course->CourseName ?? '--' }}</td>
                                      <td>{{ $enrollment->semesterCourse->course->CreditHours ?? '--' }}</td>
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
                   @if($enrollments->sum('ID') && $enrollments->sum('Status') == 0)
                    <div class="card sbmt-form">
                     <div class="card-header justify-content-center">
                        <a  data-toggle="modal" data-target="#exampleModal" style="color: white;" class="btn btn-primary">Confirm Enrollment</a>
                        </div>
                     
                    </div>
                    @endif

                  </div>
                </div>
              </div>
            </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Please Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        After Clicking the Confirm Button you can not Add Or Drop Courses So Please Be Carefully Click The Confim Button
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ route('confirm.Enrollment') }}" class="btn btn-primary">Confirm Enrollment</a>
                        </div>
      </div>
    </div>
  </div>
</div>
        </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
   $("#exampleModal").prependTo("body");  
  var listvalues = []
$('.check').on('change', function() {
  //listvalues = $('.check:checked').toArray().map(x => x.value).join(', ');
  console.log($(this).val());
  if(listvalues != ""){
    $('.sbmt-form').removeClass('d-none');
  }else{
    $('.sbmt-form').addClass('d-none');
  }
  var id = $(this).val();
  var connection = pinginternet();
   if (connection == true){
    enrollment(id);
   }else{
    swal("Internet Required", "It Seems You have Lost Internet Connection", "error");
   }
  
});

function enrollment(id){

  $('.submited-enrollment').addClass('d-none');

  $.ajax({
   type: "POST",
   data: {
    "_token": "{{ csrf_token() }}",
     listvalues:id
  },
   url: "{{ route('store.Enrollments') }}",
   success: function(success){
      if(success.db != "empty"){
        $('.submited-enrollment').removeClass('d-none');
        $(".submited-enrollment").show();
        $('.submited-enrollment').html(success);
      }
   }
});
}
function pinginternet(){
  return window.navigator.onLine;
}
var connection = pinginternet();
   if (connection == true){
     enrollment(false);
   }else{
    swal("Internet Required", "It Seems You have Lost Internet Connection", "error");
   }

</script>
@endsection   
