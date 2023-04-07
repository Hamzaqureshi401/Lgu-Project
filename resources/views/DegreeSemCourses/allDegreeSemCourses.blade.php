
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
                            <th>Degree Batch Name</th>
                            <th>Semester Course Name</th>
                              <th>Section</th> 
                              <th>Employee</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($degreeSemCourses as $key => $degreeSemCourse)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $degreeSemCourse->degreeBatch->degree->DegreeName ?? '--' }} / {{ $degreeSemCourse->degreeBatch->batch->SemSession  ?? '--'}}</td>
                            <td>{{ $degreeSemCourse->semesterCourse->semester->SemSession  ?? '--'}} / {{ $degreeSemCourse->semesterCourse->course->CourseName  ?? '--'}}</td>

                            <td>{{ $degreeSemCourse->Section ?? '--'}}</td>
                            <td>{{ $degreeSemCourse->employee->Emp_FirstName ?? '--'}} {{ $degreeSemCourse->employee->Emp_LastName ?? '--'}}</td>
                          
                            <td>
                              <div class="card-body">
                               
                                 <a href="{{ $getEditRoute }}/{{ $degreeSemCourse->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    {{ $degreeSemCourses->links() }}
@include('Table.table_footer') 
@endsection   
