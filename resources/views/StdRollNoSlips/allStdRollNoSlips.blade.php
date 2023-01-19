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
                            <th>Enrolled Student</th>
                            <th>Building</th>
                            <th>Romm</th>
                            <th>Seat No</th>
                            <th>Time</th>
                            
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($stdRollNoSlips as $stdRollNoSlip)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $stdRollNoSlip->enrollment->student->Std_FName ?? '--' }} {{ $stdRollNoSlip->enrollment->student->Std_LName ?? '--' }}</td>
                            <td>{{ $stdRollNoSlip->Building ?? '--' }}</td>
                            <td>{{ $stdRollNoSlip->Room  ?? '--'}}</td>
                            <td>{{ $stdRollNoSlip->SeatNo  ?? '--'}}</td>
                            <td>{{ $stdRollNoSlip->Time  ?? '--'}}</td>
                           
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $stdRollNoSlip->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $stdRollNoSlip->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                              

                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $stdRollNoSlips->links() }}
                    </div>
@include('Table.table_footer') 
@endsection   
