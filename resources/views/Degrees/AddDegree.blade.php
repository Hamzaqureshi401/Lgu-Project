@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Degree Name</label>
                      <input 
                      type="text" 
                      name="DegreeName" 
                      class="form-control" 
                      required
                      onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));"
                      >
                    </div>
                    <div class="form-group">
                      <label>Degree Level</label>
                      <select class="form-control select2" name="DegreeLevel"  required>
                        
                        <option value="{{ 'UG' }}" selected>{{ 'UG' }}</option>
                       <option value="{{ 'PG' }}">{{ 'PG' }}</option>
                       <option value="{{ 'G' }}">{{ 'G' }}</option>
                       
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Degree Full Name</label>
                      <input 
                      type="text" 
                      name="DegreeFullName" 
                      class="form-control"
                      required
                      onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));"
                      >
                    </div>
                    <div class="form-group">
                      <label>Dpt Name</label>
                      <select class="form-control select2" name="Dpt_ID"  required>
                        @foreach($departments as $department)
                        <option value="{{ $department->ID }}">{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Total Credit Hours</label>
                      <input type="number" name="Total_Credit_Hours" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="Status" class="form-control"required>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      