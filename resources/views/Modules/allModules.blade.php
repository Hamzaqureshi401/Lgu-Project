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
                            
                            <th>Module Name</th>
                            <th>Url</th>
                            <th>Statu</th>
                            
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($modules as $module)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $module->ModuleName ?? '--' }}</td>
                            <td>{{ $module->URL ?? '--' }}</td>
                            <td>{{ $module->Status  ?? '--'}}</td>
                            <
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $module->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $module->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                              

                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $modules->links() }}
                    </div>
@include('Table.table_footer') 
@endsection   
