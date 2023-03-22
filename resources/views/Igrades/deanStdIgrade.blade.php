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
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- {{$empdegreename=}} --}}
                          
                          @foreach($studentIgrades as $key => $studentIgrade)
                          {{-- {{dd($studentIgrade->enrollment->student->degree->DegreeName,$empdegreename )}} --}}

                          {{-- {{dd($studentIgrade->enrollment->semesterCourse->course->CourseName);}} --}}
                          @if($studentIgrade->enrollment->student->degree->DegreeName == $empDepartment->Dpt_Name)

                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->CourseName ?? '--' }}</td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->CourseCode ?? '--' }}</td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->CreditHours  ?? '--'}}</td>
                            <td>{{ $studentIgrade->enrollment->semesterCourse->course->LectureType  ?? '--'}}</td>
                            <td>
                              <div class="card-body">

                                <a href="{{ route('confirm.Igrades.Dean' , $studentIgrade->ID) }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                               
                               

                              

                                
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
