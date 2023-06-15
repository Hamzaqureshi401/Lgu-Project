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
                            <th>Sem Session</th>
                            <th>Year</th>
                            <th>Sem Start Date</th>
                            <th>Sem End Date</th>
                            <th>Enrollment Start Date</th>
                            <th>Enrollment End Date</th>
                            <th>Exam Start Date</th>
                            <th>Exam End Date</th>
                            <th>I mid StartDate</th>
                            <th>I mid EndDate</th>
                            <th>I final StartDate</th>
                            <th>I final EndDate</th>
                             <th>Admission Start Date</th>
                            <th>Admission End Date</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($semesters as $semester)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $semester->SemSession ?? '--' }}</td>
                            <td>{{ $semester->Year ?? '--' }}</td>
                            <td>{{ $semester->SemStartDate  ?? '--'}}</td>
                            <td>{{ $semester->SemEndDate  ?? '--'}}</td>
                            <td>{{ $semester->EnrollmentStartDate ?? '--' }}</td>
                            <td>{{ $semester->EnrollmentEndDate ?? '--' }}</td>
                            <td>{{ $semester->ExamStartDate  ?? '--'}}</td>
                            <td>{{ $semester->ExamEndDate  ?? '--'}}</td>
                            <td>{{ $semester->I_mid_StartDate ?? '--' }}</td>
                            <td>{{ $semester->I_mid_EndDate ?? '--' }}</td>
                            <td>{{ $semester->I_final_StartDate  ?? '--'}}</td>
                            <td>{{ $semester->I_final_EndDate  ?? '--'}}</td>
                            <td>{{ $semester->AdmissionStartDate  ?? '--'}}</td>
                            <td>{{ $semester->AdmissionEndDate  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semester->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $semester->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    {{ $semesters->links() }}
@include('Table.table_footer') 
@endsection   
