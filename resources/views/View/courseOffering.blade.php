@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
<link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
<style type="text/css">
   .select2 {
   width:100%!important;
   }
</style>
<div class="section-body">
   <div class="row">
      <div class="col-6 col-md-12 col-lg-6">
         <div class="card">
            <div class="card-header">
               <h4>{{ $title ?? '' }}</h4>
            </div>
            <div class="card-body">
               <div class="form-group">
                  <label>Degree</label>
                  <select class="form-control select2" id="degree" name="Degree_ID"  required>
                     @foreach($degrees as $degree)
                     <option value="{{ $degree->ID }}">{{ $degree->DegreeName }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label>Batch</label>
                  <select class="form-control select2" id="batch" name="Batch_ID"  required>
                     @foreach($semesters as $semester)
                     <option value="{{ $semester->ID }}">{{ $semester->SemSession }}</option>
                     @endforeach
                  </select>
               </div>
               <a class="btn btn-primary btn-block submit-form submit-form" style="color: white;">{{ $button }}</a>
            </div>
         </div>
      </div>
      <div class="col-6">
         <div class="card">
            <div class="card-header">
               <h4>{{ $title }}</h4>
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
            <div class="card-body p-0">
               <div class="table-responsive">
                  <table class="table table-striped table-datatable" id="sortable-table">
                     <thead>
                        <tr>
                           <th class="text-center">
                              <i class="fas fa-th"></i>
                           </th>
                           <th>CourseCode</th>
                           <th>CourseName</th>
                           <th>CreditHours</th>
                           <th>LectureType</th>
                           <!-- <th>Status</th> -->
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if($semesterCourses == "")
                        <div class="alert alert-warning">
                           <strong>Sorry!</strong> No record Found.
                        </div>
                        @else
                        @foreach($semesterCourses as $semesterCourse)
                        <tr>
                           <td>
                              <div class="sort-handler">
                                 <i class="fas fa-th"></i>
                              </div>
                           </td>
                           <td>{{ $semesterCourse->course->CourseCode ?? '--' }}</td>
                           <td>{{ $semesterCourse->course->CourseName ?? '--' }}</td>
                           <td>{{ $semesterCourse->course->CreditHours  ?? '--'}}</td>
                           <td>{{ $semesterCourse->course->LectureType  ?? '--'}}</td>
                           <td>
                              <div class="card-body">
                                 <a href="{{ route('course.Assign' , [ $semesterCourse->course->ID , $semesterCourse->ID]) }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ 'Assign Course' }}</a>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
               @if($semesterCourses != "")
               <div class="d-flex justify-content-center"></div>
               @endif
            </div>
         </div>
      </div>
      <!-- Modal with form -->
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
   $(".submit-form").click(function(){
     var degree = $('#degree').find(":selected").val();
     var batch = $('#batch').find(":selected").val();
     var parm = degree+"/"+batch;
   
   let url = "{{ route('course.Offering', ':id') }}";
     url = url.replace(':id', parm);
    
   
     document.location.href=url;
   });
</script>
@endsection