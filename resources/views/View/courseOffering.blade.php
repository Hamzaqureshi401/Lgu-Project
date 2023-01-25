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
                      <label>Degree/Batch</label>
                      <select class="form-control" name="degreeBatche_ID"  required>
                        @foreach($degreeBatches as $degreeBatche)
                        <option value="{{ $degreeBatche->ID }}">{{ $degreeBatche->degree->DegreeName }}/{{ $degreeBatche->batch->SemSession ?? "--" }}</option>
                        @endforeach
                      </select>
                    </div>

                   
                <a class="btn btn-primary btn-block submit-form">{{ $button }}</a>
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
                                
                                <a href="{{ $getEditRoute }}/{{ $semesterCourse->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                              

                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $courses->links() }}
                    </div>
@include('Table.table_footer') 
<script type="text/javascript">
  $(".submit-form").click(function(){
  alert("The paragraph was clicked.");
});
</script>
@endsection   
