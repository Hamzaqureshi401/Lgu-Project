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

Route::get('/Std_login_view', [ControllersLogin::class, 'Std_login_view'])->name('std.login');
Route::get('/Emp_login_view', [ControllersLogin::class, 'Emp_login_view']);

Route::get('/Std_login', [ControllersLogin::class, 'Std_login']);
Route::get('/Emp_login', [ControllersLogin::class, 'Emp_login_1']);

Route::get('/logout', [ControllersLogin::class, 'logoutsessions']);

Route::post('/Emp_login', [ControllersLogin::class, 'Emp_login'])->name('emp.login');
Route::post('/Std_login', [ControllersLogin::class, 'Std_login']);



Route::get('/addStudentAdmission', [App\Http\Controllers\AdmissionController::class, 'addStudentAdmission'])->name('add.StudentAdmissions');
Route::get('/allStudentAdmissions', [App\Http\Controllers\AdmissionController::class, 'allStudentAdmissions'])->name('all.StudentAdmissions');
Route::post('/storeStudentAdmission', [App\Http\Controllers\AdmissionController::class, 'storeStudentAdmission'])->name('store.StudentAdmission');
Route::get('/editStudentAdmission/{id?}', [App\Http\Controllers\AdmissionController::class, 'editStudentAdmission'])->name('edit.StudentAdmission');
Route::post('/updateStudentAdmission', [App\Http\Controllers\AdmissionController::class, 'updateStudentAdmission'])->name('update.StudentAdmission');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/main', [App\Http\Controllers\HomeController::class, 'main'])->name('main');

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

// Enrollments Routes start

Route::get('/addEnrollment', [App\Http\Controllers\EnrollmentsController::class, 'addEnrollment'])->name('add.Enrollment');
Route::get('/storeEnrollment/{id}', [App\Http\Controllers\EnrollmentsController::class, 'executeEnrollment'])->name('store.Enrollment');
Route::get('/confirmEnrollment', [App\Http\Controllers\EnrollmentsController::class, 'confirmEnrollment'])->name('confirm.Enrollment');


Route::get('/addEnrollments', [App\Http\Controllers\EnrollmentsController::class, 'addEnrollments'])->name('add.Enrollments');
Route::get('/allEnrollments', [App\Http\Controllers\EnrollmentsController::class, 'allEnrollments'])->name('all.Enrollments');
Route::post('/storeEnrollments', [App\Http\Controllers\EnrollmentsController::class, 'storeEnrollments'])->name('store.Enrollments');
Route::get('/editEnrollment/{id?}', [App\Http\Controllers\EnrollmentsController::class, 'editEnrollment'])->name('edit.Enrollment');
Route::post('/updateEnrollment', [App\Http\Controllers\EnrollmentsController::class, 'updateEnrollment'])->name('update.Enrollment');


//Dean Route Start

Route::get('/deanDashboard', [App\Http\Controllers\DeanController::class, 'deanDashboard'])->name('dean.Dashboard');

//Attandence Route Start

Route::get('/deanAttandence', [App\Http\Controllers\AttendanceController::class, 'deanAttandence'])->name('attandence.Dashboard');

Route::get('/deanAllStuAttandence', [App\Http\Controllers\AttendanceController::class, 'deanAllStuAttandence'])->name('dean.All.Stu.Attandence');

//View Route Start

Route::get('/vcView', [App\Http\Controllers\ViewController::class, 'vcView'])->name('vc.View');
Route::get('/igradeStudentView', [App\Http\Controllers\ViewController::class, 'igradeStudentView'])->name('igrade.StudentView');

Route::get('/examDashboardView', [App\Http\Controllers\ViewController::class, 'examDashboardView'])->name('exam.dasshboardView');

Route::get('/igradeStdhodView', [App\Http\Controllers\ViewController::class, 'igradeStdhodView'])->name('igrade.StdhodView');

Route::get('/student365View', [App\Http\Controllers\ViewController::class, 'student365View'])->name('student.365View');

Route::get('/reportingPanel', [App\Http\Controllers\ViewController::class, 'reportingPanel'])->name('reporting.Panel');

Route::get('/sectionWIseReport', [App\Http\Controllers\ViewController::class, 'sectionWIseReport'])->name('section.WIse.Report');

Route::get('/examMainDashboardView', [App\Http\Controllers\ViewController::class, 'examMainDashboardView'])->name('exam.Main.Dashboard.View');

Route::get('/ceoDashboard', [App\Http\Controllers\ViewController::class, 'ceoDashboard'])->name('ceo.Dashboard');

Route::get('/studentResult', [App\Http\Controllers\ViewController::class, 'studentResult'])->name('student.Result');

Route::get('/stdWiseAward', [App\Http\Controllers\ViewController::class, 'stdWiseAward'])->name('std.Wise.Award');

Route::get('/stdAffairs', [App\Http\Controllers\ViewController::class, 'stdAffairs'])->name('std.Affairs');

