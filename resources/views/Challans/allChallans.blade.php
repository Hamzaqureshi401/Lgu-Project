@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark">
                            <th class="text-center text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Student Name</th>
                            <th class="text-dark">Issue Date</th>
                            <th class="text-dark">Due Date</th>
                            <th class="text-dark">Paid Date</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">Fine</th>
                            <th class="text-dark">Debited</th>
                            <th class="text-dark">Credited</th>
                            <th class="text-dark">Type</th>
                            <!-- <th>Status</th> -->
                           
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @if(!empty($challans))
                          @foreach($challans as $challan)
                          <tr class="border border-1 rounded border-dark table-hover">
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
                            <td>{{ $challan->getPreviousBalance($challan->Reg_ID , $challan->ID) ?? '0'}}</td>
                            <td>{{ $challan->Type  ?? '--'}}</td>
                            <td> <a  class="btn bg_lgu_green text-white" href="{{ route('print.Challan') }}/{{$challan->ID}}">Challan</a> </td>
                            @if(session()->has('Emp_session'))
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                               
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $challan->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                
                              </div>
                            </td>
                            @endif
                          </tr>
                           @endforeach
                           @endif
                        </tbody>
                      </table>
                      <div class="d-flex ">
                        @if(!empty($challans))
                          {{ $challans->links() }}
                          @endif
                      </div>
                    </div>
@include('Table.table_footer') 
@endsection   
