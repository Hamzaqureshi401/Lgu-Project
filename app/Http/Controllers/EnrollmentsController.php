<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class EnrollmentsController extends Controller
{
    public function validation($request){

        $validator = Validator::make($request->all(),[
            'Std_ID'               => 'required|numeric',
            'SemCourses_ID'        => 'required|numeric',
            'Is_i_mid'             => 'required|numeric',
            'Is_i_final'           => 'required|numeric',
            'Reg_ID'               => 'required|numeric',
        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

    public function addEnrollments(){

        $button = "Add Enrollment";
        $title  = 'Add Enrollment';
        $route  = '/storeEnrollments';
        return
        view('Enrollments.addEnrollments',
            compact(
                'button' ,
                'title' ,
                'route')
        );
    }

    public function storeEnrollments(Request $request){

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
             $submit = DB::update("EXEC sp_InsertEnrollment
            @Std_ID         = '$request->Std_ID',
            @SemCourses_ID  = '$request->SemCourses_ID',
            @Is_i_mid       = '$request->Is_i_mid' ,
            @Is_i_final     = '$request->Is_i_final',
            @Reg_ID         = '$request->Reg_ID'

            ;");

          return response()->json([
            'title' => 'Done' ,
            'type'=> 'success',
            'message'=> 'Enrollment Added!
            ']);
        }

    }

    public function editEnrollment($id){

        $button = 'Update Enrollment';
        $title  = 'Edit Enrollment';
        $route  = '/updateEnrollment';
        $courses = Enrollment::where('ID' , $id)->first();
         return
         view('Enrollments.editEnrollment',
            compact(
                'courses',
                'button' ,
                'title' ,
                'route'
            ));
    }
    public function allEnrollments(){

        $courses = Enrollment::paginate(10);
        $title  = 'All Enrollments';
        $route = 'updateEnrollment';
        $getEditRoute = 'editEnrollment';
        $modalTitle = 'Edit Enrollment';

        return
        view('Enrollments.allEnrollments' ,
            compact(
                'courses' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function updateEnrollment(Request $request){

         $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
              $submit = DB::update("EXEC sp_UpdateEnrollment

            @ID              = '$request->id',
            @Std_ID          = '$request->Std_ID',
            @SemCourses_ID   = '$request->SemCourses_ID',
            @Is_i_mid        = '$request->Is_i_mid' ,
            @Is_i_final      = '$request->Is_i_final',
            @Reg_ID          = '$request->Reg_ID'
            ;");

        return response()->json([
            'title' => 'Done' ,
            'type'=> 'success',
            'message'=> 'Enrollment Updated!
            ']);
        }


    }
}
