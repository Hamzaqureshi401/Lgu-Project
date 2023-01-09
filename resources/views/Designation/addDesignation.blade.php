@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control" >
                    </div>
                     <div class="form-group">
                      <label>Dpt Name</label>
                      <select class="form-control" name="Dpt_ID"  required>
                        @foreach($departments as $department)
                        <option value="{{ $department->ID }}">{{ $department->Dpt_Name }}</option>
                        @endforeach
                      </select>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      