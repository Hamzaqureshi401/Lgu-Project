<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use Validator;

class SemesterController extends Controller
{

    public function validation($request){

        $validator = Validator::make($request->all(),[
            'SemSession'         => 'required|max:30',
            'Year'               => 'required|numeric',
            'SemStartDate'       => 'required|date',
            'SemEndDate'         => 'required|date',
            'EnrollmentStartDate'=> 'required|date',
            'EnrollmentEndDate'  => 'required|date',
            'ExamStartDate'      => 'required|date',
            'ExamEndDate'        => 'required|date',
            'I_mid_StartDate'    => 'required|date',
            'I_mid_EndDate'      => 'required|date',
            'I_final_StartDate'  => 'required|date',
            'I_final_EndDate'    => 'required|date',
        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

    public function addSemester(){

        $button = "Add Semester";
        $title  = 'Add Semester';
        $route  = '/storeSemester';
        return
        view('Semesters.addSemesters',
            compact(
                'button' ,
                'title' ,
                'route')
        );
    }

    public function storeSemester(Request $request){

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
            $submit = DB::update("EXEC sp_InsertSemesters
            @SemSession             = '$request->SemSession',
            @Year                   = '$request->Year',
            @SemStartDate           = '$request->SemStartDate' ,
            @SemEndDate             = '$request->SemEndDate' ,
            @EnrollmentStartDate    = '$request->EnrollmentStartDate' ,
            @EnrollmentEndDate      = '$request->EnrollmentEndDate' ,
            @ExamStartDate          = '$request->ExamStartDate' ,
            @ExamEndDate            = '$request->ExamEndDate' ,
            @I_mid_StartDate        = '$request->I_mid_StartDate' ,
            @I_mid_EndDate          = '$request->I_mid_EndDate' ,
            @I_final_StartDate      = '$request->I_final_StartDate' ,
            @I_final_EndDate        = '$request->I_final_EndDate'
            ;");

          return response()->json([
            'title' => 'Done' ,
            'type'=> 'success',
            'message'=> 'Semester Added!
            ']);
        }

    }

    public function editSemester($id){

        $button = 'Update Semester';
        $title  = 'Edit Semester';
        $route  = '/updateSemester';
        $semester = Semester::where('Sem_ID' , $id)->first();
         return
         view('Semesters.editSemester',
            compact(
                'semester',
                'button' ,
                'title' ,
                'route'
            ));
    }
    public function allSemesters(){

        $semesters = Semester::paginate(10);
        $title  = 'All Semesters';
        $route = 'updateSemester';
        $getEditRoute = 'editSemester';
        $modalTitle = 'Edit Semester';

        return
        view('Semesters.allSemesters' ,
            compact(
                'semesters' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function updateSemester(Request $request){

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
            $submit = DB::update("EXEC UpdateSemesters
            @Sem_ID                 = '$request->id',
            @SemSession             = '$request->SemSession',
            @Year                   = '$request->Year',
            @SemStartDate           = '$request->SemStartDate' ,
            @SemEndDate             = '$request->SemEndDate' ,
            @EnrollmentStartDate    = '$request->EnrollmentStartDate' ,
            @EnrollmentEndDate      = '$request->EnrollmentEndDate' ,
            @ExamStartDate          = '$request->ExamStartDate' ,
            @ExamEndDate            = '$request->ExamEndDate' ,
            @I_mid_StartDate        = '$request->I_mid_StartDate' ,
            @I_mid_EndDate          = '$request->I_mid_EndDate' ,
            @I_final_StartDate      = '$request->I_final_StartDate' ,
            @I_final_EndDate        = '$request->I_final_EndDate'
            ;");

        return response()->json([
            'title' => 'Done' ,
            'type'=> 'success',
            'message'=> 'Semester Updated!
            ']);
        }

    }

}
