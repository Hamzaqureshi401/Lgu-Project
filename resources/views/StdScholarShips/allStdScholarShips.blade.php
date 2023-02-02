@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')       
                   
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Student</th>
                            <th>Percentage</th>
                            <th>Category</th>
                            <th>Scholarship Type</th>
                            <th>Emp</th>
                            <th>Sem</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($stdScholarShips as $stdScholarShip)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $stdScholarShip->student->Std_FName ?? '--' }} {{ $stdScholarShip->Student->Std_LName ?? '--' }}</td>
                            <td>{{ $stdScholarShip->Percentage ?? '--' }}</td>
                            <td>{{ $stdScholarShip->Category ?? '--' }}</td>
                            <td>{{ $stdScholarShip->Scholarship_Type ?? '--' }}</td>
                            <td>{{ $stdScholarShip->employee->Emp_FirstName ?? '--' }}{{ $stdScholarShip->employee->Emp_LastName ?? '--' }}</td>
                            <td>{{ $stdScholarShip->semester->SemSession ?? '--' }}</td>
                            <td><div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $stdScholarShip->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $stdScholarShip->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $stdScholarShips->links() }}
                    </div>
@include('Table.table_footer')    
@endsection   
