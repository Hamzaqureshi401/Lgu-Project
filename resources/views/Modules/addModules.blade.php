@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                    <div class="form-group">
                      <label>Module Name</label>
                      <input 
                      type="text" 
                      name="ModuleName" 
                      class="form-control" 
                      value="{{ old('ModuleName') }}"
                      
                      >
                    </div>
                    <div class="form-group">
                      <label>Url</label>
                      <input 
                      type="text" 
                      name="URL" 
                      class="form-control" 
                      value="{{ old('URL') }}"
                      
                      >
                    </div>
                     @php 
                    $status = ['1' , '0'];
                    @endphp
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="Status"  required>
                        @foreach($status as $statu)
                        <option value="{{ $statu }}">{{ $statu }}</option>
                        @endforeach
                      </select>
                    </div>
                   
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>

@include('Forms.formFooter')   

@endsection




      