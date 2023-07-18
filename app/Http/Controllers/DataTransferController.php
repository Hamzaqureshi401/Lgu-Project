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
        dd(Employee::where(['Emp_FirstName' => 'Super' , 'Emp_LastName' => 'Admin'])->first());
        $this->truncateDb();
        //$this->DBatchFeeInfoALLToSemesterDetail();
        //$this->SemesterSessionInfoToSemesters();
        //$this->CoursesToCourses();
        //$this->DegreeInfoToDegrees();
        //$this->DepartmentsToDepartments();
        //$this->DegreeBatchInfoToDegreeBatches();
        //$this->DesignationsToDesignations();
        //$this->FacultyinfoToEmp_Designations();

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
        //DB::connection('lgu_new_testing')->table('Courses')->truncate();
        //DB::connection('lgu_new_testing')->table('Degrees')->truncate();
        // DB::connection('lgu_new_testing')->table('Departments')->truncate();
        //DB::connection('lgu_new_testing')->table('DegreeBatches')->truncate();
        //DB::connection('lgu_new_testing')->table('Designations')->truncate();
        //DB::connection('lgu_new_testing')->table('Emp_Designations')->truncate();


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


protected function CoursesToCourses()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('Courses')->select(
        'ID'
      ,'CourseCode'
      ,'CourseName'
      ,'CreditHrs'
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                'ID'                        => $request->ID,
                'CourseCode'                => $request->CourseCode,
                'CourseName'                => $request->CourseName,
                'CreditHours'               => $request->CreditHrs
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Courses')->insert($data);
        }
    });
}

protected function DegreeInfoToDegrees()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('DegreeInfo')->select(
                    'ID'
                  ,'DegreeName'
                  ,'DegreeLevel'
                  ,'FullName'
                  ,'TotalCreditHrs'
                  ,'DepartmentID'
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                  'ID'                          => $request->ID,
                   'DegreeName'                 => $request->DegreeName,
                   'DegreeLevel'                => $request->DegreeLevel,
                   'DegreeFullName'             => $request->FullName,
                   'Dpt_ID'                     => $request->DepartmentID,
                   'Total_Credit_Hours'         => $request->TotalCreditHrs
                  
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Degrees')->insert($data);
        }
    });
}

protected function DepartmentsToDepartments()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('Departments')->select(
                    'ID'
                  ,'DepartmentID'
                  ,'DName'
                  ,'HoD'
                  ,'Dean'
                  ,'Active'
                  
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                  'ID'                          => $request->ID,
                   'Dpt_Name'                   => $request->DepartmentID,
                   'Dpt_FullName'               => $request->DName,
                   'HODUID'                     => $request->HoD,
                   'DeanUID'                    => $request->Dean,
                   'Status'                     => $request->Active
                  
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Departments')->insert($data);
        }
    });
}

protected function DegreeBatchInfoToDegreeBatches()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('DegreeBatchInfo')->select(
                    'ID'
                  ,'DegreeID'
                  ,'SemSessionID'            
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                  'ID'                          => $request->ID,
                   'Degree_ID'                   => $request->DegreeID,
                   'Batch_ID'                     => $request->SemSessionID
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('DegreeBatches')->insert($data);
        }
    });
}

protected function DesignationsToDesignations()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('Designations')->select(
                    'ID'
                  ,'Name'
                              
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                  'ID'                          => $request->ID,
                   'Designation'                   => $request->Name
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Designations')->insert($data);
        }
    });
}

protected function FacultyinfoToEmp_Designations()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('FacultyInfo')->select(
                    'UID'
                  ,'Designation'
                  ,'Status'
                              
    )->orderBy('UID')->whereNotNull('UID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                   'Des_ID'                   => $request->Designation,
                   'Emp_ID'                   => $request->UID,
                   'Status'                   => $request->Status
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Emp_Designations')->insert($data);
        }
    });
}

protected function UsersAndFacutyInfoToEmployees()
{
    $chunkSize = 10;
    $supperAdmin = Employee::where(['Emp_FirstName' => 'Super' , 'Emp_LastName' , 'Admin'])->first();    
    $dataToInsert = DB::connection('lgu_misdb')->table('Users')
    ->join('FacultyInfo' , 'FacultyInfo.UID' , 'Users.ID')
    ->select(
                    'Users.ID as UserUID',
                    'Users.UserName',
                    'Users.Password',
                    'Users.EmpName as FName',
                    'Users.Designation',
                    'Users.AccountStatus',
                    'Users.ContactNo',
                    'Users.Email',
                    'Users.CNIC',
                    'Users.Gender',
                    'Users.Address',
                    'Users.Qualification',
                    'Users.DoB',
                    'Users.DoJ',
                    'Users.Grade',
                    'Users.Status',
                    'Users.Specialization',
                    'Users.AppointmentDate',
                    'Users.Default',
                    
                    'FacultyInfo.Gender',
                    'FacultyInfo.FullName as LName',
                    'FacultyInfo.ContactNumber',
                    'FacultyInfo.Email',
                    'FacultyInfo.Address',
                    'FacultyInfo.DepartmentID',
                    'FacultyInfo.CNIC',
                    'FacultyInfo.EmploymentNature',
                    'FacultyInfo.JoiningDate',
                    'FacultyInfo.AppointmentDate',
                    'FacultyInfo.ExpiryOfEmpContract',
                    'FacultyInfo.Status',
                    'FacultyInfo.UID',
                    'FacultyInfo.DoB',
                    'FacultyInfo.Grade',
                    'FacultyInfo.Specialization'            
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
        'ID'               => $request->UserUID,
        'Emp_FirstName'    => $request->FName,
        'Emp_LastName'     => $request->LName,
        'DOB'              => $request->DOB,
        'CNIC'             => $request->CNIC,
        'DateOfJoining'    => $request->DateOfJoining,
        'DateOfAppointment'=> $request->DateOfAppointment,
        'Specialization'   => $request->Specialization,
        'Designation'      => $request->Designation,
        'Status'           => $request->Status,
        'UserName'         => $request->UserName,
        'Password'         => $request->Password,
        'Gender'           => $request->Gender,
        'Email'            => $request->Email,
        'Address'          => $request->Address,
        'Dpt_ID'           => $request->DepartmentID,
        'Grade'            => $request->Grade,
        'Contact_Number'   => $request->Contact_Number,
        'DefualtUrl'       => $request->Default,

            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Designations')->insert($data);
        }
    });
}







    
}
