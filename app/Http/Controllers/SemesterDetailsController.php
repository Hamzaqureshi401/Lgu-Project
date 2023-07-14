<?php

namespace App\Http\Controllers;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\SemesterDetail;
use Illuminate\Support\Facades\DB;
use App\Models\DegreeBatche;
use Illuminate\Http\Request;
use Validator;

class SemesterDetailsController extends Controller
{
    public function validation($request){

        $this->validate($request, [
            'DegBatches_ID'         => 'required|numeric|unique:SemesterDetails',
            'Sem_ID'            => 'required|numeric|unique:SemesterDetails',
            'SemesterFee'       => 'required|numeric',
            'Magazine_Fee'      => 'required|numeric',
            'Exam_Fee'          => 'required|numeric',
            'Society_Fee'       => 'required|numeric',
            'Misc_Fee'          => 'required|numeric',
            'Registration_Fee'  => 'required|numeric',
            'Practical_charges' => 'required|numeric',
            'Sports_Fund'       => 'required|numeric',
            'FeeType'           => 'required',
            'Tuition_Fee'       => 'required|numeric',
            'AppProcessingFee' => 'required|numeric',
            'AdmissionFee' => 'required|numeric',
            'LabSecurity' => 'required|numeric',
            'LibrarySecurity' => 'required|numeric',
            'UniSecurity' => 'required|numeric',
            'MiscSecurity' => 'required|numeric',
            'SemesterRegistration' => 'required|numeric',
            'LibraryFee' => 'required|numeric',
            'LabFee' => 'required|numeric',
            'InternetCharges' => 'required|numeric',
            'StudentClubFee' => 'required|numeric',
            'TuitorialFee' => 'required|numeric',
            'InfrastructureDevelopmentFund' => 'required|numeric',
            'AcademicSupportFee' => 'required|numeric',
            'Category' => 'required',
            'AdditionalCreditHrs' => 'required|numeric',
            'LateFeePenalty' => 'required|numeric',
            'UetEnrolementFee' => 'required|numeric',
            'ReAdmissionFee' => 'required|numeric',
            'InstallmentCharges' => 'required|numeric',
            'LocalDLFee' => 'required|numeric',
            'ForeignDLFee' => 'required|numeric',
            'MigrationFee' => 'required|numeric',
            'DefermentFee' => 'required|numeric',
            'NtsFee' => 'required|numeric',
            'ProspectusFee' => 'required|numeric',
            'DQEPaperFee' => 'required|numeric',
            'ProposalDefenceFee' => 'required|numeric',
            'ConvocationFee' => 'required|numeric',
            'ExamReshedulingFee' => 'required|numeric',
            'TranscriptFee' => 'required|numeric',
            'DegreeFee' => 'required|numeric',
            'IDCardFee' => 'required|numeric',
            'Others' => 'required|numeric',
            'IGradeFee' => 'required|numeric',
            'PerCrdHrFee' => 'required|numeric',
            'OSRegLimit' => 'required|numeric',
            
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }
     public function validationUpdate($request){

        $this->validate($request, [
            'DegBatches_ID'         => 'required|numeric',
            'Sem_ID'            => 'required|numeric',
            'SemesterFee'       => 'required|numeric',
            'Magazine_Fee'      => 'required|numeric',
            'Exam_Fee'          => 'required|numeric',
            'Society_Fee'       => 'required|numeric',
            'Misc_Fee'          => 'required|numeric',
            'Registration_Fee'  => 'required|numeric',
            'Practical_charges' => 'required|numeric',
            'Sports_Fund'       => 'required|numeric',
            'FeeType'           => 'required',
            'Tuition_Fee'       => 'required|numeric',
            'AppProcessingFee' => 'required|numeric',
            'AdmissionFee' => 'required|numeric',
            'LabSecurity' => 'required|numeric',
            'LibrarySecurity' => 'required|numeric',
            'UniSecurity' => 'required|numeric',
            'MiscSecurity' => 'required|numeric',
            'SemesterRegistration' => 'required|numeric',
            'LibraryFee' => 'required|numeric',
            'LabFee' => 'required|numeric',
            'InternetCharges' => 'required|numeric',
            'StudentClubFee' => 'required|numeric',
            'TuitorialFee' => 'required|numeric',
            'InfrastructureDevelopmentFund' => 'required|numeric',
            'AcademicSupportFee' => 'required|numeric',
            'Category' => 'required',
            'AdditionalCreditHrs' => 'required|numeric',
            'LateFeePenalty' => 'required|numeric',
            'UetEnrolementFee' => 'required|numeric',
            'ReAdmissionFee' => 'required|numeric',
            'InstallmentCharges' => 'required|numeric',
            'LocalDLFee' => 'required|numeric',
            'ForeignDLFee' => 'required|numeric',
            'MigrationFee' => 'required|numeric',
            'DefermentFee' => 'required|numeric',
            'NtsFee' => 'required|numeric',
            'ProspectusFee' => 'required|numeric',
            'DQEPaperFee' => 'required|numeric',
            'ProposalDefenceFee' => 'required|numeric',
            'ConvocationFee' => 'required|numeric',
            'ExamReshedulingFee' => 'required|numeric',
            'TranscriptFee' => 'required|numeric',
            'DegreeFee' => 'required|numeric',
            'IDCardFee' => 'required|numeric',
            'Others' => 'required|numeric',
            'IGradeFee' => 'required|numeric',
            'PerCrdHrFee' => 'required|numeric',
            'OSRegLimit' => 'required|numeric',
            
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function uniqueSemesterdetails($request){

        return SemesterDetail::where(['DegBatches_ID' => $request->DegBatches_ID , 'Sem_ID' => $request->Sem_ID])->exists();
    }

    public function addSemesterDetails(){

        $degrees = Degree::get();
        $semesters = Semester::get();
        $button = "Add Semester Detail";
        $title  = 'Add Semester Detail';
        $route  = '/storeSemesterDetails';
         $degreeCourses=  DegreeBatche::select('DegreeName' , 'SemSession' , 'DegreeBatches.ID')
        ->join('Degrees' , 'Degrees.ID' , 'DegreeBatches.Degree_ID')
        ->join('Semesters' , 'Semesters.ID' , 'DegreeBatches.Batch_ID')
        ->get();
        return 
        view('SemesterDetail.addSemesterDetails', 
            compact(
                'button' , 
                'title' , 
                'route',
                'degrees',
                'semesters',
                'degreeCourses'
            )
        );
    }

    public function storeSemesterDetails(Request $request){
        //dd($request->all());
        $validator = $this->validation($request);
         $unique    = $this->uniqueSemesterdetails($request);
         if ($unique == true){
             return redirect()->back()->with(['errorToaster' => 'Semester And Degree Batch must be Unique!' , 'title' => 'Duplicate record']);
         }
        // if ($validator['error'] == true) {
        //     return 
        //     response()->json([
        //     'title' => 'Failed' , 
        //     'type'=> 'error', 
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {

             $submit = DB::update("EXEC sp_InsertSemesterDetails 
            @DegBatches_ID          = '$request->DegBatches_ID', 
            @Sem_ID             = '$request->Sem_ID', 
            @SemesterFee        = '$request->SemesterFee',
            @Magazine_Fee       = '$request->Magazine_Fee' , 
            @Exam_Fee           = '$request->Exam_Fee',
            @Society_Fee        = '$request->Society_Fee' , 
            @Misc_Fee           = '$request->Misc_Fee',
            @Registration_Fee   = '$request->Registration_Fee' , 
            @Practical_charges  = '$request->Practical_charges',
            @Sports_Fund        = '$request->Sports_Fund' , 
            @FeeType            = '$request->FeeType',
            @Tuition_Fee            = '$request->Tuition_Fee',
            @AppProcessingFee   = '$request->AppProcessingFee',
            @AdmissionFee   = '$request->AdmissionFee',
            @LabSecurity   = '$request->LabSecurity',
            @LibrarySecurity   = '$request->LibrarySecurity',
            @UniSecurity   = '$request->UniSecurity',
            @MiscSecurity   = '$request->MiscSecurity',
            @SemesterRegistration   = '$request->SemesterRegistration',
            @LibraryFee   = '$request->LibraryFee',
            @LabFee   = '$request->LabFee',
            @InternetCharges   = '$request->InternetCharges',
            @StudentClubFee   = '$request->StudentClubFee',
            @TuitorialFee   = '$request->TuitorialFee',
            @InfrastructureDevelopmentFund   = '$request->InfrastructureDevelopmentFund',
            @AcademicSupportFee   = '$request->AcademicSupportFee',
            @Category   = '$request->Category',
            @AdditionalCreditHrs   = '$request->AdditionalCreditHrs',
            @LateFeePenalty   = '$request->LateFeePenalty',
            @UetEnrolementFee   = '$request->UetEnrolementFee',
            @ReAdmissionFee   = '$request->ReAdmissionFee',
            @InstallmentCharges   = '$request->InstallmentCharges',
            @LocalDLFee   = '$request->LocalDLFee',
            @ForeignDLFee   = '$request->ForeignDLFee',
            @MigrationFee   = '$request->MigrationFee',
            @DefermentFee   = '$request->DefermentFee',
            @NtsFee   = '$request->NtsFee',
            @ProspectusFee   = '$request->ProspectusFee',
            @DQEPaperFee   = '$request->DQEPaperFee',
            @ProposalDefenceFee   = '$request->ProposalDefenceFee',
            @ConvocationFee   = '$request->ConvocationFee',
            @ExamReshedulingFee   = '$request->ExamReshedulingFee',
            @TranscriptFee   = '$request->TranscriptFee',
            @DegreeFee   = '$request->DegreeFee',
            @IDCardFee   = '$request->IDCardFee',
            @Others   = '$request->Others',
            @IGradeFee   = '$request->IGradeFee',
            @PerCrdHrFee   = '$request->PerCrdHrFee',
            @OSRegLimit   = '$request->OSRegLimit'
            
            ;");

        //   return response()->json([
        //     'title' => 'Done' , 
        //     'type'=> 'success', 
        //     'message'=> 'SemesterDetail Added!
        //     ']);
        // }
              return redirect()->back()->with(['successToaster' => 'Semester Details Added' , 'title' => 'Success']);

    }

    public function editSemesterDetail($id){

        //dd(array_unique(SemesterDetail::pluck('Category')->toArray()));

        $button = 'Update Semester Detail';
        $title  = 'Edit Semester Detail';
        $route  = '/updateSemesterDetail';
        $semesterDetail = SemesterDetail::where('ID' , $id)->first();
        //dd($semesterDetail , $id);
        $degrees = Degree::get();
        $semesters = Semester::get();
        $degreeCourses  = DegreeBatche::whereNotNull('Batch_ID')->get();
       
         return 
         view('SemesterDetail.editSemesterDetail', 
            compact(
                'semesterDetail', 
                'button' , 
                'title' , 
                'route',
                'degrees',
                'semesters',
                'degreeCourses'
            ));
    }
    public function allSemesterDetails(){

        $semesterDetails = 
        SemesterDetail::paginate(10);
        $title  = 'All Semester Details';
        $route = 'updateSemesterDetail';
        $getEditRoute = 'editSemesterDetail';
        $modalTitle = 'Edit SemesterDetail';
        
       
        return 
        view('SemesterDetail.allSemesterDetails' , 
            compact(
                'semesterDetails' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'  
            ));
    }

    public function updateSemesterDetail(Request $request){

         $validator = $this->validationUpdate($request);

        //  $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return 
        //     response()->json([
        //     'title' => 'Failed' , 
        //     'type'=> 'error', 
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
       //  dd($request->all());
              $submit = DB::statement("EXEC sp_UpdateSemesterDetails

            @SemDetail_ID       = '$request->id', 
            @DegBatches_ID          = '$request->DegBatches_ID', 
            @Sem_ID             = '$request->Sem_ID', 
            @SemesterFee        = '$request->SemesterFee',
            @Magazine_Fee       = '$request->Magazine_Fee' , 
            @Exam_Fee           = '$request->Exam_Fee',
            @Society_Fee        = '$request->Society_Fee' , 
            @Misc_Fee           = '$request->Misc_Fee',
            @Registration_Fee   = '$request->Registration_Fee' , 
            @Practical_charges  = '$request->Practical_charges',
            @Sports_Fund        = '$request->Sports_Fund' , 
            @FeeType            = '$request->FeeType',
            @Tuition_Fee        = '$request->Tuition_Fee',
             @AppProcessingFee   = '$request->AppProcessingFee',
            @AdmissionFee   = '$request->AdmissionFee',
            @LabSecurity   = '$request->LabSecurity',
            @LibrarySecurity   = '$request->LibrarySecurity',
            @UniSecurity   = '$request->UniSecurity',
            @MiscSecurity   = '$request->MiscSecurity',
            @SemesterRegistration   = '$request->SemesterRegistration',
            @LibraryFee   = '$request->LibraryFee',
            @LabFee   = '$request->LabFee',
            @InternetCharges   = '$request->InternetCharges',
            @StudentClubFee   = '$request->StudentClubFee',
            @TuitorialFee   = '$request->TuitorialFee',
            @InfrastructureDevelopmentFund   = '$request->InfrastructureDevelopmentFund',
            @AcademicSupportFee   = '$request->AcademicSupportFee',
            @Category   = '$request->Category',
            @AdditionalCreditHrs   = '$request->AdditionalCreditHrs',
            @LateFeePenalty   = '$request->LateFeePenalty',
            @UetEnrolementFee   = '$request->UetEnrolementFee',
            @ReAdmissionFee   = '$request->ReAdmissionFee',
            @InstallmentCharges   = '$request->InstallmentCharges',
            @LocalDLFee   = '$request->LocalDLFee',
            @ForeignDLFee   = '$request->ForeignDLFee',
            @MigrationFee   = '$request->MigrationFee',
            @DefermentFee   = '$request->DefermentFee',
            @NtsFee   = '$request->NtsFee',
            @ProspectusFee   = '$request->ProspectusFee',
            @DQEPaperFee   = '$request->DQEPaperFee',
            @ProposalDefenceFee   = '$request->ProposalDefenceFee',
            @ConvocationFee   = '$request->ConvocationFee',
            @ExamReshedulingFee   = '$request->ExamReshedulingFee',
            @TranscriptFee   = '$request->TranscriptFee',
            @DegreeFee   = '$request->DegreeFee',
            @IDCardFee   = '$request->IDCardFee',
            @Others   = '$request->Others',
            @IGradeFee   = '$request->IGradeFee',
            @PerCrdHrFee   = '$request->PerCrdHrFee',
            @OSRegLimit   = '$request->OSRegLimit'
             ;");



        // return response()->json([
        //     'title' => 'Done' , 
        //     'type'=> 'success', 
        //     'message'=> 'SemesterDetail Updated!
        //     ']);
        // }
              return redirect()->back()->with(['successToaster' => 'Semester Details Updated' , 'title' => 'Success']);

       
    }
}
