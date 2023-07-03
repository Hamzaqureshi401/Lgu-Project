@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">CourseCode</th>
                            <th class="text-dark">CourseName</th>
                            <th class="text-dark">CreditHours</th>
                            <th class="text-dark">LectureType</th>
                            <th class="text-dark">Student Name</th>

                            <!-- <th>Status</th> -->
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($studentIgrades as $key =>$studentIgrade)
                          @if($studentIgrade->enrollment->student->degree->department ->ID == $empDepartment->ID)
                          <tr class="border border-1 rounded border-dark table-hover"> 
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
                                <a href="{{ route('confirm.Igrades.Hod' , $studentIgrade->ID) }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
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
