@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  

@php
 $degreeLevels = [0 => 'UG' , 1 => 'PG' , 2 => 'G'];
 
 @endphp 
                
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $degree->ID }}">
                    <div class="form-group">
                      <label>Degree Name</label>
                      <input 
                      type="text" 
                      name="DegreeName" 
                      class="form-control"
                      
                      value="{{ $degree['DegreeName'] }}" 
                      required
                      onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));"
                      >
                    </div>
                     



                      <div class="form-group">
                      <label>Dpt Name</label>
                      <select class="form-control select2" name="DegreeLevel"  required>
                        @foreach($degreeLevels as $degreeLevel)
                        <option value="{{ $degreeLevel }}" {{ $degreeLevel == $degree->DegreeLevel ? 'selected' : '' }}>{{ $degreeLevel }}</option>
                        @endforeach
                      </select>
                    </div>


          
                    <div class="form-group">
                      <label>Degree Full Name</label>
                      <input 
                      type="text" 
                      name="DegreeFullName" 
                      class="form-control" 
                      value="{{ $degree['DegreeFullName'] }}"
                      required
                      onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));"
                      >
                    </div>

                    <div class="form-group">
                      <label>Dpt Name</label>
                      <select class="form-control select2" name="Dpt_ID"  required>
                        @foreach($departments as $department)
                        <option value="{{ $department->ID }}" {{ $department->ID == $degree->Dpt_ID ? 'selected' : '' }}>{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>


                   <!--  <div class="form-group">
                      <label>Dpt ID</label>
                      <input type="number" name="Dpt_ID" class="form-control" value="{{ $degree['Dpt_ID'] }}"required>
                    </div> -->
                    <div class="form-group">
                      <label>Total Credit Hours</label>
                      <input type="number" name="Total_Credit_Hours" class="form-control" value="{{ $degree['Total_Credit_Hours'] }}"required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{ $degree['Status'] }}"required>
                    </div>
                   
                <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
  
                
@include('Forms.formFooter')   
@include('js.form_submit_script')             
@endsection
