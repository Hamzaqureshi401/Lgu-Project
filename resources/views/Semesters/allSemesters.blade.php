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
                            <th>SemSession</th>
                            <th>Year</th>
                            <th>SemStartDate</th>
                            <th>SemEndDate</th>
                            <th>EnrollmentStartDate</th>
                            <th>EnrollmentEndDate</th>
                            <th>ExamStartDate</th>
                            <th>ExamEndDate</th>
                            <th>I_mid_StartDate</th>
                            <th>I_mid_EndDate</th>
                            <th>I_final_StartDate</th>
                            <th>I_final_EndDate</th>
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
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semester->Sem_ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button>
                                
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
