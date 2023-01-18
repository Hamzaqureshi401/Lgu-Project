<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\SessionClass;
use App\Models\SemesterCourse;
use App\Models\TimeTable;
use App\Models\Attendance;
use App\Models\Course;
use Redirect;
use App\Models\Enrollment;
use App\Models\SemesterCourseWeightage;
use App\Models\SemesterCourseWeightageDetail;

use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{

     private $sessionData;

     public function __construct()
        {
            
                $this->sessionData = new SessionClass();
        }


     public function deanAttandence(){

        return view('Dean.MarkAttendance.deanAttandence');
    }
     public function deanAllStuAttandence(){

        $students = false;

        $title  = 'All Courses';
        $route = 'updateCourse';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';



        return view('Dean.StudentsAttendance.allStudentAttandence'  , 
            compact(
                'students' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'
            ));
    }

      public function empSemesterCourses(){

        
        
       $session =  $this->sessionData->getSessionData();

       //dd($session['Emp_session'] , $session);



       $semesterCourses = SemesterCourse::where('Emp_ID' , $session['ID'])->paginate(10);

        $title  = 'All Semester Courses';
        $route = 'updateSemesterCourse';
        $getEditRoute = 'empSemesterCoursesAttandence';
        $modalTitle = 'Go To Attandence';
        
       
        return 
        view('Attandences.empSemesterCourses' , 
            compact(
                'semesterCourses' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'  
            ));
    }

    public function semetserCourseAttandences($id){

        $semetserCourse = SemesterCourse::where('ID' , $id)->first();
         return 
        view('Attandences.semetserCourseAttandence' , compact('semetserCourse'));
    }

    public function claseesShedule($id){
         $session       =  $this->sessionData->getSessionData();
         $Sem_ID        =  SemesterCourse::where('ID' , $id)->first();
         $SemStartDate  = $Sem_ID->semester->SemStartDate;
         $SemEndDate    =   $Sem_ID->semester->SemEndDate;
         $timeTable     = TimeTable::where(['SemCourse_ID' => $id , 'Emp_ID' =>  $session['ID']])->first();
         $SemEndDate    = strtotime($SemEndDate);

        for($i = strtotime($timeTable->Day, strtotime($SemStartDate)); $i <= $SemEndDate; $i = strtotime('+1 week', $i)){
            $eachDays[] = date('l Y-m-d', $i);
        }
        $attandences     = Attendance::select('Date')->get();
        foreach ($attandences as $attandence){
            $dateArray[] = date('Y-m-d', strtotime($attandence->Date));
        }
       // dd($dateArray);
         return 
        view('Attandences.classesShedule' , compact('timeTable' , 'eachDays' , 'Sem_ID' , 'dateArray'));
    }


    public function studentAttandenceView($day , $id){

        $students = Enrollment::where(['SemCourses_ID' => $id])->get();
        $Sem_ID =  SemesterCourse::where('ID' , $id)->first();

       
        return view('Attandences.studentAttandenceView' , compact('Sem_ID' , 'students' , 'day' , 'semesterCourseWeightage'));
    }
    public function storeAttandences(Request $request){

        $session    =  $this->sessionData->getSessionData();
        $Emp_ID     = $session['ID'];
        $Date       = explode(' ', $request->Date)[1];
        $IP         = $this->get_client_ip();
        $Att_Type   = 1;
         for ($i=0; $i < sizeof($request->Enroll_ID) ; $i++) { 
          
           $Enroll_ID   = $request->Enroll_ID[$i];
           if($request->Status[$i] == 'on'){
            $Status      = 1;
           }else{
            $Status      = $request->Status[$i];
           }
           
           $submit = DB::statement("EXEC sp_InsertAttendance
      
                @Emp_ID          ='$Emp_ID',
                @Enroll_ID       ='$Enroll_ID',
                @Date            ='$Date',  
                @IP              ='$IP',
                @Att_Type        ='$Att_Type',
                @Status          ='$Status'

                ;");
                }

            return redirect()->route('emp.SemesterCourses')->with(['successToaster' => 'Attandence Added' , 'title' => 'Success']);


    }


    public function get_client_ip() {
        
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function viewEmpAttendence(){

        $session    =  $this->sessionData->getSessionData();
        $Emp_ID     = $session['ID'];
        $attendances  = Attendance::where('Emp_ID' , $Emp_ID)->get();
        $enrollments  = Enrollment::whereIn('ID' , $attendances->pluck('Enroll_ID')->toArray())->get();
        return view('Attandences.viewEmpAttendence' , 
            compact(
                'attendances' , 
                'enrollments'
            ));

    }

    public function courseConfigration($id){

         $button = 'Update Course Configration';
        $title  = 'Edit Course Configration';
        $route  = '/storeCourseConfigration';
        $semesterCourse = SemesterCourse::where('ID' , $id)->first();
         return
         view('Attandences.courseConfigration',
            compact(
                'semesterCourse',
                'title',
                'route',
                'button',
            ));

    }


    public function assignMarks($id , $type){

        $SemesterCourse = SemesterCourse::where('ID' , $id)->first();
        $enrollments = Enrollment::where('SemCourses_ID' , $id)->get();
        $route = 'storeStudentMark';

        return view('Attandences.assignMarks' , compact('SemesterCourse' , 'type' , 'enrollments' , 'route'));

    }

    public function gradeConfigration($id){

        $SemesterCourse = SemesterCourse::where('ID' , $id)->first();
        $enrollments = Enrollment::where('SemCourses_ID' , $id)->get();

        return view('Attandences.gradeConfigration' , compact('SemesterCourse'  , 'enrollments'));
    }

    public function igradeMarksEntry($id){

        return view('Attandences.igradeMarksEntry');

    }

    public function printGradeSheet($id){

        $SemesterCourse = SemesterCourse::where('ID' , $id)->first();
        $enrollments = Enrollment::where('SemCourses_ID' , $id)->get();

        return view('Attandences.printGradeSheet', compact('SemesterCourse'  , 'enrollments'));

    }

   public function storeCourseConfigration(Request $request){

        $session    =  $this->sessionData->getSessionData();
        $Emp_ID     = $session['ID'];
        $types = [
            $request->FinalTerm,
            $request->MidTerm,
            $request->Quiz,
            $request->Assignment,
            $request->ClassParticipation,
            $request->Attandence,
        ];
        $sum = array_sum($types);
       
        if($sum != 100){
            return Redirect::back()->withInput($request->all())->with(['errorToaster' => 'All The weitage shoud be sum of 100' , 'title' => 'Warning']);
        }

        $ntype = explode('-' , $request->type);
        

        
        foreach($types as $key => $type){            

            
                //  $submit = DB::update("EXEC sp_InsertSemesterCourse_Weightage
                // @SemCourse_ID,   ='1',
                // @Type,           ='$ntype[$key]',
                // @Weightage,      ='$type',
                // @LectureType     ='$request->LectureType'
                // ;");

            $a = new SemesterCourseWeightage();

            $a->SemCourse_ID    = $request->id;
            $a->Type            = $ntype[$key];
            $a->Weightage       = $type;
            $a->LectureType     = $request->LectureType;


            $a->save();

            SemesterCourseWeightage::where(['SemCourse_ID' => $request->id , 'Weightage' => 0])->orWhereNull('Weightage')->delete();
            }

            return redirect()->back()->with(['successToaster' => 'Course Weightage Set Successfully' , 'title' => 'Success']);
   }
   public function addSemesterCourseWeightageDetails(Request $request){

            $data = $this->validateMarks($request);
            if ($data['totalMarks'] > 25){
                return Redirect::back()->withInput($request->all())->with(['errorToaster' => 'Weitage shoud be sum of 100' , 'title' => 'Warning']);
             }elseif($data['totalCount'] == 1 && $data['totalMarks'] != 25){
                 return Redirect::back()->withInput($request->all())->with(['errorToaster' => 'Your Last Entry should be equal to 25' , 'title' => 'Warning']);
             }
            $a = new SemesterCourseWeightageDetail();

            $a->SemCourseWeightage_ID    = $request->SemCourseWeightage_ID;
            $a->TotalMarks               = $request->TotalMarks;
            $a->save();

          return redirect()->back()->with(['successToaster' => 'Course Weightage Set Successfully' , 'title' => 'Success']);
   }

   public function validateMarks($request){

            $semesterCourseWeightages       = SemesterCourseWeightage::where('SemCourse_ID' , $request->SemCourseID)->pluck('ID'); 
            $SemesterCourseWeightageDetails = SemesterCourseWeightageDetail::whereIn('SemCourseWeightage_ID' , $semesterCourseWeightages->toArray());
            
            $semesterCourseWeightagescount = $semesterCourseWeightages->count();
            $SemesterCourseWeightageDetailscont = $SemesterCourseWeightageDetails->count();

            $data['totalCount'] = $semesterCourseWeightagescount - $SemesterCourseWeightageDetailscont - 2;// Mid And Final rocrd

             $SemesterCourseWeightageDetailsall = SemesterCourseWeightageDetail::whereIn('SemCourseWeightage_ID' , $semesterCourseWeightages)->get();

             $subtotalMarks = 0;
             foreach($SemesterCourseWeightageDetailsall as $SemesterCourseWeightageDetails){
                $subtotalMarks = $subtotalMarks + $SemesterCourseWeightageDetails->TotalMarks;
             }
             $totalMarks = $subtotalMarks + $request->TotalMarks;

            
             $data['totalMarks'] = $totalMarks;
             return $data;
             


         
           // dd($request->all() , $semesterCourseWeightages , $SemesterCourseWeightageDetails , $semesterCourseWeightagescount , $SemesterCourseWeightageDetailscont , $totalCount , $TotalMarks);



            //SemesterCourseWeightageDetail::where()
   }

   public function studentAssesment($id){

         $SemesterCourse                 = SemesterCourse::where('ID' , $id)->first();
         $semesterCourseWeightages       = SemesterCourseWeightage::where('SemCourse_ID' , $id); 
         $route                          = '/addSemesterCourseWeightageDetails';
         $typefilter                     = SemesterCourseWeightageDetail::pluck('SemCourseWeightage_ID')->toArray();
         $optionSemesterCourseWeightages = SemesterCourseWeightage::whereNotIn('ID' , $typefilter)->get();
         $semesterCourseWeightagesID     = $semesterCourseWeightages->pluck('ID')->toArray();
         $SemesterCourseWeightageDetails = SemesterCourseWeightageDetail::whereIn('SemCourseWeightage_ID' , $semesterCourseWeightagesID)->get();
         $semesterCourseWeightages       = $semesterCourseWeightages->get();

         
         //dd($SemesterCourseWeightage);

         
         


        return view('Attandences.studentAssesment' , 
            compact(
                'SemesterCourse' , 
                'id' , 
                'semesterCourseWeightages' ,  
                'route',
                'optionSemesterCourseWeightages',
                'SemesterCourseWeightageDetails'
            ));
    }

    public function deleteMarks($id){

        SemesterCourseWeightageDetail::where('ID' , $id)->delete();
         return redirect()->back()->with(['warningToaster' => 'Marks Deleted Successfully' , 'title' => 'Success']);
    }

     public function storeStudentMark(Request $request){

        dd($request->all());

            $submit             = DB::Update("EXEC insertStudentMarks
            @SemCourses_ID       = '$request->SemCourses_ID',
            @ObtainedMarks       = '$request->ObtainedMarks',
            @Enroll_ID           = '$request->Enroll_ID'
            ;
        ");
        
             return redirect()->back()->with(['successToaster' => 'Dasignation Added' , 'title' => 'Success']);
    }



}
