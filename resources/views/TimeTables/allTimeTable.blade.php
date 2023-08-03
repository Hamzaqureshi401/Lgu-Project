@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')       
                   
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Semester / Courses</th>
                            <th class="text-dark">Day</th>
                            <th class="text-dark">Start Time</th>
                            <th class="text-dark">End Time</th>
                            <th class="text-dark">Building</th>
                            <th class="text-dark">Room</th>
                            <th class="text-dark">Type</th>
                            <th class="text-dark">Employee</th>
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($timeTables as $timeTable)
                          <tr class="border border-1 rounded border-dark table-hover">
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
                                 <a href="{{ $getEditRoute }}/{{ $timeTable->ID }}" class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
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
