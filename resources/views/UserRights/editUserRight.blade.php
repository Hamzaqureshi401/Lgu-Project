@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  

                
                  <div class="card-body">
                    <input type="hidden" name="id" value="{{ $degree->ID }}">
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

                    <div class="form-group">
                      <label>Is Insert</label>
                      <input 
                      type="text" 
                      name="IsInsert" 
                      class="form-control" 
                      required
                      value="{{ $userRight->IsInsert }}" 
                      
                      >
                    </div>
                    <div class="form-group">
                      <label>Is Update</label>
                     <input 
                      type="text" 
                      name="IsUpdate" 
                      class="form-control" 
                      required
                       value="{{ $userRight->IsUpdate }}" 
                      >
                    </div>
                    
                    <div class="form-group">
                      <label>Is Delete</label>
                      <input 
                      type="text" 
                      name="IsDelete" 
                      class="form-control"
                      required
                       value="{{ $userRight->IsDelete }}" 
                      >
                    </div>
                    
                    <div class="form-group">
                      <label>Is Browse</label>
                      <input type="number" name="IsBrowse" class="form-control"required
                      value="{{ $userRight->IsBrowse }}"
                      >  
                    </div>
                    
  
                
@include('Forms.formFooter')   
@include('js.form_submit_script')             
@endsection
