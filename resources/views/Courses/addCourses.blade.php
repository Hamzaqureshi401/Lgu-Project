@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                    <div class="form-group">
                      <label>Course Code</label>
                      <input type="text" name="CourseCode" class="form-control" value="{{ old('CourseCode') }}">
                    </div>
                    <div class="form-group">
                      <label>Course Name</label>
                      <input type="text" name="CourseName" class="form-control" value="{{ old('CourseName') }}">
                    </div>
                    <div class="form-group">
                       <label>Credit Hours</label>
                      <input type="tel" name="CreditHours" id="CreditHours" data-inputmask="'mask': '9-9-99'" placeholder="Example 9-9-09" class="form-control"  value="{{ old('CreditHours') }}" pattern="[0-9\-]+"  maxlength=6> 
                      
                    </div>
                    <div class="form-group">
                      <label>Lecture Type</label>
                      <input type="text" name="LectureType" class="form-control"  value="{{ old('LectureType') }}">
                    </div>
                     <div class="form-group">
                      <label>Lecture Type</label>
                      <select class="form-control select2" name="LectureType"  required>
                       
                        <option value="{{ 'Theory' }}">{{ 'Theory' }}</option>
                        <option value="{{  'Lab' }}">{{ 'Lab' }}</option>
                        
                      </select>
                    </div>

                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>

@include('Forms.formFooter')   
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
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




      