@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')       
                   
                    <div class="table-responsive">
                      <table class="table border-1 rounded border-dark " id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark ">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Designation</th>
                            <th class="text-dark">Department Name</th>
                           
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($designations as $designation)
                          <tr class="border border-1 rounded border-dark table-hover">
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $designation->Designation ?? '--' }}</td>
                            <td>{{ $designation->department->Dpt_Name ?? '--' }}</td>
                           
                            <td> <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $designation->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $designation->ID }}" class="btn bg_lgu_green text-white "><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex">
                          {!! $designations->links() !!}
                      </div>
                    </div>
@include('Table.table_footer')    
@endsection   
