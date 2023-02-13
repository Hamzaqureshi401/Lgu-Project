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

class DeanController extends Controller
{
    public function deanDashboard(){

        $course             = SemesterCourse::where('Emp_ID' , Session::get('ID'))->pluck('id')->count();
        $enrollment         = Enrollment::where('SemCourses_ID' , $course)->pluck('id')->count();
        $students           = Student::get();
        $degrees            = Degree::get();
        $departments        = Department::get();
        $degreeBatches      = DegreeBatche::whereNotNull('Batch_ID')->get();
        $semesterCourses    = SemesterCourse::pluck('ID')->count();
        $attandences        = Attendance::where('Emp_ID' , Session::get('ID'))->get();
        $enrollment_ID      = array_unique($attandences->pluck('Enroll_ID')->toArray());

         $totalClasses      = $attandences->whereIn('Status' , [0 , 1])->count();


        // foreach($enrollment_ID as $enrollment_ID){
        
        // $presents[] = $attandences
        // ->where('Status' , 1)
        // ->where('Enroll_ID' , $enrollment_ID)
        // ->count();
        // }

        // foreach($presents as $present){

        // if ($present != 0 ){
        //   $percentages[] = ($present / $totalClasses) * 100;
        // }else{
        //     $percentages[] = 0;
        // }
        // }

        // $header[] = '100-80';
        // $header[] = '80-75';
        // $header[] = '75-70';
        // $header[] = '70-65';
        // $header[] = '65-60';
        // $header[] = 'Lessthen 60';

        // //dd($header);
        
        // $pr = ['59' , '64' , '69' , '74' , '79' , '81'];

        // foreach($header as $rec){
        //     foreach($percentages as $keyval => $percentage){
        //         if($percentage >= 80){
        //             $record[$rec] =  $pr[$keyval] ?? 0;    
        //         }else{
        //             $record[$rec] = 0;
        //         }
        //         // if($percentage >=75 && $percentage < 80){
        //         //     $record[$rec] =  $presents[$keyval] ?? 0;
        //         // }
        //         // if($percentage >=70 && $percentage < 75){
        //         //     $record[$rec] =  $presents[$keyval] ?? 0;
        //         // }
        //         // if($percentage >=60 && $percentage < 70){
        //         //     $record[$rec] =  $presents[$keyval] ?? 0;
        //         // }
        //         // if($percentage < 60){
        //         //     $record[$rec] =  $presents[$keyval] ?? 0;
        //         // }
                
        //     }
            
        // }

        //dd($record , $percentages , $presents);
        
        
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
                'attandences',
                
            ));
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
