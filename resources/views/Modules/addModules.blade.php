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
                      class="form-control border-1 rounded border-dark" 
                      value="{{ old('ModuleName') }}"
                      
                      >

                      <label>Url</label>
                      <input 
                      type="text" 
                      name="URL" 
                      class="form-control border-1 rounded border-dark" 
                      value="{{ old('URL') }}"
                      
                      >
                    </div>
                     @php 
                    $status = ['1' , '0'];
                    @endphp
                    <div class="form-group ">
                      <label>Status</label>
                      <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark " name="Status"  required>
                        @foreach($status as $statu)
                        <option value="{{ $statu }}">{{ $statu }}</option>
                        @endforeach
                      </select>
                    </div>
                   
                <button id="button" type="submit" class="btn bg_lgu_green text-white btn-block submit-form">{{ $button }}</button>

@include('Forms.formFooter')   

@endsection




      