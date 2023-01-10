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
                            
                            <th>Semester Fee</th>
                            <th>Magazine Fee</th>
                            <th>Exam Fee</th>
                            <th>Society Fee</th>
                            <th>Misc Fee</th>
                            <th>Registration Fee</th>
                            <th>Practical charges</th>
                            <th>Sports Fund</th>
                            <th>Fee Type</th>
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
                            <td>{{ $semesterDetail->SemesterFee  ?? '--'}}</td>
                            <td>{{ $semesterDetail->Magazine_Fee  ?? '--'}}</td>
                            <td>{{ $semesterDetail->Exam_Fee  ?? '--'}}</td>
                            <td>{{ $semesterDetail->Society_Fee  ?? '--'}}</td>
                            <td>{{ $semesterDetail->Misc_Fee  ?? '--'}}</td>
                            <td>{{ $semesterDetail->Registration_Fee  ?? '--'}}</td>
                            <td>{{ $semesterDetail->Practical_charges  ?? '--'}}</td>
                            <td>{{ $semesterDetail->Sports_Fund  ?? '--'}}</td>
                            <td>{{ $semesterDetail->FeeType  ?? '--'}}</td>
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
