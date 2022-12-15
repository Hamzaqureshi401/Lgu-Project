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
                            <th>Campus Limit</th>
                            <th>DegCourse ID</th>
                            <th>Quiz Weightage</th>
                            <th>Assignment Weightage</th>
                            <th>Presentation Weightage</th>
                            <th>Mid Weightage</th>
                            <th>Final Weightage</th>
                            <th>Section</th>
                            
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($semesterCourses as $semesterCourse)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $semesterCourse->SemSession ?? '--' }}</td>
                            <td>{{ $semesterCourse->Emp_FirstName ?? '--' }} {{ $semesterCourse->Emp_LastName ?? '--' }}</td>
                            <td>{{ $semesterCourse->CampusLimit  ?? '--'}}</td>
                            <td>{{ $semesterCourse->DegreeName }} / {{ $semesterCourse->CourseName }}</td>
                            <td>{{ $semesterCourse->QuizWeightage  ?? '--'}}</td>
                            <td>{{ $semesterCourse->AssignmentWeightage  ?? '--'}}</td>
                            <td>{{ $semesterCourse->PresentationWeightage  ?? '--'}}</td>
                            <td>{{ $semesterCourse->MidWeightage  ?? '--'}}</td>
                            <td>{{ $semesterCourse->FinalWeightage  ?? '--'}}</td>
                            <td>{{ $semesterCourse->Section  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semesterCourse->SemCourse_ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button>
                                
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
