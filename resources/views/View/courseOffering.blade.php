@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
 <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
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
        </div>
            </div>    
@include('Table.table_header')     

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
                          @if($semesterCourses == ""))
                            <div class="alert alert-warning">
                                <strong>Sorry!</strong> No Product Found.
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
                                
                                <a href="{{ route('course.Assign' ,  $semesterCourse->course->ID) }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                              

                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                           @endif
                          
                        </tbody>
                      </table>
                    </div>
                     @if($semesterCourses != "")
                    <div class="d-flex justify-content-center">
                       
                    </div>
                    @endif
@include('Table.table_footer') 
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
