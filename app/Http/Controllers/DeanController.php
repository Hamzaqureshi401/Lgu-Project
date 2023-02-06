<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Degree;
use App\Models\Department;
use App\Models\DegreeBatche;


class DeanController extends Controller
{
    public function deanDashboard(){

        $course     = Course::pluck('id')->count();
        $enrollment = Enrollment::pluck('id')->count();
        $students   = Student::get();
        $degrees    = Degree::get();
        $departments= Department::get();
        $degreeBatches = DegreeBatche::whereNotNull('Batch_ID')->get();
        // foreach($degreeBatches as $degreeBatche){
        //      dd($students->where(['Degree_ID' => $degreeBatche->degree->ID])->count() ?? 0);
        // }
       
        
        return 
        view('Dean.deanDashboard' , 
            compact(
                'course',
                'enrollment',
                'students',
                'degrees',
                'departments',
                'degreeBatches'
            ));
    }


}
