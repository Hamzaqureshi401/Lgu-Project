@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
                      <!-- Main Content -->
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">Sarah Smith</a>
                      </div>
                      <div class="author-box-job">Web Developer</div>
                    </div>
                    <div class="text-center">
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
                    </div>
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
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                          30-05-1998
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          (0123)123456789
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          test@example.com
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Facebook
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">John Deo</a>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Twitter
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">@johndeo</a>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card">
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
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Enrollment</a>
                      </li>
                     
                    </ul>
                    <div class="section-body bg-danger">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header bg-danger d-flex justify-content-center">
                              <h4 style="color: white;">Add Drop Courses</h4>
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
                                      <th>#</th>
                                      <th>Course Code</th>
                                      <th>Courses Name</th>
                                      <th>Cedit Hours</th>
                                      <th>Degree Name</th>
                                      <th>Semester Session</th>
                                      <th>Action</th>
                                    </tr>
                                    <thead>
                                    <tbody>
                                    @foreach($semesterCourses as $semesterCourse)
                                    <tr>
                                       <td class="text-center pt-2">
                                        <div class="custom-checkbox custom-control">
                                          <input 
                                          type="checkbox" 
                                          data-checkboxes="mygroup" 
                                          class="check custom-control-input"
                                          id="checkbox-{{ $semesterCourse->ID }}"
                                          value ="{{ $semesterCourse->ID }}"
                                          {{  in_array($semesterCourse->ID, $enrollments) ? 'checked' : '' }}
                                          >
                                          <label for="checkbox-{{ $semesterCourse->ID }}" class="custom-control-label">&nbsp;</label>
                                        </div>
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
                   <div class="card sbmt-form d-none">
                     <div class="card-header justify-content-center">
                        <button class="btn btn-primary">Submit Enrollment</button>
                        </div>
                    </div>

                    <div class="submited-enrollment">
                          <!-- Here Modal form Loads -->
                        </div>
                   


                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
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
