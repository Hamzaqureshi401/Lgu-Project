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
use App\Models\Challan;
use App\Models\Attendance;
use App\Models\StdScholarShip;
use App\Models\Department;
use DB;
use PDF;

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

     public function igradeStdDean(){

        $students = false;

        $title  = 'All Courses';
        $route = 'updateCourse';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';

        return view('View.igradeStdDean', 
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
       $attandences = Attendance::get();
        return 
        view('View.studentAttendance', 
            compact(
                
                'enrollments',
                'attandences'
            )    
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

    // public function courseOffering($degree = null , $batch = null){

    //     $degreeBatches  = DegreeBatche::where(['Degree_ID' => $degree , 'Batch_ID' => $batch])->first();
    //     if(!empty($degreeBatches)){
    //         $semesterCourses = SemesterCourse::where('DegBatches_ID' , $degreeBatches->ID)->get();
    //     }else{
    //         $semesterCourses = "";
    //     }
    //    $degrees      =  Degree::get();
    //    $semesters    =  semester::get();
      
    //     $title      = 'All Courses';
    //     $route      = 'courseOffering/';
    //     $getEditRoute = 'courseAssign';
    //     $modalTitle = 'Assign Course';
    //     $button     = 'Submit';
        
    //    return 
    //     view('View.courseOffering', 
    //         compact(
                
    //             'degrees',
                
    //             'semesters',
    //             'title',
    //             'route',
    //             'getEditRoute',
    //             'modalTitle',
    //             'button',
    //             'degreeBatches',
    //             'semesterCourses'
    //         )    
    //         );

    // }

    // public function courseAssign($id){

    //     $button = 'Do You Wisht To Submit?';
    //     $courses = Course::where('ID' , $id)->first();
    //     $employees      = Employee::get();



    //     return 
    //     view('View.courseAssign', 
    //         compact(
                
    //             'courses',
    //             'button',
    //             'employees'
              
    //         ));

    // }

    //  public function editAssignedCourse($id){

    //     $button = 'Do You Wisht To Submit?';
    //     $courses = Course::where('ID' , $id)->first();
    //     $employees      = Employee::get();
    //     $degrees      =  Degree::get();
    //     $semesters    =  semester::get();

        

    //     return 
    //     view('View.editAssignedCourse', 
    //         compact(
                
    //             'courses',
    //             'button',
    //             'employees',
    //             'degrees',
    //             'semesters'
              
    //         ));

    // }

    public function financeDashboard(){

        $enrollment = Enrollment::pluck('id')->count();
        $start=date("Y-m-01");
        $end = date("Y-m-t", strtotime($start));
        $loopend=date("t", strtotime($start));
        for($i=1;$i<=$loopend;$i++)
        {
            if($start <= date("Y-m-d")){
                $days[$i]=$start; 
                $start= date('Y-m-d', strtotime($start. ' + 1 days'));    
            }
            }
        $newStdAdmission = $this->newStudentAdmissionAmount($days);
        $regularAtdAmount = $this->regularStudentAmount($days);

        $departments = Department::get();

       
         return view('View.financeDashboard' , compact(
            'enrollment' , 
            'newStdAdmission' , 
            'days', 
            'regularAtdAmount',
            'departments'
        ));
    }

    
    public function getAlldegreesOfDpt(){
        $departments = Department::get();
        foreach($departments as $department){
            $degreesID[] = Degree::where('Dpt_ID' , $department->ID)->pluck('ID')->toArray();
        }
        return $degreesID;
    }
   

   

    public function newStudentAdmissionAmount($days){
        
        for ($i=1; $i <= sizeof($days) ; $i++) { 
            $year = date('Y');
        // $amount[$i] = DB::select("SELECT
        // sum( Amount) AS aggregate
        //  FROM
        // students
        // INNER JOIN  Registrations  ON Registrations . Std_ID  =  Students . ID
        // INNER JOIN Challans ON  Challans . Reg_ID  = Registrations . ID
        // WHERE
        // (AdmissionSession  = 'Fa-$year'
        // OR  AdmissionSession  = 'Sp-$year')
        // AND cast( IssueDate  AS date)  =  '$days[$i]'") ?? "0";

        $amount[$i] = Student::
            join('registrations', 'registrations.Std_ID', '=', 'students.ID')
            ->join('challans', 'challans.Reg_ID', '=', 'registrations.ID')
            ->selectRaw('SUM(Amount) AS aggregate')
            ->where(function($query) use ($year) {
                $query->where('AdmissionSession', '=', "Fa-$year")
                      ->orWhere('AdmissionSession', '=', "Sp-$year");
            })
            ->whereDate('IssueDate', '=', $days[$i])
            ->value('aggregate') ?? 0;
        
        }
        return $amount;

    }

    public function regularStudentAmount($days){

        for ($i=1; $i <= sizeof($days) ; $i++) { 
            $year = date('Y');

        $amount[$i] = Student::
        join('registrations', 'registrations.Std_ID', '=', 'students.ID')
        ->join('challans', 'challans.Reg_ID', '=', 'registrations.ID')
        ->selectRaw('SUM(Amount) AS aggregate')
        
        ->whereDate('IssueDate', '=', $days[$i])
        ->where(function($query) use ($year) {
            $query->where('AdmissionSession', 'not like', "%$year%")
                  ->orWhereNull('AdmissionSession');
        })
        ->value('aggregate') ?? 0;
        }
        return $amount;
    }

    public function ScholarshipDetail(){

        return view('view.scholarshipDetail');
    }

    public function auditReport(){

         $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.auditReport' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function studentLedger(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.studentLedger' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }

    public function admissionDashboard(){

        return view('View.admissionDashboard');
    }
    public function examSeating(){

         return view('View.examSeating');
    }
     public function masterSheet(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.masterSheet' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }
    public function defualtSeating(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.defualtSeating' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }

    public function studentBalance(){

        $students       = Student::paginate(10);
        $title          = 'All Student Admissions';
        $route          = 'updateStudentAdmission';
        $getEditRoute   = 'editStudentAdmission';
        $modalTitle     = 'Edit Student Admission';
        return view('View.studentBalance' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }

    public function defualterList(){

        return view('View.defualterList');
    }

    public function collectionReport(){

        return view('View.collectionReport');
    }
    public function subjectWiseStudentCount(){

        return view('View.subjectWiseStudentCount');
    }
    public function igradeDefualter(){

        return view('View.igradeDefualter');
    }
    public function igradeDefualterMasterSheet(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.igradeDefualterMasterSheet' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }

     public function igradeDefualtSeating(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.igradeDefualtSeating' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }
    public function feeRescheduling(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.feeRescheduling' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }
    public function taxReport(){

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view('View.taxReport' , 
            compact(
                'students' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));

    }
     public function ledger(){

        $enrollment = Enrollment::pluck('id')->count();

        return view('View.ledger' , compact('enrollment'));
    }

    public function test(){

        return view('test');
    }

      public function downloadcstorepdf(){
        $data = "";
        view()->share('data',$data);
        $pdf = PDF::loadView('test');
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('itemized_sales_report.pdf');
      }

}
