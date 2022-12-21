@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
 <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-center">
                    <h4>{{ "Worthy VC Address to Faculty" }}</h4>
                  </div>
                </div>
              </div>
            </div>
 <section class="section">
          <div class="section-body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>  </h4>
                  </div>

                  <div class="card-body">
                   <div style="text-align:center">
                        <button  class="btn btn-primary" onclick="playPause()">Play/Pause</button>
                        <button  class="btn btn-primary" onclick="makeBig()">Enlarge View</button>
                        <button  class="btn btn-primary" onclick="makeNormal()">Normal</button>
                        <br><br>
                        <video id="video1" width="100%" autoplay="" controls="" controlslist="nodownload">
                            &gt;
                            <source src="/Content/video/14sep.mp4" type="video/mp4">
                        </video>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection




      