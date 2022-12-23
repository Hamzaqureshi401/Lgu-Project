<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
     public function deanAttandence(){

        return view('Dean.MarkAttendance.deanAttandence');
    }
     public function deanAllStuAttandence(){

        $students = false;

        $title  = 'All Courses';
        $route = 'updateCourse';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';

        return view('Dean.StudentsAttendance.allStudentAttandence'  , 
            compact(
                'students' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'
            ));
    }
}
