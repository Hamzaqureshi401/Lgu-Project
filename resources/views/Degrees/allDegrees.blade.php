@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')       
                   
                    <div class="table-responsive">
                      <table class="table" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark ">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Degree Name</th>
                            <th class="text-dark">Degree Level</th>
                            <th class="text-dark">Degree Full Name</th>
                            <th class="text-dark">Department</th>
                            <th class="text-dark">Total Credit Hours</th>
                            <th class="text-dark">Status</th>
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($degrees as $degree)
                          <tr class="border border-1 rounded border-dark table-hover">
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $degree->DegreeName ?? '--' }}</td>
                            <td>{{ $degree->DegreeLevel ?? '--' }}</td>
                            <td>{{ $degree->DegreeFullName ?? '--' }}</td>
                            <td>{{ $degree->department->Dpt_Name ?? '--' }}</td>
                            <td>{{ $degree->Total_Credit_Hours ?? '--' }}</td>
                            <td>{{ $degree->status ?? '--' }}</td>
                            <td><div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $degree->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $degree->ID }}" class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                      <div class="d-flex">
                          {{ $degrees->links() }}
                      </div>
                    </div>
@include('Table.table_footer')    
@endsection   
