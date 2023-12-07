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
    public function vcView()
    {

        return view('View.vcView');
    }
    public function igradeStudentView()
    {

        $students = false;

        $title  = 'All Courses';
        $route = 'updateCourse';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';

        return view(
            'View.igradeStudentView',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }

    public function igradeStdDean()
    {

        $students = false;

        $title  = 'All Courses';
        $route = 'updateCourse';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';

        return view(
            'View.igradeStdDean',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }

    public function examDashboardView()
    {

        return view(
            'View.examDashboardView',

        );
    }
    public function igradeStdhodView()
    {

        return view(
            'View.igradeStdhodView',

        );
    }


    public function reportingPanel()
    {

        return view(
            'View.reportingPanel',

        );
    }
    public function sectionWIseReport()
    {

        return view(
            'View.sectionWIseReport',

        );
    }
    public function examMainDashboardView()
    {
        $semester = DB::connection('lgu_new_testing')->table('Semesters')->where('CurrentSemester', '1')->first();
        $semester_course_count = DB::connection('lgu_new_testing')->table('SemesterCourses')->where('Sem_ID', $semester->ID)->count();


        #Courses Offered count

        $Courses_Enrollment_count = DB::table('SemesterCourses')
            ->select('SemesterCourses.ID', 'SemesterCourses.Sem_ID', 'Enrollments.SemCourses_ID')
            ->join('Enrollments', 'SemesterCourses.ID', '=', 'Enrollments.SemCourses_ID')
            ->where('SemesterCourses.Sem_ID', $semester->ID)
            ->count();


        #Enrollment Offered count


        $Enrollment_count = DB::table('SemesterCourses')
            ->join('Enrollments', 'SemesterCourses.ID', '=', 'Enrollments.SemCourses_ID')
            ->select('SemesterCourses.Sem_ID', 'Enrollments.Std_ID')
            ->where('SemesterCourses.Sem_ID', '=', $semester->ID)
            ->distinct()
            ->get()->count();






        $semsessionid = $semester->ID;
        $semester = DB::connection('lgu_new_testing')->table('Semesters')->get();

        return view('View.examMainDashboardView')->with('semester', $semester)->with('semester_course_count', $semester_course_count)->with('semsessionid', $semsessionid)->with('Courses_Enrollment_count', $Courses_Enrollment_count)->with('Enrollment_count', $Enrollment_count);
    }

    public function examMainDashboardViewdata(Request $request)
    {

        #course Offered count
        $semester = DB::connection('lgu_new_testing')->table('Semesters')->where('ID', $request->semsessionid)->first();
        $semester_course_count = DB::connection('lgu_new_testing')->table('SemesterCourses')->where('Sem_ID', $semester->ID)->count();


        #Courses Offered count

        $Courses_Enrollment_count = DB::table('SemesterCourses')
            ->select('SemesterCourses.ID', 'SemesterCourses.Sem_ID', 'Enrollments.SemCourses_ID')
            ->join('Enrollments', 'SemesterCourses.ID', '=', 'Enrollments.SemCourses_ID')
            ->where('SemesterCourses.Sem_ID', $request->semsessionid)
            ->count();

        #Enrollment Offered count

        $Enrollment_count = DB::table('SemesterCourses')
            ->join('Enrollments', 'SemesterCourses.ID', '=', 'Enrollments.SemCourses_ID')
            ->select('SemesterCourses.Sem_ID', 'Enrollments.Std_ID')
            ->where('SemesterCourses.Sem_ID', '=', $semester->ID)
            ->distinct()
            ->get()->count();



        $semester = DB::connection('lgu_new_testing')->table('Semesters')->get();
        $semsessionid = $request->semsessionid;

        return view('View.examMainDashboardView')->with('semester', $semester)->with('semester_course_count', $semester_course_count)->with('semsessionid', $semsessionid)->with('Courses_Enrollment_count', $Courses_Enrollment_count)->with('Enrollment_count', $Enrollment_count);
    }


    public function ceoDashboard()
    {
        return view('View.ceoDashboard');
    }




    public function studentResult()
    {

        return view(
            'View.studentResult',

        );
    }
    public function stdWiseAward()
    {

        return view(
            'View.stdWiseAward',

        );
    }
    public function stdAffairs()
    {

        return view(
            'View.stdAffairs',

        );
    }
    public function reports()
    {

        return view(
            'View.reports',

        );
    }
    public function assessmentDetail()
    {
        $employees      = Employee::get();
        $semesterCourse = SemesterCourse::get();
        return
            view(
                'View.assessmentDetail',
                compact(
                    'employees',
                    'semesterCourse'
                )
            );
    }
    public function departmentFactSheet()
    {

        $degreeBatches  = DegreeBatche::paginate(10);
        $students       = Student::get();
        return
            view(
                'View.departmentFactSheet',
                compact(

                    'degreeBatches',
                    'students'
                )
            );
    }

    public function degSemesterWiseReport()
    {
        $employees      = Employee::get();
        $semesterCourse = SemesterCourse::get();
        $degreeBatches  = DegreeBatche::get();
        return
            view(
                'View.degSemesterWiseReport',
                compact(
                    'employees',
                    'semesterCourse',
                    'degreeBatches'
                )
            );
    }
    public function studentAttendance()
    {

        $enrollments    = Enrollment::get();
        $attandences = Attendance::get();
        return
            view(
                'View.studentAttendance',
                compact(

                    'enrollments',
                    'attandences'
                )
            );
    }

    public function findCourseDay(Request $request)
    {

        $timeTable = TimeTable::where('Day', $request->Day)->get();
        $semesterCourses = SemesterCourse::join('TimeTable', 'timeTable.SemCourse_ID', 'semesterCourses.ID')
            ->where('Day', $request->Day)
            ->get();
        //dd(SemesterCourse::with('timeTable')->where('Day' , $request->Day)->get());
        return
            view(
                'View.courseTimeTable',
                compact(

                    'timeTable',

                    'semesterCourses'
                )
            );
    }



    public function financeDashboard(Request $request)
    {



        $SemPassed = Semester::where('ID', $request->ID)->first();

        $Semester = Semester::get();

        $start = date("Y-m-01");
        $end = date("Y-m-t", strtotime($start));
        $loopend = date("t", strtotime($start));
        for ($i = 1; $i <= $loopend; $i++) {
            if ($start <= date("Y-m-d")) {
                $days[$i] = $start;
                $start = date('Y-m-d', strtotime($start . ' + 1 days'));
            }
        }
        $newStdAdmission = $this->newStudentAdmissionAmount($days, $SemPassed);
        $regularAtdAmount = $this->regularStudentAmount($days, $SemPassed);


        $departments = Department::get();
        $challans = Challan::get();

        $sp_FinancedDataByDpt = DB::select("EXEC sp_FinancedDataByDpt
           @sem_ID   = '$request->ID'
            ;");



        $sp_FinancedDataByCategory = DB::select("EXEC sp_FinancedDataByCategory
           @sem_ID   = '$request->ID'
            ;");

        $sp_OverallFinanceData = DB::select("EXEC sp_OverallFinanceData
           @sem_ID   = '$request->ID'
            ;");

        //dd($sp_FinancedDataByDpt , $sp_FinancedDataByCategory , $sp_OverallFinanceData);



        //dd($sp_FinancedDataByDpt , $sp_FinancedDataByCategory);


        return view('View.financeDashboard', compact(
            'newStdAdmission',
            'days',
            'regularAtdAmount',
            'departments',
            'challans',
            'sp_FinancedDataByDpt',
            'sp_FinancedDataByCategory',
            'Semester',
            'sp_OverallFinanceData'
        ));
    }
    public function newStudentAdmissionAmount($days, $SemPassed)
    {

        for ($i = 1; $i <= sizeof($days); $i++) {
            $year = date('Y');

            if (!empty($SemPassed)) {
                $amount[$i] = Student::join('registrations', 'registrations.Std_ID', '=', 'students.ID')
                    ->join('challans', 'challans.Reg_ID', '=', 'registrations.ID')
                    ->selectRaw('SUM(Amount) AS aggregate')
                    ->where(function ($query) use ($SemPassed) {
                        $query->where('AdmissionSession', '=', "$SemPassed->SemSession");
                    })
                    ->whereDate('IssueDate', '=', $days[$i])
                    ->value('aggregate') ?? 0;
            }
        }
        return $amount ?? 0;
    }

    public function regularStudentAmount($days, $SemPassed)
    {

        if (!empty($SemPassed)) {
            $year = explode('-', $SemPassed->SemSession);
            $year = $year[1];


            for ($i = 1; $i <= sizeof($days); $i++) {
                //$year = date('Y');

                $amount[$i] = Student::join('registrations', 'registrations.Std_ID', '=', 'students.ID')
                    ->join('challans', 'challans.Reg_ID', '=', 'registrations.ID')
                    ->selectRaw('SUM(Amount) AS aggregate')

                    ->whereDate('IssueDate', '=', $days[$i])
                    ->where(function ($query) use ($year) {
                        $query->where('AdmissionSession', 'not like', "%$year%")
                            ->orWhereNull('AdmissionSession');
                    })
                    ->value('aggregate') ?? 0;
            }
        }
        return $amount ?? 0;
    }

    public function ScholarshipDetail()
    {

        return view('view.scholarshipDetail');
    }

    public function auditReport()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.auditReport',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }

    public function studentLedger()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.studentLedger',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }

    public function admissionDashboard()
    {

        return view('View.admissionDashboard');
    }
    public function examSeating()
    {

        return view('View.examSeating');
    }
    public function masterSheet()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.masterSheet',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }
    public function defualtSeating()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.defualtSeating',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }

    public function studentBalance()
    {

        $students       = Student::paginate(10);
        $title          = 'All Student Admissions';
        $route          = 'updateStudentAdmission';
        $getEditRoute   = 'editStudentAdmission';
        $modalTitle     = 'Edit Student Admission';
        return view(
            'View.studentBalance',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }

    public function defualterList()
    {

        return view('View.defualterList');
    }

    public function collectionReport()
    {

        return view('View.collectionReport');
    }
    public function subjectWiseStudentCount()
    {

        return view('View.subjectWiseStudentCount');
    }
    public function igradeDefualter()
    {

        return view('View.igradeDefualter');
    }
    public function igradeDefualterMasterSheet()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.igradeDefualterMasterSheet',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }

    public function igradeDefualtSeating()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.igradeDefualtSeating',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }
    public function feeRescheduling()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.feeRescheduling',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }
    public function taxReport()
    {

        $students = Student::paginate(10);
        $title  = 'All Student Admissions';
        $route = 'updateStudentAdmission';
        $getEditRoute = 'editStudentAdmission';
        $modalTitle = 'Edit Student Admission';
        return view(
            'View.taxReport',
            compact(
                'students',
                'title',
                'modalTitle',
                'route',
                'getEditRoute'
            )
        );
    }
    public function ledger()
    {

        $enrollment = Enrollment::pluck('id')->count();

        return view('View.ledger', compact('enrollment'));
    }

    public function test()
    {

        return view('test');
    }

    public function downloadcstorepdf()
    {
        $data = "";
        view()->share('data', $data);
        $pdf = PDF::loadView('test');
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('itemized_sales_report.pdf');
    }


    public function ExamAwards()
    {

        $Exam_awards = DB::select("EXEC awards @semcourseid =2977;");

        // dd($Exam_awards);

        return view('View.ExamAward', compact('Exam_awards'));

    }
}
