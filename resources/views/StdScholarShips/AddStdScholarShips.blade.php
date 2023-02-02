@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')
            
                  <div class="card-body">

                    <div class="form-group">
                      <label>Student</label>
                      <select class="form-control select2" name="Std_ID"  required>
                        @foreach($students as $student)
                        <option value="{{ $student->ID }}">{{ $student->Std_FName }} {{ $student->Std_LName }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Percentage %</label>
                     <input type="number" name="Percentage" class="form-control">
                    </div>

                     
                    @php 
                    $cat = ['Sposrts Base' , 'Defence Base' , 'Need Base'];
                    $scType = ['Percentage' , 'Fixed'];
                    @endphp

                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control select2" name="Category"  required>
                        @foreach($cat as $ca)
                        <option value="{{ $ca }}">{{ $ca }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Scholarship Type </label>
                      <select class="form-control select2" name="Scholarship_Type"  required>
                        @foreach($scType as $scTyp)
                        <option value="{{ $scTyp }}">{{ $scTyp }}</option>
                        @endforeach
                      </select>
                    </div>

            
                                                 
                    
                    
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                
              </div>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      