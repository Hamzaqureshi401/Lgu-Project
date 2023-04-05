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
                            <th>Sem</th>
                            <th>Emp</th>
                            <th>Degree Batch</th>
                            <th>Section</th>
                            <th>Course</th>
                            
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($timetable as $timetable)

                          {{dd($timetable->TimeTableDetail->DegreeSemCourse->SemesterCourse->semester->SemSession ?? '--');}}
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $timetable->TimeTableDetail->DegreeSemCourse ?? '--' }}</td>
                            <td>{{ $semesterCourse->employee->Emp_FirstName ?? '--' }} {{ $semesterCourse->employee->Emp_LastName ?? '--' }}</td>
                            <td>{{ $semesterCourse->degreeBatches->degree->DegreeName ?? '--'}} / {{ $semesterCourse->degreeBatches->batch->SemSession ?? '--'}}</td>
                            <td>{{ $semesterCourse->Section  ?? '--'}}</td>
                            <td>{{ $semesterCourse->course->CourseName  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semesterCourse->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $semesterCourse->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ 'Tasks' }}</a>
                                 
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $semesterCourses->links() !!}
                    </div>
@include('Table.table_footer') 
@endsection   
