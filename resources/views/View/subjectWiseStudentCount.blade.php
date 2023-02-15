@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css') }}/app.min.css') }}">
  <!-- Template CSS') }} -->
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css') }}/dataTables.bootstrap4.min.css') }}">
  @endpush
  <section class="section">
    <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-center">
                      <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attendence Report" }}</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
 <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Academic Calender</h4>
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
                      <tbody>
                      <tr>
                        <th>Degree Name</th>
                        <th>Sem Session</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Std Name Total Std</th>
                        <th>All Roll No</th>
                      </tr>                          
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
           
        </section>
       
<!-- Modal with form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ "modalTitle" }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
               <form id="myForm" action="{{ route('master.Sheet')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      
                    <div class="form-group">
                      <label>Select Degree Level</label>
                     <input type="date" name="date" class="form-control">
                    </div>
                    <a style="color: white;" class="btn btn-primary btn-block master">master Sheet</a>
                     <a style="color: white;" class="btn btn-primary btn-block defualt">Defualt Seatings</a>
                 </form>
                </div>
            </div>
          </div>
        </div>
               <div class="d-flex justify-content-center">
                      
               </div>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script type="text/javascript">
  $("#exampleModal").prependTo("body"); 
</script>

<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
   <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection   
