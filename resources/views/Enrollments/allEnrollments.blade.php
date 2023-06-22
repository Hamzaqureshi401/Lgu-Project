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
                            <th>Student</th>
                            <th>Semester Course</th>
                            <th>Mid</th>
                            <th>Final</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($enrollments  as $enrollment)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $enrollment->student->Std_FName ?? '--' }} {{ $enrollment->student->Std_LName ?? '--' }}</td>
                            <td>{{ $enrollment->SemesterCourse->semester->SemSession ?? '--' }}/{{ $enrollment->SemesterCourse->course->CourseName ?? '--' }}</td>
                            <td>{{ $enrollment->Is_i_mid  ?? '--'}}</td>
                            <td>{{ $enrollment->Is_i_final  ?? '--'}}</td>
                            <td>{{ $enrollment->Status  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                               
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $enrollments->links() }}
                    </div>
@include('Table.table_footer') 
@endsection   
