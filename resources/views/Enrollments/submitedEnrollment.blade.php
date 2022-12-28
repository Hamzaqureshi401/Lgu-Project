                   <div class="section-body bg-success">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                            <div class="card-header bg-success d-flex justify-content-center">
                              <h4 style="color: white;">Course Enrolled Successfully</h4>
                               
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
                                      <th>Courses Code</th>
                                      <th>Courses Name</th>
                                      <th>CRDHR</th>
                                    </tr>
                                     <thead>
                                    <tbody>
                                    @foreach($enrollments as $enrollment)
                                    <tr>
                                     <!--  <td >{{ "Status" }}  
                                        <div class="badge badge-success">Active</div>
                                      </td> -->
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