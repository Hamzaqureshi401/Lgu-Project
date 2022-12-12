<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
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

         $submit = DB::update("EXEC InsertSemesters 
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

        $semesters = Semester::get();
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
