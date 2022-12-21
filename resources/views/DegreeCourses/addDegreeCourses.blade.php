@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')
              <form id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="card-body">
                    <div class="form-group">
                      <label>Degree</label>
                      <select class="form-control" name="Degree_ID"  required>
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->ID }}">{{ $degree->DegreeName }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Course</label>
                      <select class="form-control" name="Course_ID"  required>
                        @foreach($courses as $course)
                        <option value="{{ $course->ID }}">{{ $course->CourseName }}</option>
                        @endforeach
                      </select>
                    </div>

                <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
              </div>
                </form>
@include('Forms.formFooter')
@endsection
@include('js.form_submit_script')



