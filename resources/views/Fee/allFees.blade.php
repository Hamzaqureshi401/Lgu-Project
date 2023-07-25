
@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Table.table_header')                   
                    <div class="table-responsive">
                      <table class="table" id="sortable-table">
                        <thead>
                          <tr class="border border-1 rounded border-dark">
                            <th class="text-dark">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-dark">Degree Name</th>
                            <th class="text-dark">Batch Name</th>
                            <th class="text-dark">Per Course Fee</th>
                            <th class="text-dark">Per Semester Fee</th>
                            <th class="text-dark">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($fees as $key => $fee)
                          <tr class="border border-1 rounded border-dark table-hover">
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
                                 <a href="{{ $getEditRoute }}/{{ $fee->ID }}" class="btn bg_lgu_green text-white"><i class="far fa-edit"></i>{{ $modalTitle }}</a>
                                
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
