@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
                      <!-- Main Content -->

        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Courses</a>
                      </li>
                    
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h4>Courses Degree Batch Students</h4>
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
                                    <tr>
                                      <th>Courses Name</th>
                                      <th>Degree</th>
                                      <th>Batch</th>
                                      <th>Students</th>
                                    </tr>
                                    <tr>
                                      <td >{{ "Status" }}  <div class="badge badge-success">Active</div></td>
                                      <td>{{ "Status" }}</td>
                                      <td>{{ "Status" }}</td>
                                      <td>{{ "Status" }}</td>
                                    </tr>                     
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
          </div>
        </section>
@endsection   
