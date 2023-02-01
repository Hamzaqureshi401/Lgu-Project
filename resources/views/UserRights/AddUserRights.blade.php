@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">

                    <div class="form-group">
                      <label>Designation</label>
                      <select class="form-control select2" name="Des_ID"  required>
                        @foreach($designations as $designation)
                        <option value="{{ $designation->ID }}">{{ $designation->Designation }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Module</label>
                      <select class="form-control select2" name="Mod_ID"  required>
                        @foreach($modules as $module)
                        <option value="{{ $module->ID }}">{{ $module->ModuleName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Is Insert</label>
                      <input 
                      type="text" 
                      name="IsInsert" 
                      class="form-control" 
                      required
                      
                      >
                    </div>
                    <div class="form-group">
                      <label>Is Update</label>
                     <input 
                      type="text" 
                      name="IsUpdate" 
                      class="form-control" 
                      required
                      
                      >
                    </div>
                    
                    <div class="form-group">
                      <label>Is Delete</label>
                      <input 
                      type="text" 
                      name="IsDelete" 
                      class="form-control"
                      required
                      
                      >
                    </div>
                    
                    <div class="form-group">
                      <label>Is Browse</label>
                      <input type="number" name="IsBrowse" class="form-control"required>
                    </div>
                    
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                </form>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      