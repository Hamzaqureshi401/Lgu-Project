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
                           
                            <th>Emp</th>
                            <th>Course</th>
                            
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($DegreeSemCourses as $DegreeSemCourse)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $DegreeSemCourse->employee->Emp_FirstName ?? '--' }}</td>
                            <td>{{ $DegreeSemCourse->semesterCourse->Course->CourseName ?? '--' }}</td>
                           
                            <td>
                              <div class="card-body">
                                
                                 <a href="{{ $getEditRoute }}/{{ $DegreeSemCourse->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ 'Tasks' }}</a>
                                 
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        
                    </div>
@include('Table.table_footer') 
@endsection   