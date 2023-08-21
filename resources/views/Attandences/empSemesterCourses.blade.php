@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table border-1 rounded border-dark" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark ">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                           
                            <th class="text-dark">Emp</th>
                            <th class="text-dark">Course</th>
                            
                            <!-- <th>Status</th> -->
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($DegreeSemCourses as $DegreeSemCourse)
                          <tr class="border border-1 rounded border-dark table-hover">
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $DegreeSemCourse->Emp_FirstName ?? '--' }}</td>
                            <td>{{ $DegreeSemCourse->CourseName ?? '--' }}</td>
                           
                            <td>
                              <div class="card-body">
                                
                                 <a href="{{ $getEditRoute }}/{{ $DegreeSemCourse->semcID }}" class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ 'Tasks' }}</a>
                                 
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        
                    </div>
@include('Table.table_footer') 
@endsection   