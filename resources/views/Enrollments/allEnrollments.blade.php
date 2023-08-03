@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table  border-1 rounded border-dark" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark ">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Student</th>
                            <th class="text-dark">Semester Course</th>
                            <th class="text-dark">Mid</th>
                            <th class="text-dark">Final</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($enrollments  as $enrollment)
                          <tr class="border border-1 rounded border-dark table-hover">
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
