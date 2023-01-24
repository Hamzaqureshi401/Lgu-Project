<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Student;
use App\Models\Degree;
use App\Models\Semester;

use App\Models\StudentEducation;


class AdmissionController extends Controller
{

     public function validation($request){

        $this->validate($request, [

            'Password'          => 'required|max:12',
            'Std_FName'         => 'required|string|max:20',
            'Std_LName'         => 'required|string|max:15',
            'ClassSection'      => 'required|string||max:1',
            'CNIC'              => 'required|max:15|unique:Students',
            'Nationality'       => 'required|string',
            'DOB'               => 'required|Date',
            'Gender'            => 'required|string',
            'Email'             => 'required|Email|max:25',
            'FatherName'        => 'required|string|max:25',
            'FatherCNIC'        => 'required|string|max:15',
            'GuardianName'      => 'string|max:25',
            'GuardianCNIC'      => 'max:15|max:15',
            'StdPhone'          => 'required|max:12',
            'FatherPhone'       => 'required|max:12',
            'GuardianPhone'     => 'max:12',
            'ParentOccupation'  => 'required|max:30',
            'Address'           => 'required',
            'Tehsil'            => 'required',
            'City'              => 'required|max:20',
            'state'             => 'required',
            'country'           => 'required',
            'Degree_ID'         => 'required|integer',
            'CurrentSemester'   => 'required|max:1',
            'Status'            => 'required',
            'AdmissionSession'  => 'required|max:15',
            'BloodGroup'        => 'required|string',
            'FatherEmail'       => 'required|Email|max:25',
            'Image'             => 'required|mimes:jpeg,png,jpg|max:2048',
            'stdfile'           => 'required|mimes:jpeg,png,jpg,pdf|max:3072'

        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function addStudentAdmission(){

        $degree = Degree::select('ID', 'DegreeName')->distinct()->get();

        $admissionsession = Semester::where('Year','=', date('Y'))->get();



        $button = "Add Student Admission";
        $title  = 'Add Student Admissions';
        $route  = '/storeStudentAdmission';
        return
            view('Admissions.addStudentAdmission',
                compact(
                    'degree',
                    'button',
                    'title',
                    'route',
                    'admissionsession'
                ));
    }

    protected function createStudentDetail($request){



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
         @Files              =      '$stdfilename',
         @Image              =      '$stdImagename';");
        return $submit;
    }

    protected function createStudentQualification($request){
        dd($request);

        $student = Student::where(['CNIC' => $request->CNIC , 'FatherCNIC' => $request->FatherCNIC])->first();

        $std_id = $student->ID;

        // dd($std_id,$request->all(),$student);

         //-----------------QUALIFICATION------------
        $matric_examination     = $request->matric_examination;
        $matric_board           = $request->matric_board;
        $matric_passing_year    = $request->matric_passing_year;
        $matric_rollno          = $request->matric_rollno;
        $matric_total_marks     = $request->matric_total_marks;
        $matric_marks_obtained  = $request->matric_marks_obtained;
        $matric_percentage      = $request->matric_percentage;
        $matric_appeared        = $request->matric_appeared;


        $fsc_examination        = $request->fsc_examination;
        $fsc_board              = $request->fsc_board;
        $fsc_passing_year       = $request->fsc_passing_year;
        $fsc_rollno             = $request->fsc_rollno;
        $fsc_total_marks        = $request->fsc_total_marks;
        $fsc_marks_obtained     = $request->fsc_marks_obtained;
        $fsc_percentage         = $request->fsc_percentage;
        $fsc_appeared           = $request->fsc_appeared;


        $becholars_examination  = $request->becholars_examination;
        $becholars_board        = $request->becholars_board;
        $becholars_passing_year = $request->becholars_passing_year;
        $becholars_rollno       = $request->becholars_rollno;
        $becholars_total_marks  = $request->becholars_total_marks;
        $becholars_marks_obtained = $request->becholars_marks_obtained;
        $becholars_percentage   = $request->becholars_percentage;
        $becholars_appeared     = $request->becholars_appeared;

        $master_examination     = $request->master_examination;
        $master_board           = $request->master_board;
        $master_passing_year    = $request->master_passing_year;
        $master_rollno          = $request->master_rollno;
        $master_total_marks     = $request->master_total_marks;
        $master_marks_obtained  = $request->master_marks_obtained;
        $master_percentage      = $request->master_percentage;
        $master_appeared        = $request->master_appeared;


        $masters_examination    = $request->masters_examination;
        $masters_board          = $request->masters_board;
        $masters_passing_year   = $request->masters_passing_year;
        $masters_rollno         = $request->masters_rollno;
        $masters_total_marks    = $request->masters_total_marks;
        $masters_marks_obtained = $request->masters_marks_obtained;
        $masters_percentage     = $request->masters_percentage;
        $masters_appeared       = $request->masters_appeared;


        if (!empty($matric_examination) && !empty($matric_board)) {

            $this->addStudentExamination(
            $std_id,
            $matric_examination,
            $matric_appeared,
            $matric_board,
            $matric_passing_year,
            $matric_marks_obtained,
            $matric_total_marks,
            $matric_rollno
        );
        }


        if (!empty($fsc_examination) && !empty($fsc_board)) {

            $this->addStudentExamination(
            $std_id,
            $fsc_examination,
            $fsc_appeared,
            $fsc_board,
            $fsc_passing_year,
            $fsc_marks_obtained,
            $fsc_total_marks,
            $fsc_rollno
        );


        }

        if (!empty($becholars_examination) && !empty($becholars_board)) {

            $this->addStudentExamination(
            $std_id,
            $becholars_examination,
            $becholars_appeared,
            $becholars_board,
            $becholars_passing_year,
            $becholars_marks_obtained,
            $becholars_total_marks,
            $becholars_rollno
        );
        }


        if (!empty($master_examination) && !empty($master_examination)) {

            $this->addStudentExamination(
            $std_id,
            $master_examination,
            $master_appeared,
            $master_board,
            $master_passing_year,
            $master_marks_obtained,
            $master_total_marks,
            $master_rollno
        );
        }



        if (!empty($masters_examination) && !empty($masters_examination)) {

            $this->addStudentExamination(
            $std_id,
            $masters_examination,
            $masters_appeared,
            $masters_board,
            $masters_passing_year,
            $masters_marks_obtained,
            $masters_total_marks,
            $masters_rollno
        );
        }
    }


    public function storeStudentAdmission(Request $request){

        $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
            $this->createStudentDetail($request);
            $this->createStudentQualification($request);
         // return response()->json([
        //     'title' => 'Done' ,
        //     'type'=> 'success',
        //     'message'=> 'Admission Added!
        //     ']);
            return redirect()->back()->with(['successToaster' => 'Admission Added!' , 'title' => 'Success']);

        //}
    }

    public function addStudentExamination(

        $Std_ID,
        $Degree,
        $InstitutionName,
        $DateStarted,
        $DateEnd,
        $ObtainedMarks,
        $TotalMarks,
        $RollNo)
    {


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

     public function allStudentAdmissions(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';

        return
        view('Admissions.allStudentAdmissions' ,
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function editStudentAdmission($id){

        $degree = Degree::select('ID', 'DegreeName')->distinct()->get();
        $button = 'Update Student Info';
        $title  = 'Edit Student Info';
        $route  = '/updateStudentAdmission';
        $studentAdmission = Student::where('ID' , $id)->first();
        $degrees = Degree::get();
        $studentEducations = StudentEducation::where('Std_ID' , $id)->get();



        // dd($matric[0]['ID'],$matric[0]['Degree'],$matric[0]['InstitutionName']);


         return
         view('Admissions.editStudentAdmission',
            compact(
                'studentAdmission',
                'studentEducations',
                'degrees',
                'button' ,
                'title' ,
                'route',
                'degree'
               
            ));
    }

    public function updateEducation($request){

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
    public function updateStudentTable($request , $Date_of_birth ,$state ,$Country ,$file ,$stdImage){

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
        @DOB                ='$Date_of_birth',
        @Province           ='$state',
        @Country            ='$Country',  
        @Files              ='$file',
        @Image              ='$stdImage'
        ;");
    }


     public function updateStudentAdmission(Request $request){


        if($request->country || $request->state || $request->DOB || $request->stdfile || $request->Image)
        {
            $file               = time() . "_studentfileupdate." . $request->file('stdfile')->getClientOriginalExtension();
            $request->file('stdfile')->storeAs('studentsFiles', $file);
            $stdImage           = time() . "_studentImageupdate." . $request->file('Image')->getClientOriginalExtension();
            $request->file('Image')->storeAs('studentsImages', $stdImage);

            $Country            =  $request->country;
            $state              =  $request->state;
            $Date_of_birth      =  $request->DOB;
        }else{
             $Country           =   $request->country_pre;
             $state             =   $request->Province_pre;
             $Date_of_birth     =   $request->DOB_pre;
             $file              =   $request->stdfile_pre;
             $stdImage          =   $request->image_pre;
        }

        $this->updateStudentTable($request , $Date_of_birth ,$state ,$Country ,$file ,$stdImage);

        for ($i=0; $i < sizeof($request->examination) ; $i++) { 

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

        // $validator = $this->validation($request);


        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
            // $this->createStudentDetail($request);
            // $this->createStudentQualification($request);
        //   return response()->json([
        //     'title' => 'Done' ,
        //     'type'=> 'success',
        //     'message'=> 'Student Admission Updated!
        //     ']);
        // }
        return redirect()->back()->with(['successToaster' => 'Student Admission Added!' , 'title' => 'Success']);

    }


}
