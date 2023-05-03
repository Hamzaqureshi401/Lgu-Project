
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
                            <th>Degree Name</th>
                            <th>Batch Name</th>
                            <th>Per Course Fee</th>
                            <th>Per Semester Fee</th>

                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($fees as $key => $fee)
                          <tr>
                            <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                            <td>{{ $fee->DegreeBatche->Degree->DegreeName ?? '--' }}</td>
                            <td>{{ $fee->DegreeBatche->batch->SemSession  ?? '--' }}</td>
                            <td>{{ $fee->PerCourseFee  ?? '--' }}</td>
                            <td>{{ $fee->PerSemesterFee  ?? '--' }}</td>

                          
                            <td>
                              <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $fee->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                 <a href="{{ $getEditRoute }}/{{ $fee->ID }}" class="btn btn-primary"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
                              </div>
                            </td>
                          </tr>
                           @endforeach
                        </tbody>
                      </table>
                    </div>
                    {{-- {{ $degreeBatchs->links() }} --}}
@include('Table.table_footer') 
@endsection   
