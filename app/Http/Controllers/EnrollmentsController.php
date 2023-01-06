<?php

namespace App\Http\Controllers;

use App\Models\SemesterCourse;
use App\Models\Enrollment;
use App\Models\Registration;
use App\Models\Challan;
use App\Models\Semester;
use App\Models\Degree;
use App\Models\DegreeBatche;
use App\Models\SemesterDetail;

use App\Models\Exam_AcademicStandingRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;

class EnrollmentsController extends Controller
{
    public function validation($request){

        $validator = Validator::make($request->all(),[
            'Std_ID'               => 'required|numeric',
            'SemCourses_ID'        => 'required|numeric',
            'Is_i_mid'             => 'required|numeric',
            'Is_i_final'           => 'required|numeric',
            'Reg_ID'               => 'required|numeric',
        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

   

    public function addEnrollment(){

        
        // $a = Enrollment::get();
        // foreach($a as $b){
        //     Enrollment::where('ID' , $b->ID)->delete();
        // }
        // $a = Challan::get();
        // foreach($a as $b){
        //     Challan::where('ID' , $b->ID)->delete();
        // }
        //  $a = Registration::get();
        // foreach($a as $b){
        //     Registration::where('ID' , $b->ID)->delete();
        // }
         
        // dd(1);
      
        //dd(session::all());
        $request['Std_ID']  = session::get('id');
        $user               = explode('/' , session::get('user'));
        
        $degree             = Degree::where('DegreeName' , $user[1])->first();
        $semesters          = Semester::where('SemSession' , $user[0])->first();
        $DegreeBatche       = DegreeBatche::where(['Degree_ID' => $degree->ID , 'Batch_ID' => $semesters->ID])->first();
        $acdRule            = $this->getAcdRule($request['Std_ID']);
        $getTotalCreditHours= $this->getTotalCreditHours($request);
        $semesterCourses    = SemesterCourse::where(['DegBatches_ID' => $DegreeBatche->ID , 'Sem_ID' => $semesters->ID])->get();
        $getEnrollment      = Enrollment::where(['Std_ID' => $request['Std_ID'] ]);
        $enrollmentsArray   = SemesterCourse::whereNotIn('ID' ,  $getEnrollment->pluck('SemCourses_ID')->toArray())->pluck('ID')->toArray();
         $enrollments       = $getEnrollment->get();

  
        $button = "Add Enrollment";
        $title  = 'Add Enrollment';
        $route  = '/storeEnrollments';
        return
        view('Enrollments.addEnrollment',
            compact(
                'button' ,
                'title' ,
                'route',
                'semesterCourses',
                'enrollments',
                'enrollmentsArray',
                'acdRule',
                'getTotalCreditHours'
            )
        );
    }

    public function getAcdRule($Std_ID){
        $registration       = Registration::where('Std_ID' , $Std_ID);
        if($registration->exists()){
            $registration = $registration->first();
             $data['enrollmentAllowed']     = $registration->acdRule->EnrollmentAllowed;
             $data['creditHoursAllowed']    = $registration->acdRule->CrHrsAllowed;
             $data['academic_Standing']     = $registration->acdRule->AcademicStanding;
             //$data['acdID'] = 
        }else{
            $registration = Exam_AcademicStandingRule::where('id' , 6)->first();
             $data['enrollmentAllowed']     = $registration->EnrollmentAllowed;
             $data['creditHoursAllowed']    = $registration->CrHrsAllowed;
             $data['academic_Standing']     = $registration->AcademicStanding;
        }
        if ($data['enrollmentAllowed'] == 1){
            $data['enrollmentAllowed'] = true;
        }else{
            $data['enrollmentAllowed'] = false;
        }
        return $data;

    }

    public function getTotalCreditHours($request){
        
        $enrollments = Enrollment::where('Std_ID' , $request['Std_ID'])->get();
        foreach($enrollments as $enrollment){
            $crHrsAllowed = explode("-", $enrollment->semesterCourse->course->CreditHours ?? 0);
            $totalCreditHours[] = end($crHrsAllowed);
        }
        if(!empty($totalCreditHours)){
            return array_sum($totalCreditHours);   
        }else{
            return 0;
        }
        
    }

    public function executeEnrollment($id){

        $drop  = explode('-' , $id);
        if(empty($drop[1])){
            $type = false;
        }else{
            $type = true;
            $id =  $drop[0];
        }
        $course = explode('-' , SemesterCourse::where('ID' , $id)->first()->course->CreditHours
         );

        $courseCrediHr = end($course);
        //dd($courseCrediHr);
        $request['Std_ID'] = session::get('id');
        $acdRule            = $this->getAcdRule($request['Std_ID']);
        $getTotalCreditHoursInDb= $this->getTotalCreditHours($request);
        $getTotalCreditHours = $getTotalCreditHoursInDb + $courseCrediHr;
       // dd($acdRule['enrollmentAllowed'] , $getTotalCreditHours , $acdRule['creditHoursAllowed']);
        if($acdRule['enrollmentAllowed'] == true 
                                    &&
        $getTotalCreditHoursInDb <= $acdRule['creditHoursAllowed'] 
                                    && 
        $getTotalCreditHours <= $acdRule['creditHoursAllowed']
                                    &&
        $type == false
        ){
            $this->storeEnrollment($id);
            return redirect()->route('add.Enrollment');
        }elseif($type != false){
            $this->storeEnrollment($id);
            return redirect()->route('add.Enrollment');
        }
        else{
            return redirect()->route('add.Enrollment');
        }
   

    }
     public function storeEnrollment($id){
        
        $request['Std_ID'] = session::get('id');

        $SemesterCourse = SemesterCourse::where('ID' , $id)->first();
        $Sem_ID = $SemesterCourse->Sem_ID;
        

        $request['AcaStdID']        = 6;// if first time enrollment defualt is 6 
        $request['Sem_ID']          = $Sem_ID;
        $request['SemCourses_ID']   = $id;
        $request['Is_i_mid']        = 10;
        $request['Is_i_final']      = 10;

        $registration = Registration::where('Std_ID' , $request['Std_ID']);
        if (empty($registration->exists())){
           $this->storeRegistrationInD($request['Std_ID'] , $request['AcaStdID'] = 6 , $request['Sem_ID']);
            $request['Reg_ID'] = (clone $registration)->first()->ID;
        }else{
            $request['Reg_ID'] = (clone $registration)->first()->ID;
        }
        $enrollment = Enrollment::where(['Std_ID' => $request['Std_ID'] , 'SemCourses_ID' => $id]);
        if (empty($enrollment->exists())){
            $this->storeEnrollmentsInD($request['Std_ID'] , $request['SemCourses_ID'] , $request['Is_i_mid'] , $request['Is_i_final'] , $request['Reg_ID']);           
        }else{
            $request['Enrollment_ID'] = $enrollment->first()->ID;
            $this->deleteEnrollmen($request['Enrollment_ID']);
            
        }

        $enrollments = Enrollment::where('Std_ID' , $request['Std_ID'])->get();
        return redirect()->route('add.Enrollment');

    }

    public function createChallan(){

         $request['Std_ID'] = session::get('id');
         $Std_ID            = $request['Std_ID'];
         $degreeName        = explode('/' , session::get('user'));
         $degree            = Degree::where('DegreeName' , $degreeName[1])->first();
         $registration      = Registration::where('Std_ID' , $request['Std_ID'])->first();
             
         $Sem_ID = $registration->first()->Sem_ID;
         $sem_details   = SemesterDetail::where(['Sem_ID' => $Sem_ID , 'Degree_ID' => $degree->ID])->first() ?? '';
         dd($degreeName[1] ,$degree);
         $registrationId = $registration->ID;
       
        $totalCreditHours = $this->getTotalCreditHours($request);
        if(empty($sem_details)){
            $fee = 0;
        }else{
            $fee = $sem_details->SemesterFee;
        }
        $IssueDate  = date('m/d/Y h:i:s a', time());
        $DueDate    = Date('m/d/Y', strtotime('+10 days'));
        $PaidDate   = "";
        $Status     = "Valid";
        $Fine       = 0;
        $Amount     = $totalCreditHours * $fee;
        $Type       = "Registration";
        
        

         // $submit = DB::statement("EXEC sp_InsertChallans
            
         //    @IssueDate             = '$IssueDate',
         //    @DueDate               = '$DueDate',
         //    @PaidDate              = '$PaidDate',
         //    @Status                = '$Status',
         //    @Fine                  = '$Fine',
         //    @Amount                = '$Amount',
         //    @Type                  = '$Type',
         //    @Reg_ID                = '$registrationId',
         //    @Sem_ID                = '$Sem_ID'
         //    ;");
    }



    public function storeRegistrationInD($Std_ID , $AcaStdID , $Sem_ID){

        $submit = DB::statement("EXEC sp_InsertRegistrations
            @Std_ID         = '$Std_ID',
            @AcaStdID       = '$AcaStdID',
            @Sem_ID         = '$Sem_ID'
            ;");

    }
    public function storeEnrollmentsInD($Std_ID , $SemCourses_ID , $Is_i_mid , $Is_i_final , $Reg_ID){

        $submit = DB::statement("EXEC sp_InsertEnrollment
            @Std_ID         = '$Std_ID',
            @SemCourses_ID  = '$SemCourses_ID',
            @Is_i_mid       = '$Is_i_mid',
            @Is_i_final     = '$Is_i_final',
            @Reg_ID         = '$Reg_ID'

            ;");

    }

     public function deleteEnrollmen($Enrollment_ID){

        $submit = DB::statement("EXEC sp_DeleteEnrollment
            @ID         = '$Enrollment_ID'
            ;");

    }
    public function confirmEnrollment(){
        $request['Std_ID'] = session::get('id');
        $enrollments = Enrollment::where('Std_ID' , session::get('id'))->pluck('ID')->toArray();
        foreach($enrollments as $id){
        $submit = DB::statement("EXEC sp_UpdateEnrollment
             @ID         = '$id'
            ;");
        }
        $this->createChallan();
        return redirect()->route('add.Enrollment');
    }

     public function addEnrollments(){


        $semesterCourses = SemesterCourse::get();
        $enrollments = 
        Enrollment::where(['Std_ID' => 1 ])->whereIn('SemCourses_ID' , SemesterCourse::pluck('id')->toArray())->pluck('SemCourses_ID')->toArray();
        $button = "Add Enrollment";
        $title  = 'Add Enrollment';
        $route  = '/storeEnrollments';
        return
        view('Enrollments.addEnrollments',
            compact(
                'button' ,
                'title' ,
                'route',
                'semesterCourses',
                'enrollments'
            )
        );
    }

  // public function storeEnrollments(Request $request){
        
  //        $request['Std_ID'] = 1;
  //        $enrollments = Enrollment::where('Std_ID' , $request['Std_ID']);
  //       if($request->listvalues != "false"){  
  //           $SemCourses_ID = $request->listvalues;
  //       }else{
            
  //           if(empty($enrollments->exists())){
  //               $db = false;
  //                return
  //                   response()->json([
  //                   'db' => 'empty' ,
  //                   ]);
  //           }else{
  //               $db = true;
  //               $enrollments = $enrollments->get();
  //           }
  //           return
  //           view('Enrollments.submitedEnrollment' , compact('enrollments'));
  //       }

  //       $SemesterCourse = SemesterCourse::where('ID' , $SemCourses_ID)->first();
  //       $Sem_ID = $SemesterCourse->Sem_ID;
        

  //       $request['AcaStdID']        = 1;
  //       $request['Sem_ID']          = $Sem_ID;
  //       $request['SemCourses_ID']   = $SemCourses_ID;
  //       $request['Is_i_mid']        = 10;
  //       $request['Is_i_final']      = 10;

  //       $registration = Registration::where('Std_ID' , $request['Std_ID']);
  //       if (empty($registration->exists())){
  //           $this->storeRegistrationInDb($request);
  //           $request['Reg_ID'] = (clone $registration)->first()->ID;
  //       }else{
  //           $request['Reg_ID'] = (clone $registration)->first()->ID;
  //       }
  //       $enrollment = Enrollment::where(['Std_ID' => $request['Std_ID'] , 'SemCourses_ID' => $SemCourses_ID]);
  //       if (empty($enrollment->exists())){
  //           $this->storeEnrollmentsInDb($request);           
  //       }else{
  //           $request['Enrollment_ID'] = $enrollment->first()->ID;
  //           $this->deleteEnrollment($request);
  //       }

  //        if(empty($enrollments->exists())){
  //               $db = false;
  //                return
  //                   response()->json([
  //                   'db' => 'empty' ,
  //                   ]);
  //           }else{
  //               $db = true;
  //               $enrollments = $enrollments->get();
  //           }

  //       return
  //       view('Enrollments.submitedEnrollment' , compact('enrollments'));

  //   }


  //   public function deleteEnrollment($request){
  //       $submit = DB::statement("EXEC sp_DeleteEnrollment
  //           @ID         = '$request->Enrollment_ID'
  //           ;");

  //   }
  //   public function storeRegistrationInDb($request){

  //       $submit = DB::statement("EXEC sp_InsertRegistrations
  //           @Std_ID         = '$request->Std_ID',
  //           @AcaStdID       = '$request->AcaStdID',
  //           @Sem_ID         = '$request->Sem_ID'
  //           ;");

  //   }
  //   public function storeEnrollmentsInDb($request){

  //       $submit = DB::statement("EXEC sp_InsertEnrollment
  //           @Std_ID         = '$request->Std_ID',
  //           @SemCourses_ID  = '$request->SemCourses_ID',
  //           @Is_i_mid       = '$request->Is_i_mid' ,
  //           @Is_i_final     = '$request->Is_i_final',
  //           @Reg_ID         = '$request->Reg_ID'

  //           ;");

  //   }

  //   public function editEnrollment($id){

  //       $button = 'Update Enrollment';
  //       $title  = 'Edit Enrollment';
  //       $route  = '/updateEnrollment';
  //       $courses = Enrollment::where('ID' , $id)->first();
  //        return
  //        view('Enrollments.editEnrollment',
  //           compact(
  //               'courses',
  //               'button' ,
  //               'title' ,
  //               'route'
  //           ));
  //   }
  //   public function allEnrollments(){

  //       $courses = Enrollment::paginate(10);
  //       $title  = 'All Enrollments';
  //       $route = 'updateEnrollment';
  //       $getEditRoute = 'editEnrollment';
  //       $modalTitle = 'Edit Enrollment';

  //       return
  //       view('Enrollments.allEnrollments' ,
  //           compact(
  //               'courses' ,
  //               'title' ,
  //               'modalTitle' ,
  //               'route',
  //               'getEditRoute'
  //           ));
  //   }

  //   public function updateEnrollment(Request $request){

  //        $validator = $this->validation($request);
  //       if ($validator['error'] == true) {
  //           return
  //           response()->json([
  //           'title' => 'Failed' ,
  //           'type'=> 'error',
  //           'message'=> ''.$validator['validation']
  //           ]);
  //       }else {
  //             $submit = DB::update("EXEC sp_UpdateEnrollment

  //           @ID              = '$request->id',
  //           @Std_ID          = '$request->Std_ID',
  //           @SemCourses_ID   = '$request->SemCourses_ID',
  //           @Is_i_mid        = '$request->Is_i_mid' ,
  //           @Is_i_final      = '$request->Is_i_final',
  //           @Reg_ID          = '$request->Reg_ID'
  //           ;");

  //       return response()->json([
  //           'title' => 'Done' ,
  //           'type'=> 'success',
  //           'message'=> 'Enrollment Updated!
  //           ']);
  //       }


  //   }
}
