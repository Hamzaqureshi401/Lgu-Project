<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\Registration;
use App\Models\Semester;
use App\Models\Degree;
use App\Models\Enrollment;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\StudentIgrade;
use App\Models\SemesterCourse;
use App\Models\StudentEducation;

use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
public function studentDashboard()
{
    $session = $this->getSessionData();
    $user = explode('/', $session['user']);
    $enrollments = Enrollment::where('Std_ID', $session['std_ID'])->get();

    $semesterIDs = $enrollments->pluck('semesterCourse.semester.ID')->unique();
    $semester = Semester::whereIn('ID', $semesterIDs)->first();

    $registration = Registration::where('Std_ID', $session['std_ID'])->first();
    $attendances = new Attendance();
    
    if (!empty($registration)) {
        $challans = Challan::where('Reg_ID', $registration->ID)->get();
    } else {
        $challans = '';
    }
    
    
    return view('Dashboard.studentDashboard', compact('semester', 'enrollments', 'challans', 'attendances'));
}


    public function getSessionData(){

        return session::all();
    }

    public function findStudent(Request $request){

      $student      =  Student::where('StdRollNo' , $request->SemSession.'/'.$request->DegreeName.'/'.$request->Rollno)->first();
      //dd($request->SemSession.'/'.$request->DegreeName.'/'.$request->Rollno , $student);
      if(empty($student)){
        return redirect()
            ->back()
            ->with([
                'errorToaster' => 'Student Not Found!' , 
                'title' => 'Error'
            ]);
      }
      $Degree       = Degree::select('DegreeName' , 'ID')->get();
      $Semester     = Semester::select('SemSession' , 'ID')->get();
      $Registration = Registration::where('Std_ID' , $student->ID)->first();
      if(empty($Registration)){
        return redirect()
            ->back()
            ->with([
                'errorToaster' => 'Student Did Not Enroll Any Subject!' , 
                'title' => 'Error'
            ]);
      }
      $semesterSession  = array(); // Initialize the variable as an empty array
      $semesterID       = array(); // Initialize the variable as an empty array
      $SemesterCourse   = array(); // Initialize the variable as an empty array
      $EnrollBySem      = array();
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
      
      foreach($SemesterCourse as $key => $SemesterCourse){
        $EnrollBySem[$semesterSession[$key]]  = Enrollment::where('Std_ID' , $student->ID)->whereIn('SemCourses_ID' , $SemesterCourse)->get();
      }

      $StudentIgrade = StudentIgrade::whereIn('Enroll_ID' , $Enrollment->pluck('id')->toArray());
        return view('Student.student365View',
            compact(
                'Degree' , 
                'Semester',
                'student',
                'Registration',
                'semesterSession',
                'EnrollBySem',
                'StudentIgrade'
                
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
    public function student365View(){

        $Degree = Degree::select('DegreeName' , 'ID')->get();
        $Semester = Semester::select('SemSession' , 'ID')->get();
        return view('Student.student365View',
            compact('Degree' , 'Semester') 
            
               );
    }

    public function studentChallan(){


        $Degree = Degree::select('DegreeName' , 'ID')->get();
        $Semester = Semester::select('SemSession' , 'ID')->get();

        return view('Challans.student_challan',
            compact('Degree' , 'Semester') 
            
               );
    }

    

    public function findStudentChallan(Request $request){

        $student      =  Student::where('StdRollNo' , $request->SemSession.'/'.$request->DegreeName.'/'.$request->Rollno)->first();
        // dd($student->StdRollNo);
        
        if(empty($student)){
          return redirect()
              ->back()
              ->with([
                  'errorToaster' => 'Student Not Found!' , 
                  'title' => 'Error'
              ]);
        }

        $registration = Registration::where('Std_ID' , $student->ID)->first();
        if (!empty($registration)){
            $challans = Challan::where('Reg_ID' , $registration->ID)->paginate(10);    
        }else{
            $challans = '';
        }

        // session(['std_ID' => $student->ID]);


     
        // dd($challans);
        $Semester     = Semester::select('SemSession' , 'ID')->get();

        $Degree       = Degree::select('DegreeName' , 'ID')->get();


          return view('Challans.student_challan',
              compact(
                  'challans','Semester','Degree','student'
                  
              ) 
              
                 );
      }
    
}
