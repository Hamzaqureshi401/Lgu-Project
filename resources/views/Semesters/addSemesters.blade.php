@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Forms.formHeader')
    <form id="myForm" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">


                <div class="form-group col-6">
                    <label>Semester Course ID</label>
                    <input type="text" name="SemSessionId" class="form-control border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Year</label>
                    <input type="number" name="Year" class="form-control border border-1 rounded border-dark">
                </div>


            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label>Sem Start Date</label>
                    <input type="Date" name="SemStartDate" class="form-control border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Sem End Date</label>
                    <input type="Date" name="SemEndDate" class="form-control border border-1 rounded border-dark">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label>Enrollment Start Date</label>
                    <input type="Date" name="EnrollmentStartDate"
                        class="form-control border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Enrollment End Date</label>
                    <input type="Date" name="EnrollmentEndDate"
                        class="form-control  border border-1 rounded border-dark">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label>Exam Start Date</label>
                    <input type="Date" name="ExamStartDate" class="form-control  border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Exam End Date</label>
                    <input type="Date" name="ExamEndDate" class="form-control  border border-1 rounded border-dark">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label>I mid StartDate</label>
                    <input type="Date" name="I_mid_StartDate" class="form-control  border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>I mid EndDate</label>
                    <input type="Date" name="I_mid_EndDate" class="form-control  border border-1 rounded border-dark">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-6">
                    <label>I final StartDate</label>
                    <input type="Date" name="I_final_StartDate"
                        class="form-control  border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>I final EndDate</label>
                    <input type="Date" name="I_final_EndDate" class="form-control  border border-1 rounded border-dark">
                </div>
            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label>Admission Start Date</label>
                    <input type="Date" name="AdmissionStartDate"
                        class="form-control border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Admission End Date</label>
                    <input type="Date" name="AdmissionEndDate" class="form-control  border border-1 rounded border-dark">
                </div>

                <div class="container">
                    <div class="form-check  ">
                        <div class="form-group ">
                            <input class="form-check-input border border-1 rounded border-dark" type="checkbox" value="1" id="defaultCheck1"
                                name="CurrentSemester">
                            <label class="form-check-label" for="defaultCheck1">
                                Current Semester ?
                            </label>
                        </div>
                    </div>

                </div>




                <button id="button" type="submit"
                    class="btn btn-primary btn-block submit-form">{{ $button }}</button>
    </form>
    @include('Forms.formFooter')
@endsection
@include('js.form_submit_script')
