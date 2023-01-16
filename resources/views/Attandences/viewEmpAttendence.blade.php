@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endpush                      <!-- Main Content -->
    
 <div class="section-body bg-success">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-success d-flex justify-content-center">
                    <h4 style="color: white;">Attandence View</h4>
                      <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="">
        <section class="section">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ "All Attandence" }}</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="search" class="search-inp form-control" id="myInputTextField" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">                 
                    <div class="table-responsive">
                      
                      <form method="post" action="https://e.lgu.edu.pk/result/AdvanceSearch">
                           <table class="table table-striped table-hover table-datatable
                       form-control-sm" id="tableExport">
                              <thead>
                                  <tr>
                                      <th>Student Name</th>
                                      <th>Student Roll Number</th>
                                      @foreach($attendances as $att)
                                      <th>{{ $att->Date }}</th>
                                      @endforeach

                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($enrollments as $student)
                                <tr>
                                    <td>{{ $student->student->Std_FName }} {{ $student->student->Std_LName }}</td>
                                    <td>{{ $student->student->StdRollNo }}</td>
                                     @foreach($attendances as $att)

                                     @if( $att->Status == 1)
                                     <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#00bcd4"><div class="fc-content"><span class="fc-time">Present</span> <span class="fc-title"></span></div></a></td>
                                      
                                      @else
                                      <td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#DC35A9"><div class="fc-content"><span class="fc-time">Absent</span> <span class="fc-title"></span></div></a></td>
                                      
                                      @endif
                                      @endforeach
                                    
                                </tr>
                                @endforeach
                              
                            </tbody>
                             
                          </table>
                      </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
    
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net"></a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>

@endsection   
