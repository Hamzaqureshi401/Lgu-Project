@extends('layouts.app_new')
@section('title')
@endsection
<!--add title here -->
@section('content')
    @include('Table.table_header')
    <div class="table-responsive">
        <table class="table border-1 rounded border-dark" id="sortable-table">
            <thead>
                <tr class="border border-1 rounded border-dark ">
                    <th class="text-dark">
                        <i class="fas fa-th"></i>
                    </th>
                    <th class="text-dark">Degree</th>
                    <th class="text-dark">Semester</th>

                    <th class="text-dark">Semester Fee</th>
                    <th class="text-dark">Magazine Fee</th>
                    <th class="text-dark">Exam Fee</th>
                    <th class="text-dark">Society Fee</th>
                    <th class="text-dark">Misc Fee</th>
                    <th class="text-dark">Registration Fee</th>
                    <th class="text-dark">Practical charges</th>
                    <th class="text-dark">Sports Fund</th>
                    <th class="text-dark">Fee Type</th>
                    <th class="text-dark">Tuition Fee</th>
                               <th class="text-dark">App Processing Fee</th>
            <th class="text-dark">Admission Fee</th>
<th class="text-dark">Lab Security</th>
<th class="text-dark">Library Security</th>
<th class="text-dark">Uni Security</th>
<th class="text-dark">Misc Security</th>
<th class="text-dark">Semester Registration</th>
<th class="text-dark">Library Fee</th>
<th class="text-dark">Lab Fee</th>
<th class="text-dark">Internet Charges</th>
<th class="text-dark">Student Club Fee</th>
<th class="text-dark">Tutorial Fee</th>
<th class="text-dark">Infrastructure Development Fund</th>
<th class="text-dark">Academic Support Fee</th>
<th class="text-dark">Category</th>
<th class="text-dark">Additional Credit Hours</th>
<th class="text-dark">Late Fee Penalty</th>
<th class="text-dark">UET Enrollment Fee</th>
<th class="text-dark">Re-Admission Fee</th>
<th class="text-dark">Installment Charges</th>
<th class="text-dark">Local DL Fee</th>
<th class="text-dark">Foreign DL Fee</th>
<th class="text-dark">Migration Fee</th>
<th class="text-dark">Deferment Fee</th>
<th class="text-dark">NTS Fee</th>
<th class="text-dark">Prospectus Fee</th>
<th class="text-dark">DQE Paper Fee</th>
<th class="text-dark">Proposal Defence Fee</th>
<th class="text-dark">Convocation Fee</th>
<th class="text-dark">Exam Rescheduling Fee</th>
<th class="text-dark">Transcript Fee</th>
<th class="text-dark">Degree Fee</th>
<th class="text-dark">ID Card Fee</th>
<th class="text-dark">Others</th>
<th class="text-dark">I-Grade Fee</th>
<th class="text-dark">Per Credit Hour Fee</th>
<th class="text-dark">OS Reg Limit</th>

            
                    <!-- <th>Status</th> -->
                    <th class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semesterDetails as $semesterDetail)
                    <tr class="border border-1 rounded border-dark table-hover">
                        <td>
                            <div class="sort-handler">
                                <i class="fas fa-th"></i>
                            </div>
                        </td>
                        <td>{{ $semesterDetail->degreeBatches->degree->DegreeName ?? '--' }} /
                            {{ $semesterDetail->degreeBatches->batch->SemSession ?? '--' }}</td>
                        <td>{{ $semesterDetail->semester->SemSession ?? '--' }}</td>
                        <td>{{ $semesterDetail->SemesterFee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Magazine_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Exam_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Society_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Misc_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Registration_Fee ?? '--' }}</td>
                        <td>{{ $semesterDetail->Practical_charges ?? '--' }}</td>
                        <td>{{ $semesterDetail->Sports_Fund ?? '--' }}</td>
                        <td>{{ $semesterDetail->FeeType ?? '--' }}</td>
                        <td>{{ $semesterDetail->Tuition_Fee ?? '--' }}</td>
                                   <td>{{ $semesterDetail->AppProcessingFee?? '--' }}</td>
            <td>{{ $semesterDetail->AdmissionFee?? '--' }}</td>
            <td>{{ $semesterDetail->LabSecurity?? '--' }}</td>
            <td>{{ $semesterDetail->LibrarySecurity?? '--' }}</td>
            <td>{{ $semesterDetail->UniSecurity?? '--' }}</td>
            <td>{{ $semesterDetail->MiscSecurity?? '--' }}</td>
            <td>{{ $semesterDetail->SemesterRegistration?? '--' }}</td>
            <td>{{ $semesterDetail->LibraryFee?? '--' }}</td>
            <td>{{ $semesterDetail->LabFee?? '--' }}</td>
            <td>{{ $semesterDetail->InternetCharges?? '--' }}</td>
            <td>{{ $semesterDetail->StudentClubFee?? '--' }}</td>
            <td>{{ $semesterDetail->TuitorialFee?? '--' }}</td>
            <td>{{ $semesterDetail->InfrastructureDevelopmentFund?? '--' }}</td>
            <td>{{ $semesterDetail->AcademicSupportFee?? '--' }}</td>
            <td>{{ $semesterDetail->Category ?? '--' }}</td>
            <td>{{ $semesterDetail->AdditionalCreditHrs?? '--' }}</td>
            <td>{{ $semesterDetail->LateFeePenalty?? '--' }}</td>
            <td>{{ $semesterDetail->UetEnrolementFee?? '--' }}</td>
            <td>{{ $semesterDetail->ReAdmissionFee?? '--' }}</td>
            <td>{{ $semesterDetail->InstallmentCharges?? '--' }}</td>
            <td>{{ $semesterDetail->LocalDLFee?? '--' }}</td>
            <td>{{ $semesterDetail->ForeignDLFee?? '--' }}</td>
            <td>{{ $semesterDetail->MigrationFee?? '--' }}</td>
            <td>{{ $semesterDetail->DefermentFee?? '--' }}</td>
            <td>{{ $semesterDetail->NtsFee?? '--' }}</td>
            <td>{{ $semesterDetail->ProspectusFee?? '--' }}</td>
            <td>{{ $semesterDetail->DQEPaperFee?? '--' }}</td>
            <td>{{ $semesterDetail->ProposalDefenceFee?? '--' }}</td>
            <td>{{ $semesterDetail->ConvocationFee?? '--' }}</td>
            <td>{{ $semesterDetail->ExamReshedulingFee?? '--' }}</td>
            <td>{{ $semesterDetail->TranscriptFee?? '--' }}</td>
            <td>{{ $semesterDetail->DegreeFee?? '--' }}</td>
            <td>{{ $semesterDetail->IDCardFee?? '--' }}</td>
            <td>{{ $semesterDetail->Others?? '--' }}</td>
            <td>{{ $semesterDetail->IGradeFee?? '--' }}</td>
            <td>{{ $semesterDetail->PerCrdHrFee?? '--' }}</td>
            <td>{{ $semesterDetail->OSRegLimit?? '--' }}</td>
            

                        <td>
                            <div class="card-body">
                                <!-- only change id -->
                                <!-- <button type="button" class="btn btn-primary gt-data" data-toggle="modal" data-id="{{ $semesterDetail->ID }}" data-target="#exampleModal"><i class="far fa-edit"></i> {{ $modalTitle }}</button> -->
                                <a href="{{ $getEditRoute }}/{{ $semesterDetail->ID }}"
                                    class="btn bg_lgu_green text-white "><i class="far fa-edit"></i>{{ $modalTitle }}</a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $semesterDetails->links() !!}
        </div>
    </div>
    @include('Table.table_footer')
@endsection
