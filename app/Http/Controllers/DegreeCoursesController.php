<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Course;
use App\Models\DegreeCourse;
use App\Models\SemesterCourse;
use Illuminate\Support\Facades\DB;
use Validator;

class DegreeCoursesController extends Controller
{
    public function validation($request){

        $validator = Validator::make($request->all(),[
            'Degree_ID'        => 'required|numeric',
            'Course_ID'        => 'required|numeric',

        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
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

        $unique = $this->uniqueDigreeCourse($request);
        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }elseif($unique == true){
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> 'These are Already Enrolled!'
            ]);
        }else {
            $submit = DB::update("EXEC sp_InsertDegreeCourses
            @Degree_ID  = '$request->Degree_ID',
            @Course_ID  = '$request->Course_ID'
           ;");

          return response()->json([
            'title' => 'Done' ,
            'type'=> 'success',
            'message'=> 'DegreeCourse Added!
            ']);
        }

    }

      public function allDegreeCourses(){

        $degreeCourses = DegreeCourse::paginate(10);
        $title         = 'Degree Course';
        $route         = 'updateDegreeCourse';
        $getEditRoute  = 'editDegreeCourse';
        $modalTitle    = 'Edit Degree Course';

        $names = DegreeCourse::select('DegreeName' , 'CourseName')
        ->join('Degrees' , 'Degrees.ID' , 'DegreeCourses.ID')
        ->join('Courses' , 'Courses.ID' , 'DegreeCourses.ID')
        ->paginate(10);

        return
        view('DegreeCourses.allDegreeCourses' ,
            compact(
                'degreeCourses' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute',
                'names'
            ));
    }

     public function editDegreeCourse($id){

        $button = "Update Degree Course";
        $title  = 'Edit Degree Course';
        $route  = '/updateDegreeCourse';
        $degrees = Degree::get();
        $courses = Course::get();
        $designation = DegreeCourse::where('ID' , $id)->first();

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

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
           $submit = DB::update("EXEC DegreeCoursesUpdate
            @ID                    = '$request->id',
            @Degree_ID             = '$request->Degree_ID',
            @Course_ID             = '$request->Course_ID'
            ;");
         return response()->json([
            'title'  => 'Done' ,
            'type'   => 'success',
            'message'=> 'Degree Course Updated!
            ']);
        }
    }

    public function uniqueDigreeCourse($request){

        return DegreeCourse::where(['Degree_ID' => $request->Degree_ID , 'Course_ID' => $request->Course_ID])->exists();
    }

}
