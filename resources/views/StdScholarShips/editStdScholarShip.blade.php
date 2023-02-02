@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  

                
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $stdScholarShip->ID }}">
                    <div class="form-group">
                      <label>Student</label>
                      <input type="text" value="{{ $stdScholarShip->student->Std_FName}}{{ $stdScholarShip->student->Std_LName}}" class="form-control" readonly>
                    </div>
                     <div class="form-group">
                      <label>Percentage %</label>
                     <input type="number" name="Percentage" class="form-control" value="{{ $stdScholarShip->Percentage }}">
                    </div>

                     @php 
                    $cat = ['Sposrts Base' , 'Defence Base' , 'Need Base'];
                    $scType = ['Percentage' , 'Fixed'];
                    @endphp

                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control select2" name="Category"  required>
                        @foreach($cat as $ca)
                        <option value="{{ $ca }}" {{ $ca == $stdScholarShip->Category ? 'selected' : '' }}>{{ $ca }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Scholarship Type </label>
                      <select class="form-control select2" name="Scholarship_Type"  required>
                        @foreach($scType as $scTyp)
                        <option value="{{ $scTyp }}" {{ $scTyp == $stdScholarShip->Scholarship_Type ? 'selected' : '' }}>{{ $scTyp }}</option>
                        @endforeach
                      </select>
                    </div>

            
                    <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                   
                    
                  
                    
          
                    
  
                
@include('Forms.formFooter')   
@include('js.form_submit_script')             
@endsection
