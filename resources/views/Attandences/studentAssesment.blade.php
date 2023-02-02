@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')

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
          @foreach($optionSemesterCourseWeightages as $key => $semesterCourseWeightage)
          @if($key < 2)
        <tr>
         <td>{{ $loop->index + 1}}</td>
         @php 
         $ind = 0;
         $ind = $ind + ($loop->index) + 1;
         @endphp
           <td>{{ $semesterCourseWeightage->Type }}</td>
           <td>{{ $semesterCourseWeightage->Weightage }}</td>
           <td> -- </td>
           <td> <a href="{{ route('assign.Marks' , [$id , $semesterCourseWeightage->Type])}}" class="btn btn-sm btn-primary">Assign Obtained Marks</a></td>
        </tr>
         @endif
         @endforeach
          @foreach($SemesterCourseWeightageDetails as $key => $SemesterCourseWeightageDetail)
           <tr>
         <td>{{ $ind + 1}}</td>
           <td>{{ $SemesterCourseWeightageDetail->SemesterCourseWeightage->Type }}</td>
           <td>{{ $SemesterCourseWeightageDetail->TotalMarks }}</td>
           <td> 

            
           
            @if(in_array( $SemesterCourseWeightageDetail->ID ,$StudentMarks ) )
            <a class="btn btn-sm btn-info" style="color:white;"> <li class="fas fa-exclamation"> Record Exist Canot Delete</li> </a> 
            @else
            <a href="{{ route('delete.Marks' , $SemesterCourseWeightageDetail->ID)}}" class="btn btn-sm btn-danger">Delete Marks</a> 
            @endif
            
         </td>
           <td> <a href="{{ route('assign.Marks' , [$id , $SemesterCourseWeightageDetail->SemesterCourseWeightage->Type])}}" class="btn btn-sm btn-primary">Assign Obtained Marks</a></td>
        </tr>
         @endforeach
         

       
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
               <h4 style="color: white;">Set Course marks</h4>
               <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="" data-target="#exampleModal"><i class="far fa-edit"></i> {{ "Create Short Attandence Report" }}</button> -->
            </div>
         </div>
      </div>
   </div>
</div>
@include('Forms.formHeader')  


                  <div class="card-body">
                    <input type="hidden" name="SemCourseID" value="{{ $SemesterCourse->ID }}">
                       <div class="form-group">
                      <label>Type</label>
                      <select class="form-control" name="SemCourseWeightage_ID"  required>
                        @foreach($semesterCourseWeightages as $key => $semesterCourseWeightage)
                        @if($key > 1)
                        <option value="{{ $semesterCourseWeightage->ID }}">{{ $semesterCourseWeightage->Type }}</option>
                        @endif
                        @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Total Marks</label>
                      <input type="text" name="TotalMarks" class="form-control" required>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ "Submit" }}</button>
             </div>
                
                @include('Forms.formFooter')                

</section>


<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script type="text/javascript">
   $("#exampleModal").prependTo("body"); 
</script>
@endsection