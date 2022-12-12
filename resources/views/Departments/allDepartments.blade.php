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
                            <th>Dpt_Name</th>
                            <th>Dpt_FullName</th>
                            <th>HODUID</th>
                            <th>DeanUID</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($departments as $department)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $department->Dpt_Name ?? '--' }}</td>
                            <td>{{ $department->Dpt_FullName ?? '--' }}</td>
                            <td>{{ $department->HODUID ?? '--' }}</td>
                            <td>{{ $department->DeanUID ?? '--' }}</td>
                            <td>{{ $department->Status ?? '--' }}</td>
                            <td><div class="card-body">
                                <!-- only change id -->
                                <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $department->Dpt_ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>

@include('Table.table_footer')    
@endsection   
