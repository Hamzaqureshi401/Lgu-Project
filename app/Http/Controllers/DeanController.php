<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Degree;
use App\Models\Department;
use App\Models\DegreeBatche;
use App\Models\Attendance;
use App\Models\SemesterCourse;
use Session;
use DB;

class DeanController extends Controller
{
    public function deanDashboard(){

        $course             = SemesterCourse::where('Emp_ID' , Session::get('ID'))->pluck('id')->count();
        $enrollment         = Enrollment::where('SemCourses_ID' , $course)->pluck('id')->count();
        $students           = Student::get();
        
        $departments        = Department::where('DeanUID' , Session::get('ID'))->get();
        $degrees            = Degree::where('Dpt_ID' , $departments->pluck('ID')->toArray())->get();
        //dd($degrees , $departments);
        $std = $students->where('Status' , '!=' , 'Completed')->whereIn('Degree_ID' , $degrees->pluck('ID')->toArray());
        //dd($departments);
        //$degrees = Degree::get();
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
    }

    public function getAttendanceByPercentage($min , $max){

        return DB::select('select Enroll_ID,pTotal,tTotal,per from (
                select Enroll_ID,pTotal,tTotal,(pTotal*100)/tTotal as per from 
                (
                select Enroll_ID,COUNT(Attendances.ID) as pTotal,(select COUNT(Attendances.ID) from Attendances where Emp_ID='.Session::get('ID').') as tTotal from Attendances where Emp_ID='.Session::get('ID').' and Status=1 group by Enroll_ID
                ) as Attendance
                ) as at where per >=  '.$min.' and per <  '.$max.'');
    }

    public function allCourses(){

        $course     = SemesterCourse::where('Emp_ID' , Session::get('ID'))->pluck('Course_ID')->toArray();
         $courses = Course::whereIn('ID' , $course)->paginate(10);
        $title  = 'All Courses';
        $route = 'editCourse/';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';

        return
        view('Courses.allCourses' ,
            compact(
                'courses' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }

    public function allowedEmpStudent(){

        $SemesterCourse     = SemesterCourse::where('Emp_ID' , Session::get('ID'))->get();
        $course    =   $SemesterCourse->pluck('Course_ID')->toArray();
        $SemCourse   =   $SemesterCourse->pluck('ID')->toArray();
        $enrollments = Enrollment::whereIn('SemCourses_ID' , $SemCourse)->paginate(10);
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

    public function allowedSemesterCourses(){

        $semesterCourses = SemesterCourse::where('Emp_ID' , Session::get('ID'))->paginate(10);

        $title  = 'All Semester Courses';
        $route = 'updateSemesterCourse';
        $getEditRoute = 'editSemesterCourse';
        $modalTitle = 'Edit SemesterCourse';
        
       
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

    public function vcDashboard(){

        return 
        view('Dean.vcDashboard'
           );
    }


}
