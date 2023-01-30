@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
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
                          @foreach($enrollments as $key => $enrollment)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $enrollment->semesterCourse->course->CourseCode ?? '--' }}</td>
                            <td>{{ $enrollment->semesterCourse->course->CourseName ?? '--' }}</td>
                            <td>{{ $enrollment->semesterCourse->course->CreditHours  ?? '--'}}</td>
                            <td>{{ $enrollment->semesterCourse->course->LectureType  ?? '--'}}</td>
                            <td>
                              <div class="card-body">




                                @if (in_array($enrollment->ID , $studentIgrade) && Session()->has('std_session'))
                                <a class="btn btn-info"><i class="far fa-edit"></i>{{ 'Applied' }}</a>
                                @elseif(Session()->has('Emp_session'))
                                <a href="{{ $getEditRoute }}/{{ $igArr[$key] }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                @else
                                <a href="{{ $getEditRoute }}/{{ $enrollment->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                @endif

                              

                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    
@include('Table.table_footer') 
@endsection   
