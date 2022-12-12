@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Designation</label>
                      <input type="text" name="Designation" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Dpt ID</label>
                      <input type="number" name="Dpt_ID" class="form-control"required>
                    </div>
                   
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      