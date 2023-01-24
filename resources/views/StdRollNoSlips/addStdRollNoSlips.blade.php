@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                  <div class="card-body">
                    <div class="form-group">
                      <label>Enrolled Student</label>
                      <select class="form-control" name="Enroll_ID"  required>
                        @foreach($enrollments as $enrollment)
                        <option value="{{ $enrollment->ID }}">{{ $enrollment->student->Std_FName }} {{ $enrollment->student->Std_LName }}</option>
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
                        <option value="{{ $number }}">{{ $number }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Room</label>
                      <select class="form-control" name="Room"  required>
                        @foreach($room as $number)
                        <option value="{{ $number }}">{{ $number }}</option>
                        @endforeach
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Seat No</label>
                      <select class="form-control" name="SeatNo"  required>
                        @foreach($room as $number)
                        <option value="{{ $number }}">{{ $number }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                       <label>Time</label>
                      <input type="time" name="Time" class="form-control"  value="" > 
                      
                    </div>
                  
                  
                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>

@include('Forms.formFooter')   

@endsection




      