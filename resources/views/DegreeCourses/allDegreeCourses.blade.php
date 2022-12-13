
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
                            <th>Course Name</th>
                            <th>Degree Name</th>
                             <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($degreeCourses as $key => $degreeCourse)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $names[$key]->DegreeName }}</td>
                            <td>{{ $names[$key]->CourseName }}</td>
                          
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $degreeCourse->DegCourses_ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button>
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    {{ $degreeCourses->links() }}
@include('Table.table_footer') 
@endsection   
