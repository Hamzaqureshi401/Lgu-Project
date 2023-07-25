<?php

namespace App\Http\Controllers;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\SemesterDetail;
use Illuminate\Support\Facades\DB;
use App\Models\DegreeBatche;
use App\Models\Employee;
use Illuminate\Http\Request;


class DataTransferController extends Controller
{
  public function transferData()
{
    try {
        DB::beginTransaction();

        set_time_limit(0);
        
        $this->truncateDb();

       // $a = DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->select('CourseName')->get();
       //  $b = DB::connection('lgu_new_testing')->table('SemesterCourses')->select('Course_ID')->get();

       //  $testting = [];
       //  foreach ($a as $key => $c) {
       //      $courseId = $b[$key]->Course_ID ?? null;
       //      $courseName = DB::connection('lgu_new_testing')->table('Courses')->where('ID', $courseId)->value('CourseName');
       //      $testting[] = $c->CourseName . '=>' . ($courseName ?? '');
       //  }

       //  dd($testting);
        dd();

        foreach(DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->join('Courses' , 'courses.CourseCode' , 'SemesterCoursesInfo.coursecode')->select('courses.courseName' , 'SemesterCoursesInfo.courseName as b')->get() as $a){

            $testting[] = $a->CourseName . '=>' . $a->b;
        }
        dd($testting);

        dd(array_unique(DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->pluck('CourseCode')->toArray()));



         $a = DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->select('CourseName' , 'CourseCode')->get();
       // $b = DB::connection('lgu_new_testing')->table('SemesterCourses')->select('Course_ID')->get();

        $testting = [];
        foreach ($a as $key => $c) {
            
            $courseName = DB::connection('lgu_misdb')->table('Courses')->where('CourseCode', $c->CourseCode)->value('CourseName');
            $testting[] = $c->CourseName . '=>' . ($courseName ?? '');
        }

        dd($testting);


        //$this->DBatchFeeInfoALLToSemesterDetail();
        //$this->SemesterSessionInfoToSemesters();
        //$this->CoursesToCourses();
        //$this->DegreeInfoToDegrees();
        //$this->DepartmentsToDepartments();
        //$this->DegreeBatchInfoToDegreeBatches();
        //$this->DesignationsToDesignations();
        //$this->FacultyinfoToEmp_Designations();
        //$this->UsersAndFacutyInfoToEmployees();
        //$this->Exam_AcademicStandingRulesToExam_AcademicStandingRules();
        //$this->SemesterCoursesInfoToSemesterCourses();

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
        //DB::connection('lgu_new_testing')->table('Employees')->truncate();
        //DB::connection('lgu_new_testing')->table('Exam_AcademicStandingRules')->truncate();
        //DB::connection('lgu_new_testing')->table('SemesterCourses')->truncate();


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
    //dd(DB::connection('lgu_misdb')->table('Users')->where('ID' , 4)->get());
    $chunkSize = 10;
    $dataToInsert = DB::connection('lgu_misdb')->table('Users')
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
                    'Users.Status',
                    'Users.Specialization',
                    'Users.AppointmentDate',
                    'Users.Default'                 
    )->orderBy('UserUID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
        $FacultyInfo = $this->getFacultyData($request->UserUID);
        
            $data[] = [
        'ID'               => $request->UserUID,
        'Emp_FirstName'    => $request->FName,
        'Emp_LastName'     => $FacultyInfo->FullName ?? '',
        'DOB'              => $request->DoB,
        'CNIC'             => $request->CNIC,
        'DateOfJoining'    => $request->DoJ,
        'DateOfAppointment'=> $request->AppointmentDate,
        'Specialization'   => $request->Specialization,
        'Designation'      => $request->Designation,
        'Status'           => $request->Status,
        'UserName'         => $request->UserName,
        'Password'         => $request->Password,
        'Gender'           => $request->Gender,
        'Email'            => $request->Email,
        'Address'          => $request->Address,
        'Dpt_ID'           => $FacultyInfo->DepartmentID ?? '',
        'Grade'            => $FacultyInfo->Grade ?? '',
        'Contact_Number'   => $request->ContactNo,
        'DefualtUrl'       => $request->Default,

            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Employees')->insert($data);
        }
    });
     $data = [
                "ID"            => "1069",
                "Emp_FirstName" => "Super",
                "Emp_LastName"  => "Admin",
                "DOB"           => "2023-06-20",
                "CNIC"          => "34545-3454353-4",
                "DateOfJoining" => "2023-06-20",
                "DateOfAppointment" => "2023-06-20",
                "Specialization" => "bscs",
                "Designation"   => "Vc",
                "Status"        => "1",
                "UserName"      => "superadmin",
                "Password"      => "123456",
                "Gender"        => "male",
                "Email"         => "hamzaqureshi401@gmail.com",
                "Address"       => "Lgu",
                "Dpt_ID"        => "21",
                "Grade"         => "22",
                "Contact_Number" => "4343-5435435",
                "DefualtUrl"    => "/empDashboard"
             ];
             DB::connection('lgu_new_testing')->table('Employees')->insert($data);
}

protected function getFacultyData($UID){
   return DB::connection('lgu_misdb')->table('FacultyInfo')->where('UID'  , $UID)->select('DepartmentID' , 'FullName' , 'Grade')->first();
}

protected function Exam_AcademicStandingRulesToExam_AcademicStandingRules()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('Exam_AcademicStandingRules')->select(
                   'ID'
                  ,'CGPA'
                  ,'AcademicStanding'
                  ,'CrHrsAllowed'
                  ,'NewCourse'
                  ,'EnrollmentAllowed'

                              
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                  'ID'                          => $request->ID,
                  'CGPA'                        => $request->CGPA,
                  'AcademicStanding'            => $request->AcademicStanding,
                  'CrHrsAllowed'                => $request->CrHrsAllowed,
                  'NewCourse'                   => $request->NewCourse,
                  'EnrollmentAllowed'           => $request->EnrollmentAllowed,
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('Exam_AcademicStandingRules')->insert($data);
        }
    });
}

protected function SemesterCoursesInfoToSemesterCourses()
{
    $chunkSize = 10;    
    $dataToInsert = DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->select(
                   'ID'
                  ,'SemesterSessionID'
                  ,'CourseCode'
                  ,'CampusLimit'              
    )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
        $data = [];
        foreach ($dataToInsertChunk as $request) {
            $data[] = [
                  'ID'                       => $request->ID,
                  'Sem_ID'                   => $request->SemesterSessionID,
                  'CampusLimit'              => $request->CampusLimit,
                  'Course_ID'                => $this->getCourseID($request->CourseCode) ?? ''
                  
            ];
        }
        if (!empty($data)) {
             DB::connection('lgu_new_testing')->table('SemesterCourses')->insert($data);
        }
    });
}

protected function getCourseID($CourseCode)
{
    $result = DB::connection('lgu_misdb')->table('Courses')
        ->select('ID')
        ->where('CourseCode', $CourseCode)
        ->first();

    return $result->ID ?? null;
}









    
}
