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
   <div class="section-body bg-success">
   <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="card-header bg-success d-flex justify-content-center">
               <h4 style="color: white;">Attandence Of Classes</h4>
               <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
   <h4>{{ $SemesterCourse->semester->SemSession }} / {{ $SemesterCourse->course->CourseName }}</h4>
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
            <th>Types</th>
            <th>Marks</th>
            <th>Action</th>
            <th>Assign Obtained Marks</th>
         </tr>
      </thead>
      <tbody>
        <tr>
         <td>1</td>
           <td>Final Term</td>
           <td>{{ 0.00 }}</td>
           <td> -- </td>
           <td> <a href="{{ route('assign.Marks' , [$id , 'Final'])}}" class="btn btn-sm btn-primary">Assign Obtained Marks</a></td>
        </tr>
        <tr>
         <td>2</td>
           <td>Mid Term</td>
           <td>{{ 0.00 }}</td>
           <td> -- </td>
           <td> <a href="{{ route('assign.Marks' , [$id , 'Mid'])}}" class="btn btn-sm btn-primary">Assign Obtained Marks</a></td>
        </tr>
         <tr>
         <td>3</td>
           <td>Quiz</td>
           <td>{{ 0.00 }}</td>
           <td> -- </td>
           <td> <a href="{{ route('assign.Marks', [$id , 'Quiz'])}}" class="btn btn-sm btn-primary">Assign Obtained Marks</a></td>
        </tr>
         <tr>
         <td>4</td>
           <td>Assignment Waite</td>
           <td>{{ 0.00 }}</td>
           <td> -- </td>
           <td> <a href="{{ route('assign.Marks', [$id , 'Assignment'])}}" class="btn btn-sm btn-primary">Assign Obtained Marks</a></td>
        </tr>
         <tr>
         <td>4</td>
           <td>Class Participation</td>
           <td>{{ 0.00 }}</td>
           <td> -- </td>
           <td> <a href="{{ route('assign.Marks', [$id , 'Participation'])}}" class="btn btn-sm btn-primary">Assign Obtained Marks</a></td>
        </tr>
      </tbody>
   </table>
</div>
</div>
</div>
</div>
</div>

 <div class="section-body bg-success">
   <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
         <div class="card">
            <div class="card-header bg-success d-flex justify-content-center">
               <h4 style="color: white;">Attandence Of Classes</h4>
               <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
            </div>
         </div>
      </div>
   </div>
</div>
@include('Forms.formHeader')  


                  <div class="card-body">
                    
                     <div class="form-group">
                      <label>Dpt Name</label>
                      <select class="form-control" name="type"  required>
                        
                        <option value="{{ 'Quiz' }}">{{ 'Quiz' }}</option>
                        <option value="{{ 'ClassPrepation' }}">{{ 'ClassPrepation' }}</option>
                        <option value="{{ 'Assignment' }}">{{ 'Assignment' }}</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Total Marks</label>
                      <input type="text" name="TotalMarks" class="form-control" >
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ "Submit" }}</button>
                
                @include('Forms.formFooter')                

</section>


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