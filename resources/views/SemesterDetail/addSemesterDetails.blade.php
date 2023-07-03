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
                    <label>Degree / Batch</label>
                    <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="DegBatches_ID">
                        @foreach ($degreeCourses as $degreeCourse)
                            <option value="{{ $degreeCourse->ID }}">{{ $degreeCourse->DegreeName }} /
                                {{ $degreeCourse->SemSession }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-6">
                    <label>Semester</label>
                    <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="Sem_ID">
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->ID }}">{{ $semester->SemSession }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label>Semester Fee</label>
                    <input type="number" name="SemesterFee" class="form-control border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Tuition Fee</label>
                    <input type="number" name="Tuition_Fee" class="form-control border border-1 rounded border-dark">
                </div>
            </div>
            <!--  <div class="form-group">
                              <label>Semester Fee</label>
                              <input type="number" name="SemesterFee" class="form-control">
                            </div> -->
            <div class="row">

                <div class="form-group col-6">
                    <label>Magazine Fee</label>
                    <input type="number" name="Magazine_Fee" class="form-control border border-1 rounded border-dark">
                </div>

                <div class="form-group col-6">
                    <label>Exam Fee</label>
                    <input type="number" name="Exam_Fee" class="form-control border border-1 rounded border-dark">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-6">
                    <label>Society Fee</label>
                    <input type="number" name="Society_Fee" class="form-control border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Misc Fee</label>
                    <input type="number" name="Misc_Fee" class="form-control border border-1 rounded border-dark">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-6">
                    <label>Registration Fee</label>
                    <input type="number" name="Registration_Fee" class="form-control border border-1 rounded border-dark">
                </div>
                <div class="form-group col-6">
                    <label>Practical charges</label>
                    <input type="number" name="Practical_charges" class="form-control border border-1 rounded border-dark">
                </div>
            </div>
            <div class="row">

                <div class="form-group col-6">
                    <label>Sports Fund</label>
                    <input type="number" name="Sports_Fund" class="form-control border border-1 rounded border-dark">
                </div>

                <div class="form-group col-6">
                    <label>Fee Type</label>
                    <select class="form-control custom-select border border-1 rounded border-dark border border-1 rounded border-dark" name="FeeType" required>

                        <option value="{{ 'Per Semester' }}">{{ 'Per Semester' }}</option>
                        <option value="{{ 'Per Course' }}">{{ 'Per Course' }}</option>

                    </select>
                </div>
            </div>

            <button id="button" type="submit"
                class="btn btn-primary btn-block submit-form">{{ $button }}</button>
    </form>
    @include('Forms.formFooter')
@endsection
@include('js.form_submit_script')
