@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
 
<div class="card-body">
  <input type="hidden" name="ID" value="{{ $stdRollNoSlips->ID }}">
               <div class="form-group">
                      <label>Enrolled Student</label>
                      <select class="form-control" name="Enroll_ID"  required>
                        @foreach($enrollments as $enrollment)
                        <option value="{{ $enrollment->ID }}" {{ $enrollment->ID == $stdRollNoSlips->Enroll_ID ? 'selected' : '' }}>{{ $enrollment->student->Std_FName }} {{ $enrollment->student->Std_LName }}</option>
                        @endforeach
                      </select>
                    </div>
                    @php
                    $Buildings = ['New Building' , 'Old Building'];
                    $room = range(1,100);
                    $SeatNo = range(1,500);

                    @endphp
                    <div class="form-group">
                      <label>Building</label>
                      <select class="form-control" name="Building"  required>
                        @foreach($Buildings as $number)
                        <option value="{{ $number }}" {{ $number == $stdRollNoSlips->Building ? 'selected' : '' }}>{{ $number }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Romm</label>
                      <select class="form-control" name="Room"  required>
                        @foreach($room as $number)
                        <option value="{{ $number }}" {{ $number == $stdRollNoSlips->Room ? 'selected' : '' }}>{{ $number }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Seat No</label>
                      <select class="form-control" name="SeatNo"  required>
                        @foreach($room as $number)
                        <option value="{{ $number }}" {{ $number == $stdRollNoSlips->SeatNo ? 'selected' : '' }}>{{ $number }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                       <label>Time</label>
                      <input type="time" name="Time" class="form-control"  value="{{ $stdRollNoSlips->Time }}" > 
                      
                    </div>
                  
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
    
                
@include('Forms.formFooter')   

@endsection



      