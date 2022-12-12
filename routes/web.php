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

Route::get('/Std_login_view', [ControllersLogin::class, 'Std_login_view']);
Route::get('/Emp_login_view', [ControllersLogin::class, 'Emp_login_view']);

Route::get('/Std_login', [ControllersLogin::class, 'Std_login']);
Route::get('/Emp_login', [ControllersLogin::class, 'Emp_login_1']);

Route::get('/logout', [ControllersLogin::class, 'logoutsessions']);

Route::post('/Emp_login', [ControllersLogin::class, 'Emp_login'])->name('emp.login');
Route::post('/Std_login', [ControllersLogin::class, 'Std_login']);




Route::get('/Addmision_student_info', [addmision::class, 'student_info_view']);


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