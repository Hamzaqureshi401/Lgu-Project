<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CoursesController extends Controller
{
    public function validation($request){

        $validator = Validator::make($request->all(),[
            'CourseCode'        => 'required|max:30|unique:Course',
            'CourseName'        => 'required|max:60',
            'CreditHours'       => 'required|max:10',
            'LectureType'       => 'required|max:10',
        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

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

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
             $submit = DB::update("EXEC sp_InsertCourses
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

    }

    public function editCourse($id){

        $button = 'Update Course';
        $title  = 'Edit Course';
        $route  = '/updateCourse';
        $courses = Course::where('ID' , $id)->first();
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

        $courses = Course::paginate(10);
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

         $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
              $submit = DB::update("EXEC sp_UpdateCourses

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

}
