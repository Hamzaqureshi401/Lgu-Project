@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  

                  <div class="card-body">
                    <div class="form-group">
                      <label>Dpt Name</label>
                      <input type="text" name="Dpt_Name" class="form-control" value="{{old('Dpt_Name')}}" required>
                    </div>
                    <div class="form-group">
                      <label>Dpt Full Name</label>
                      <input type="text" name="Dpt_FullName" class="form-control" value="{{old('Dpt_FullName')}}"required>
                    </div>
                    <div class="form-group">
                      <label>HOD U ID</label>
                      <input type="number" name="HODUID" class="form-control" value="{{old('HODUID')}}"required>
                    </div>
                    <div class="form-group">
                      <label>Dean U ID</label>
                      <input type="number" name="DeanUID" class="form-control" value="{{old('DeanUID')}}"required>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <input type="number" name="Status" class="form-control" value="{{old('Status')}}" required>
                    </div>
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      