<?php

namespace App\Http\Controllers;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\SemesterDetail;
use Illuminate\Support\Facades\DB;
use App\Models\DegreeBatche;
use Illuminate\Http\Request;


class DataTransferController extends Controller
{
  public function transferData()
{
    try {
        DB::beginTransaction();

        set_time_limit(0);

        $this->truncateDb();
        //$this->DBatchFeeInfoALLToSemesterDetail();
        //$this->SemesterSessionInfoToSemesters();

        DB::commit();

        dd('success');
    } catch (\Exception $e) {
        DB::rollback();

        dd('Error at line ' . $e->getLine() . ': ' . $e->getMessage());
    }
}


    protected function truncateDb(){

        //SemesterDetail::truncate();
        //DB::connection('lgu_new_testing')->table('SemesterDetails')->truncate();
        //DB::connection('lgu_new_testing')->table('Semesters')->truncate();


    }

protected function DBatchFeeInfoALLToSemesterDetail()
{
    $chunkSize = 10;
    $dataToInsert = DB::connection('lgu_misdb')->table('DBatchFeeInfoALL')->select(
        'ID',
        'DegreeBatchID',
        'SemesterSessionID',
        'TutionFee',
        'MagazineFee',
        'MisceleneousFee',
        'SemesterRegistration',
        'SportsFund',
        'Category',
        'AppProcessingFee',
        'AdmissionFee',
        'LabSecurity',
        'LibrarySecurity',
        'UniSecurity',
        'MiscSecurity',
        'LibraryFee',
        'LabFee',
        'InternetCharges',
        'StudentClubFee',
        'TuitorialFee',
        'InfrastructureDevelopmentFund',
        'AcademicSupportFee',
        'TutitionFeeType',
        'AdditionalCreditHrs',
        'LateFeePenalty',
        'UetEnrolementFee',
        'ReAdmissionFee',
        'InstallmentCharges',
        'LocalDLFee',
        'ForeignDLFee',
        'MigrationFee',
        'DefermentFee',
        'NtsFee',
        'ProspectusFee',
        'DQEPaperFee',
        'ProposalDefenceFee',
        'ConvocationFee',
        'ExamReshedulingFee',
        'TranscriptFee',
        'DegreeFee',
        'IDCardFee',
        'Others',
        'IGradeFee',
        'PerCrdHrFee',
        'OSRegLimit'
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];

        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                'ID'                        => $request->ID,
                'DegBatches_ID'             => $request->DegreeBatchID,
                'Sem_ID'                    => $request->SemesterSessionID,
                'SemesterFee'               => null,
                'Tuition_Fee'               => $request->TutionFee,
                'Magazine_Fee'              => $request->MagazineFee,
                'Exam_Fee'                  => null,
                'Society_Fee'               => null,
                'Misc_Fee'                  => $request->MisceleneousFee,
                'Registration_Fee'          => $request->SemesterRegistration,
                'Practical_charges'         => null,
                'Sports_Fund'               => $request->SportsFund,
                'FeeType'                   => $request->TutitionFeeType,
                'AppProcessingFee'          => $request->AppProcessingFee,
                'AdmissionFee'              => $request->AdmissionFee,
                'LabSecurity'               => $request->LabSecurity,
                'LibrarySecurity'           => $request->LibrarySecurity,
                'UniSecurity'               => $request->UniSecurity,
                'MiscSecurity'              => $request->MiscSecurity,
                'SemesterRegistration'      => $request->SemesterRegistration,
                'LibraryFee'                => $request->LibraryFee,
                'LabFee'                    => $request->LabFee,
                'InternetCharges'           => $request->InternetCharges,
                'StudentClubFee'            => $request->StudentClubFee,
                'TuitorialFee'              => $request->TuitorialFee,
                'InfrastructureDevelopmentFund' => $request->InfrastructureDevelopmentFund,
                'AcademicSupportFee'        => $request->AcademicSupportFee,
                'Category'                  => $request->Category,
                'AdditionalCreditHrs'       => $request->AdditionalCreditHrs,
                'LateFeePenalty'            => $request->LateFeePenalty,
                'UetEnrolementFee'          => $request->UetEnrolementFee,
                'ReAdmissionFee'            => $request->ReAdmissionFee,
                'InstallmentCharges'        => $request->InstallmentCharges,
                'LocalDLFee'                => $request->LocalDLFee,
                'ForeignDLFee'              => $request->ForeignDLFee,
                'MigrationFee'              => $request->MigrationFee,
                'DefermentFee'              => $request->DefermentFee,
                'NtsFee'                    => $request->NtsFee,
                'ProspectusFee'             => $request->ProspectusFee,
                'DQEPaperFee'               => $request->DQEPaperFee,
                'ProposalDefenceFee'        => $request->ProposalDefenceFee,
                'ConvocationFee'            => $request->ConvocationFee,
                'ExamReshedulingFee'        => $request->ExamReshedulingFee,
                'TranscriptFee'             => $request->TranscriptFee,
                'DegreeFee'                 => $request->DegreeFee,
                'IDCardFee'                 => $request->IDCardFee,
                'Others'                    => $request->Others,
                'IGradeFee'                 => $request->IGradeFee,
                'PerCrdHrFee'               => $request->PerCrdHrFee,
                'OSRegLimit'                => $request->OSRegLimit
            ];
        }

        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('SemesterDetails')->insert($data);
        }
    });
}

protected function SemesterSessionInfoToSemesters()
{
    $chunkSize = 10;
    $dataToInsert = DB::connection('lgu_misdb')->table('SemesterSessionInfo')->select(
               'ID'
      ,'SemesterSession'
      ,'SemesterYear'
      ,'SemStartDate'
      ,'SemEndDate'
      ,'Feedback_Mid_Start'
      ,'Feedback_Mid_End'
      ,'Feedback_Final_Start'
      ,'Feedback_Final_End'
      
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];

        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                'ID'                        => $request->ID,
                'SemSession'                => $request->SemesterSession,
                'Year'                      => $request->SemesterYear,
                'SemStartDate'              => $request->SemStartDate,
                'SemEndDate'                => $request->SemEndDate,
                'EnrollmentStartDate'       => $request->SemStartDate,// added Sem Start Date?
                'EnrollmentEndDate'         => $request->SemEndDate,    // added Sem End Date?
                'ExamStartDate'             => $request->Feedback_Final_Start,// added final?
                'ExamEndDate'               => $request->Feedback_Final_End,// added final?
                'I_mid_StartDate'           => $request->Feedback_Mid_Start,
                'I_mid_EndDate'             => $request->Feedback_Mid_End,
                'I_final_StartDate'         => $request->Feedback_Final_Start,
                'I_final_EndDate'           => $request->Feedback_Final_End
                
            ];
        }

        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Semesters')->insert($data);
        }
    });
}




    
}
