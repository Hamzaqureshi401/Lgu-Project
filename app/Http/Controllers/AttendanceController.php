<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\SessionClass;
use App\Models\SemesterCourse;
use App\Models\TimeTable;
use App\Models\TimeTableDetail;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\Models\Degree;
use App\Models\Department;
use App\Models\DegreeBatche;
use App\Models\Semester;


use Redirect;
use App\Models\Enrollment;
use App\Models\DegreeSemCourse;

use App\Models\StudentMark;
use App\Models\SemesterCourseWeightage;
use App\Models\SemesterCourseWeightageDetail;
use Session;

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
       
          $course = DegreeSemCourse::join('SemesterCourses' , 'SemesterCourses.ID' , 'DegreeSemCourses.SemCourse_ID')
        ->join('Courses' , 'Courses.ID' , 'SemesterCourses.Course_ID')
        ->groupBy('CourseCode')
        ->where('Emp_ID' , Session::get('ID'))->pluck('Courses.CourseCode')->count();
        
        // $course             = SemesterCourse::pluck('id')->count();
        // $course             = SemesterCourse::where('Emp_ID' , Session::get('ID'))->pluck('id')->count();
        $enrollment         = Enrollment::where('SemCourses_ID' , $course)->pluck('id')->count();
        $students           = Student::get();
        
        $departments        = Department::where('DeanUID' , Session::get('ID'))->orWhere('HodUID' , Session::get('ID'))->get();
        $degrees            = Degree::where('Dpt_ID' , $departments->pluck('ID')->toArray())->get();
        
        $std = $students->where('Status' , '!=' , 'Completed')->whereIn('Degree_ID' , $degrees->pluck('ID')->toArray());
        
        $degreeBatches      = DegreeBatche::whereIn('Degree_ID' , $degrees->pluck('ID')->toArray())->whereNotNull('Batch_ID')->get();
           
        $semesterCourses    = SemesterCourse::pluck('ID')->count();

        $att['100-80']      = sizeof($this->getAttendanceByPercentage(80 , 100));
        $att['80-75']       = sizeof($this->getAttendanceByPercentage(80 , 75));
        $att['75-70']       = sizeof($this->getAttendanceByPercentage(75 , 70));
        $att['70-65']       = sizeof($this->getAttendanceByPercentage(70 , 65));
        $att['65-60']       = sizeof($this->getAttendanceByPercentage(65 , 60));
        $att['Lessthen 60'] = sizeof($this->getAttendanceByPercentage(0  , 60));

        return 
        view('Dean.deanDashboard' , 
            compact(
                'course',
                'enrollment',
                'students',
                'degrees',
                'departments',
                'degreeBatches',
                'semesterCourses',
                'att',
                'std'
                
            ));





        // $course     = Course::pluck('id')->count();
        // $enrollment = Enrollment::pluck('id')->count();
        // $students   = Student::get();
        // $degrees    = Degree::paginate(10);
        // $departments= Department::paginate(10);
        // $degreeBatches = DegreeBatche::whereNotNull('Batch_ID')->paginate(10);


        // return 
        // view('Dean.deanDashboard' , 
        //     compact(
        //         'course',
        //         'enrollment',
        //         'students',
        //         'degrees',
        //         'departments',
        //         'degreeBatches'
        //     ));
        
    }

     public function getAttendanceByPercentage($min , $max){

        $attendance = DB::select('select Enroll_ID,pTotal,tTotal,per from (
                select Enroll_ID,pTotal,tTotal,(pTotal*100)/tTotal as per from 
                (
                select Enroll_ID,COUNT(Attendances.ID) as pTotal,(select COUNT(Attendances.ID) from Attendances where Emp_ID='.Session::get('ID').') as tTotal from Attendances where Emp_ID='.Session::get('ID').' and Status=1 group by Enroll_ID
                ) as Attendance
                ) as at where per >=  '.$min.' and per <  '.$max.'');

        // $attendance = DB::table('Attendances')
        // ->select('Enroll_ID', DB::raw('COUNT(Attendances.ID) as pTotal'))
        // ->where('Emp_ID', '=', Session::get('ID'))
        // ->where('Status', '=', 1)
        // ->groupBy('Enroll_ID');

        // $attendance = DB::table('Attendances')
        // ->joinSub($attendance, 'Attendance', function ($join) {
        //     $join->on('Attendances.Enroll_ID', '=', 'Attendance.Enroll_ID');
        // })
        // ->select('Attendances.Enroll_ID', 'Attendance.pTotal', DB::raw('(Attendance.pTotal * 100) / tTotal as per'))
        // ->crossJoin(DB::raw('(select COUNT(Attendances.ID) as tTotal from Attendances where Emp_ID='.Session::get('ID').') as t'))
        // ->whereRaw('(Attendance.pTotal * 100) / t.tTotal >= ?', [$min])
        // ->whereRaw('(Attendance.pTotal * 100) / t.tTotal < ?', [$max])
        // ->get();




    return $attendance;
    }

      public function empSemesterCourses(){

       $session         =  $this->sessionData->getSessionData();
     $DegreeSemCourses = DegreeSemCourse::join('TimeTableDetail', 'TimeTableDetail.DegSemCourses_ID', '=', 'DegreeSemCourses.ID')
        ->join('SemesterCourses', 'DegreeSemCourses.SemCourse_ID', '=', 'SemesterCourses.ID')
        ->join('Semesters', 'SemesterCourses.Sem_ID', '=', 'Semesters.ID')
        ->join('Courses', 'SemesterCourses.Course_ID', '=', 'Courses.ID')
        ->join('Employees', 'DegreeSemCourses.Emp_ID', '=', 'Employees.ID')
        // ->select('Courses.CourseCode', 'Semesters.SemSession')
        // ->groupBy('Courses.CourseCode', 'Semesters.SemSession')
        ->where('DegSemCoursesParentStatus' , 1)
        ->where('Emp_ID' , $session['ID'])
        ->select('DegreeSemCourses.ID' , 
            'Courses.CourseName' , 
            'SemesterCourses.ID as semcID' , 
            'employees.Emp_FirstName' ,
            'employees.Emp_LastName'
        )
         ->get();

         //dd($DegreeSemCourses , $session['ID']);

        $title          = 'All Semester Courses';
        $route          = 'updateSemesterCourse';
        $getEditRoute   = 'empSemesterCoursesAttandence';
        $modalTitle     = 'Go To Attendence';

        return 
        view('Attandences.empSemesterCourses' , 
            compact(
                'DegreeSemCourses' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'  
            ));
    }

    public function empSemesterCoursesAttandence($id){

        $semetserCourse = SemesterCourse::where('ID' , $id)->first();
        $session       =  $this->sessionData->getSessionData();
        $DegreeSemCourses = DegreeSemCourse::join('TimeTableDetail', 'TimeTableDetail.DegSemCourses_ID', '=', 'DegreeSemCourses.ID')
        ->join('SemesterCourses', 'DegreeSemCourses.SemCourse_ID', '=', 'SemesterCourses.ID')
        ->join('Semesters', 'SemesterCourses.Sem_ID', '=', 'Semesters.ID')
        ->where('DegSemCoursesParentStatus' , 1)
        ->where('Emp_ID' , $session['ID'])
        ->where('SemCourse_ID' , $id)
        ->select('DegreeSemCourses.ID'
        )
         ->first();
        // dd($DegreeSemCourses);
         return 
        view('Attandences.empSemesterCoursesAttandence' , compact('semetserCourse' , 'DegreeSemCourses'));
    }

    public function claseesShedule($id , $semesterID){
        //dd($semesterID);
         $session       =  $this->sessionData->getSessionData();
         $DegreeSemCourse        =  DegreeSemCourse::where(['SemCourse_ID' => $id , 'Emp_ID' => $session['ID']])->get();
        // dd($DegreeSemCourse);
         $semester = Semester::where('ID' , $semesterID)->first();
         $SemStartDate  = $semester->SemStartDate;
         $SemEndDate    =   $semester->SemEndDate;
         $SemCourse = $id;
         //dd($SemStartDate);
         $TimeTable_ID  = TimeTableDetail::whereIn('DegSemCourses_ID' , $DegreeSemCourse->pluck('ID')->toArray())->first();
         // dd($TimeTable_ID , $id);
         $timeTable     = TimeTable::where(['ID' => $TimeTable_ID->TimeTable_ID ])->first();
        // dd($timeTable);
         $SemEndDate    = strtotime($SemEndDate);

               if(empty($timeTable)){
            return redirect()
            ->back()
            ->with([
                'errorToaster' => 'Your Classes Time Table not Found' , 
                'title' => 'Error'
            ]);
        }

        $eachDays = array();
        $dateArray = array();

        for($i = strtotime($timeTable->Day, strtotime($SemStartDate)); $i <= $SemEndDate; $i = strtotime('+1 week', $i)){
            $eachDays[]  = date('l Y-m-d', $i);
        }
        
        $attandences     = Attendance::select('Date')->get();
        // dd($attandences);
        foreach ($attandences as $attandence){
            $dateArray[] = date('Y-m-d', strtotime($attandence->Date));
        }
      //  dd(1);


         return 
        view('Attandences.classesShedule' , 
            compact(
                'timeTable' , 
                'eachDays' , 
                'SemCourse' ,
                'dateArray'
            ));
    }


    public function studentAttandenceView($day , $id){

        $students = Enrollment::where(['SemCourses_ID' => $id])->get();
        if($students->pluck('id')->count() == 0){
            return redirect()
            ->back()
            ->with([
                'errorToaster' => 'No Enrolled Student Found' , 
                'title' => 'Error'
            ]);
        }
        $Sem_ID =  SemesterCourse::where('ID' , $id)->first();

       
        return view('Attandences.studentAttandenceView' , 
            compact(
                'Sem_ID' , 
                'students' , 
                'day' , 
                
        ));
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

            return redirect()
            ->route('emp.SemesterCourses')
            ->with([
                'successToaster' => 'Attendence Added' , 
                'title' => 'Success'
            ]);
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

        $session      =  $this->sessionData->getSessionData();
        $Emp_ID       = $session['ID'];
        $attendances  = Attendance::where('Emp_ID' , $Emp_ID)->get();
        $enrollments  = Enrollment::whereIn('ID' , $attendances->pluck('Enroll_ID')->toArray())->get();
        return view('Attandences.viewEmpAttendence' , 
            compact(
                'attendances' , 
                'enrollments'
            ));

    }

    public function courseConfigration($id){

        $button                  = 'Update Course Configration';
        $title                   = 'Edit Course Configration';
        $route                   = '/storeCourseConfigration';
        $semesterCourse          = SemesterCourse::where('ID' , $id)->first();
        $SemesterCourseWeightage = SemesterCourseWeightage::where('SemCourse_ID' , $id)->get();
         return
         view('Attandences.courseConfigration',
            compact(
                'semesterCourse',
                'title',
                'route',
                'button',
                'SemesterCourseWeightage'
            ));

    }

    public function gradeConfigration($id){

        $SemesterCourse                     = SemesterCourse::where('ID' , $id)->first();
        $enrollments                        = Enrollment::where('SemCourses_ID' , $id)->get();
         $optionSemesterCourseWeightages    = SemesterCourseWeightage::where(['SemCourse_ID' => $id])->get();

        return view('Attandences.gradeConfigration' , 
            compact(
                'SemesterCourse'  , 
                'enrollments' , 
                'optionSemesterCourseWeightages'
            ));
    }

    public function igradeMarksEntry($id){

        return view('Attandences.igradeMarksEntry');

    }

    public function printGradeSheet($id){

        $SemesterCourse = SemesterCourse::where('ID' , $id)->first();
        $enrollments    = Enrollment::where('SemCourses_ID' , $id)->get();

        return view('Attandences.printGradeSheet', 
            compact(
                'SemesterCourse'  , 
                'enrollments'
            ));

    }

    public function storeCourseConfigration(Request $request){

        $session    =  $this->sessionData->getSessionData();
        $Emp_ID     = $session['ID'];
        $FinalTerm  = 50;
        $MidTerm    = 25;
        $types = [
            $FinalTerm,
            $MidTerm,
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

                  

            $a = new SemesterCourseWeightage();
            $a->SemCourse_ID    = $request->id;
            $a->Type            = $ntype[$key];
            $a->Weightage       = $type;
            $a->LectureType     = $request->LectureType;
            $a->save();

             if ($key < 2){
            $this->storeFixedWeightageDetails($a->id , $type);
        } 
         SemesterCourseWeightageDetail::orWhereNull('SemCourseWeightage_ID')->delete();
            SemesterCourseWeightage::where(['SemCourse_ID' => $request->id , 'Weightage' => 0])->orWhereNull('Weightage')->delete();
            }

            
            

            return redirect()
            ->back()
            ->with([
                'successToaster' => 'Course Weightage Set Successfully' , 
                'title' => 'Success'
            ]);
   }

   public function storeFixedWeightageDetails($id , $marks){

     $a = new SemesterCourseWeightageDetail();

            $a->SemCourseWeightage_ID    = $id;
            $a->TotalMarks               = $marks;
            $a->save();
   }
   public function addSemesterCourseWeightageDetails(Request $request){
            $a = new SemesterCourseWeightageDetail();

            $a->SemCourseWeightage_ID    = $request->SemCourseWeightage_ID;
            $a->TotalMarks               = $request->TotalMarks;
            $a->save();

          return redirect()->back()->with(['successToaster' => 'Course Weightage Set Successfully' , 'title' => 'Success']);
   }



   public function studentAssesment($id){

         $SemesterCourse                 = SemesterCourse::where('ID' , $id)->first();
         $semesterCourseWeightages       = SemesterCourseWeightage::where('SemCourse_ID' , $id); 

         $wetaigePlusDetails = SemesterCourseWeightage::
         join('SemesterCourse_WeightageDetail' , 'SemesterCourse_WeightageDetail.SemCourseWeightage_ID' , 'SemesterCourse_Weightage.ID')
         ->select('SemesterCourse_Weightage.ID' , 'SemesterCourse_Weightage.Type' , 'SemesterCourse_WeightageDetail.TotalMarks')
         ->where('SemesterCourse_Weightage.SemCourse_ID' , $id)
         ->get();

         $route                          = '/addSemesterCourseWeightageDetails';
         $typefilter                     = SemesterCourseWeightageDetail::pluck('SemCourseWeightage_ID')->toArray();
         

         $semesterCourseWeightagesID     = $semesterCourseWeightages->pluck('ID')->toArray();
         $SemesterCourseWeightageDetails = SemesterCourseWeightageDetail::whereIn('SemCourseWeightage_ID' , $semesterCourseWeightagesID)->get();
         $semesterCourseWeightages       = $semesterCourseWeightages->get();
        // dd($semesterCourseWeightages);
         $StudentMarks = StudentMark::pluck('SemCourseWeightagedetail_ID')->toArray();
         $stdMars = StudentMark::pluck('ID')->toArray();
         

        return view('Attandences.studentAssesment' , 
            compact(
                'SemesterCourse' , 
                'id' , 
                'semesterCourseWeightages' ,  
                'route',
                
                'SemesterCourseWeightageDetails',
                'StudentMarks',
                'wetaigePlusDetails',
                'stdMars'
            ));
    }

    public function assignMarks($id , $type){

        $SemesterCourse                 = SemesterCourse::where('ID' , $id)->first();
        $enrollments                    = Enrollment::where(['SemCourses_ID' => $id , 'Status' => 1])->get();
        //dd($id , $enrollments);
        $SemCourseWeightage             = SemesterCourseWeightage::where(['SemCourse_ID' => $id , 'Type' => $type])->first();
        $SemesterCourseWeightageDetail  = SemesterCourseWeightageDetail::where('SemCourseWeightage_ID' , $SemCourseWeightage->ID)->first();
        $route                          = '/storeStudentMark';
       
        $StudentMarks = StudentMark::where('SemCourseWeightagedetail_ID' , $SemesterCourseWeightageDetail->ID)->first();
        

        return 
        view('Attandences.assignMarks' , 
            compact(
                'SemesterCourse' , 
                'type' , 
                'enrollments' , 
                'route' , 
                'SemCourseWeightage' , 
                'SemesterCourseWeightageDetail',
                'StudentMarks'
            ));

    }

    public function deleteMarks($id){

        SemesterCourseWeightageDetail::where('ID' , $id)->delete();
         return redirect()
         ->back()
         ->with([
            'warningToaster' => 'Marks Deleted Successfully' , 
            'title' => 'Success'
        ]);
    }

     public function storeStudentMark(Request $request){

        $SemCourseWeightage_ID       = SemesterCourseWeightage::where(['SemCourse_ID' => $request->SemCourses_ID , 'Type' => $request->type])->first()->ID;
        $SemCourseWeightage_ID       = SemesterCourseWeightageDetail::where('SemCourseWeightage_ID' , $SemCourseWeightage_ID)->first()->ID;
            
        foreach($request->Enroll_ID as $key => $Enroll_ID ){

            $ObtainedMarks = $request['ObtainedMarks'][$key];
            
            if($request->ObtainedMarks[$key] != 0){
                $submit             = DB::Update("EXEC insertStudentMarks
                    @SemCourseWeightagedetail_ID       = '$SemCourseWeightage_ID',
                    @ObtainedMarks                     = '$ObtainedMarks',
                    @Enroll_ID                         = '$Enroll_ID'
                    ;
                ");
            }
        }

         return redirect()
         ->back()
         ->with([
            'successToaster' => 'MArks Added Successfully' , 
            'title' => 'Success'
        ]);
    }



}