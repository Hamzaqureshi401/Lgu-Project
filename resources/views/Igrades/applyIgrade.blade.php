@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 
               
                  <div class="card-body">
                    <input 
                    type="hidden" 
                    name="id" 
                    value="{{ $courses->ID }}"
                    >
                     <input 
                    type="hidden" 
                    name="enrollmentID" 
                    value="{{ $enrollments->ID }}"
                    >
                    <div class="form-group">
                      <label>Course Code</label>
                      <input 
                      type="text" 
                      
                      class="form-control" 
                      value="{{ $courses->CourseCode }} 
                      "readonly
                     
                      >
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input 
                      type="text" 
                       
                      class="form-control" 
                      value="{{ $courses->CourseName }}" 
                      readonly
                      
                      >
                    </div>
                    <div class="form-group">
                      <label>Credit Hours</label>
                      <input type="tel" id="CreditHours" data-inputmask="'mask': '9-9-99'" placeholder="Example 9-9-09" maxlength=6 class="form-control" value="{{ $courses->CreditHours }}" readonly>
                    </div>
                  

                     <div class="form-group">
                      <label>Lecture Type</label>
                      <input 
                      type="text" 
                       
                      class="form-control" 
                      value="{{ $courses->LectureType }}" 
                      readonly
                      >
                    </div>

                     <div class="form-group">
                      <label>Type</label>
                      <select class="form-control select2" name="Type"  required>
                       
                        <option value="{{ 'Mid Term' }}">{{ 'Mid Term' }}</option>
                        <option value="{{  'Final Term' }}">{{ 'Final Term' }}</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Remarks</label>
                      <input 
                      type="text" 
                       name="Remarks" 
                      class="form-control" 
                      required 
                      >
                    </div>

                    <div class="form-group">
                   <label style="font-size: 13px">Student Files <span style="color: red">*
                   jpeg,png,jpg,pdf</span>
                   </label>
                   <input type="file" value="{{ old('stdfile') }}" name="Image" id="stdfile" class="form-control">
                   <br>
                   @error('stdfile')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                </div>
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
    
                
@include('Forms.formFooter')   

@endsection



      