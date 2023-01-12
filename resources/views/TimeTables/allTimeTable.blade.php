@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')       
                   
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Semester / Courses</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Building</th>
                            <th>Room</th>
                            <th>Type</th>
                            <th>Employee</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($timeTables as $timeTable)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $timeTable->semesterCourse->semester->SemSession ?? '--' }} / {{ $timeTable->semesterCourse->course->CourseName ?? '--' }}</td>
                            <td>{{ $timeTable->Day ?? '--' }}</td>
                            <td>{{ $timeTable->StartTime ?? '--' }}</td>
                            <td>{{ $timeTable->EndTime ?? '--' }}</td>
                            <td>{{ $timeTable->Building ?? '--' }}</td>
                            <td>{{ $timeTable->Room ?? '--' }}</td>
                            <td>{{ $timeTable->Type ?? '--' }}</td>
                            <td>{{ $timeTable->employee->Emp_FirstName ?? '--' }} {{ $timeTable->employee->Emp_LastName ?? '--' }}</td>
                            <td><div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $timeTable->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $timeTable->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $timeTables->links() !!}
                    </div>
@include('Table.table_footer')    
@endsection   
