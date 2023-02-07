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
                            <th>Room</th>
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
                     
                     <button 
                     type="button"  
                     class="btn btn-warning float-right" 
                     data-toggle="modal" 
                     data-target="#exampleModal"
                     style="margin: 10px ;" 
                     >Export Excel Sheet</button>

         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Import File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ route('upload.StdRollNoSlip.Excel') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>Upload File</label>
                    <div class="form-group">
         <label>Student Files 
         </label>
         <input type="file" value="{{ old('stdfile') }}" name="stdRollFile"  class="form-control">
         <br>
        
      </div>
                  </div>
                 
                  
                  <button type="submit" class="btn btn-primary">Upload</button>
                </form>
              </div>
            </div>
          </div>
        </div>

@include('Table.table_footer') 
@endsection   

