@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 
                  <div class="card-body">
                     <input type="hidden" name="id" value="{{ $empDesignation->ID }}">
                    <div class="form-group">
                      <label>Employee</label>
                      <input type="text" class="form-control" value="{{ $empDesignation->employee->Emp_FirstName }}{{ $empDesignation->employee->Emp_LastName }}" readonly>
                    </div>
                    <div class="form-group">
                      <label>Designation</label>
                      <select class="form-control select2" name="Des_ID"  required>
                        @foreach($designations as $designation)
                        <option value="{{ $designation->ID }}" {{ $empDesignation->Des_ID == $designation->ID ? 'selected' : '' }}>{{ $designation->Designation }}</option>
                        @endforeach
                      </select>
                    </div>
                    @php 
                    $status = ['1' , '0'];
                    @endphp
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="Status"  required>
                        @foreach($status as $statu)
                        <option value="{{ $statu }}" {{ $empDesignation->Status == $statu ? 'selected' : '' }}>{{ $statu }}</option>
                        @endforeach
                      </select>
                    </div>
                <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
                

@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      