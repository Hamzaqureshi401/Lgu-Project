@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')


      <div class="">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="box-content">
                        <form method="post" action="https://e.lgu.edu.pk/exam/student">
                            <div class="col-lg-12">
                                <label for="input-states-1"><b>Select Batch</b></label>
                                <select class="form-control" name="Batch">
                                            <option>Fa-2012</option>
                                            <option>Sp-2013</option>
                                            <option>Su-2013</option>
                                            <option>Fa-2013</option>
                                            <option>Sp-2014</option>
                                            <option>Su-2014</option>
                                            <option>Fa-2014</option>
                                            <option>Sp-2015</option>
                                            <option>Su-2015</option>
                                            <option>Fa-2015</option>
                                            <option>Sp-2016</option>
                                            <option>Su-2016</option>
                                            <option>Sp-2017</option>
                                            <option>Fa-2016</option>
                                            <option>Su-2017</option>
                                            <option>Fa-2017</option>
                                            <option>Sp-2012</option>
                                            <option>Sp-2018</option>
                                            <option>Su-2018</option>
                                            <option>Fa-2018</option>
                                            <option>Sp-2019</option>
                                            <option>Fa-2019</option>
                                            <option>Su-2019</option>
                                            <option>Sp-2020</option>
                                            <option>Su-2020</option>
                                            <option>Fa-2020</option>
                                            <option>Sp-2021</option>
                                            <option>Su-2021</option>
                                            <option>Fa-2021</option>
                                            <option>Sp-2022</option>
                                            <option>Su-2022</option>
                                            <option>Fa-2022</option>

                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="input-states-1"><b>Select Degree</b></label>
                                <select class="form-control" name="Degree">
                                            <option>ADCP</option>
                                            <option>B.Com (Hons)</option>
                                            <option>BBA (Hons)</option>
                                            <option>BS AF</option>
                                            <option>BS AP</option>
                                            <option>BS BCH</option>
                                            <option>BS BOT</option>
                                            <option>BS BT</option>
                                            <option>BS CHEM.</option>
                                            <option>BS DFCS</option>
                                            <option>BS DS</option>
                                            <option>BS ECO</option>
                                            <option>BS Eng.</option>
                                            <option>BS ENV</option>
                                            <option>BS Geog</option>
                                            <option>BS H.ECO</option>
                                            <option>BS IR</option>
                                            <option>BS ISL</option>
                                            <option>BS IT</option>
                                            <option>BS Maths</option>
                                            <option>BS MB</option>
                                            <option>BS MC</option>
                                            <option>BS Phys</option>
                                            <option>BS SE</option>
                                            <option>BS Stat.</option>
                                            <option>BS Urdu</option>
                                            <option>BS WCCI</option>
                                            <option>BS ZOO</option>
                                            <option>BSCP</option>
                                            <option>BSCS</option>
                                            <option>CERUF</option>
                                            <option>DEJ</option>
                                            <option>DULLFS</option>
                                            <option>HND Business</option>
                                            <option>HND Computing</option>
                                            <option>HND Creative Media Production</option>
                                            <option>M.Com</option>
                                            <option>M.Phil AP</option>
                                            <option>M.Phil CHEM.</option>
                                            <option>M.Phil CP</option>
                                            <option>M.Phil ECO</option>
                                            <option>M.Phil Eng.</option>
                                            <option>M.Phil IR</option>
                                            <option>M.Phil ISL</option>
                                            <option>M.Phil Maths</option>
                                            <option>M.Phil MB</option>
                                            <option>M.Phil MC</option>
                                            <option>M.Phil Phys</option>
                                            <option>M.Phil Urdu</option>
                                            <option>M.Phil ZOO</option>
                                            <option>M.Phil. Urdu</option>
                                            <option>MA EDU</option>
                                            <option>MA Eng.</option>
                                            <option>MA Urdu</option>
                                            <option>MBA</option>
                                            <option>MBA (1.5)</option>
                                            <option>MBA (2 Years)</option>
                                            <option>MBA (2.5)</option>
                                            <option>MCS</option>
                                            <option>MS</option>
                                            <option>MS CS</option>
                                            <option>MS DS</option>
                                            <option>MS IT</option>
                                            <option>MSBA</option>
                                            <option>MSc. CHEM.</option>
                                            <option>MSc. ECO</option>
                                            <option>MSc. IR</option>
                                            <option>MSc. Maths</option>
                                            <option>MSc. MB</option>
                                            <option>MSc. MC</option>
                                            <option>MSc. Phys</option>
                                            <option>MSc. Stat.</option>
                                            <option>MSc. ZOO</option>
                                            <option>MSc.AP</option>
                                            <option>MSCP</option>
                                            <option>OLUD</option>
                                            <option>Ph. D ISL</option>
                                            <option>Ph. D URDU</option>
                                            <option>Ph.D. MB</option>
                                            <option>Ph.D.ZOO</option>
                                            <option>TEST</option>

                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label for="input-states-1"><b>Roll No</b></label>
                                <input class="form-control" type="text" name="rollNo" required="">
                            </div>
                            
                            <div class="form-group">
                                <!-- <button type="submit" class="btn btn-sm btn-primary form-control" style=>Submit</button> -->
                            </div>
                        </form>
                    </div>
                </div>
                
               
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="">
        <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  
                    <div class="form-group">
                      <label>Std Roll no</label>
                      <input type="number" name="stdrollno" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Student Name</label>
                      <input type="text" name="StudentName" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Father Name</label>
                      <input type="number" name="Fname" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>CNIC</label>
                      <input type="text" name="cnic" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Degree</label>
                      <input type="number" name="Degree" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Joining Session</label>
                      <input type="text" name="session" class="form-control"required>
                    </div>
                <!-- <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ "Submit" }}</button> -->
                </form>
                      </div>
                    <!--   <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" class="needs-validation">
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
                        </form>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>



@endsection   
