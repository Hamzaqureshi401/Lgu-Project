<?php

use App\Http\Controllers\addmision;
use App\Http\Controllers\login as ControllersLogin;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ControllersLogin::class, 'index']);

Route::get('/studentLogin', [ControllersLogin::class, 'Std_login_view'])->name('std.login');
Route::get('/employeeLogin', [ControllersLogin::class, 'Emp_login_view']);

Route::get('/Std_login', [ControllersLogin::class, 'Std_login']);
Route::get('/Emp_login', [ControllersLogin::class, 'Emp_login_1']);

Route::get('/logout', [ControllersLogin::class, 'logoutsessions']);

Route::post('/Emp_login', [ControllersLogin::class, 'Emp_login'])->name('emp.login');
Route::post('/Std_login', [ControllersLogin::class, 'Std_login']);

Auth::routes();

Route::group(['middleware' => 'StudentAuth'], function () {


// Enrollments Routes start

Route::get('/addEnrollment', [App\Http\Controllers\EnrollmentsController::class, 'addEnrollment'])->name('add.Enrollment');

Route::get('/storeEnrollment/{id}', [App\Http\Controllers\EnrollmentsController::class, 'executeEnrollment'])->name('store.Enrollment');

Route::get('/confirmEnrollment', [App\Http\Controllers\EnrollmentsController::class, 'confirmEnrollment'])->name('confirm.Enrollment');


Route::get('/addEnrollments', [App\Http\Controllers\EnrollmentsController::class, 'addEnrollments'])->name('add.Enrollments');

Route::post('/storeEnrollments', [App\Http\Controllers\EnrollmentsController::class, 'storeEnrollments'])->name('store.Enrollments');
Route::get('/editEnrollment/{id?}', [App\Http\Controllers\EnrollmentsController::class, 'editEnrollment'])->name('edit.Enrollment');
Route::post('/updateEnrollment', [App\Http\Controllers\EnrollmentsController::class, 'updateEnrollment'])->name('update.Enrollment');

// Challans Routes start

Route::get('/allChallans', [App\Http\Controllers\ChallanController::class, 'allChallans'])->name('all.Challans');
// Route::get('/printChallan/{Challans_ID?}', [App\Http\Controllers\ChallanController::class, 'printChallan'])->name('print.Challan');



//student roll no slip route

Route::get('/getStudentRollNoSlip',[App\Http\Controllers\StdRollNoSlipsController::class,'getStudentRollNoSlip'])->name('get.Student.Roll.No.Slip');

//student dashboard

Route::get('/studentDashboard', [App\Http\Controllers\StudentController::class, 'studentDashboard'])->name('student.Dashboard');



Route::get('/applyIgrades/{id?}', [App\Http\Controllers\IgradesController::class, 'applyIgrades'])->name('apply.Igrades');
Route::get('/studentIgrades', [App\Http\Controllers\IgradesController::class, 'studentIgrades'])->name('all.Igrades');
Route::post('/storeIgrades', [App\Http\Controllers\IgradesController::class, 'storeIgrades'])->name('store.Igrades');


});

Route::get('/printRollNoSlip', [App\Http\Controllers\StdRollNoSlipsController::class, 'printRollNoSlip'])->name('print.RollNo.Slip');

Route::get('/downloadcstorepdf', [App\Http\Controllers\ViewController::class, 'downloadcstorepdf'])->name('downloadcstorepdf');

Route::get('/printChallan/{Challans_ID?}', [App\Http\Controllers\ChallanController::class, 'printChallan'])->name('print.Challan');


Route::group(['middleware' => 'EmpAuth'], function () {

    //Student Challan
Route::any('/studentChallan', [App\Http\Controllers\StudentController::class, 'studentChallan'])->name('student.Challan');

Route::get('/findStudentChallan', [App\Http\Controllers\StudentController::class, 'findStudentChallan'])->name('find.StudentChallan');


Route::any('/student365View', [App\Http\Controllers\StudentController::class, 'student365View'])->name('student.365View');

// Route::get('/printChallan/{Challans_ID?}', [App\Http\Controllers\ChallanController::class, 'printChallan'])->name('print.Challan');

Route::post('/approveChallan/{Challans_ID?}', [App\Http\Controllers\ChallanController::class, 'approvechallan'])->name('approve.Challan');

Route::post('/admissionFeeWaveOff/{Challans_ID?}', [App\Http\Controllers\ChallanController::class, 'admissionfeewaveoff'])->name('admissionfeewaveoff.Challan');





Route::post('/findStudent', [App\Http\Controllers\StudentController::class, 'findStudent'])->name('find.Student');

Route::get('/getFactSheet/{id}', [App\Http\Controllers\StudentController::class, 'getFactSheet'])->name('download.FactSheet');


Route::get('/allEnrollments', [App\Http\Controllers\EnrollmentsController::class, 'allEnrollments'])->name('all.Enrollments');
Route::get('/confirmIgradesTeacher/{id?}', [App\Http\Controllers\IgradesController::class, 'confirmIgradesTeacher'])->name('confirm.Igrades.Teacher');

Route::get('/teacherStdIgrade', [App\Http\Controllers\IgradesController::class, 'teacherStdIgrade'])->name('teacher.Std.Igrade');
Route::get('/hodStdIgrade', [App\Http\Controllers\IgradesController::class, 'hodStdIgrade'])->name('hod.Std.Igrade');
Route::get('/confirmIgradesHod/{id?}', [App\Http\Controllers\IgradesController::class, 'confirmIgradesHod'])->name('confirm.Igrades.Hod');


Route::get('/addStudentAdmission', [App\Http\Controllers\AdmissionController::class, 'addStudentAdmission'])->name('add.StudentAdmissions');
Route::get('/allStudentAdmissions', [App\Http\Controllers\AdmissionController::class, 'allStudentAdmissions'])->name('all.StudentAdmissions');
Route::post('/storeStudentAdmission', [App\Http\Controllers\AdmissionController::class, 'storeStudentAdmission'])->name('store.StudentAdmission');
Route::get('/editStudentAdmission/{id?}', [App\Http\Controllers\AdmissionController::class, 'editStudentAdmission'])->name('edit.StudentAdmission');
Route::post('/updateStudentAdmission', [App\Http\Controllers\AdmissionController::class, 'updateStudentAdmission'])->name('update.StudentAdmission');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/main', [App\Http\Controllers\HomeController::class, 'main'])->name('main');
// Module Routes start

Route::get('/addModules', [App\Http\Controllers\ModulesController::class, 'addModules'])->name('add.Modules');
Route::get('/allModules', [App\Http\Controllers\ModulesController::class, 'allModules'])->name('all.Modules');
Route::post('/storeModules', [App\Http\Controllers\ModulesController::class, 'storeModules'])->name('store.Modules');
Route::get('/editModule/{id?}', [App\Http\Controllers\ModulesController::class, 'editModule'])->name('edit.Module');
Route::post('/updateModule', [App\Http\Controllers\ModulesController::class, 'updateModule'])->name('update.Module');

// StdScholarShips Routes start

Route::get('/addStdScholarShips', [App\Http\Controllers\StdScholarShipsController::class, 'addStdScholarShips'])->name('add.StdScholarShips');
Route::get('/allStdScholarShips', [App\Http\Controllers\StdScholarShipsController::class, 'allStdScholarShips'])->name('all.StdScholarShips');
Route::post('/storeStdScholarShip', [App\Http\Controllers\StdScholarShipsController::class, 'storeStdScholarShip'])->name('store.StdScholarShip');
Route::get('/editStdScholarShip/{id?}', [App\Http\Controllers\StdScholarShipsController::class, 'editStdScholarShip'])->name('edit.StdScholarShip');
Route::post('/updateStdScholarShip', [App\Http\Controllers\StdScholarShipsController::class, 'updateStdScholarShip'])->name('update.StdScholarShip');

// UserRights Routes start

Route::get('/addUserRights', [App\Http\Controllers\UserRightsController::class, 'addUserRights'])->name('add.UserRights');
Route::get('/allUserRights', [App\Http\Controllers\UserRightsController::class, 'allUserRights'])->name('all.UserRights');
Route::post('/storeUserRight', [App\Http\Controllers\UserRightsController::class, 'storeUserRight'])->name('store.UserRight');
Route::get('/editUserRight/{id?}', [App\Http\Controllers\UserRightsController::class, 'editUserRight'])->name('edit.UserRight');
Route::post('/updateUserRight', [App\Http\Controllers\UserRightsController::class, 'updateUserRight'])->name('update.UserRight');

// Courses Routes start

Route::get('/addCourses', [App\Http\Controllers\CoursesController::class, 'addCourses'])->name('add.Courses');
Route::get('/allCourses', [App\Http\Controllers\CoursesController::class, 'allCourses'])->name('all.Courses');
Route::post('/storeCourses', [App\Http\Controllers\CoursesController::class, 'storeCourses'])->name('store.Courses');
Route::get('/editCourse/{id?}', [App\Http\Controllers\CoursesController::class, 'editCourse'])->name('edit.Course');
Route::post('/updateCourse', [App\Http\Controllers\CoursesController::class, 'updateCourse'])->name('update.Course');

// Degree Routes start

Route::get('/addDegree', [App\Http\Controllers\DegreeController::class, 'addDegree'])->name('add.Degree');
Route::get('/allDegrees', [App\Http\Controllers\DegreeController::class, 'allDegrees'])->name('all.Degrees');
Route::post('/storeDegree', [App\Http\Controllers\DegreeController::class, 'storeDegree'])->name('store.Degree');
Route::get('/editDegree/{id}', [App\Http\Controllers\DegreeController::class, 'editDegree'])->name('edit.Degree');
Route::post('/updateDegree', [App\Http\Controllers\DegreeController::class, 'updateDegree'])->name('update.Degree');


// Department Routes start

Route::get('/addDepartment', [App\Http\Controllers\DepartmentController::class, 'addDepartment'])->name('add.Department');
Route::get('/allDepartments', [App\Http\Controllers\DepartmentController::class, 'allDepartments'])->name('all.Departments');

Route::post('/storeDepartment', [App\Http\Controllers\DepartmentController::class, 'storeDepartment'])->name('store.Department');
Route::get('/editDepartment/{id}', [App\Http\Controllers\DepartmentController::class, 'editDepartment'])->name('edit.Department');
Route::post('/updateDepartment', [App\Http\Controllers\DepartmentController::class, 'updateDepartment'])->name('update.Department');


// Designation Routes start

Route::get('/addDesignation', [App\Http\Controllers\DesignationController::class, 'addDesignation'])->name('add.Designation');
Route::get('/allDesignations', [App\Http\Controllers\DesignationController::class, 'allDesignations'])->name('all.Designations');
Route::post('/storeDesignation', [App\Http\Controllers\DesignationController::class, 'storeDesignation'])->name('store.Designation');
Route::get('editDesignation/{id}', [App\Http\Controllers\DesignationController::class, 'editDesignation'])->name('edit.Designation');
Route::post('/updateDesignation', [App\Http\Controllers\DesignationController::class, 'updateDesignation'])->name('update.Designation');

// EmpDesignation Routes start

Route::get('/setEmpDesignation', [App\Http\Controllers\DesignationController::class, 'setEmpDesignation'])->name('set.EmpDesignation');
Route::get('/allEmpDesignations', [App\Http\Controllers\DesignationController::class, 'allEmpDesignations'])->name('all.EmpDesignations');
Route::post('/storeEmpDesignation', [App\Http\Controllers\DesignationController::class, 'storeEmpDesignation'])->name('store.EmpDesignation');
Route::get('editEmpDesignation/{id}', [App\Http\Controllers\DesignationController::class, 'editEmpDesignation'])->name('edit.EmpDesignation');
Route::post('/updateEmpDesignation', [App\Http\Controllers\DesignationController::class, 'updateEmpDesignation'])->name('update.EmpDesignation');

// StudentMark Routes start

Route::get('/addStudentMark', [App\Http\Controllers\StudentMarksCotroller::class, 'addStudentMark'])->name('add.StudentMark');
Route::get('/allStudentMarks', [App\Http\Controllers\StudentMarksCotroller::class, 'allStudentMarks'])->name('all.StudentMarks');
Route::get('editStudentMark/{id}', [App\Http\Controllers\StudentMarksCotroller::class, 'editStudentMark'])->name('edit.StudentMark');
Route::post('/updateStudentMark', [App\Http\Controllers\StudentMarksCotroller::class, 'updateStudentMark'])->name('update.StudentMark');

// Semester Routes start

Route::get('/addSemester', [App\Http\Controllers\SemesterController::class, 'addSemester'])->name('add.Semester');
Route::get('/allSemesters', [App\Http\Controllers\SemesterController::class, 'allSemesters'])->name('all.Semesters');
Route::post('/storeSemester', [App\Http\Controllers\SemesterController::class, 'storeSemester'])->name('store.Semester');
Route::get('editSemester/{id}', [App\Http\Controllers\SemesterController::class, 'editSemester'])->name('edit.Semester');
Route::post('/updateSemester', [App\Http\Controllers\SemesterController::class, 'updateSemester'])->name('update.Semester');

// Employee Route Start

Route::get('/addEmployee', [App\Http\Controllers\EmployeeController::class, 'addEmployee'])->name('add.Employee');
Route::get('/allEmployees', [App\Http\Controllers\EmployeeController::class, 'allEmployees'])->name('all.Employees');
Route::post('/storeEmployee', [App\Http\Controllers\EmployeeController::class, 'storeEmployee'])->name('store.Employee');
Route::get('editEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'editEmployee'])->name('edit.Employee');
Route::post('/updateEmployee', [App\Http\Controllers\EmployeeController::class, 'updateEmployee'])->name('update.Employee');

// DegreeBatch Route Start

Route::get('/addDegreeBatchs', [App\Http\Controllers\DegreeBatchsController::class, 'addDegreeBatch'])->name('add.DegreeBatch');
Route::get('/allDegreeBatchs', [App\Http\Controllers\DegreeBatchsController::class, 'allDegreeBatchs'])->name('all.DegreeBatchs');
Route::post('/storeDegreeBatch', [App\Http\Controllers\DegreeBatchsController::class, 'storeDegreeBatch'])->name('store.DegreeBatch');
Route::get('editDegreeBatch/{id}', [App\Http\Controllers\DegreeBatchsController::class, 'editDegreeBatch'])->name('edit.DegreeBatch');
Route::post('/updateDegreeBatch', [App\Http\Controllers\DegreeBatchsController::class, 'updateDegreeBatch'])->name('update.DegreeBatch');

// SemesterDetails Routes start

Route::get('/addSemesterDetails', [App\Http\Controllers\SemesterDetailsController::class, 'addSemesterDetails'])->name('add.SemesterDetails');
Route::get('/allSemesterDetails', [App\Http\Controllers\SemesterDetailsController::class, 'allSemesterDetails'])->name('all.SemesterDetails');
Route::post('/storeSemesterDetails', [App\Http\Controllers\SemesterDetailsController::class, 'storeSemesterDetails'])->name('store.SemesterDetails');
Route::get('/editSemesterDetail/{id?}', [App\Http\Controllers\SemesterDetailsController::class, 'editSemesterDetail'])->name('edit.SemesterDetail');
Route::post('/updateSemesterDetail', [App\Http\Controllers\SemesterDetailsController::class, 'updateSemesterDetail'])->name('update.SemesterDetail');

// SemesterCourses Routes start

Route::get('/addSemesterCourses', [App\Http\Controllers\SemesterCoursesController::class, 'addSemesterCourses'])->name('add.SemesterCourses');
Route::get('/allSemesterCourses', [App\Http\Controllers\SemesterCoursesController::class, 'allSemesterCourses'])->name('all.SemesterCourses');
Route::post('/storeSemesterCourses', [App\Http\Controllers\SemesterCoursesController::class, 'storeSemesterCourses'])->name('store.SemesterCourses');
Route::get('/editSemesterCourse/{id?}', [App\Http\Controllers\SemesterCoursesController::class, 'editSemesterCourse'])->name('edit.SemesterCourse');
Route::post('/updateSemesterCourse', [App\Http\Controllers\SemesterCoursesController::class, 'updateSemesterCourse'])->name('update.SemesterCourse');

// TimeTable Routes start

Route::get('/addTimeTable', [App\Http\Controllers\TimeTableController::class, 'addTimeTable'])->name('add.TimeTable');
Route::get('/allTimeTables', [App\Http\Controllers\TimeTableController::class, 'allTimeTables'])->name('all.TimeTables');

Route::post('/storeTimeTable', [App\Http\Controllers\TimeTableController::class, 'storeTimeTable'])->name('store.TimeTable');
Route::get('/editTimeTable/{id}', [App\Http\Controllers\TimeTableController::class, 'editTimeTable'])->name('edit.TimeTable');
Route::post('/updateTimeTable', [App\Http\Controllers\TimeTableController::class, 'updateTimeTable'])->name('update.TimeTable');

Route::post('/updateTimeTableAndCourse', [App\Http\Controllers\TimeTableController::class, 'updateTimeTableAndCourse'])->name('update.TimeTableAndCourse');




//Dean Route Start

Route::get('/empDashboard', [App\Http\Controllers\DeanController::class, 'deanDashboard'])->name('dean.Dashboard');

Route::get('/vcDashboard', [App\Http\Controllers\DeanController::class, 'vcDashboard'])->name('vc.Dashboard');

Route::get('/allowedEmpCourses', [App\Http\Controllers\DeanController::class, 'allCourses'])->name('allowed.EmpCourses');

Route::get('/allowedEmpStudent', [App\Http\Controllers\DeanController::class, 'allowedEmpStudent'])->name('allowed.EmpStudent');

Route::get('/allowedSemesterCourses', [App\Http\Controllers\DeanController::class, 'allowedSemesterCourses'])->name('allowed.SemesterCourses');




//Attandence Route Start

Route::get('/empSemesterCourses', [App\Http\Controllers\AttendanceController::class, 'empSemesterCourses'])->name('emp.SemesterCourses');

Route::get('/empSemesterCoursesAttandence/{id}', [App\Http\Controllers\AttendanceController::class, 'semetserCourseAttandences'])->name('semetser.Course.Attandences');

Route::get('/viewEmpAttendence', [App\Http\Controllers\AttendanceController::class, 'viewEmpAttendence'])->name('view.Emp.Attendence');

Route::get('/claseesShedule/{id}', [App\Http\Controllers\AttendanceController::class, 'claseesShedule'])->name('clasees.Shedule');


Route::get('/studentAttandenceView/{day}/{id}', [App\Http\Controllers\AttendanceController::class, 'studentAttandenceView'])->name('student.Attandence.View');

Route::post('/storeAttandences', [App\Http\Controllers\AttendanceController::class, 'storeAttandences'])->name('store.Attandences');


Route::get('/courseConfigration/{id}', [App\Http\Controllers\AttendanceController::class, 'courseConfigration'])->name('course.Configration');


Route::post('/storeCourseConfigration', [App\Http\Controllers\AttendanceController::class, 'storeCourseConfigration'])->name('store.Course.Configration');

Route::post('/addSemesterCourseWeightageDetails', [App\Http\Controllers\AttendanceController::class, 'addSemesterCourseWeightageDetails'])->name('add.Semester.Course.Weightage.Details');

Route::post('/storeStudentMark', [App\Http\Controllers\AttendanceController::class, 'storeStudentMark'])->name('store.StudentMark');



Route::get('/studentAssesment/{id}', [App\Http\Controllers\AttendanceController::class, 'studentAssesment'])->name('student.Assesment');

Route::get('/deleteMarks/{id?}', [App\Http\Controllers\AttendanceController::class, 'deleteMarks'])->name('delete.Marks');


Route::get('/assignMarks/{id}/{type}', [App\Http\Controllers\AttendanceController::class, 'assignMarks'])->name('assign.Marks');

Route::get('/gradeConfigration/{id}', [App\Http\Controllers\AttendanceController::class, 'gradeConfigration'])->name('grade.Configration');

Route::get('/igradeMarksEntry/{id}', [App\Http\Controllers\AttendanceController::class, 'igradeMarksEntry'])->name('igrade.Marks.Entry');

Route::get('/printGradeSheet/{id}', [App\Http\Controllers\AttendanceController::class, 'printGradeSheet'])->name('print.Grade.Sheet');




Route::get('/deanAttandence', [App\Http\Controllers\AttendanceController::class, 'deanAttandence'])->name('attandence.Dashboard');

Route::get('/deanAllStuAttandence', [App\Http\Controllers\AttendanceController::class, 'deanAllStuAttandence'])->name('dean.All.Stu.Attandence');

//View Route Start

Route::get('/vcView', [App\Http\Controllers\ViewController::class, 'vcView'])->name('vc.View');
Route::get('/igradeStudentView', [App\Http\Controllers\ViewController::class, 'igradeStudentView'])->name('igrade.StudentView');

Route::get('/igradeStdDean', [App\Http\Controllers\ViewController::class, 'igradeStdDean'])->name('igrade.StdDean');

Route::get('/examDashboardView', [App\Http\Controllers\ViewController::class, 'examDashboardView'])->name('exam.dasshboardView');

Route::get('/igradeStdhodView', [App\Http\Controllers\ViewController::class, 'igradeStdhodView'])->name('igrade.StdhodView');


Route::get('/reports', [App\Http\Controllers\ViewController::class, 'reports'])->name('reports');

Route::get('/assessmentDetail', [App\Http\Controllers\ViewController::class, 'assessmentDetail'])->name('assessment.Detail');

Route::get('/departmentFactSheet', [App\Http\Controllers\ViewController::class, 'departmentFactSheet'])->name('department.FactSheet');
Route::get('/hodCourses', [App\Http\Controllers\ViewController::class, 'hodCourses'])->name('hod.Courses');
Route::get('/degSemesterWiseReport', [App\Http\Controllers\ViewController::class, 'degSemesterWiseReport'])->name('deg.Semester.Wise.Report');

Route::get('/studentAttendance', [App\Http\Controllers\ViewController::class, 'studentAttendance'])->name('student.Attendance');




Route::get('/reportingPanel', [App\Http\Controllers\ViewController::class, 'reportingPanel'])->name('reporting.Panel');

Route::get('/sectionWIseReport', [App\Http\Controllers\ViewController::class, 'sectionWIseReport'])->name('section.WIse.Report');

Route::get('/examMainDashboardView', [App\Http\Controllers\ViewController::class, 'examMainDashboardView'])->name('exam.Main.Dashboard.View');

Route::get('/ceoDashboard', [App\Http\Controllers\ViewController::class, 'ceoDashboard'])->name('ceo.Dashboard');

Route::get('/studentResult', [App\Http\Controllers\ViewController::class, 'studentResult'])->name('student.Result');

Route::get('/stdWiseAward', [App\Http\Controllers\ViewController::class, 'stdWiseAward'])->name('std.Wise.Award');

Route::get('/stdAffairs', [App\Http\Controllers\ViewController::class, 'stdAffairs'])->name('std.Affairs');
Route::get('/findCourseDay', [App\Http\Controllers\ViewController::class, 'findCourseDay'])->name('find.Course.Day');

Route::get('/courseOffering/{id?}/{id2?}', [App\Http\Controllers\CoursesController::class, 'courseOffering'])->name('course.Offering');

Route::any('/courseAssign/{id?}/{id2?}', [App\Http\Controllers\CoursesController::class, 'courseAssign'])->name('course.Assign');


Route::get('/editAssignedCourse/{id?}', [App\Http\Controllers\CoursesController::class, 'editAssignedCourse'])->name('edit.Assigned.Course');

Route::get('/editTimeTableAndCourse/{id}', [App\Http\Controllers\CoursesController::class, 'editTimeTableAndCourse'])->name('edit.TimeTableAndCourse');


Route::get('/deleteTimeTable/{id}', [App\Http\Controllers\TimeTableController::class, 'deleteTimeTable'])->name('delete.TimeTable');

Route::get('/financeDashboard', [App\Http\Controllers\ViewController::class, 'financeDashboard'])->name('finance.Dashboard');

Route::post('/financeDashboardBySem', [App\Http\Controllers\ViewController::class, 'financeDashboard'])->name('financeDashboard.BySem');

Route::get('/scholarshipDetail', [App\Http\Controllers\ViewController::class, 'scholarshipDetail'])->name('scholarship.Detail');
Route::get('/auditReport', [App\Http\Controllers\ViewController::class, 'auditReport'])->name('audit.Report');
Route::get('/studentLedger', [App\Http\Controllers\ViewController::class, 'studentLedger'])->name('student.Ledger');
Route::get('/admissionDashboard', [App\Http\Controllers\ViewController::class, 'admissionDashboard'])->name('admission.Dashboard');

Route::get('/examSeating', [App\Http\Controllers\ViewController::class, 'examSeating'])->name('exam.Seating');

Route::get('/masterSheet', [App\Http\Controllers\ViewController::class, 'masterSheet'])->name('master.Sheet');
Route::get('/defualtSeating', [App\Http\Controllers\ViewController::class, 'defualtSeating'])->name('defualt.Seating');

Route::get('/studentBalance', [App\Http\Controllers\ViewController::class, 'studentBalance'])->name('student.Balance');

Route::get('/defualterList', [App\Http\Controllers\ViewController::class, 'defualterList'])->name('defualter.List');

Route::get('/collectionReport', [App\Http\Controllers\ViewController::class, 'collectionReport'])->name('collection.Report');

Route::get('/subjectWiseStudentCount', [App\Http\Controllers\ViewController::class, 'subjectWiseStudentCount'])->name('subject.Wise.Student.Count');

Route::get('/igradeDefualter', [App\Http\Controllers\ViewController::class, 'igradeDefualter'])->name('igrade.Defualter');

Route::get('/igradeDefualterMasterSheet', [App\Http\Controllers\ViewController::class, 'igradeDefualterMasterSheet'])->name('igradeDefualter.MasterSheet');
Route::get('/igradeDefualtSeating', [App\Http\Controllers\ViewController::class, 'igradeDefualtSeating'])->name('igrade.Defualt.Seating');

Route::get('/feeRescheduling', [App\Http\Controllers\ViewController::class, 'feeRescheduling'])->name('fee.Rescheduling');
Route::get('/taxReport', [App\Http\Controllers\ViewController::class, 'taxReport'])->name('tax.Report');
Route::get('/ledger', [App\Http\Controllers\ViewController::class, 'ledger'])->name('ledger');






});


//StdRollNoSlips Routes start

Route::get('/addStdRollNoSlips', [App\Http\Controllers\StdRollNoSlipsController::class, 'addStdRollNoSlips'])->name('add.StdRollNoSlips');
Route::get('/allStdRollNoSlips', [App\Http\Controllers\StdRollNoSlipsController::class, 'allStdRollNoSlips'])->name('all.StdRollNoSlips');
Route::post('/storeStdRollNoSlips', [App\Http\Controllers\StdRollNoSlipsController::class, 'storeStdRollNoSlips'])->name('store.StdRollNoSlips');
Route::get('/editStdRollNoSlip/{id?}', [App\Http\Controllers\StdRollNoSlipsController::class, 'editStdRollNoSlip'])->name('edit.StdRollNoSlip');
Route::post('/updateStdRollNoSlip', [App\Http\Controllers\StdRollNoSlipsController::class, 'updateStdRollNoSlip'])->name('update.StdRollNoSlip');
Route::post('/uploadStdRollNoSlipExcel', [App\Http\Controllers\StdRollNoSlipsController::class, 'uploadStdRollNoSlipExcel'])->name('upload.StdRollNoSlip.Excel');
