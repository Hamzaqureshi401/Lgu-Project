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
                    <h4 style="color: white;">Students Attendance</h4>
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
                    <h4>{{ "Student Attendance" }}</h4>
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
                            
                            <th>Roll No</th>
                            <th>Student Name</th>
                            <th>Degree</th>
                            <th>Joining Session</th>
                            <th>Semester Session</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Teacher Name</th>
                            <th>Present</th> 
                            <th>Absent</th> 
                            <th>Atten. %</th>     
                                           
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($enrollments as $enrollment)
                          @php 
                          $present = $attandences->where(['Enroll_ID' => $enrollment->ID , 'Status' , 1])->count();
                          $absent = $attandences->where(['Enroll_ID' => $enrollment->ID , 'Status' , 0])->count();
                          if ($present != 0 && $absent != 0)
                          $percentage = ($present / ($present + $absent)) * 100;
                          
                          @endphp

                          <tr>
                          <td>{{ $loop->index + 1}}</td>
                          <td>{{ $enrollment->student->StdRollNo ?? '--' }}</td>
                          <td>{{ $enrollment->student->Std_FName  ?? '--'}}{{ $enrollment->student->Std_LName }}</td>
                          <td>{{ $enrollment->student->degree->DegreeName ?? '--' }}</td>
                          <td>{{ $enrollment->student->semester->SemStartDate ?? '--' }}</td>
                          <td>{{ $enrollment->student->semester->SemSession ?? '--' }}</td>
                          <td>{{ $enrollment->semesterCourse->course->CourseName }}</td>
                          <td>{{ $enrollment->semesterCourse->course->CourseCode }}</td>
                          <td>{{ $enrollment->semesterCourse->employee->Emp_FirstName }}</td>
                          <td>{{ $present ?? '--' }}</td>
                          <td>{{ $present ?? '--'}}</td>
                          <td> {{ $percentage ?? '0' }}</td>
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
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
   <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection   
