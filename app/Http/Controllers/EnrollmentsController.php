<?php

namespace App\Http\Controllers;

use App\Models\SemesterCourse;
use App\Models\Enrollment;
use App\Models\Registration;
use App\Models\Challan;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Degree;
use App\Models\DegreeBatche;
use App\Models\SemesterDetail;
use App\Models\DegreeSemCourse;
use App\Http\Controllers\ChallanController;

use App\Models\Exam_AcademicStandingRule;
use App\Models\StdScholarShip;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;

class EnrollmentsController extends Controller
{
   

    public function getSessionData(){

        return session::all();
    }

   /*  Step 1 Set Semester = currentsemesetre = 1
    Step 2 Set DegreeBatch example student u want to enroll check his degree select from degreebach as degree and set semester you make currentsemesetre
    Step 3 Set SemesterCourse use step 1 semester iD select course
    Step 4 Set DegreeSemCourse example student u want to enroll use step 2 DegreeBatch ID select semesterCourse Step 3 ID And Select Student Section
    */

    public function addEnrollment(){

        $session            = $this->getSessionData();    
        $request['Std_ID']  = $session['std_ID'];
        $student = Student::where('ID' , $session['std_ID'])->first();

        $semester = Semester::where('CurrentSemester' , 1)->first('ID');
        // dd($semester);

        if($semester->exists() != true){
            return redirect()->back()->with(['errorToaster'   => 'No Semester Is Active for Enrollment!' , 'title' => 'Plese Ask Admin to Active Semester first']);
        }
        // $semester = $semester->first();
        //$semesterCourse     = SemesterCourse::where('Sem_ID' , $semester->ID)->pluck('ID')->toArray();
        $DegreeBatche       = DegreeBatche::where(['Degree_ID' => $student->Degree_ID , 'Batch_ID' => $semester->ID])->first();
        if(empty($DegreeBatche)){
            return redirect()->back()->with(['errorToaster'   => 'Degree Batch Not Found!' , 'title' => 'Warning']);
        }
        $acdRule            = $this->getAcdRule($request['Std_ID']);
        $getTotalCreditHours= $this->getTotalCreditHours($request);
        // $DegsemesterCourses    = DegreeSemCourse::where(['DegBatches_ID' => $DegreeBatche->ID , 'Section' => $student->ClassSection])->get();
        
        $DegsemesterCourses = DegreeSemCourse::join('SemesterCourses' , 'SemesterCourses.ID' , 'DegreeSemCourses.SemCourse_ID')
            ->join('Courses' , 'courses.id' , 'SemesterCourses.Course_ID')
            ->where(['DegBatches_ID' => $DegreeBatche->ID , 'Section' => $student->ClassSection , 'Sem_ID' => $semester->ID])
            ->select(
                'DegreeSemCourses.ID',
                'DegBatches_ID',
                'SemCourse_ID',
                'Section',
                'Emp_ID',
                'Sem_ID',
                'CampusLimit',
                'Course_ID',
                'CourseCode',
                'CourseName',
                'CreditHours',
                'LectureType'
            )
            ->get();
        if(empty($DegsemesterCourses)){
            return redirect()->back()->with(['errorToaster'   => 'Course Not Found!' , 'title' => 'Warning']);
        }
        $getEnrollment      = Enrollment::where(['Std_ID' => $request['Std_ID'] ]);
        //dd($semesterCourse , $getEnrollment->get());
        $enrollmentsArray   = SemesterCourse::whereNotIn('ID' ,  $getEnrollment->pluck('SemCourses_ID')->toArray())->where('Sem_ID' , $semester->ID)->pluck('ID')->toArray();
       // dd($enrollmentsArray  , $acdRule['enrollmentAllowed'] , $getTotalCreditHours , $acdRule['creditHoursAllowed'] );
         $enrollments       = $getEnrollment->join('semesterCourses', 'Enrollments.SemCourses_ID', '=', 'semesterCourses.ID')
                            ->where('semesterCourses.Sem_ID', $semester->ID)
                            ->select('Enrollments.ID',
                                    'Std_ID',
                                    'SemCourses_ID',
                                    'Is_i_mid',
                                    'Is_i_final',
                                    'Reg_ID',
                                    'Status',
                                    'Sem_ID',
                                    'CampusLimit',
                                    'Course_ID')
                                    ->get();
        // dd($enrollments);
        $button = "Add Enrollment";
        $title  = 'Add Enrollment';
        $route  = '/storeEnrollments';
        return
        view('Enrollments.addEnrollment',
            compact(
                'button' ,
                'title' ,
                'route',
                'DegsemesterCourses',
                'enrollments',
                'enrollmentsArray',
                'acdRule',
                'getTotalCreditHours',
                'semester'
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

        $semester = Semester::where('CurrentSemester' , true)->latest('ID')->first();
        
        $enrollments            = Enrollment::where('Std_ID' , $request['Std_ID'])
        ->join('semesterCourses', 'Enrollments.SemCourses_ID', '=', 'semesterCourses.ID')
        ->where('semesterCourses.Sem_ID', $semester->ID)
        ->select('Enrollments.ID',
                'Std_ID',
                'SemCourses_ID',
                'Is_i_mid',
                'Is_i_final',
                'Reg_ID',
                'Status',
                'Sem_ID',
                'CampusLimit',
                'Course_ID')
        ->get();
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
         $std_sch_details   = StdScholarShip::where('Std_ID' , $request['Std_ID'])->first();
         $Sem_ID            = $registration->Sem_ID;
          $DegreeBatche     = DegreeBatche::where(['Degree_ID' => $session['degree_ID'] , 'Batch_ID' => $session['sem_ID']])->first();
         $sem_details       = SemesterDetail::where(['Sem_ID' => $Sem_ID , 'DegBatches_ID' => $DegreeBatche->ID])->first();
 //         dd($Sem_ID ,
 // $DegreeBatche->ID);
         if(empty($sem_details)){
            return 'error';
         }
        $registrationId     = $registration->ID;
       
        $totalCreditHours   = $this->getTotalCreditHours($request);
        if(empty($sem_details)){
            $Tuition_Fee    = 0;
        }else{
            $Tuition_Fee    = $sem_details->Tuition_Fee;
        }
        $IssueDate  = date('m/d/Y h:i:s a', time());
        $DueDate    = Date('m/d/Y', strtotime('+10 days'));
        $PaidDate   = "";
        $Status     = "Valid";
        $Fine       = 0;  
        
        if($sem_details->FeeType === 'Per Course'){
            $amount     = $totalCreditHours * $Tuition_Fee;
        }else{
            $amount     = $Tuition_Fee;
        }
        if(!empty($std_sch_details)){
            if($std_sch_details['Scholarship_Type']==='Percentage'){
                $std_sch_amount=($std_sch_details['Percentage']/100)*$sem_details->Tuition_Fee ?? 0;
            }
            if($std_sch_details['Scholarship_Type']==='Fixed'){
                $std_sch_amount=$std_sch_details['Percentage'] ?? 0;
            }
        }
        else{
            $std_sch_amount=0;
        }
        $tAmount =  $amount 
        +
        $sem_details->Magazine_Fee
        +
        $sem_details->Exam_Fee
        +
        $sem_details->Society_Fee
        +
        $sem_details->Misc_Fee
        +
        $sem_details->Registration_Fee
        +
        $sem_details->Practical_charges
        +
        $sem_details->Sports_Fund;
        
  
        $std_sch_type=$std_sch_details['Scholarship_Type'] ?? '';

         $Type           = "Registration";
         $challan        = new ChallanController();
         $challancreated = $challan->createChallan(
            $tAmount , 
            $Type, 
            $registrationId, 
            $Sem_ID,
            $std_sch_amount ?? 0,
            $std_sch_type
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
        $amount,
        $sem_details->SemesterFee
    );
         return 'Success';
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
        $type = $this->createChallan();

        if($type == "error"){
            return redirect()->back()->with(['errorToaster' => 'Conformation Faild Semester deatils not found !' , 'title' => 'Error']);
        }
        foreach($enrollments as $id){
        $submit = DB::statement("EXEC sp_UpdateEnrollment
             @ID         = '$id'
            ;");
        }
        return redirect()->back()->with(['successToaster' => 'Enrollment Confirmed' , 'title' => 'Success']);
    }

    

   

 
}
