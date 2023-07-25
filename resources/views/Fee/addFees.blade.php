@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Forms.formHeader')

    <div class="card-body">
        <div class="form-group">
          <div class="row">
            <div class="col-6">
                <label style="color: black;">Degree Batch</label>
                <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="DegreeBatches_ID" required>
                    @foreach ($degreeBatche as $degree)
                        <option value="{{ $degree->ID }}">{{ $degree->degree->DegreeName ?? '--' }} |
                            {{ $degree->batch->SemSession ?? '--' }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label style="color: black;">Batch</label>
                <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="Sem_ID" required>
                    @foreach ($semesters as $semester)
                        <option value="{{ $semester->ID }}">{{ $semester->SemSession }}</option>
                    @endforeach
                </select>
            </div>

          </div>

        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-6">
                <label style="color: black;">Per Course Fee</label>
                <input type="text" name="PerCourseFee" class="form-control border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('PerCourseFee') }}">
            </div>
            <div class="col-6">
                <label style="color: black;">Per Semester Fee</label>
                <input type="text" name="PerSemesterFee" class="form-control border-1 rounded border-dark border border-1 rounded border-dark" value="{{ old('PerSemesterFee') }}">

            </div>

          </div>
        </div>

        <button id="button" type="submit" class="btn bg_lgu_green text-white btn-block submit-form">{{ $button }}</button>
    </div>

    @include('Forms.formFooter')
@endsection
@include('js.form_submit_script')
