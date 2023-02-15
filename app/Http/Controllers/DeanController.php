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
       // dd($degrees , $departments->pluck('ID')->toArray());
        $degreeBatches      = DegreeBatche::whereNotNull('Batch_ID')->get();
        $semesterCourses    = SemesterCourse::pluck('ID')->count();
        $attandences        = Attendance::where('Emp_ID' , Session::get('ID'))->get();
        $enrollment_ID      = array_unique($attandences->pluck('Enroll_ID')->toArray());

         $totalClasses      = $attandences->whereIn('Status' , [0 , 1])->count();

       $a =   DB::table('Attendances')->
    select(DB::raw('COUNT(attendances.ID) as tcount'))->groupBy('attendances.Enroll_ID')->where(['Emp_ID' => Session::get('ID') , 'Status' => 1])
    ->get();

dd($a , $totalClasses);


        foreach($enrollment_ID as $enrollment_ID){
        
        $presents[] = $attandences
        ->where('Status' , 1)
        ->where('Enroll_ID' , $enrollment_ID)
        ->count();
        }

        foreach($presents as $present){

        if ($present != 0 ){
          $percentages[] = ($present / $totalClasses) * 100;
        }else{
            $percentages[] = 0;
        }
        }

        $header[] = '100-80';
        $header[] = '80-75';
        $header[] = '75-70';
        $header[] = '70-65';
        $header[] = '65-60';
        $header[] = 'Lessthen 60';

        //dd($header);
        
        $pr = ['59' ,'60', '64' , '65' , '69' , '70' , '74' , '75' , '79' ,'80', '81'];

        foreach($header as $rec){
            foreach($percentages as $keyval => $percentage){
                if($percentage >= 80){
                    $record[$rec] =  $pr[$keyval] ?? 0;    
                }else{
                    $record[$rec] = 0;
                }
                // if($percentage >=75 && $percentage < 80){
                //     $record[$rec] =  $presents[$keyval] ?? 0;
                // }
                // if($percentage >=70 && $percentage < 75){
                //     $record[$rec] =  $presents[$keyval] ?? 0;
                // }
                // if($percentage >=60 && $percentage < 70){
                //     $record[$rec] =  $presents[$keyval] ?? 0;
                // }
                // if($percentage < 60){
                //     $record[$rec] =  $presents[$keyval] ?? 0;
                // }
                
            }
            
        }
        foreach ($percentages as $percentage){

            if ($percentage > 80){
                $newfilter['100-80'][] = $percentage ?? 0;
            }elseif(($percentage >=75) && ($percentage < 80)){
                $newfilter['80-75'][] = $percentage ?? 0;
            }elseif(($percentage >=70) && ($percentage < 75)){
                $newfilter['75-70'][] = $percentage ?? 0;
            }elseif(($percentage >=65) && ($percentage < 70)){
                $newfilter['70-65'][] = $percentage ?? 0;
            }elseif(($percentage >=60) && ($percentage < 65)){
                $newfilter['65-60'][] = $percentage ?? 0;
            }elseif(($percentage) < 60){
                $newfilter['Lessthen 60'][] = $percentage ?? 0;
            }
        }

        foreach ($percentages as $key => $pr){

            $percentagesVal[$presents[$key]] = $pr;
        }

       
       
        dd( $percentages , $presents , $newfilter , $percentagesVal);
        
        
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
