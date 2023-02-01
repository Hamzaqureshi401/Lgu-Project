@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  

                
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $userRight->ID }}">
                    <div class="form-group">
                      <label>Designation</label>
                      <select class="form-control select2" name="Des_ID"  required>
                        @foreach($designations as $designation)
                        <option value="{{ $designation->ID }}" 
                          {{ $designation->ID == $userRight->Des_ID ? 'selected' : '' }}
                          >{{ $designation->Designation }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Module</label>
                      <select class="form-control select2" name="Mod_ID"  required>
                        @foreach($modules as $module)
                        <option value="{{ $module->ID }}"
                          {{ $module->ID == $userRight->Mod_ID ? 'selected' : '' }}
                          >{{ $module->ModuleName }}</option>
                        @endforeach
                      </select>
                    </div>

          <div class="form-group col-3">
             <label>Is Insert</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsInsert'>
                <input type="checkbox" value="1" name="IsInsert" {{ $userRight->IsInsert == 1 ? 'checked' : '' }}>
                  <div class="state p-success"

                  >
                    <label></label>
                  </div>
                </div>
              </div>

          <div class="form-group col-3">
             <label>Is Update</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsUpdate'>
                <input type="checkbox" value="1" name="IsUpdate" {{ $userRight->IsUpdate == 1 ? 'checked' : '' }}>
                  <div class="state p-success"

                  >
                    <label></label>
                  </div>
                </div>
              </div>

          <div class="form-group col-3">
             <label>Is Delete</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsDelete'>
                <input type="checkbox" value="1" name="IsDelete" {{ $userRight->IsDelete == 1 ? 'checked' : '' }}>
                  <div class="state p-success"

                  >
                    <label></label>
                  </div>
                </div>
              </div>

          <div class="form-group col-3">
             <label>Is Browse</label>
             <div class="pretty p-switch p-slim">
              <input type='hidden' value='0' name='IsBrowse'>
                <input type="checkbox" value="1" name="IsBrowse" {{ $userRight->IsBrowse == 1 ? 'checked' : '' }}>
                  <div class="state p-success"

                  >
                    <label></label>
                  </div>
                </div>
              </div>
                    <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
                   
                    
                  
                    
          
                    
  
                
@include('Forms.formFooter')   
@include('js.form_submit_script')             
@endsection
