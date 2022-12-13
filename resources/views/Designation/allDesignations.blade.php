@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')       
                   
                    <div class="table-responsive">
                      <table class="table table-striped " id="sortable-table">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Designation</th>
                            <th>Department Name</th>
                           
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($designations as $designation)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $designation->Designation }}</td>
                            <td>{{ $designation->Dpt_Name }}</td>
                           
                            <td> <div class="card-body">
                                <!-- only change id -->
                                <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $designation->Des_ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button>
                                
                              </div></td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $designations->links() !!}
                    </div>
@include('Table.table_footer')    
@endsection   
