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
                    <div class="form-group">
                      <label>Course Code</label>
                      <input 
                      type="text" 
                      name="CourseCode" 
                      class="form-control" 
                      value="{{ $courses->CourseCode }} 
                      "required
                      onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));"
                      >
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input 
                      type="text" 
                      name="CourseName" 
                      class="form-control" 
                      value="{{ $courses->CourseName }}" 
                      required
                      onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));"
                      >
                    </div>
                    <div class="form-group">
                      <label>Credit Hours</label>
                      <input type="tel" id="CreditHours" data-inputmask="'mask': '9-9-99'" placeholder="Example 9-9-09" maxlength=6 name="CreditHours" class="form-control" value="{{ $courses->CreditHours }}" required>
                    </div>
                  
                    @php
                    $types = ['Theory' , 'Lab'];
                    @endphp

                    <!--  <div class="form-group">
                      <label>Lecture Type</label>
                      <select class="form-control select2" name="LectureType"  required>
                        @foreach($types as $type)
                       
                        <option value="{{ $type }}" {{ $courses->LectureType == $type ? 'selected' : '' }}>{{ $type }}</option>

                        @endforeach
                        
                        
                      </select>
                    </div> -->

                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
    
                
@include('Forms.formFooter')   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">
  $(document).ready(function($){
  $('#CreditHours').click(function(){
 $(":input").inputmask();
});
});
</script>
@endsection



      