<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Classes\SessionClass;
use App\Models\SemesterCourse;
use App\Models\TimeTable;
use App\Models\Enrollment;


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
        view('SemesterCourses.allSemesterCourses' , 
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
         $session =  $this->sessionData->getSessionData();
         $Sem_ID =  SemesterCourse::where('ID' , $id)->first();
         $SemStartDate = $Sem_ID->semester->SemStartDate;
         $SemEndDate =   $Sem_ID->semester->SemEndDate;


        //dd($sem_ID->semester->SemStartDate ,  $sem_ID->semester->SemEndDate , $sem_ID->semester->SemSession);
        $timeTable = TimeTable::where(['SemCourse_ID' => $id , 'Emp_ID' =>  $session['ID']])->first();

        $SemEndDate = strtotime($SemEndDate);

        //dd($timeTable);
        for($i = strtotime($timeTable->Day, strtotime($SemStartDate)); $i <= $SemEndDate; $i = strtotime('+1 week', $i)){
            $eachDays[] = date('l Y-m-d', $i);
        }
        
        
   // dd($eachdays , $timeTable);
         return 
        view('Attandences.classesShedule' , compact('timeTable' , 'eachDays' , 'Sem_ID'));
    }


    public function studentAttandenceView($day , $id){

        $student = Enrollment::where(['SemCourses_ID' => $id])->get();
        $Sem_ID =  SemesterCourse::where('ID' , $id)->first();

        return view('Attandences.studentAttandenceView' , compact('Sem_ID'));
    }



}
