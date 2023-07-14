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
               {{ $degreeCourse->SemSession }}
            </option>
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
      @php
      $fields = [
      'AdmissionFee' => 'Admission Fee',
      'LabSecurity' => 'Lab Security',
      'LibrarySecurity' => 'Library Security',
      'UniSecurity' => 'University Security',
      'MiscSecurity' => 'Miscellaneous Security',
      'SemesterRegistration' => 'Semester Registration Fee',
      'LibraryFee' => 'Library Fee',
      'LabFee' => 'Lab Fee',
      'InternetCharges' => 'Internet Charges',
      'StudentClubFee' => 'Student Club Fee',
      'TuitorialFee' => 'Tuitorial Fee',
      'InfrastructureDevelopmentFund' => 'Infrastructure Development Fund',
      'AcademicSupportFee' => 'Academic Support Fee',
      'TutitionFeeType' => 'Tuition Fee Type',
      'AdditionalCreditHrs' => 'Additional Credit Hours',
      'LateFeePenalty' => 'Late Fee Penalty',
      'UetEnrolementFee' => 'UET Enrollment Fee',
      'ReAdmissionFee' => 'Re-Admission Fee',
      'InstallmentCharges' => 'Installment Charges',
      'LocalDLFee' => 'Local DL Fee',
      'ForeignDLFee' => 'Foreign DL Fee',
      'MigrationFee' => 'Migration Fee',
      'DefermentFee' => 'Deferment Fee',
      'NtsFee' => 'NTS Fee',
      'ProspectusFee' => 'Prospectus Fee',
      'DQEPaperFee' => 'DQE Paper Fee',
      'ProposalDefenceFee' => 'Proposal Defence Fee',
      'ConvocationFee' => 'Convocation Fee',
      'ExamReshedulingFee' => 'Exam Rescheduling Fee',
      'TranscriptFee' => 'Transcript Fee',
      'DegreeFee' => 'Degree Fee',
      'IDCardFee' => 'ID Card Fee',
      'Others' => 'Others',
      'IGradeFee' => 'IGrade Fee',
      'PerCrdHrFee' => 'Per Credit Hour Fee',
      'OSRegLimit' => 'OS Registration Limit',
      'SemesterFee' => 'Semester Fee',
      'Magazine_Fee' => 'Magazine Fee',
      'Exam_Fee' => 'Exam Fee',
      'Society_Fee' => 'Society Fee',
      'Misc_Fee' => 'Misc Fee',
      'Registration_Fee' => 'Registration Fee',
      'Practical_charges' => 'Practical Charges',
      'Sports_Fund' => 'Sports Fund',
      'Tuition_Fee' => 'Tuition Fee',
      'AppProcessingFee' => 'App Processing Fee',
      ];
      @endphp
      @foreach ($fields as $field => $label)
      <div class="form-group col-3">
         <label>{{ $label }}</label>
         <input type="number" name="{{ $field }}" class="form-control border border-1 rounded border-dark" value="{{ old($field) }}" required>
         @error($field)
         <span class="text-danger">{{ $message }}</span>
         @enderror
      </div>
      @endforeach
   </div>
   <div class="row">
      <div class="form-group col-6">
         <label>Fee Type</label>
         <select class="form-control custom-select select2 border border-1 rounded border-dark border border-1 rounded border-dark" name="FeeType" required>
            <option value="{{ 'Per Semester' }}">{{ 'Per Semester' }}</option>
            <option value="{{ 'Per Course' }}">{{ 'Per Course' }}</option>
         </select>
      </div>
      @php
      $Category = [ "1-SF" ,"2-SF" ,"3-SF","Sports","1-SP"];
      @endphp
      <div class="form-group col-6">
         <label>Category</label>
         <select class="form-control custom-select select2 border border-1 rounded border-dark border border-1 rounded border-dark" name="Category" required>
            @foreach($Category as $type)
            <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
         </select>
      </div>
   </div>
   <button id="button" type="submit" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
</form>
@include('Forms.formFooter')
@endsection
@include('js.form_submit_script')