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
              <form  id="myForm" action="{{ $route ?? '' }}" method="GET" enctype="multipart/form-data">
                {{ csrf_field() }}            
    
                
                <div class="form-group col-6">
                  <label><b>Sem Session ID </b> </label>
                  <input type="text" name="SemSession" class="form-control border border-1 rounded border-dark">
                </div>
    

                <div class="form-group col-6">

                <button id="button" type="submit"
                class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </div>

              </form>
              <div class="card">
                


                <div class="card-header">
                  <h4>{{ "Awards" }}</h4>
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
                      <table class="table table-striped table-datatable
                       form-control-sm" id="tableExport">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Std Full Name</th>
                            <th>Class Section</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Quiz</th>
                            <th>Assignment</th>
                            <th>Mid Term</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($Exam_awards as $Exam_awards_details)
                            <tr>
                                <td></td>
                                <td>{{$Exam_awards_details->Std_FName}}</td>
                                <td>{{$Exam_awards_details->ClassSection}}</td>
                                <td>{{$Exam_awards_details->CourseName}}</td>
                                <td>{{$Exam_awards_details->CourseCode}}</td>
                                <td>{{$Exam_awards_details->Quiz}}</td>
                                <td>{{$Exam_awards_details->Assignment}}</td>
                                <td>{{$Exam_awards_details->{'Mid Term'} }}</td>
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
