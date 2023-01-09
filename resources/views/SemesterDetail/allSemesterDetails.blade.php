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
                            <th>Degree</th>
                            <th>Semester</th>
                            <th>Semester No</th>
                            <th>Semester Fee</th>
                            <th>Per Semester</th>
                            <th>Per Course</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($semesterDetails as $semesterDetail)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $semesterDetail->degree->DegreeName ?? '--' }}</td>
                            <td>{{ $semesterDetail->semester->SemSession ?? '--' }}</td>
                            <td>{{ $semesterDetail->SemesterNo  ?? '--'}}</td>
                            <td>{{ $semesterDetail->SemesterFee  ?? '--'}}</td>
                            <td>{{ $semesterDetail->PerSemester  ?? '--'}}</td>
                            <td>{{ $semesterDetail->PerCourse  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semesterDetail->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $semesterDetail->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $semesterDetails->links() !!}
                    </div>
@include('Table.table_footer') 
@endsection   
