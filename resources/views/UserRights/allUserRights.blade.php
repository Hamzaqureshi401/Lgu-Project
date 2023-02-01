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
                            <th>Designation</th>
                            <th>Module</th>
                            <th>IsInsert</th>
                            <th>IsUpdate</th>
                            <th>IsDelete</th>
                            <th>IsBrowse</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($userRights as $userRight)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $userRight->designation->Designation ?? '--' }}</td>
                            <td>{{ $userRight->module->ModuleName ?? '--' }}</td>
                            <td>{{ $userRight->IsInsert ?? '--' }}</td>
                            <td>{{ $userRight->IsUpdate ?? '--' }}</td>
                            <td>{{ $userRight->IsDelete ?? '--' }}</td>
                            <td>{{ $userRight->IsBrowse ?? '--' }}</td>
                            <td><div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $userRight->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $userRight->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $userRights->links() }}
                    </div>
@include('Table.table_footer')    
@endsection   
