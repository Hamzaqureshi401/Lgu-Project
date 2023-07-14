@extends('layouts.app_new')
@section('title')  @endsection <!--add title here -->
@section('content')
@include('Forms.formHeader')  
              
                    <input type="hidden" name="id" value="{{ $semesterDetail->ID }}">
                 <div class="card-body">
                   <div class="form-group">
                      <label>Degree / Course</label>
                      <select class="form-control select2" name="DegBatches_ID"  >
                        @foreach($degreeCourses as $degreeCourse)
                        <option value="{{ $degreeCourse->ID }}" {{ $semesterDetail->DegBatches_ID == $degreeCourse->ID ? 'selected' : '' }}>{{ $degreeCourse->degree->DegreeName }} / {{ $degreeCourse->batch->SemSession }} </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control select2" name="Sem_ID"  >
                        @foreach($semesters as $semester)
                        <option value="{{ $semester->ID }}"{{ $semester->ID == $semesterDetail->Sem_ID ? 'selected' : '' }}>{{ $semester->SemSession }} </option>
                        @endforeach
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label>Semester Fee</label>
                      <input type="text" name="SemesterFee" class="form-control" value="{{ $semesterDetail->SemesterFee }}"required>
                    </div>

                     <div class="form-group">
                      <label>Tuition Fee</label>
                      <input type="text" name="Tuition_Fee" class="form-control" value="{{ $semesterDetail->Tuition_Fee }}"required>
                    </div>
                     
                    <div class="form-group">
                      <label>Magazine Fee</label>
                      <input type="number" name="Magazine_Fee" class="form-control" value="{{ $semesterDetail->Magazine_Fee }}">
                    </div>
                    <div class="form-group">
                      <label>Exam Fee</label>
                      <input type="number" name="Exam_Fee" class="form-control" value="{{ $semesterDetail->Exam_Fee }}">
                    </div>
                     <div class="form-group">
                      <label>Society Fee</label>
                      <input type="number" name="Society_Fee" class="form-control" value="{{ $semesterDetail->Society_Fee }}">
                    </div>
                    <div class="form-group">
                      <label>Misc Fee</label>
                      <input type="number" name="Misc_Fee" class="form-control" value="{{ $semesterDetail->Misc_Fee }}">
                    </div>
                     <div class="form-group">
                      <label>Registration Fee</label>
                      <input type="number" name="Registration_Fee" class="form-control" value="{{ $semesterDetail->Registration_Fee }}">
                    </div>
                    <div class="form-group">
                      <label>Practical charges</label>
                      <input type="number" name="Practical_charges" class="form-control" value="{{ $semesterDetail->Practical_charges }}">
                    </div>
                     <div class="form-group">
                      <label>Sports Fund</label>
                      <input type="number" name="Sports_Fund" class="form-control" value="{{ $semesterDetail->Sports_Fund }}">
                    </div>
                    <div class="form-group">
    <label>App Processing Fee</label>
    <input type="number" name="AppProcessingFee" class="form-control" value="{{ $semesterDetail->AppProcessingFee }}">
</div>

<div class="form-group">
    <label>Admission Fee</label>
    <input type="number" name="AdmissionFee" class="form-control" value="{{ $semesterDetail->AdmissionFee }}">
</div>

<div class="form-group">
    <label>Lab Security</label>
    <input type="number" name="LabSecurity" class="form-control" value="{{ $semesterDetail->LabSecurity }}">
</div>

<div class="form-group">
    <label>Library Security</label>
    <input type="number" name="LibrarySecurity" class="form-control" value="{{ $semesterDetail->LibrarySecurity }}">
</div>

<div class="form-group">
    <label>Uni Security</label>
    <input type="number" name="UniSecurity" class="form-control" value="{{ $semesterDetail->UniSecurity }}">
</div>

<div class="form-group">
    <label>Misc Security</label>
    <input type="number" name="MiscSecurity" class="form-control" value="{{ $semesterDetail->MiscSecurity }}">
</div>

<div class="form-group">
    <label>Semester Registration</label>
    <input type="number" name="SemesterRegistration" class="form-control" value="{{ $semesterDetail->SemesterRegistration }}">
</div>

<div class="form-group">
    <label>Library Fee</label>
    <input type="number" name="LibraryFee" class="form-control" value="{{ $semesterDetail->LibraryFee }}">
</div>

<div class="form-group">
    <label>Lab Fee</label>
    <input type="number" name="LabFee" class="form-control" value="{{ $semesterDetail->LabFee }}">
</div>

<div class="form-group">
    <label>Internet Charges</label>
    <input type="number" name="InternetCharges" class="form-control" value="{{ $semesterDetail->InternetCharges }}">
</div>

<div class="form-group">
    <label>Student Club Fee</label>
    <input type="number" name="StudentClubFee" class="form-control" value="{{ $semesterDetail->StudentClubFee }}">
</div>

<div class="form-group">
    <label>Tutorial Fee</label>
    <input type="number" name="TuitorialFee" class="form-control" value="{{ $semesterDetail->TuitorialFee }}">
</div>

<div class="form-group">
    <label>Infrastructure Development Fund</label>
    <input type="number" name="InfrastructureDevelopmentFund" class="form-control" value="{{ $semesterDetail->InfrastructureDevelopmentFund }}">
</div>

<div class="form-group">
    <label>Academic Support Fee</label>
    <input type="number" name="AcademicSupportFee" class="form-control" value="{{ $semesterDetail->AcademicSupportFee }}">
</div>


<div class="form-group">
    <label>Additional Credit Hours</label>
    <input type="number" name="AdditionalCreditHrs" class="form-control" value="{{ $semesterDetail->AdditionalCreditHrs }}">
</div>

<div class="form-group">
    <label>Late Fee Penalty</label>
    <input type="number" name="LateFeePenalty" class="form-control" value="{{ $semesterDetail->LateFeePenalty }}">
</div>

<div class="form-group">
    <label>UET Enrollment Fee</label>
    <input type="number" name="UetEnrolementFee" class="form-control" value="{{ $semesterDetail->UetEnrolementFee }}">
</div>

<div class="form-group">
    <label>Re-Admission Fee</label>
    <input type="number" name="ReAdmissionFee" class="form-control" value="{{ $semesterDetail->ReAdmissionFee }}">
</div>

<div class="form-group">
    <label>Installment Charges</label>
    <input type="number" name="InstallmentCharges" class="form-control" value="{{ $semesterDetail->InstallmentCharges }}">
</div>

<div class="form-group">
    <label>Local DL Fee</label>
    <input type="number" name="LocalDLFee" class="form-control" value="{{ $semesterDetail->LocalDLFee }}">
</div>

<div class="form-group">
    <label>Foreign DL Fee</label>
    <input type="number" name="ForeignDLFee" class="form-control" value="{{ $semesterDetail->ForeignDLFee }}">
</div>

<div class="form-group">
    <label>Migration Fee</label>
    <input type="number" name="MigrationFee" class="form-control" value="{{ $semesterDetail->MigrationFee }}">
</div>

<div class="form-group">
    <label>Deferment Fee</label>
    <input type="number" name="DefermentFee" class="form-control" value="{{ $semesterDetail->DefermentFee }}">
</div>

<div class="form-group">
    <label>NTS Fee</label>
    <input type="number" name="NtsFee" class="form-control" value="{{ $semesterDetail->NtsFee }}">
</div>

<div class="form-group">
    <label>Prospectus Fee</label>
    <input type="number" name="ProspectusFee" class="form-control" value="{{ $semesterDetail->ProspectusFee }}">
</div>

<div class="form-group">
    <label>DQE Paper Fee</label>
    <input type="number" name="DQEPaperFee" class="form-control" value="{{ $semesterDetail->DQEPaperFee }}">
</div>

<div class="form-group">
    <label>Proposal Defence Fee</label>
    <input type="number" name="ProposalDefenceFee" class="form-control" value="{{ $semesterDetail->ProposalDefenceFee }}">
</div>

<div class="form-group">
    <label>Convocation Fee</label>
    <input type="number" name="ConvocationFee" class="form-control" value="{{ $semesterDetail->ConvocationFee }}">
</div>

<div class="form-group">
    <label>Exam Rescheduling Fee</label>
    <input type="number" name="ExamReshedulingFee" class="form-control" value="{{ $semesterDetail->ExamReshedulingFee }}">
</div>

<div class="form-group">
    <label>Transcript Fee</label>
    <input type="number" name="TranscriptFee" class="form-control" value="{{ $semesterDetail->TranscriptFee }}">
</div>

<div class="form-group">
    <label>Degree Fee</label>
    <input type="number" name="DegreeFee" class="form-control" value="{{ $semesterDetail->DegreeFee }}">
</div>

<div class="form-group">
    <label>ID Card Fee</label>
    <input type="number" name="IDCardFee" class="form-control" value="{{ $semesterDetail->IDCardFee }}">
</div>

<div class="form-group">
    <label>Others</label>
    <input type="number" name="Others" class="form-control" value="{{ $semesterDetail->Others }}">
</div>

<div class="form-group">
    <label>IGrade Fee</label>
    <input type="number" name="IGradeFee" class="form-control" value="{{ $semesterDetail->IGradeFee }}">
</div>

<div class="form-group">
    <label>Per Credit Hour Fee</label>
    <input type="number" name="PerCrdHrFee" class="form-control" value="{{ $semesterDetail->PerCrdHrFee }}">
</div>

<div class="form-group">
    <label>OS Reg Limit</label>
    <input type="number" name="OSRegLimit" class="form-control" value="{{ $semesterDetail->OSRegLimit }}">
</div>

                    
                     @php
                    $types = ['Per Semester' , 'Per Course'];
                    $Category = [ "1-SF" ,"2-SF" ,"3-SF","Sports","1-SP"];
                    @endphp

                     <div class="form-group">
                      <label>Fee Type</label>
                      <select class="form-control select2" name="FeeType"  required>
                        @foreach($types as $type)
                       
                        <option value="{{ $type }}" {{ $semesterDetail->FeeType == $type ? 'selected' : '' }}>{{ $type }}</option>

                        @endforeach
                        
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control select2" name="Category"  required>
                        @foreach($Category as $type)
                       
                        <option value="{{ $type }}" {{ $semesterDetail->Category == $type ? 'selected' : '' }}>{{ $type }}</option>

                        @endforeach
                        
                        
                      </select>
                    </div>

                   

                
                 <button id="button" style="color: white;" class="btn btn-primary btn-block submit-form">{{ $button }}</button>
               </div>
          
                
@include('Forms.formFooter')                
@endsection
@include('js.form_submit_script')



      