@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table border-1 rounded border-dark" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Sem</th>
                            <!-- <th>Emp</th> -->
                            <th class="text-dark">Campus Limit</th>
                            <!-- <th>Degree Batch</th>
                            
                            <th>Section</th> -->
                            <th class="text-dark">Course</th>
                            
                            <!-- <th>Status</th> -->
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($semesterCourses as $semesterCourse)
                          <tr class="border border-1 rounded border-dark table-hover">
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $semesterCourse->semester->SemSession ?? '--' }}</td>
                            <!-- <td>{{ $semesterCourse->employee->Emp_FirstName ?? '--' }} {{ $semesterCourse->employee->Emp_LastName ?? '--' }}</td> -->
                            <td>{{ $semesterCourse->CampusLimit  ?? '--'}}</td>
                            <!-- <td>{{ $semesterCourse->degreeBatches->degree->DegreeName ?? '--'}} / {{ $semesterCourse->degreeBatches->batch->SemSession ?? '--'}}</td>
                           <td>{{ $semesterCourse->Section  ?? '--'}}</td> -->
                            <td>{{ $semesterCourse->course->CourseName  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semesterCourse->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $semesterCourse->ID }}" class="btn bg_lgu_green text-white "><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                 
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex">
                          {!! $semesterCourses->links() !!}
                      </div>
                    </div>
@include('Table.table_footer') 
@endsection   
