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
                            <th>Student Name</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Paid Date</th>
                            <th>Status</th>
                            <th>Fine</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <!-- <th>Status</th> -->
                            @if(session()->has('Emp_session'))
                            <th>Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($challans as $challan)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $challan->registration->student->Std_FName ?? '--' }} {{ $challan->registration->student->Std_LName ?? '--' }}</td>
                            <td>{{ $challan->IssueDate ?? '--' }}</td>
                            <td>{{ $challan->DueDate  ?? '--'}}</td>
                            <td>{{ $challan->PaidDate  ?? '--'}}</td>
                            <td>{{ $challan->Status ?? '--' }}</td>
                            <td>{{ $challan->Fine  ?? '--'}}</td>
                            <td>{{ $challan->Amount  ?? '--'}}</td>
                            <td>{{ $challan->Type  ?? '--'}}</td>
                            @if(session()->has('Emp_session'))
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                               
                                <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $challan->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button>
                                
                              </div>
                            </td>
                            @endif
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $challans->links() }}
                    </div>
@include('Table.table_footer') 
@endsection   
