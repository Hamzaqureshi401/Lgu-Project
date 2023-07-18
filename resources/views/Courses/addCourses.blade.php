@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Forms.formHeader')

    <div class="card-body">

        <div class="row">

            <div class="form-group col-6">
                <label>Course Code</label>
                <input type="text" name="CourseCode" class="form-control border-1 rounded border-dark" value="{{ old('CourseCode') }}"
                    onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));">
            </div>
            <div class="form-group col-6">
                <label>Course Name</label>
                <input type="text" name="CourseName" class="form-control border-1 rounded border-dark" value="{{ old('CourseName') }}"
                    onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));">
            </div>

        </div>

        <div class="row">
          <div class="form-group col-6">
            <label>Credit Hours</label>
            <input type="tel" name="CreditHours" id="CreditHours" data-inputmask="'mask': '9-9-99'"
                placeholder="Example 9-9-09" class="form-control border-1 rounded border-dark" value="{{ old('CreditHours') }}" pattern="[0-9\-]+"
                maxlength=6>

        </div>

        <!-- <div class="form-group col-6">
          <label>Lecture Type</label>
            <select class="custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="LectureType" required>

                <option value="{{ 'Theory' }}">{{ 'Theory' }}</option>
                <option value="{{ 'Lab' }}">{{ 'Lab' }}</option>

            </select>
        </div> -->
        </div>

        <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>

        @include('Forms.formFooter')
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

        <script type="text/javascript">
            $(document).ready(function($) {
                $('#CreditHours').click(function() {
                    $(":input").inputmask();
                });
            });
        </script>
    @endsection
