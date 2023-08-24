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
            // $b = DB::connection('lgu_new_testing')->table('SemesterCourses')->select('Course_ID')->get();

            // $testting = [];
            // foreach ($a as $key => $c) {
            //     $courseId = $b[$key]->Course_ID ?? null;
            //     $courseName = DB::connection('lgu_new_testing')->table('Courses')->where('ID', $courseId)->value('CourseName');
            //     $testting[] = $c->CourseName . '=>' . ($courseName ?? '');
            // }

            // dd($testting);

            //this working
            //  dd();

            //  foreach(DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->join('Courses' , 'courses.CourseCode' , 'SemesterCoursesInfo.coursecode')->select('courses.courseName' , 'SemesterCoursesInfo.courseName as b')->get() as $a){

            //      $testting[] = $a->CourseName . '=>' . $a->b;
            //  }
            //  dd($testting);

            //  dd(array_unique(DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->pluck('CourseCode')->toArray()));



            // $a = DB::connection('lgu_misdb')->table('SemesterCoursesInfo')->select('CourseName', 'CourseCode')->get();
            // $b = DB::connection('lgu_new_testing')->table('SemesterCourses')->select('Course_ID')->get();

            // $testting = [];
            // foreach ($a as $key => $c) {

            //     $courseName = DB::connection('lgu_misdb')->table('Courses')->where('CourseCode', $c->CourseCode)->value('CourseName');
            //     $testting[] = $c->CourseName . '=>' . ($courseName ?? '');
            // }

            // dd($testting);

            //this end


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
            //$this->Semestercourses_weightageToSemesterCourse_Weightage();
            //$this->SemesterCourse_WeightageDetailToSemesterCourse_WeightageDetail();
            //$this->StudentInfoToStudents();
            // $this->StudentRegistrationInfoToRegistrations();
            $this->Student_Course_EnrollmentToEnrollments();

            DB::commit();

            dd('success');
        } catch (\Exception $e) {
            DB::rollback();

            dd('Error at line ' . $e->getLine() . ': ' . $e->getMessage());
        }
    }


    protected function truncateDb()
    {

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
        //DB::connection('lgu_new_testing')->table('SemesterCourse_Weightage')->truncate();
        //DB::connection('lgu_new_testing')->table('SemesterCourse_WeightageDetail')->truncate();
        //DB::connection('lgu_new_testing')->table('Students')->truncate();
        // DB::connection('lgu_new_testing')->table('Registrations')->truncate();
        DB::connection('lgu_new_testing')->table('Enrollments')->truncate();
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
            'ID',
            'SemesterSession',
            'SemesterYear',
            'SemStartDate',
            'SemEndDate',
            'Feedback_Mid_Start',
            'Feedback_Mid_End',
            'Feedback_Final_Start',
            'Feedback_Final_End'

        )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
            $data = [];

            foreach ($dataToInsertChunk as $request) {
                $data[] = [
                    'ID'                        => $request->ID,
                    'SemSession'                => $request->SemesterSession,
                    'Year'                      => $request->SemesterYear,
                    'SemStartDate'              => $request->SemStartDate,
                    'SemEndDate'                => $request->SemEndDate,
                    'EnrollmentStartDate'       => $request->SemStartDate, // added Sem Start Date?
                    'EnrollmentEndDate'         => $request->SemEndDate,    // added Sem End Date?
                    'ExamStartDate'             => $request->Feedback_Final_Start, // added final?
                    'ExamEndDate'               => $request->Feedback_Final_End, // added final?
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
            'ID',
            'CourseCode',
            'CourseName',
            'CreditHrs'
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
            'ID',
            'DegreeName',
            'DegreeLevel',
            'FullName',
            'TotalCreditHrs',
            'DepartmentID'
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
            'ID',
            'DepartmentID',
            'DName',
            'HoD',
            'Dean',
            'Active'

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
            'ID',
            'DegreeID',
            'SemSessionID'
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
            'ID',
            'Name'

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
            'UID',
            'Designation',
            'Status'

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
                        'DateOfAppointment' => $request->AppointmentDate,
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

    protected function getFacultyData($UID)
    {
        return DB::connection('lgu_misdb')->table('FacultyInfo')->where('UID', $UID)->select('DepartmentID', 'FullName', 'Grade')->first();
    }

    protected function Exam_AcademicStandingRulesToExam_AcademicStandingRules()
    {
        $chunkSize = 10;
        $dataToInsert = DB::connection('lgu_misdb')->table('Exam_AcademicStandingRules')->select(
            'ID',
            'CGPA',
            'AcademicStanding',
            'CrHrsAllowed',
            'NewCourse',
            'EnrollmentAllowed'


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
            'ID',
            'SemesterSessionID',
            'CourseCode',
            'CampusLimit'
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

    protected function Semestercourses_weightageToSemesterCourse_Weightage()
    {
        $chunkSize = 10;
        $dataToInsert = DB::connection('lgu_misdb')->table('Semestercourses_weightage')->select(
            'ID',
            'SemCoursesInfoID',
            'Type',
            'Weightage',
            'Lecturetype'
        )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
            $data = [];
            foreach ($dataToInsertChunk as $request) {
                $data[] = [
                    'ID'                       => $request->ID,
                    'SemCourse_ID'             => $request->SemCoursesInfoID,
                    'Type'                     => $request->Type,
                    'Weightage'                => $request->Weightage,
                    'LectureType'              => $request->Lecturetype,

                ];
            }
            if (!empty($data)) {
                DB::connection('lgu_new_testing')->table('SemesterCourse_Weightage')->insert($data);
            }
        });
    }

    protected function SemesterCourse_WeightageDetailToSemesterCourse_WeightageDetail()
    {
        $chunkSize = 10;
        $dataToInsert = DB::connection('lgu_misdb')->table('SemesterCourse_WeightageDetail')->select(
            'ID',
            'SemesterCourseWeightage_ID',
            'TotalMarks'
        )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
            $data = [];
            foreach ($dataToInsertChunk as $request) {
                $data[] = [
                    'ID'                       => $request->ID,
                    'SemCourseWeightage_ID'             => $request->SemesterCourseWeightage_ID,
                    'TotalMarks'                     => $request->TotalMarks

                ];
            }
            if (!empty($data)) {
                DB::connection('lgu_new_testing')->table('SemesterCourse_WeightageDetail')->insert($data);
            }
        });
    }

    protected function StudentInfoToStudents()
    {
        $chunkSize = 10;
        $dataToInsert = DB::connection('lgu_misdb')->table('StudentInfo')->select(
            'ID',
            'StdRollNo',
            'StudentType',
            'Password',
            'UETRegNo',
            'StudentName',
            'ClassSection',
            'NIC',
            'Nationality',
            'DOB',
            'FatherName',
            'Gender',
            'MailingAddress',
            'MailingCity',
            'MailingCountry',
            'PermanentAddress',
            'PermanentCity',
            'PermanentCountry',
            'Email',
            'PhoneHome',
            'PhoneMobilePrimary',
            'PhoneMobileSecondary',
            'PhoneOffice',
            'ParentName',
            'ParentRelation',
            'ParentNIC',
            'ParentEmployer',
            'Designation',
            'ParentOfficeAddress',
            'ParentEmail',
            'ParentPhoneHome',
            'ParentPhoneMobile',
            'ParentPhoneOffice',
            'ParentFax',
            'DegreeID',
            'OtherRollNo',
            'LastAllowedSemester',
            'InstitueID',
            'OldCERollNo',
            'JoiningSession',
            'ShadowRollNo',
            'PhDAdmDate',
            'PhDStartSession',
            'LastLogin',
            '_StudentName',
            '_FatherName',
            'Category',
            'Hostel',
            'Transport',
            'TransportRouteID',
            'TransportStopID'
        )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
            $data = [];
            foreach ($dataToInsertChunk as $request) {
                $getParentJob = $this->getParentJob($request->StdRollNo);
                $data[] = [
                    'ID'                       => $request->ID,
                    'ApplicantID'              =>  $getParentJob->ApplicantID ?? null,
                    'StdRollNo'                => $request->StdRollNo,
                    'Password'                 => $request->Password,
                    'Std_FName'                => $request->StudentName ?? null,
                    'Std_LName'                => null, // Replace 'null' with the appropriate field name if available in the request
                    'ClassSection'             => $request->ClassSection,
                    'CNIC'                     => substr($request->NIC, 0, 14),
                    'Nationality'              => $request->Nationality,
                    'DOB'                      => $request->DOB,
                    'Gender'                   => $request->Gender,
                    'Email'                    => $request->Email,
                    'FatherName'               => $request->FatherName,
                    'FatherCNIC'               => null, // Replace 'null' with the appropriate field name if available in the request
                    'GuardianName'             => $request->ParentName, // Replace 'null' with the appropriate field name if available in the request
                    'GuardianCNIC'             => substr($request->ParentNIC, 0, 14), // Replace 'null' with the appropriate field name if available in the request
                    'StdPhone'                 => substr($request->PhoneMobilePrimary, 0, 11) ?? null,
                    'FatherPhone'              => substr($request->ParentPhoneMobile, 0, 11), // Replace 'null' with the appropriate field name if available in the request
                    'GuardianPhone'            => substr($request->PhoneMobileSecondary, 0, 11), // Replace 'null' with the appropriate field name if available in the request
                    'ParentOccupation'         => substr($request->ParentEmployer, 0, 16), // Replace 'null' with the appropriate field name if available in the request
                    'Address'                  => substr($request->ParentOfficeAddress, 0, 199) ?? null,
                    'Tehsil'                   => null, // Replace 'null' with the appropriate field name if available in the request
                    'City'                     => substr($request->PermanentCity, 0, 49) ?? null,
                    'Province'                 => $request->MailingCountry ?? null,
                    'Country'                  => $request->PermanentCountry ?? null,
                    'CurrentSemester'          => $this->findSemester($request->JoiningSession)->ID ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'Status'                   => null, // Replace 'null' with the appropriate field name if available in the request
                    'AdmissionSession' => $request->JoiningSession, // Replace 'null' with the appropriate field name if available in the request
                    'Files'                    => null, // Replace 'null' with the appropriate field name if available in the request
                    'BloodGroup'               => null, // Replace 'null' with the appropriate field name if available in the request
                    'Image'                    => null, // Replace 'null' with the appropriate field name if available in the request
                    'FatherEmail'              => $request->ParentEmail, // Replace 'null' with the appropriate field name if available in the request
                    'Degree_ID'                => $this->findDegree($request->DegreeID)->ID ?? null,
                    'Category'                 => $request->Category ?? null,
                    'No'                       => $getParentJob->No ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'ServingSince'             => $getParentJob->ServingSince ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'NowServingIn'             => $getParentJob->NowServingIn ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'At'                       => $getParentJob->At ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'Station'                  => $getParentJob->Station ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'TelNo'                    => $getParentJob->Phone ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'I_Mst'                    => $getParentJob->I_Mst ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'WidowOf'                  => $getParentJob->WidowOf ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'Rank'                     => $getParentJob->Rank ?? null, // Replace 'null' with the appropriate field name if available in the request
                    'ExpiredOn'                => $getParentJob->ExpiredOn ?? null, // Replace 'null' with the appropriate field name if available in the request

                ];
            }
            if (!empty($data)) {
                DB::connection('lgu_new_testing')->table('Students')->insert($data);
            }
        });
    }


    protected function getParentJob($rollno)
    {
        return DB::connection('lgu_misdb')
            ->table('ApplicantInfo')
            ->join('ApplicantParentsVerification_NEW', 'ApplicantParentsVerification_NEW.ApplicantID', '=', 'ApplicantInfo.ID')
            ->where('AssignedRollNumber', '=', "'$rollno'") // Enclose $rollno in quotes
            ->first();
    }

    protected function findSemester($session)
    {
        return DB::connection('lgu_new_testing')->table('Semesters')->where('SemSession', $session)->first();
    }
    protected function findDegree($d_name)
    {
        return DB::connection('lgu_new_testing')->table('Degrees')->where('DegreeName', $d_name)->first();
    }


    protected function StudentRegistrationInfoToRegistrations()
    {
        $chunkSize = 10;
        $dataToInsert = DB::connection('lgu_misdb')->table('StudentRegistrationInfo')->select(
            'ID',
            'StdRollNoID',
            'SemesterSessionID',
            'AcaStdID'
        )->orderBy('ID')->chunk($chunkSize, function ($dataToInsertChunk) {
            $data = [];
            foreach ($dataToInsertChunk as $request) {
                $data[] = [
                    'ID'                       => $request->ID,
                    'Std_ID'                   => $request->StdRollNoID,
                    'AcaStd_ID'                => $request->AcaStdID,
                    'Sem_ID'                   => $request->SemesterSessionID

                ];
            }
            if (!empty($data)) {
                DB::connection('lgu_new_testing')->table('Registrations')->insert($data);
            }
        });
    }

    // select * from  Student_Course_Enrollment where StdRollNo = 'Fa-2019/BSCS/310' 
    // select * from Semestercourses_weightage where SemCoursesInfoID = 8227
    // select * from SemesterCourse_WeightageDetail where SemesterCourseWeightage_ID= 9649
    // select * from Student_MarksDetails where SemCourseWDetailID=12667 and StdCoursesInfoID =145736
    // StudentCoursesInfo


    //  $argument = 36;

    // $result = DB::connection('lgu_misdb')
    //     ->select(DB::raw('SELECT * from FUNCChallanInfo(?) as result_column'), [$argument]);
    //     dd($result);





    protected function Student_Course_EnrollmentToEnrollments()
    {
        // $chunkSize = 10;
        // $dataToInsert = DB::connection('lgu_misdb')->table('Student_Course_Enrollment')->select(
        //     'STDRollNoID',
        //     'SemesterSessionID',
        //     'stdregid'
        // )->orderBy('SemesterSessionID')->chunk($chunkSize, function ($dataToInsertChunk) {
        //     $data = [];
        //     foreach ($dataToInsertChunk as $request) {
        //         $data[] = [
        //             'Std_ID'                    => $request->STDRollNoID,
        //             'SemCourses_ID'             => $request->SemesterSessionID,
        //             'Is_i_mid'                  => Null,
        //             'Is_i_final'                => Null,
        //             'Reg_ID'                    => $request->stdregid,
        //             'Status'                    => 1
        //         ];
        //     }
        //     if (!empty($data)) {
        //         DB::connection('lgu_new_testing')->table('Enrollments')->insert($data);
        //     }
        // });
        DB::statement("
        INSERT INTO LguNewDbTesting.dbo.Enrollments (Std_ID, SemCourses_ID, Is_i_mid, Is_i_final, Reg_ID, Status)
        SELECT
            STDRollNoID AS Std_ID,
            SemesterSessionID AS SemCourses_ID,
            NULL AS Is_i_mid,
            NULL AS Is_i_final,
            stdregid AS Reg_ID,
            1 AS Status
        FROM LGU_MISDB.dbo.Student_Course_Enrollment
        ORDER BY SemesterSessionID;
    ");
    }
}
