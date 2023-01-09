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
                            <th>Emp First Name</th>
                            <th>Emp Last Name</th>
                            <th>DOB</th>
                            <th>CNIC</th>
                            <th>Date Of Joining</th>
                            <th>Date Of Appointment</th>
                            <th>Specialization</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Dpt ID</th>
                            <th>Grade</th>
                            <th>Contact_Number</th>
                            <!-- <th>Status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($employees as $employee)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $employee->Emp_FirstName ?? '--' }}</td>
                            <td>{{ $employee->Emp_LastName ?? '--' }}</td>
                            <td>{{ $employee->DOB  ?? '--'}}</td>
                            <td>{{ $employee->CNIC  ?? '--'}}</td>
                            <td>{{ $employee->DateOfJoining ?? '--' }}</td>
                            <td>{{ $employee->DateOfAppointment ?? '--' }}</td>
                            <td>{{ $employee->Specialization  ?? '--'}}</td>
                            <td>{{ $employee->Designation  ?? '--'}}</td>
                            <td>{{ $employee->Status ?? '--' }}</td>
                            <td>{{ $employee->UserName ?? '--' }}</td>
                            <td>{{ $employee->Password  ?? '--'}}</td>
                            <td>{{ $employee->Gender  ?? '--'}}</td>
                            <td>{{ $employee->Email  ?? '--'}}</td>
                            <td>{{ $employee->Address ?? '--' }}</td>
                            <td>{{ $employee->department->Dpt_Name ?? '--' }}</td>
                            <td>{{ $employee->Grade  ?? '--'}}</td>
                            <td>{{ $employee->Contact_Number  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $employee->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $employee->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    {!! $employees->links() !!}
@include('Table.table_footer') 
@endsection   
