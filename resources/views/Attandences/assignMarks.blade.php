@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
                      <!-- Main Content -->
        <section class="section">
         
              <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="padding-20">
                   
                    <div class="section-body bg-info">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header bg-info d-flex justify-content-center">
                              <h4 style="color: white;">Courses Info</h4>
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
                              
                              <div class="card-body p-0">
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                    <tr>
                                      
                                      <th>Course Code</th>
                                      <th>Courses Name</th>
                                      <th>Credit Hours</th>
                                      <th>Asessment</th>
                                      
                                      
                                    </tr>
                                    </thead>
                                    <tbody>

                                      <tr>
                                        <td>
                                          {{ $SemesterCourse->course->CourseCode ?? '--'}}
                                        </td>
                                         <td>
                                          {{ $SemesterCourse->course->CourseName ?? '--'}}
                                        </td>
                                         <td>
                                          {{ $SemesterCourse->course->CreditHours ?? '--'}}
                                        </td>
                                         <td>
                                          {{ $type ?? '--'}}
                                        </td>
                                         
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
              </div>
                   
             </div>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="padding-20">
                   
                    <div class="section-body bg-success">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header bg-success d-flex justify-content-center">
                              <h4 style="color: white;">Upadte Student Marks</h4>
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
                                
                               
                              </div>
                              <div class="card-body p-0">
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <thead>
                                    <tr>
                                      <th>Student Roll No. </th>
                                      <th>Student Name </th>
                                      <th>Total Marks </th>
                                      <th>Obtained Marks  </th>
                                      <th>Absent</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($enrollments as $enrollment)
                                    @include('Forms.formHeader')  
                                    <input type="hidden" class="form-control" name="Enroll_ID[]" value="{{ $enrollment->ID
                                  }}">
                                      <tr>
                                        <td>{{ $enrollment->student->StdRollNo }}</td>
                                        <td>{{ $enrollment->student->Std_FName }}</td>
                                        <td>{{ $enrollment->student->Std_FName }}</td>
                                        <td> <input type="number" class="form-control" name="ObtainedMarks[]" value="0.00"></td>
                                        <td><div class="pretty p-switch p-slim">
                                          <input type="checkbox" name="Status[]" >
                                          <div class="state p-success">
                                            <label>Present</label>
                                          </div>
                                        </div>
                                        </td>

                                      </tr>

                                    @endforeach
                                    </tbody>                   
                                  </table>
                                  <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ "Submit" }}</button>
                                   @include('Forms.formFooter')
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>

@endsection   
