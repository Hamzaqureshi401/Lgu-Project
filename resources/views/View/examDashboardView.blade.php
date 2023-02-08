@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css') }}/app.min.css') }}">
  <!-- Template CSS') }} -->
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css') }}/dataTables.bootstrap4.min.css') }}">
  @endpush
  <div class="section-body bg-danger">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-danger d-flex justify-content-center">
                    <h4 style="color: white;">EXAM SUBMISSION</h4>
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
                    <h4>{{ "Exams" }}</h4>
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
                      <table class="table table-striped table-hover table-datatable
                       form-control-sm" id="tableExport">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Sr</th>
                            <th>Pending Review</th>
                            <th>HoD-Approved</th>
                            <th>Pending</th>
                            <th>HoD Rejected</th>
                            <th>CoE-Rejected</th>
                            <th>CoE-Approved</th>
                                          
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          
                          </tr>                 
                        </tbody>
                      </table>
                    </div>
<div class="section-body bg-success">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-success d-flex justify-content-center">
                    <h4 style="color: white;">IGRADE SUBMISSION</h4>
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
                    <h4>{{ "Igrade" }}</h4>
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
                      <table class="table table-striped table-hover table-datatable
                       form-control-sm" id="tableExport">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Pending</th>
                            <th>HoD</th>
                            <th>Dean</th>
                            <th>CoE</th>
                            <th>Rejected</th>
                            <th>Hod Rejected </th>
                            <th>Dean Rejected</th>
                                             
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          <td>{{'--'}}</td>
                          
                          </tr>                 
                        </tbody>
                      </table>
                    </div>
               <div class="d-flex justify-content-center">
                      
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
