<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\Registration;
use App\Models\Semester;
use App\Models\Degree;
use App\Models\Enrollment;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\SemesterCourse;
use App\Models\StudentEducation;

use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    public function studentDashboard()
    {
        $session = $this->getSessionData();
        //dd($session);
        $user         = explode('/',$session['user']);
        $semester     = Semester::where('SemSession' , $user[0])->first();
        $enrollments  = Enrollment::where('Std_ID' , $session['std_ID'])->get();
        $registration = Registration::where('Std_ID' , $session['std_ID'])->first();
        $attendences = new Attendance();
        if (!empty($registration)){
            $challans = Challan::where('Reg_ID' , $registration->ID)->get();    
        }else{
            $challans = '';
        }
        
        return view('Dashboard.studentDashboard',compact('semester' , 'enrollments' , 'challans' , 'attendences'));
        
    }
    public function getSessionData(){

        return session::all();
    }

    public function findStudent(Request $request){

      $student      =  Student::where('StdRollNo' , $request->SemSession.'/'.$request->DegreeName.'/'.$request->Rollno)->first();
      $Degree       = Degree::select('DegreeName' , 'ID')->get();
      $Semester     = Semester::select('SemSession' , 'ID')->get();
      $Registration = Registration::where('Std_ID' , $student->ID)->first();
      $Enrollment   = Enrollment::where('Std_ID' , $student->ID)->get();
      foreach($Enrollment as $Enrollment){
        $semesterSession[] = $Enrollment->semesterCourse->semester->SemSession;
        $semesterID[] = $Enrollment->semesterCourse->semester->ID;
      }
      
      $semesterSession = array_unique($semesterSession);
      $semesterID      = array_unique($semesterID);
      
      foreach($semesterID as $semesterID){
        $SemesterCourse[] = SemesterCourse::where('Sem_ID' , $semesterID)->pluck('id')->toArray();
      }
      //dd($SemesterCourse);
      
      foreach($SemesterCourse as $key => $SemesterCourse){
        $EnrollBySem[$semesterSession[$key]]  = Enrollment::where('Std_ID' , $student->ID)->whereIn('SemCourses_ID' , $SemesterCourse)->get();
      }
      
      //dd($EnrollBySem);

        //dd();
        return view('View.student365View',
            compact(
                'Degree' , 
                'Semester',
                'student',
                'Registration',
                'semesterSession',
                'EnrollBySem'
                
            ) 
            
               );
    }

    public function getFactSheet($id){

         $student           =  Student::where('ID' , $id)->first();
         $Enrollment        = Enrollment::where('Std_ID' , $student->ID)->get();
         $StudentEducation  = StudentEducation::where('Std_ID' , $student->ID)->get();

          return view('Student.getFactSheet' , compact('student' , 'Enrollment' , 'StudentEducation')
            
               );
    }
}
