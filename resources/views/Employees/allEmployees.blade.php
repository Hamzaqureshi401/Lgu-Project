@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table table-striped dataTable" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark">
                            <th class="text-center text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Emp First Name</th>
                            <th class="text-dark">Emp Last Name</th>
                            <th class="text-dark">DOB</th>
                            <th class="text-dark">CNIC</th>
                            <th class="text-dark">Date Of Joining</th>
                            <th class="text-dark">Date Of Appointment</th>
                            <th class="text-dark">Specialization</th>
                            <th class="text-dark">Designation</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">User Name</th>
                            <th class="text-dark">Password</th>
                            <th class="text-dark">Gender</th>
                            <th class="text-dark">Email</th>
                            <th class="text-dark">Address</th>
                            <th class="text-dark">Dpt ID</th>
                            <th class="text-dark">Grade</th>

                            <th class="text-dark">Contact_Number</th>
                            <th class="text-dark">Defual Url</th>
                            <!-- <th>Status</th> -->
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($employees as $employee)
                          <tr class="border border-1 rounded border-dark table-hover">
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
                            <td>{{ $employee->DefualtUrl  ?? '--'}}</td>
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $employee->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $employee->ID }}" class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
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
