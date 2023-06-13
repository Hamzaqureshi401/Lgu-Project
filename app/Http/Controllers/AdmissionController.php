<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Student;
use App\Models\Challan;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\DegreeBatche;
use App\Models\SemesterDetail;
use App\Models\Enrollment;
use App\Models\DegreeSemCourse;

use App\Http\Controllers\ChallanController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EnrollmentsController;
use App\Models\StudentEducation;
use App\Models\Registration;


class AdmissionController extends Controller
{

    public function validation($request)
    {

        $this->validate($request, [

            'Password'          => 'required|max:12',
            'Std_FName'         => 'required|string|max:20|regex:/^[a-zA-Z\s]+$/',
            'Std_LName'         => 'required|string|max:15|regex:/^[a-zA-Z\s]+$/',
            'ClassSection'      => 'string||max:1',
            'CNIC'              => 'required|max:13|unique:Students',
            'Nationality'       => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'DOB'               => 'required|Date',
            'Gender'            => 'required|string',
            'Email'             => 'required|Email|max:25',
            'FatherName'        => 'required|string|max:25||regex:/^[a-zA-Z\s]+$/',
            'FatherCNIC'        => 'required|string|max:13',
            'GuardianName'      => 'nullable|string|max:25|regex:/^[a-zA-Z\s]+$/',
            'GuardianCNIC'      => 'nullable|max:15|max:13',
            'StdPhone'          => 'required|max:11',
            'FatherPhone'       => 'required|max:11',
            'GuardianPhone'     => 'max:11',
            'ParentOccupation'  => 'required|max:30',
            'Address'           => 'required',
            'Tehsil'            => 'required',
            'City'              => 'required|max:20',
            'state'             => 'required',
            'country'           => 'required',
            'Degree_ID'         => 'required|integer',
            'CurrentSemester'   => 'max:1',
            'Status'            => 'required',
            'AdmissionSession'  => 'required|max:15',
            'BloodGroup'        => 'required|string',
            'FatherEmail'       => 'required|Email|max:25',
            'Category'          => 'required|max:10',
            'Image'             => 'required|mimes:jpeg,png,jpg|max:2048',
            'stdfile'           => 'required|mimes:jpeg,png,jpg,pdf|max:3072'

        ]);
    }

    public function addStudentAdmission()
    {

        $degree = Degree::select('ID', 'DegreeName')->distinct()->get();

        $admissionsession = Semester::where('Year', '=', date('Y'))->get();
        $button = "Add Student Admission";
        $title  = 'Add Student Admissions';
        $route  = '/storeStudentAdmission';
        return
            view(
                'Admissions.addStudentAdmission',
                compact(
                    'degree',
                    'button',
                    'title',
                    'route',
                    'admissionsession'
                )
            );
    }

    public function storeStudentAdmission(Request $request)
    {

        // dd($request);

        $validator = $this->validation($request);
        DB::beginTransaction();

        try {
            $this->createStudentDetail($request);
            $this->createStudentQualification($request);
            $this->storeRegistrationInDbReturnId($request);
            if ($request->Status == 'In Progress') {
                $this->createProgressChallan($request);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->back()->with(['successToaster' => 'Admission Added!', 'title' => 'Success']);

        //}
    }

    protected function createStudentDetail($request)
    {



        if ($request->Category === "Defence") {
            $No                   = $request->defence_No;
            $Rank                 = $request->defence_Rank;
            $ServingSince         = $request->defence_serving_since;
            $NowServingIn         = $request->defence_serving_In;
            $At                   = $request->defence_At;
            $Station              = $request->defence_Station;
            $TelNo                = $request->defence_tel_No;
        } else if ($request->Category === "Shaheed") {

            $I_Mst             = $request->Shaheed_Mst_name;
            $No                = $request->Shaheed_Widow_no;
            $Rank              = $request->shaheed_Rank;
            $WidowOf           = $request->shaheed_Name;
            $ExpiredOn         = $request->Shaheed_Expired_date;
        } else if ($request->Category === "Civilian") {

            $NowServingIn        = $request->civilian_office;
            $Rank                = $request->civilian_Designation;
            $ServingSince        = $request->civilian_wef;
        } else if ($request->Category === "Sports") {

            $NowServingIn        = $request->sports_office;
            $Rank                = $request->sports_Designation;
            $ServingSince        = $request->sport_wef;
        }



        $stdfilename = time() . "_studentfile." . $request->file('stdfile')->getClientOriginalExtension();
        $request->file('stdfile')->storeAs('studentsFiles', $stdfilename);
        $stdImagename = time() . "_studentImage." . $request->file('Image')->getClientOriginalExtension();
        $request->file('Image')->storeAs('studentsImages', $stdImagename);

        $submit = DB::statement("EXECUTE sp_InsertStudentDetails
         @Std_FName          =      '$request->Std_FName',
         @Std_LName          =      '$request->Std_LName',
         @Password           =      '$request->Password',
         @ClassSection       =      '$request->ClassSection',
         @CNIC               =      '$request->CNIC',
         @Nationality        =      '$request->Nationality',
         @DOB                =      '$request->DOB',
         @Gender             =      '$request->Gender',
         @Email              =      '$request->Email',
         @FatherName         =      '$request->FatherName',
         @FatherCNIC         =      '$request->FatherCNIC',
         @GuardianName       =      '$request->GuardianName',
         @GuardianCNIC       =      '$request->GuardianCNIC',
         @StdPhone           =      '$request->StdPhone',
         @FatherPhone        =      '$request->FatherPhone',
         @GuardianPhone      =      '$request->GuardianPhone',
         @ParentOccupation   =      '$request->ParentOccupation',
         @Address            =      '$request->Address',
         @Tehsil             =      '$request->Tehsil',
         @City               =      '$request->City',
         @Province           =      '$request->state',
         @Country            =      '$request->country',
         @Degree_ID          =      '$request->Degree_ID',
         @CurrentSemester    =      '$request->CurrentSemester',
         @Status             =      '$request->Status',
         @AddmissionSession  =      '$request->AdmissionSession',
         @BloodGroup         =      '$request->BloodGroup',
         @FatherEmail        =      '$request->FatherEmail',
         @Category           =      '$request->Category',
         @Files              =      '$stdfilename',
         @Image              =      '$stdImagename',
         
         @No                 =      '$No',
         @ServingSince       =      '$ServingSince',
         @NowServingIn       =      '$NowServingIn',
         @At                 =      '$At',
         @Station            =      '$Station',
         @TelNo              =      '$TelNo',
         @I_Mst              =      '$I_Mst',
         @WidowOf            =      '$WidowOf',
         @Rank               =      '$Rank',
         @ExpiredOn          =      '$ExpiredOn',

         
         
         ;");
        return $submit;
    }

    public function storeRegistrationInDbReturnId($request)
    {


        $registration = new RegistrationController();
        $Sem_ID = Semester::where('SemSession', $request->AdmissionSession)->pluck('ID')->first();
        if (!empty($request->Student_ID)) {
            $Std_ID = $request->Student_ID;
        } else {
            $Std_ID = Student::where(['CNIC' => $request->CNIC, 'FatherCNIC' => $request->FatherCNIC])->pluck('ID')->first();
        }
        $oldRegistration = Registration::where('Std_ID', $Std_ID);
        if ($oldRegistration->exists() == true) {
            return $oldRegistration->first()->ID;
        } else {
            $registration->storeRegistrationInDB(
                $Std_ID,
                $AcaStd_IDRule = 15,
                $Sem_ID
            );
            return Registration::where('Std_ID', $Std_ID)->first()->ID;
        }
    }

    public function examinationdatainsertion($request, $std_id)
    {

        for ($i = 0; $i < sizeof($request->examination); $i++) {

            $examination      = $request->examination[$i];
            $InstitutionName  = $request->InstitutionName[$i];
            $DateStarted      = $request->DateStarted[$i];
            $DateEnd          = $request->DateEnd[$i];
            $ObtainedMarks    = $request->ObtainedMarks[$i];
            $TotalMarks       = $request->TotalMarks[$i];
            $Rollno           = $request->Rollno[$i];

            $this->addStudentExamination(
                $std_id,
                $examination,
                $InstitutionName,
                $DateStarted,
                $DateEnd,
                $ObtainedMarks,
                $TotalMarks,
                $Rollno
            );
        }
    }

    protected function createStudentQualification($request)
    {

        $student = Student::where(['CNIC' => $request->CNIC, 'FatherCNIC' => $request->FatherCNIC])->first();

        $std_id = $student->ID;
        // dd($request, $std_id);
        $this->examinationdatainsertion($request, $std_id);



        // dd($std_id,$request->all(),$student);

        //-----------------QUALIFICATION------------
        // $matric_examination     = $request->matric_examination;
        // $matric_board           = $request->matric_board;
        // $matric_passing_year    = $request->matric_passing_year;
        // $matric_rollno          = $request->matric_rollno;
        // $matric_total_marks     = $request->matric_total_marks;
        // $matric_marks_obtained  = $request->matric_marks_obtained;
        // $matric_percentage      = $request->matric_percentage;
        // $matric_appeared        = $request->matric_appeared;


        // $fsc_examination        = $request->fsc_examination;
        // $fsc_board              = $request->fsc_board;
        // $fsc_passing_year       = $request->fsc_passing_year;
        // $fsc_rollno             = $request->fsc_rollno;
        // $fsc_total_marks        = $request->fsc_total_marks;
        // $fsc_marks_obtained     = $request->fsc_marks_obtained;
        // $fsc_percentage         = $request->fsc_percentage;
        // $fsc_appeared           = $request->fsc_appeared;


        // $becholars_examination  = $request->becholars_examination;
        // $becholars_board        = $request->becholars_board;
        // $becholars_passing_year = $request->becholars_passing_year;
        // $becholars_rollno       = $request->becholars_rollno;
        // $becholars_total_marks  = $request->becholars_total_marks;
        // $becholars_marks_obtained = $request->becholars_marks_obtained;
        // $becholars_percentage   = $request->becholars_percentage;
        // $becholars_appeared     = $request->becholars_appeared;

        // $master_examination     = $request->master_examination;
        // $master_board           = $request->master_board;
        // $master_passing_year    = $request->master_passing_year;
        // $master_rollno          = $request->master_rollno;
        // $master_total_marks     = $request->master_total_marks;
        // $master_marks_obtained  = $request->master_marks_obtained;
        // $master_percentage      = $request->master_percentage;
        // $master_appeared        = $request->master_appeared;


        // $masters_examination    = $request->masters_examination;
        // $masters_board          = $request->masters_board;
        // $masters_passing_year   = $request->masters_passing_year;
        // $masters_rollno         = $request->masters_rollno;
        // $masters_total_marks    = $request->masters_total_marks;
        // $masters_marks_obtained = $request->masters_marks_obtained;
        // $masters_percentage     = $request->masters_percentage;
        // $masters_appeared       = $request->masters_appeared;


        // if (!empty($matric_examination) && !empty($matric_board)) {

        //     $this->addStudentExamination(
        //     $std_id,
        //     $matric_examination,
        //     $matric_appeared,
        //     $matric_board,
        //     $matric_passing_year,
        //     $matric_marks_obtained,
        //     $matric_total_marks,
        //     $matric_rollno
        // );
        // }


        // if (!empty($fsc_examination) && !empty($fsc_board)) {

        //     $this->addStudentExamination(
        //     $std_id,
        //     $fsc_examination,
        //     $fsc_appeared,
        //     $fsc_board,
        //     $fsc_passing_year,
        //     $fsc_marks_obtained,
        //     $fsc_total_marks,
        //     $fsc_rollno
        // );


        // }

        // if (!empty($becholars_examination) && !empty($becholars_board)) {

        //     $this->addStudentExamination(
        //     $std_id,
        //     $becholars_examination,
        //     $becholars_appeared,
        //     $becholars_board,
        //     $becholars_passing_year,
        //     $becholars_marks_obtained,
        //     $becholars_total_marks,
        //     $becholars_rollno
        // );
        // }


        // if (!empty($master_examination) && !empty($master_examination)) {

        //     $this->addStudentExamination(
        //     $std_id,
        //     $master_examination,
        //     $master_appeared,
        //     $master_board,
        //     $master_passing_year,
        //     $master_marks_obtained,
        //     $master_total_marks,
        //     $master_rollno
        // );
        // }



        // if (!empty($masters_examination) && !empty($masters_examination)) {

        //     $this->addStudentExamination(
        //     $std_id,
        //     $masters_examination,
        //     $masters_appeared,
        //     $masters_board,
        //     $masters_passing_year,
        //     $masters_marks_obtained,
        //     $masters_total_marks,
        //     $masters_rollno
        // );
        // }
    }

    public function addStudentExamination(

        $Std_ID,
        $Degree,
        $InstitutionName,
        $DateStarted,
        $DateEnd,
        $ObtainedMarks,
        $TotalMarks,
        $RollNo
    ) {


        $matric = DB::statement("EXECUTE sp_InsertStudentEducations
             @Std_ID            ='$Std_ID',
             @Degree            ='$Degree',
             @InstitutionName   ='$InstitutionName',
             @DateStarted       ='$DateStarted',
             @DateEnd           ='$DateEnd',
             @ObtainedMarks     ='$ObtainedMarks',
             @TotalMarks        ='$TotalMarks',
             @RollNo            ='$RollNo'
            ");
    }

    public function allStudentAdmissions()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';

        return
            view(
                'Admissions.allStudentAdmissions',
                compact(
                    'students',
                    'title',
                    'modalTitle',
                    'route',
                    'getEditRoute'
                )
            );
    }

    public function editStudentAdmission($id)
    {

        $degree = Degree::select('ID', 'DegreeName')->distinct()->get();
        $button = 'Update Student Info';
        $title  = 'Edit Student Info';
        $route  = '/updateStudentAdmission';
        $studentAdmission = Student::where('ID', $id)->first();
        $degrees = Degree::get();
        $studentEducations = StudentEducation::where('Std_ID', $id)->get();
        $admissionsession = Semester::where('Year', '=', date('Y'))->get();


        $DegreeBatche       = DegreeBatche::where(['Degree_ID' => $studentAdmission->Degree_ID, 'Batch_ID' => $studentAdmission->batch->ID])->first();
        if ($DegreeBatche) {
            $DegsemesterCourses    = DegreeSemCourse::where(['DegBatches_ID' => $DegreeBatche->ID, 'Section' => $studentAdmission->ClassSection])->get();
        } else {
            $DegsemesterCourses = null;
        }

        $enrollments = Enrollment::where('Std_ID', $studentAdmission->ID)->get();





        // dd($matric[0]['ID'],$matric[0]['Degree'],$matric[0]['InstitutionName']);


        return
            view(
                'Admissions.editStudentAdmission',
                compact(
                    'studentAdmission',
                    'studentEducations',
                    'degrees',
                    'button',
                    'title',
                    'route',
                    'degree',
                    'admissionsession',
                    'DegreeBatche',
                    'DegsemesterCourses',
                    'enrollments'

                )
            );
    }

    public function updateEducation($request)
    {


        // dd($request);

        $examination        = $request['examination'];
        $InstitutionName    = $request['InstitutionName'];
        $DateStarted        = $request['DateStarted'];
        $DateEnd            = $request['DateEnd'];
        $ObtainedMarks      = $request['ObtainedMarks'];
        $TotalMarks         = $request['TotalMarks'];
        $Rollno             = $request['Rollno'];
        $educationID        = $request['educationID'];


        $submit = DB::update("EXEC sp_UpdateStudentEducations

        @ID                 ='$educationID',
        @Degree             ='$examination',
        @InstitutionName    ='$InstitutionName',
        @DateStarted        ='$DateStarted',
        @DateEnd            ='$DateEnd',
        @ObtainedMarks      ='$ObtainedMarks',
        @TotalMarks         ='$TotalMarks',
        @RollNo             ='$Rollno'
        ;");
    }
    public function updateStudentTable($request, $Date_of_birth, $state, $Country, $file, $stdImage)
    {

        $submit = DB::update("EXEC sp_UpdateStudentDetails
        @Std_ID             ='$request->Student_ID',
        @Std_FName          ='$request->Std_FName',
        @Std_LName          ='$request->Std_LName',
        @Password           ='$request->Password',
        @ClassSection       ='$request->ClassSection',
        @CNIC               ='$request->CNIC',
        @Nationality        ='$request->Nationality',
        @Gender             ='$request->Gender',
        @Email              ='$request->Email',
        @FatherName         ='$request->FatherName',
        @FatherCNIC         ='$request->FatherCNIC',
        @GuardianName       ='$request->GuardianName',
        @GuardianCNIC       ='$request->GuardianCNIC',
        @StdPhone           ='$request->StdPhone',
        @FatherPhone        ='$request->FatherPhone',
        @GuardianPhone      ='$request->GuardianPhone',
        @ParentOccupation   ='$request->ParentOccupation',
        @Address            ='$request->Address',
        @Tehsil             ='$request->Tehsil',
        @City               ='$request->City',
        @Degree_ID          ='$request->Degree_ID',
        @CurrentSemester    ='$request->CurrentSemester',
        @Status             ='$request->Status',
        @AddmissionSession  ='$request->AdmissionSession',
        @BloodGroup         ='$request->BloodGroup',
        @FatherEmail        ='$request->FatherEmail',
        @Category           =      '$request->Category',
        @DOB                ='$Date_of_birth',
        @Province           ='$state',
        @Country            ='$Country',  
        @Files              ='$file',
        @Image              ='$stdImage'
        ;");
    }


    public function updateStudentAdmission(Request $request)
    {

        // DB::beginTransaction();

        // try {
        $request['Reg_ID'] = $this->storeRegistrationInDbReturnId($request);

        if ($request->country) {
            $Country            =  $request->country;
        } else {
            $Country           =   $request->country_pre;
        }
        if ($request->state) {
            $state              =  $request->state;
        } else {
            $state             =   $request->Province_pre;
        }
        if ($request->DOB) {
            $Date_of_birth      =  $request->DOB;
        } else {
            $Date_of_birth     =   $request->DOB_pre;
        }
        if ($request->stdfile) {
            $file               = time() . "_studentfileupdate." . $request->file('stdfile')->getClientOriginalExtension();
            $request->file('stdfile')->storeAs('studentsFiles', $file);
        } else {
            $file              =   $request->stdfile_pre;
        }
        if ($request->Image) {
            $stdImage           = time() . "_studentImageupdate." . $request->file('Image')->getClientOriginalExtension();
            $request->file('Image')->storeAs('studentsImages', $stdImage);
        } else {
            $stdImage          =   $request->image_pre;
        }

        if ($request->Status == 'Admitted') {
            $applicantid = Student::where(['ID' => $request->Student_ID])->first();
            if ($applicantid->StdRollNo == null) {
                DB::update("EXEC sp_RollNoAssign @App_ID='$applicantid->ApplicantID' ;");
            }
        }
        if ($request->Status == 'In Progress') {
            $this->createProgressChallan($request);
        }
        $this->updateStudentTable($request, $Date_of_birth, $state, $Country, $file, $stdImage);
        if (!empty($request->examination)) {

            for ($i = 0; $i < sizeof($request->examination); $i++) {

                $data['examination']      = $request->examination[$i];
                $data['InstitutionName']  = $request->InstitutionName[$i];
                $data['DateStarted']      = $request->DateStarted[$i];
                $data['DateEnd']          = $request->DateEnd[$i];
                $data['ObtainedMarks']    = $request->ObtainedMarks[$i];
                $data['TotalMarks']       = $request->TotalMarks[$i];
                $data['Rollno']           = $request->Rollno[$i];
                $data['educationID']      = $request->educationID[$i];

                $this->updateEducation($data);
            }
        }

        if ($request->Status == 'Completed') {
            $challanStatus = $this->createFeeChallan($request);
            if ($challanStatus == "error") {
                return redirect()->back()->with(['errorToaster' => 'Failed Degree Batch Not Found!', 'title' => 'Add Or Set Degree Batches']);
            } elseif ($challanStatus == "error1") {
                return redirect()->back()->with(['errorToaster' => 'Failed Semeter Detail Not found!', 'title' => 'Set Semester Detail to Create Challan']);
            }
            $enrollment = $this->enrollStudentCourses($request);
            if ($enrollment == 'Degree Batch Not Found!') {
                return redirect()->back()->with(['errorToaster'   => 'Degree Batch Not Found!', 'title' => 'Enrollment Failled Please Add Degree Batch']);
            } elseif ($enrollment == 'Degree SemesterCourse Not Found!') {
                return redirect()->back()->with(['errorToaster'   => 'Degree SemesterCourse Not Found!', 'title' => 'Enrollment Failled Please Add Degree SemesterCourse']);
            }
        }

        // DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     throw $e;
        // }


        return redirect()->back()->with(['successToaster' => 'Student Admission Added!', 'title' => 'Success']);
    }

    public function createFeeChallan($request)
    {


        $challan = new ChallanController();
        $batch_id = Semester::where('SemSession', $request->AdmissionSession)->first()->ID;
        $degreeBatch = DegreeBatche::where(['Degree_ID' => $request->Degree_ID, 'Batch_ID' => $batch_id]);
        if ($degreeBatch->exists() == true) {
            $degreeBatch = $degreeBatch->first()->ID;
        } else {
            return "error";
        }

        $semesterDetail = SemesterDetail::where(['DegBatches_ID' => $degreeBatch, 'Sem_ID' => $batch_id]);
        if ($semesterDetail->exists() == true) {
            $semesterDetail = $semesterDetail->first();
        } else {
            return "error1";
        }

        //dd($semesterDetail);
        $amount =
            $semesterDetail->SemesterFee +
            $semesterDetail->Tuition_Fee +
            $semesterDetail->Magazine_Fee +
            $semesterDetail->Exam_Fee +
            $semesterDetail->Society_Fee +
            $semesterDetail->Misc_Fee +
            $semesterDetail->Registration_Fee +
            $semesterDetail->Practical_charges +
            $semesterDetail->Sports_Fund;

        $registrationId = $this->storeRegistrationInDbReturnId($request);

        $oldChallan = Challan::where('Reg_ID', $registrationId)->orderBy('ID', 'desc')->first()->Amount;

        if ($oldChallan != $amount) {
            $challancreated = $challan->createChallan(
                $amount,
                $Type = "Registration",
                $registrationId,
                $batch_id,
                $std_sch_amount = 0,
                $std_sch_type = 0
            );
            $challan->createChallanDetail(

                $challancreated->ID,
                // $SemesterFee,
                $semesterDetail->Magazine_Fee,
                $semesterDetail->Exam_Fee,
                $semesterDetail->Society_Fee,
                $semesterDetail->Misc_Fee,
                $semesterDetail->Registration_Fee,
                $semesterDetail->Practical_charges,
                $semesterDetail->Sports_Fund,
                // $FeeType,
                $semesterDetail->Tuition_Fee,
                $semesterDetail->SemesterFee
            );
        }
    }

    public function createProgressChallan($request)
    {


        $challan = new ChallanController();
        $Sem_ID = Semester::where('SemSession', $request->AdmissionSession)->first()->ID;
        if (!empty($request->Student_ID)) {
            $registrationId = Registration::where('Std_ID', $request->Student_ID)->first()->ID;
        } else {
            $student = Student::where(['CNIC' => $request->CNIC, 'FatherCNIC' => $request->FatherCNIC])->first();
            $std_id = $student->ID;
            $registrationId = Registration::where('Std_ID', $std_id)->first()->ID;
        }
        $amount = 1500;

        $oldChallan = Challan::where(['Reg_ID' => $registrationId, 'Amount' => $amount]);
        if (empty($oldChallan->exists())) {
            $challancreated = $challan->createChallan(
                $amount,
                $Type = "Registration",
                $registrationId,
                $Sem_ID,
                0,
                0
            );

            $challan->createChallanDetail(
                $challancreated->ID,
                $Magazine_Fee       = 0,
                $Exam_Fee           = 0,
                $Society_Fee        = 0,
                $Misc_Fee           = 0,
                $Registration_Fee   = 0,
                $Practical_charges  = 0,
                $Sports_Fund        = 0,
                $Tuition_Fee        = 0,
                $Semester_Fee       = 0

            );
        }
    }
    // public function storeRegistrationInD($Std_ID , $AcaStdID , $Sem_ID){

    //     $submit = DB::statement("EXEC sp_InsertRegistrations
    //         @Std_ID         = '$Std_ID',
    //         @AcaStdID       = '$AcaStdID',
    //         @Sem_ID         = '$Sem_ID'
    //         ;");

    // }

    public function enrollStudentCourses($request)
    {

        $student            = Student::where('ID', $request->Student_ID)->first();
        $DegreeBatche       = DegreeBatche::where(['Degree_ID' => $student->Degree_ID, 'Batch_ID' => $student->batch->ID])->first();
        $Reg_ID             = $this->storeRegistrationInDbReturnId($request);
        if (empty($DegreeBatche)) {
            return 'Degree Batch Not Found!';
        }
        $DegsemesterCourses    = DegreeSemCourse::where(['DegBatches_ID' => $DegreeBatche->ID, 'Section' => $student->ClassSection])->get();

        if ($DegsemesterCourses->isEmpty()) {
            return 'Degree SemesterCourse Not Found!';
        }




        foreach ($DegsemesterCourses as $DegsemesterCourse) {
            //dd($DegsemesterCourses);

            $old_Enrollment = Enrollment::where([
                'Std_ID'        => $request->Student_ID,
                'SemCourses_ID' => $DegsemesterCourse->semesterCourse->ID,
                'Is_i_mid'      => 10,
                'Is_i_final'    => 10,
                'Reg_ID'        => $Reg_ID
            ]);
            $old_Enrollment = $this->oldEnrollment($request, $DegsemesterCourse->semesterCourse->ID, $Is_i_mid = 10, $Is_i_final = 10, $Reg_ID);
            if ($old_Enrollment->exists() != true) {

                $enrollment         = new EnrollmentsController();
                $storeEnrollment    = $enrollment->storeEnrollmentsInD(
                    $request->Student_ID,
                    $DegsemesterCourse->semesterCourse->ID,
                    $Is_i_mid           = 10,
                    $Is_i_final         = 10,
                    $Reg_ID             = $Reg_ID
                );
                $id = $this->oldEnrollment($request, $DegsemesterCourse->semesterCourse->ID, $Is_i_mid = 10, $Is_i_final = 10, $Reg_ID)->first()->ID;
                $ConfirmEnrollment = DB::statement("EXEC sp_UpdateEnrollment
                     @ID         = '$id'
                 ;");
            }
        }
    }

    public function oldEnrollment($request, $semesterCourse_ID, $Is_i_mid, $Is_i_final, $Reg_ID)
    {

        return  Enrollment::where('Std_ID', $request->Student_ID)
            ->where('Reg_ID', $Reg_ID)->where('SemCourses_ID', $semesterCourse_ID)->orderBy('ID', 'desc');
    }

    public function logingetStudentAdmission()
    {
        $route  = '/logingetStudentAdmission';

        return view('Admissions.loginGetAdmission');
    }
   public function logingetStudentAdmissiondata(Request $request){
   

    if(empty($request->input('CNIC'))){
           return redirect()->back()->with(['message' => 'CNIC Required']);
        }

    
        return redirect()->route('get.StudentAdmissions')->withInput();
    
}



    protected function getStudentAdmission(Request $request){

        if(empty($request->old('CNIC'))){
            return redirect()->route('login.StudentAdmissions');
        }
        $studentRecord = Student::where('CNIC', $request->CNIC)->first();

        $degree = Degree::select('ID', 'DegreeName')->distinct()->get();

        $admissionsession = Semester::where('Year', '=', date('Y'))->get();
        $button = "Get Admission";
        $title  = 'LAHORE GARRISON UNIVERSITY ADMISSION FORM';
        $route  = '/storegettudentAdmission';

        if($studentRecord->Status == 'In Progress'){
            $button = 'Update Student Info';
            $title  = 'Edit Student Info';
            $route  = '/updateStudentAdmission';
             return
            view(
                'Admissions.editStudentAdmission',
                compact(
                    'degree',
                    'button',
                    'title',
                    'route',
                    'admissionsession'
                )
            );
        }
        return
            view(
                'Admissions.getAdmission',
                compact(
                    'degree',
                    'button',
                    'title',
                    'route',
                    'admissionsession'
                )
            );
    }

    public function storegetStudentAdmission(Request $request)
    {

        // dd($request);

        $validator = $this->validation($request);
        DB::beginTransaction();

        try {
            $this->createStudentDetail($request);
            $this->createStudentQualification($request);
            $this->storeRegistrationInDbReturnId($request);
            if ($request->Status == 'In Progress') {
                $this->createProgressChallan($request);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        // return redirect()->back()->with(['successToaster' => 'Admission Added!', 'title' => 'Success']);

        //}
    }
}
