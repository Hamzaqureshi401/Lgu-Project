<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Employee;
use App\Models\SemesterCourse;
use App\Models\DegreeBatche;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\TimeTable;
use App\Models\Degree;
use App\Models\Semester;


use Illuminate\Http\Request;

class ViewController extends Controller
{
     public function vcView(){

        return view('View.vcView');
    }
    public function igradeStudentView(){

        $students = false;

        $title  = 'All Courses';
        $route = 'updateCourse';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';

        return view('View.igradeStudentView', 
            compact(
                'students' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'));
    }

    public function examDashboardView(){

        return view('View.examDashboardView', 
            
               );
    }
    public function igradeStdhodView(){

        return view('View.igradeStdhodView', 
            
               );
    }
    
     public function student365View(){

        return view('View.student365View', 
            
               );
    }
     public function reportingPanel(){

        return view('View.reportingPanel', 
            
               );
    }
    public function sectionWIseReport(){

        return view('View.sectionWIseReport', 
            
               );
    }
    public function examMainDashboardView(){

        return view('View.examMainDashboardView', 
            
               );
    }
    public function ceoDashboard(){

        return view('View.ceoDashboard', 
            
               );
    }
     public function studentResult(){

        return view('View.studentResult', 
            
               );
    }
     public function stdWiseAward(){

        return view('View.stdWiseAward', 
            
               );
    }
     public function stdAffairs(){

        return view('View.stdAffairs', 
            
               );
    }
    public function reports(){

        return view('View.reports', 
            
               );
    }
    public function assessmentDetail(){
        $employees      = Employee::get();
        $semesterCourse = SemesterCourse::get();
        return 
        view('View.assessmentDetail', 
            compact(
                'employees' , 
                'semesterCourse')    
            );
    }
    public function departmentFactSheet(){

        $degreeBatches  = DegreeBatche::paginate(10);
        $students       = Student::get();
        return 
        view('View.departmentFactSheet', 
            compact(
                
                'degreeBatches',
                'students'
            )    
            );
    }

    public function degSemesterWiseReport(){
        $employees      = Employee::get();
        $semesterCourse = SemesterCourse::get();
        $degreeBatches  = DegreeBatche::get();
        return 
        view('View.degSemesterWiseReport', 
            compact(
                'employees' , 
                'semesterCourse', 
                'degreeBatches')    
            );

    }
     public function studentAttendance(){

       $enrollments    = Enrollment::get();
        return 
        view('View.studentAttendance', 
            compact(
                
                'enrollments')    
            );

    }

    public function findCourseDay(Request $request){

        $timeTable = TimeTable::where('Day' , $request->Day)->get();
        $semesterCourses = SemesterCourse::join('TimeTable' , 'timeTable.SemCourse_ID' , 'semesterCourses.ID')
        ->where('Day' , $request->Day)
        ->get();
        //dd(SemesterCourse::with('timeTable')->where('Day' , $request->Day)->get());
         return 
        view('View.courseTimeTable', 
            compact(
                
                'timeTable',
                
                'semesterCourses'
            )    
            );
    }
    public function courseOffering($degree = null , $batch = null){

        $degreeBatches  = DegreeBatche::where(['Degree_ID' => $degree , 'Batch_ID' => $batch])->first();
        if(!empty($degreeBatches)){
            $semesterCourses = SemesterCourse::where('DegBatches_ID' , $degreeBatches->ID)->get();
        }else{
            $semesterCourses = "";
        }
       $degrees      =  Degree::get();
       $semesters    =  semester::get();
      
        $title      = 'All Courses';
        $route      = 'courseOffering/';
        $getEditRoute = 'courseAssign';
        $modalTitle = 'Assign Course';
        $button     = 'Submit';
        
       return 
        view('View.courseOffering', 
            compact(
                
                'degrees',
                
                'semesters',
                'title',
                'route',
                'getEditRoute',
                'modalTitle',
                'button',
                'degreeBatches',
                'semesterCourses'
            )    
            );

    }

    public function courseAssign($id){

        $button = 'Do You Wisht To Submit?';
        $courses = Course::where('ID' , $id)->first();

        return 
        view('View.courseAssign', 
            compact(
                
                'courses',
                'button'
              
            ));

    }
}
