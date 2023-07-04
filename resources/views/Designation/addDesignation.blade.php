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
                <input type="text" name="Designation" class="form-control border-1 rounded border-dark">
            </div>
           <!--  <div class="form-group col-6">
                <label>Dpt Name</label>
                <select class="form-control custom-select border border-1 rounded border-dark" name="Dpt_ID" required>
                    @foreach ($departments as $department)
                        <option value="{{ $department->ID }}">{{ $department->Dpt_Name }}</option>
                    @endforeach
                </select>
            </div> -->

        </div>
        <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>



        @include('Forms.formFooter')
    @endsection
    @include('js.form_submit_script')
