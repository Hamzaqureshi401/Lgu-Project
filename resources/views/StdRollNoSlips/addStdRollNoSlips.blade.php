@extends('layouts.app_new')
@section('title')
@endsection <!--add title here -->
@section('content')
    @include('Forms.formHeader')

    <div class="card-body">
        <div class="form-group">
            <div class="row">

                <div class="col-6">
                    <label>Enrolled Student</label>
                    <select class="form-control border border-1 rounded border-dark"" name="Enroll_ID" required>
                        @foreach ($enrollments as $enrollment)
                            <option value="{{ $enrollment->ID }}">{{ $enrollment->student->Std_FName ?? '--' }}
                                {{ $enrollment->student->Std_LName ?? '--' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6">
                    @php
                        $Buildings = ['New Building', 'Old Building'];
                        $room = range(1, 100);
                        $SeatNo = range(1, 500);
                        
                    @endphp
                    <label>Building</label>
                    <select class="form-control border border-1 rounded border-dark"" name="Building" required>
                        @foreach ($Buildings as $number)
                            <option value="{{ $number }}">{{ $number }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-6">
              <label>Room</label>
              <select class="form-control border border-1 rounded border-dark"" name="Room" required>
                  @foreach ($room as $number)
                      <option value="{{ $number }}">{{ $number }}</option>
                  @endforeach
              </select>
            </div>

            <div class="col-6">
              <label>Seat No</label>
              <select class="form-control border border-1 rounded border-dark"" name="SeatNo" required>
                  @foreach ($room as $number)
                      <option value="{{ $number }}">{{ $number }}</option>
                  @endforeach
              </select>
            </div>
          </div>

        </div>

        <div class="form-group">
            <label>Time</label>
            <input type="time" name="Time" class="form-control border border-1 rounded border-dark"" value="">

        </div>


        <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
    </div>

    @include('Forms.formFooter')
@endsection
