@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                    <div class="form-group">
                      <label>Degree Batch</label>
                      <select class="form-control select2" name="DegreeBatches_ID"  required>
                        @foreach($degreeBatche as $degree)
                        <option value="{{ $degree->ID }}">{{ $degree->degree->DegreeName ?? '--' }} | {{ $degree->batch->SemSession ?? '--' }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Batch</label>
                      <select class="form-control select2" name="Sem_ID"  required>
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}">{{ $semester->SemSession }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Per Course Fee</label>
                      <input 
                      type="text" 
                      name="PerCourseFee" 
                      class="form-control" 
                      value="{{ old('PerCourseFee') }}"
                      
                      >
                    </div>

                    <div class="form-group">
                      <label>Per Semester Fee</label>
                      <input 
                      type="text" 
                      name="PerSemesterFee" 
                      class="form-control" 
                      value="{{ old('PerSemesterFee') }}"
                      >
                    </div>
                    
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      