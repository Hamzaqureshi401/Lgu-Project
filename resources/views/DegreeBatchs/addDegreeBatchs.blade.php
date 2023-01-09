@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  

                  <div class="card-body">
                    <div class="form-group">
                      <label>Degree</label>
                      <select class="form-control" name="Degree_ID"  required>
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->ID }}">{{ $degree->DegreeName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Batch</label>
                      <select class="form-control" name="Batch_ID"  required>
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}">{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      