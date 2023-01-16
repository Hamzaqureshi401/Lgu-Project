<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemesterCourse;
use App\Models\Enrollment;
use App\Models\StudentMark;

use DB;

class StudentMarksCotroller extends Controller
{
    public function validation($request){


       $this->validate($request, [
            'SemCourses_ID' => 'required',
            'ObtainedMarks' => 'required',
            'Enroll_ID'     => 'required',

        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function addStudentMark(){

        $button = "Add StudentMark";
        $title  = 'Add StudentMark';
        $route  = '/storeStudentMark';
        $semesterCourses = SemesterCourse::get();
        $enrollments = Enrollment::distinct('Std_ID')->get();
        
        return
        view('StudentMarks.addStudentMark',
            compact(
                'button' ,
                'title' ,
                'route',
                'semesterCourses',
                'enrollments'
            ));
    }

    public function storeStudentMark(Request $request){

        $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
            $submit             = DB::Update("EXEC insertStudentMarks
            @SemCourses_ID       = '$request->SemCourses_ID',
            @ObtainedMarks       = '$request->ObtainedMarks',
            @Enroll_ID           = '$request->Enroll_ID'
            ;
        ");
        //     return response()->json([
        //     'title' => 'Done' ,
        //     'type'=> 'success',
        //     'message'=> 'StudentMark Added!
        //     ']);
        // }
             return redirect()->back()->with(['successToaster' => 'Dasignation Added' , 'title' => 'Success']);
    }

    public function editStudentMark($id){

        $button = "Update StudentMark";
        $title  = 'Edit Student Mark';
        $route  = '/updateStudentMark';
        $studentMark = StudentMark::where('ID' , $id)->first();
        $semesterCourses = SemesterCourse::get();
        $enrollments = Enrollment::distinct()->select('ID' , 'Std_ID')->get();
        

        return
        view('StudentMarks.editStudentMark',
            compact(
                'studentMark',
                'button' ,
                'title' ,
                'route',
                'semesterCourses',
                'enrollments'
            ));

    }
    public function allStudentMarks(){

        $StudentMarks = StudentMark::paginate(10);
        $title  = 'All StudentMarks';
        $route = 'updateStudentMark';
        $getEditRoute = 'editStudentMark';
        $modalTitle = 'Edit StudentMarks';
        return
        view('StudentMarks.allStudentMark' ,
            compact(
                'StudentMarks' ,
                'title',
                'route',
                'getEditRoute',
                'modalTitle'
            ));
        return response()->json([
            'title'  => 'Done' ,
            'type'   => 'success',
            'message'=> 'StudentMark Updated!
            ']);
    }

     public function updateStudentMark (Request $request){


         $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
             $submit = DB::update("EXEC UpdateStudentMarks
                @StdMarks_ID = '$request->id',
            @SemCourses_ID       = '$request->SemCourses_ID',
            @ObtainedMarks       = '$request->ObtainedMarks',
            @Enroll_ID           = '$request->Enroll_ID'
            ;");

        // return response()->json([
        //     'title'  => 'Done' ,
        //     'type'   => 'success',
        //     'message'=> 'StudentMark Updated!
        //     ']);
        // }
              return redirect()->back()->with(['successToaster' => 'StudentMark Updated' , 'title' => 'Success']);

    }
}
