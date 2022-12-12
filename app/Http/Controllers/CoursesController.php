<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function addCourses(){

        $button = "Add Course";
        $title  = 'Add Course';
        $route  = '/storeCourses';
        return 
        view('Courses.addCourses', 
            compact(
                'button' , 
                'title' , 
                'route')
        );
    }

    public function storeCourses(Request $request){

         $submit = DB::update("EXEC InsertCourse 
            @CourseCode  = '$request->CourseCode', 
            @CourseName  = '$request->CourseName', 
            @CreditHours = '$request->CreditHours' , 
            @LectureType = '$request->LectureType';");

          return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'Course Added!
            ']);

    }

    public function editCourses($id){

        $button = 'Update Course';
        $title  = 'Edit Course';
        $route  = '/updateCourse';
        $courses = Course::where('Course_id' , $id)->first();
         return 
         view('Courses.editCourse', 
            compact(
                'courses', 
                'button' , 
                'title' , 
                'route'
            ));
    }
    public function allCourses(){

        $courses = Course::get();
        $title  = 'All Courses';
        $route = 'updateCourse';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';
       
        return 
        view('Courses.allCourses' , 
            compact(
                'courses' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'
            ));
    }

    public function updateCourse(Request $request){

        $submit = DB::update("EXEC CoursesUpdate

            @Course_ID   = '$request->id', 
            @CourseCode  = '$request->CourseCode', 
            @CourseName  = '$request->CourseName', 
            @CreditHours = '$request->CreditHours' , 
            @LectureType = '$request->LectureType';");

        return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'Course Updated!
            ']);
    }

}
