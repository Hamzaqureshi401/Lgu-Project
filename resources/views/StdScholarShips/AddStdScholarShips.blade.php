@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Forms.formHeader')

    <div class="card-body">
        <div class="row">

            <div class="form-group col-6">
                <label>Student</label>
                <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="Std_ID" required>
                    @foreach ($students as $student)
                        <option value="{{ $student->ID }}">{{ $student->Std_FName }} {{ $student->Std_LName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label>Percentage %</label>
                <input type="number" name="Percentage" class="form-control border border-1 rounded border-dark border border-1 rounded border-dark">
            </div>

        </div>

        <div class="row">

            @php
                $cat = ['Sposrts Base', 'Defence Base', 'Need Base'];
                $scType = ['Percentage', 'Fixed'];
            @endphp

            <div class="form-group col-6">
                <label>Category</label>
                <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="Category" required>
                    @foreach ($cat as $ca)
                        <option value="{{ $ca }}">{{ $ca }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label>Scholarship Type </label>
                <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="Scholarship_Type" required>
                    @foreach ($scType as $scTyp)
                        <option value="{{ $scTyp }}">{{ $scTyp }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <button id="button" type="submit" class="btn bg_lgu_green text-white btn-block submit-form">{{ $button }}</button>

    </div>
    @include('Forms.formFooter')
@endsection
@include('js.form_submit_script')
