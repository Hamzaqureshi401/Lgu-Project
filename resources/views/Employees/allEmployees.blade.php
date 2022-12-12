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
                            <th>Emp_FirstName</th>
                            <th>Emp_LastName</th>
                            <th>DOB</th>
                            <th>CNIC</th>
                            <th>DateOfJoining</th>
                            <th>DateOfAppointment</th>
                            <th>Specialization</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>UserName</th>
                            <th>Password</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Dpt_ID</th>
                            <th>Grade</th>
                            <th>Contact_Number</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($employees as $employees)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $employees->Emp_FirstName ?? '--' }}</td>
                            <td>{{ $employees->Emp_LastName ?? '--' }}</td>
                            <td>{{ $employees->DOB  ?? '--'}}</td>
                            <td>{{ $employees->CNIC  ?? '--'}}</td>
                            <td>{{ $employees->DateOfJoining ?? '--' }}</td>
                            <td>{{ $employees->DateOfAppointment ?? '--' }}</td>
                            <td>{{ $employees->Specialization  ?? '--'}}</td>
                            <td>{{ $employees->Designation  ?? '--'}}</td>
                            <td>{{ $employees->Status ?? '--' }}</td>
                            <td>{{ $employees->UserName ?? '--' }}</td>
                            <td>{{ $employees->Password  ?? '--'}}</td>
                            <td>{{ $employees->Gender  ?? '--'}}</td>
                            <td>{{ $employees->Email  ?? '--'}}</td>
                            <td>{{ $employees->Address ?? '--' }}</td>
                            <td>{{ $employees->Dpt_ID ?? '--' }}</td>
                            <td>{{ $employees->Grade  ?? '--'}}</td>
                            <td>{{ $employees->Contact_Number  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $employees->Emp_ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button>
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
@include('Table.table_footer') 
@endsection   
