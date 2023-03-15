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
                            <th>Student Name</th>

                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($studentIgrades as $key =>$studentIgrade)
                          @if($studentIgrade->enrollment->student->degree->department ->ID == $empDepartment->ID)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->CourseCode ?? '--' }}</td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->CourseName ?? '--' }}</td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->CreditHours  ?? '--'}}</td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->LectureType  ?? '--'}}</td>
                             <td>{{ $studentIgrade->enrollment->student->Std_FName  ?? '--'}}
                                {{ $studentIgrade->enrollment->student->Std_LName  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <a href="" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                              </div>
                            </td>
                          </tr>
                          @endif
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    
@include('Table.table_footer') 
@endsection   
