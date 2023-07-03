@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table "  id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">CourseCode</th>
                            <th class="text-dark">CourseName</th>
                            <th class="text-dark">CreditHours</th>
                            <th class="text-dark">LectureType</th>
                            <!-- <th>Status</th> -->
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($enrollments as $key => $enrollment)
                          @if($enrollment->igrade->Status == 'Teacher')
                          <tr class="border border-1 rounded border-dark table-hover">
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




                                
                                
                                <a href="{{ route('confirm.Igrades.Teacher' , $enrollment->igrade->ID) }}" class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                               
                               

                              

                                
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
