@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css') }}/app.min.css') }}">
  <!-- Template CSS') }} -->
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css') }}/dataTables.bootstrap4.min.css') }}">
  @endpush
   <div class="section-body bg-success">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header bg-success d-flex justify-content-center">
                    <h4 style="color: white;">Recommended Students From Faculty</h4>
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
                    <h4>{{ "Assessment Detail" }}</h4>
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
                      <table class="table table-striped table-datatable" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>CourseCode</th>
                            <th>CourseName</th>
                            <th>Employees</first()->th>
                            <th>CreditHours</th>
                            <th>LectureType</th>
                            <!-- <th>Status</th> -->
                            <th>Degree Name</th>
                            <th>Semester Session</th>
                            <th>Mid Term</th>
                            <th>Count</th>
                            
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($degreeBatches as $degreeBatche)
                          <tr>
                            <td>
                              
                                {{ $loop->index + 1 }}
                              
                            </td>
                            
                            <td>{{ $semesterCourse->where('Emp_ID' , $employees->first()->ID)->first()->course->CourseCode ?? '--' }}</td>
                            <td>{{  $semesterCourse->where('Emp_ID' , $employees->first()->ID)->first()->course->CourseName ?? '--' }}</td>
                            <td>{{  $employees->first()->Emp_FirstName }}{{  $employees->first()->Emp_LastName }}</td>
                            <td>{{  $semesterCourse->where('Emp_ID' , $employees->first()->ID)->first()->course->CreditHours ?? '--'}}</td>
                              <td>{{  $semesterCourse->where('Emp_ID' , $employees->first()->ID)->first()->course->LectureType ?? '--'}}</td>
                            
                              
                          </tr>
                           @endforeach
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
