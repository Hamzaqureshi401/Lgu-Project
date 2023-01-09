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
                            <th>DegreeName</th>
                            <th>DegreeLevel</th>
                            <th>DegreeFullName</th>
                            <th>Dpt_ID</th>
                            <th>Total_Credit_Hours</th>
                            <th>status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($degrees as $degree)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $degree->DegreeName ?? '--' }}</td>
                            <td>{{ $degree->DegreeLevel ?? '--' }}</td>
                            <td>{{ $degree->DegreeFullName ?? '--' }}</td>
                            <td>{{ $degree->Dpt_ID ?? '--' }}</td>
                            <td>{{ $degree->Total_Credit_Hours ?? '--' }}</td>
                            <td>{{ $degree->status ?? '--' }}</td>
                            <td><div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $degree->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $degree->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $degrees->links() }}
                    </div>
@include('Table.table_footer')    
@endsection   
