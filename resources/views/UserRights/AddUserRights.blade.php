@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')
            
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
                    <div class="row">
            <div class="form-group col-3">
                     <label>Is Insert</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsInsert'>
                <input type="checkbox" value="1" name="IsInsert">
                  <div class="state p-success">
                    <label></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-3">
                     <label>Is Update</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsUpdate'>
                <input type="checkbox" value="1" name="IsUpdate">
                  <div class="state p-success">
                    <label></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-3">
                     <label>Is Delete</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsDelete'>
                <input type="checkbox" value="1" name="IsDelete">
                  <div class="state p-success">
                    <label></label>
                  </div>
                </div>
              </div>
              <div class="form-group col-3">
                     <label>Is Browse</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsBrowse'>
                <input type="checkbox" value="1" name="IsBrowse">
                  <div class="state p-success">
                    <label></label>
                  </div>
                </div>
            </div>
            </div>
                                                 
                    
                    
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                
              </div>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      