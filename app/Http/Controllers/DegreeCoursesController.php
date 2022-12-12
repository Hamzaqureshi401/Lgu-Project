<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Course;
use App\Models\DegreeCourse;
use Illuminate\Support\Facades\DB;

class DegreeCoursesController extends Controller
{
    public function getDegreeCourses(){

    }

     public function addDegreeCourse(){

        $button = "Add Degree Courses";
        $title  = 'Add Degree Courses';
        $route  = '/storeDegreeCourse';
        $degrees = Degree::get();
        $courses = Course::get();
        return 
        view('DegreeCourses.addDegreeCourses', 
            compact(
                'button' , 
                'title' , 
                'route',
                'degrees',
                'courses')
        );
    }

     public function storeDegreeCourse(Request $request){

         $submit = DB::update("EXEC InsertDegreeCourses 
            @Degree_ID  = '$request->Degree_ID', 
            @Course_ID  = '$request->Course_ID'
           ;");

          return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'DegreeCourse Added!
            ']);

    }

      public function allDegreeCourses(){

        $degreeCourses = DegreeCourse::get();
        $title  = 'Degree Course';
        $route = 'updateDegreeCourse';
        $getEditRoute = 'editDegreeCourse';
        $modalTitle = 'Edit Degree Course';
       
        return 
        view('DegreeCourses.allDegreeCourses' , 
            compact(
                'degreeCourses' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'
            ));
    }

     public function editDegreeCourse($id){

        $button = "Update Degree Course";
        $title  = 'Edit Degree Course';
        $route  = '/updateDegreeCourse';
        $degrees = Degree::get();
        $courses = Course::get();
        $designation = DegreeCourse::where('DegCourses_ID' , $id)->first();

        return 
        view('DegreeCourses.editDegreeCourse', 
            compact(
                'designation', 
                'button' , 
                'title' , 
                'route',
                'degrees',
                'courses'
            ));

    }
     public function updateDegreeCourse (Request $request){



        $submit = DB::update("EXEC DegreeCoursesUpdate
            @DegCourses_ID         = '$request->id',
            @Degree_ID             = '$request->Degree_ID', 
            @Course_ID             = '$request->Course_ID'
            ;");
        dd($request->all());
         return response()->json([
            'title'  => 'Done' , 
            'type'   => 'success', 
            'message'=> 'Degree Course Updated!
            ']);
    }



}
