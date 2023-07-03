@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Forms.formHeader')

    <div class="card-body">

        <div class="row">

            <div class="form-group col-6">
                <label>Designation</label>
                <select class="form-control custom-select border border-1 rounded border-dark" name="Des_ID" required>
                    @foreach ($designations as $designation)
                        <option value="{{ $designation->ID }}">{{ $designation->Designation }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6">
                <label>Employee Name</label>
                <select class="form-control custom-select border border-1 rounded border-dark" name="Emp_ID" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->ID }}">{{ $employee->Emp_FirstName }}{{ $employee->Emp_LastName }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>

        @include('Forms.formFooter')
    @endsection
    @include('js.form_submit_script')
