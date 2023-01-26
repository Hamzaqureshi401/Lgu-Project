@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css') }}/app.min.css') }}">
  <!-- Template CSS') }} -->
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css') }}/dataTables.bootstrap4.min.css') }}">
  @endpush
<div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-center">
                      <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button>
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
                    <h4>{{ "title" }}</h4>
                    <div class="card-header-action">
                      <form>
                        <div class="input-group">
                          <input type="text" class="search-inp form-control" id="myInputTextField" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">                 
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-datatable" id="tableExport">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Sr</th>
                            <th>Award Id  </th>
                            <th>Degree Name </th>
                            
                            <th>Course Code </th>
                            <th>Course Name</th>
                            <th>CreditHr</th>
                            <th>Semester session  </th>
                            <th>Total Std </th>
                            <th>Std In Award  </th>
                            <th>Status</th>
                            <th>Instructor Name</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                      </table>
                    </div>
               <div class="d-flex justify-content-center">
                      
               </div>
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
               <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="form-group">
                      <label>Select Session</label>
                      <select class="form-control" name=""  required>
                    <option value="Fa-2012">Fa-2012</option>
                    <option value="Sp-2013">Sp-2013</option>
                    <option value="Su-2013">Su-2013</option>
                    <option value="Fa-2013">Fa-2013</option>
                    <option value="Sp-2014">Sp-2014</option>
                    <option value="Su-2014">Su-2014</option>
                    <option value="Fa-2014">Fa-2014</option>
                    <option value="Sp-2015">Sp-2015</option>
                    <option value="Su-2015">Su-2015</option>
                    <option value="Fa-2015">Fa-2015</option>
                    <option value="Sp-2016">Sp-2016</option>
                    <option value="Su-2016">Su-2016</option>
                    <option value="Sp-2017">Sp-2017</option>
                    <option value="Fa-2016">Fa-2016</option>
                    <option value="Su-2017">Su-2017</option>
                    <option value="Fa-2017">Fa-2017</option>
                    <option value="Sp-2012">Sp-2012</option>
                    <option value="Sp-2018">Sp-2018</option>
                    <option value="Su-2018">Su-2018</option>
                    <option value="Fa-2018">Fa-2018</option>
                    <option value="Sp-2019">Sp-2019</option>
                    <option value="Fa-2019">Fa-2019</option>
                    <option value="Su-2019">Su-2019</option>
                    <option value="Sp-2020">Sp-2020</option>
                    <option value="Su-2020">Su-2020</option>
                    <option value="Fa-2020">Fa-2020</option>
                    <option value="Sp-2021">Sp-2021</option>
                    <option value="Su-2021">Su-2021</option>
                    <option value="Fa-2021">Fa-2021</option>
                    <option value="Sp-2022">Sp-2022</option>
                    <option value="Su-2022">Su-2022</option>
                    <option value="Fa-2022">Fa-2022</option>
                       
                      </select>
                    </div>
                    <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">Submit</button>
                 </form>
                </div>
            </div>
          </div>
        </div>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script type="text/javascript">
  $("#exampleModal").prependTo("body"); 
</script>
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
   <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection   
