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
use App\Http\Controllers\ChallanController;

use App\Models\Exam_AcademicStandingRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;

class EnrollmentsController extends Controller
{
   

    public function getSessionData(){

        return session::all();
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
        $session            = $this->getSessionData();    
        $request['Std_ID']  = $session['std_ID'];
        $DegreeBatche       = DegreeBatche::where(['Degree_ID' => $session['degree_ID'] , 'Batch_ID' => $session['sem_ID']])->first();
        $acdRule            = $this->getAcdRule($request['Std_ID']);
        $getTotalCreditHours= $this->getTotalCreditHours($request);
        $semesterCourses    = SemesterCourse::where(['DegBatches_ID' => $DegreeBatche->ID , 'Sem_ID' => $session['sem_ID']])->get();
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
            $registration   = $registration->first();
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
        
        $enrollments            = Enrollment::where('Std_ID' , $request['Std_ID'])->get();
        foreach($enrollments as $enrollment){
            $crHrsAllowed       = explode("-", $enrollment->semesterCourse->course->CreditHours ?? 0);
            $totalCreditHours[] = end($crHrsAllowed);
        }
        if(!empty($totalCreditHours)){
            return array_sum($totalCreditHours);   
        }else{
            return 0;
        }
        
    }

    public function executeEnrollment($id){
        $session           = $this->getSessionData();
        $drop              = explode('-' , $id);
        if(empty($drop[1])){
            $type = false;
        }else{
            $type = true;
            $id   =  $drop[0];
        }
        $course = explode('-' , SemesterCourse::where('ID' , $id)->first()->course->CreditHours
         );

        $courseCrediHr              = end($course);
        $request['Std_ID']          = $session['std_ID'];
        $acdRule                    = $this->getAcdRule($request['Std_ID']);
        $getTotalCreditHoursInDb    = $this->getTotalCreditHours($request);
        $getTotalCreditHours        = $getTotalCreditHoursInDb + $courseCrediHr;
        if($acdRule['enrollmentAllowed'] == true 
                                    &&
        $getTotalCreditHoursInDb    <= $acdRule['creditHoursAllowed'] 
                                    && 
        $getTotalCreditHours        <= $acdRule['creditHoursAllowed']
                                    &&
        $type == false
        ){
            $this->storeEnrollment($id);
            return redirect()->back()->with(['successToaster' => 'Course Added' , 'title' => 'Success']);
        }elseif($type != false){
            $this->storeEnrollment($id);
            return redirect()->back()->with(['errorToaster'   => 'Course Dropped' , 'title' => 'Warning']);
        }
        else{
            return redirect()->back()->with('success1', 'Course Dropped');
        }
   

    }
     public function storeEnrollment($id){
        $session           = $this->getSessionData();   
        $request['Std_ID'] = $session['std_ID'];

        $SemesterCourse     = SemesterCourse::where('ID' , $id)->first();
        $Sem_ID             = $SemesterCourse->Sem_ID;
        

        $request['AcaStdID']        = 6;// if first time enrollment defualt is 6 
        $request['Sem_ID']          = $session['sem_ID'];
        $request['SemCourses_ID']   = $id;
        $request['Is_i_mid']        = 10;
        $request['Is_i_final']      = 10;

        $registration = Registration::where('Std_ID' , $request['Std_ID']);
        if (empty($registration->exists())){
           $this->storeRegistrationInD($request['Std_ID'] , $request['AcaStdID'] = 6 , $session['sem_ID']);
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
         
         $session           = $this->getSessionData();   
         $request['Std_ID'] = $session['std_ID'];
         $Std_ID            = $request['Std_ID'];
         $degreeName        = explode('/' , session::get('user'));
         $registration      = Registration::where('Std_ID' , $request['Std_ID'])->first();
             
         $Sem_ID = $registration->first()->Sem_ID;
          $DegreeBatche       = DegreeBatche::where(['Degree_ID' => $session['degree_ID'] , 'Batch_ID' => $session['sem_ID']])->first();
         $sem_details   = SemesterDetail::where(['Sem_ID' => $Sem_ID , 'DegBatches_ID' => $DegreeBatche->ID])->first() ?? '';
        
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
        if($sem_details->FeeType == 'Per Course'){
            $Amount     = $totalCreditHours * $fee;
        }else{
            $Amount     = $fee;
        }
        

         $Type           = "Registration";
         $challan        = new ChallanController();
         $challancreated = $challan->createChallan(
            $amount , 
            $Type, 
            $registrationId, 
            $Sem_ID
        );

        $challan->createChallanDetail(

        $challancreated->ID,
        // $SemesterFee,
        $sem_details->Magazine_Fee,
        $sem_details->Exam_Fee,
        $sem_details->Society_Fee,
        $sem_details->Misc_Fee,
        $sem_details->Registration_Fee,
        $sem_details->Practical_charges,
        $sem_details->Sports_Fund,
        // $FeeType,
        $sem_details->Tuition_Fee
    );
        
        

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

        $session           = $this->getSessionData();
        $request['Std_ID'] = $session['std_ID'];
        $enrollments       = Enrollment::where('Std_ID' , $request['Std_ID'])->pluck('ID')->toArray();
        foreach($enrollments as $id){
        $submit = DB::statement("EXEC sp_UpdateEnrollment
             @ID         = '$id'
            ;");
        }
        $this->createChallan();
        return redirect()->back()->with(['successToaster' => 'Enrollment Confirmed' , 'title' => 'Success']);
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

    public function allEnrollments(){

        $enrollments = Enrollment::paginate(10);
        $title  = 'All Enrollments';
        $route = 'updateEnrollment';
        $getEditRoute = 'editEnrollment';
        $modalTitle = 'Edit Enrollment';


        return
            view('Enrollments.allEnrollments' ,
               compact(
                  'enrollments' ,
                  'title',
                  'route',
                  'modalTitle',
                  'getEditRoute'
               ));
    }

 
}
