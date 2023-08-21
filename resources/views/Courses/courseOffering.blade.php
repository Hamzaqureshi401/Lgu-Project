@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <style type="text/css">
        .select2 {
            width: 100% !important;
        }
    </style>
    <div class="section-body">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ 'Select Degree And Batch To Assign Course' ?? '' }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Degree/Batch</label>
                        <select class="form-control select2" id="degree" name="Degree_ID" required>
                            @foreach ($degreeBatchs as $degreeBatch)
                                <option value="{{ $degreeBatch->ID }}" @if ($degreeBatch->ID == $selectedDegreeId) selected @endif>
                                    {{ $degreeBatch->degree->DegreeName ?? '--' }} /
                                    {{ $degreeBatch->batch->SemSession ?? '--' }}</option>
                            @endforeach
                        </select>
                    </div>

                    <a class="btn btn-primary btn-block submit-form submit-form"
                        style="color: white;">{{ $button }}</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }}</h4>
                    <!--  <div class="card-header-action">
                      <form>
                         <div class="input-group">
                            <input type="text" class="search-inp form-control" id="myInputTextField" placeholder="Search">
                            <div class="input-group-btn">
                               <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                         </div>
                      </form>
                   </div> -->
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="container p-3">

                            <table class="table table-striped dataTable" id="sortable-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <i class="fas fa-th"></i>
                                        </th>
                                        <th>CourseCode</th>
                                        <th>CourseName</th>
                                        <th>Employee</th>
                                        <th></th>
                                        <th></th>
                                        <!-- <th>Status</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($DegreeSemCourses == '')
                                        <div class="alert alert-warning col-md-12">
                                            <strong>Sorry!</strong> No record Found.
                                        </div>
                                    @else
                                        @foreach ($DegreeSemCourses as $DegreeSemCourse)
                                            <tr>
                                                <td>
                                                    <div class="card-body">
                                                        <a href="{{ route('course.Assign', [$DegreeSemCourse->ID]) }}"
                                                            class="btn btn-primary"><i
                                                                class="far fa-edit"></i>{{ 'Assign Course' }}</a>
                                                    </div>
                                                </td>
                                                <td>{{ $DegreeSemCourse->semesterCourse->course->CourseCode ?? '--' }}</td>
                                                <td>{{ $DegreeSemCourse->semesterCourse->course->CourseName ?? '--' }}</td>

                                                <td>{{ $DegreeSemCourse->employee->Emp_FirstName ?? '--' }}
                                                    {{ $DegreeSemCourse->employee->Emp_LastName ?? '--' }}</td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($DegreeSemCourses != '')
                        <div class="d-flex justify-content-center"></div>
                    @endif
                </div>


            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ 'Offered Cources' }}</h4>
                    <!--  <div class="card-header-action">
                      <form>
                         <div class="input-group">
                            <input type="text" class="search-inp form-control" id="myInputTextField" placeholder="Search">
                            <div class="input-group-btn">
                               <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                         </div>
                      </form>
                   </div> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <i class="fas fa-th"></i>
                                </th>
                                <th>Semester / Courses</th>
                                <th>Section</th>
                                <th>Course Code</th>
                                <th>Chr</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeTables as $timeTable)
                                @foreach ($timeTable->timeTableDetails as $timeTableDetail)
                                    <tr>
                                        <td>
                                            <div class="sort-handler">
                                                <i class="fas fa-th"></i>
                                            </div>
                                        </td>
                                        <td>{{ $timeTableDetail->DegreeSemCourse->semesterCourse->semester->SemSession ?? '--' }}
                                            /
                                            {{ $timeTableDetail->DegreeSemCourse->semesterCourse->course->CourseName ?? '--' }}
                                        </td>
                                        <td>{{ $timeTable->Day ?? '--' }}</td>
                                        <td>{{ $timeTableDetail->DegreeSemCourse->semesterCourse->course->CourseCode ?? '--' }}
                                        </td>
                                        <td>{{ $timeTableDetail->DegreeSemCourse->semesterCourse->course->CreditHours ?? '--' }}
                                        </td>
                                        <td>
                                            <div class="card-body">
                                                <a href="{{ route('delete.TimeTable', $timeTable->ID) }}"
                                                    class="btn btn-danger"><i
                                                        class="ion-trash-a"></i>{{ 'Delete Course' }}</a>
                                                <a href="{{ route('edit.TimeTableAndCourse', $timeTable->ID) }}"
                                                    class="btn btn-primary"><i
                                                        class="fas fa-primary"></i>{{ 'Edit Course' }}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal with form -->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".submit-form").click(function() {
            var degree = $('#degree').find(":selected").val();
            var batch = $('#batch').find(":selected").val();
            var parm = degree;

            let url = "{{ route('course.Offering', ':id') }}";
            url = url.replace(':id', parm);


            document.location.href = url;
        });
    </script>
@endsection
