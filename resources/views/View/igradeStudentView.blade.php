@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css') }}/app.min.css') }}">
  <!-- Template CSS') }} -->
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css') }}/dataTables.bootstrap4.min.css') }}">
  @endpush
      <div class="">
        <section class="section">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ "Igrade Student" }}</h4>
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
                            <th>Roll No</th>
                            <th>Student Name</th>
                            <th>Course Name</th>
                            <th>Reason</th>
                            <th>Detail</th>
                            <th>Atten.</th>
                            <th>Decision</th>
                            <th>ReMarks</th>                 
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
                          <td>aa</td>
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
<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
   <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection   
