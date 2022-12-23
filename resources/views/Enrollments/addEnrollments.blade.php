@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Student Name</label>
                      <input type="number" name="Std_ID" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Sem Courses_ID</label>
                      <input type="number" name="SemCourses_ID" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Is_i_mid</label>
                      <input type="number" name="Is_i_mid" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Is_i_final</label>
                      <input type="number" name="Is_i_final" class="form-control"required>
                    </div>
                    <div class="form-group">
                      <label>Reg ID</label>
                      <input type="number" name="Reg_ID" class="form-control"required>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')   
@include('js.form_submit_script')             
@endsection




      