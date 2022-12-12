<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use Illuminate\Support\Facades\DB;

class DegreeController extends Controller
{
     public function addDegree(){
        $button = "Add Degree";
        $title  = 'Add Degree';
        $route  = '/storeDegree';
        return 
        view('Degrees.AddDegree', 
         compact(
            'button', 
            'title', 
            'route'
         ));
    }

    public function storeDegree(Request $request){
        
         $submit = DB::update("EXEC InsertDegree 
            @DegreeName         = '$request->DegreeName',
            @DegreeLevel        = '$request->DegreeLevel', 
            @DegreeFullName     = '$request->DegreeFullName', 
            @Dpt_ID             = '$request->Dpt_ID',
            @Total_Credit_Hours = '$request->Total_Credit_Hours', 
            @Status             = '$request->status';
            ");
          return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'Degree Added!
            ']);
         
    }
    public function editDegree($id){

        $button = "Update Degree";
        $title  = 'Edit Degree';
        $route  = '/updateDegree';
        $degree = Degree::where('Degree_ID' , $id)->first();

        return 
        view('Degrees.editDegree', 
         compact(
            'degree', 
            'button', 
            'title' , 
            'route'
         ));
    }

     public function allDegrees(){

        $degrees = Degree::get();
        $title  = 'All Degrees';
        $route = 'updateDegree';
        $getEditRoute = 'editDegree';
        $modalTitle = 'Edit Degree';
        return 
        view('Degrees.allDegrees' , 
         compact(
            'degrees' , 
            'title',
            'route',
            'modalTitle',
            'getEditRoute'
         ));
    }

    public function updateDegree(Request $request){

        $submit = DB::update("EXEC degreeUpdate

            @Degree_ID           = '$request->id', 
            @DegreeName          = '$request->DegreeName', 
            @DegreeLevel         = '$request->DegreeLevel', 
            @DegreeFullName      = '$request->DegreeFullName' , 
            @Dpt_ID              = '$request->Dpt_ID', 
            @Total_Credit_Hours  = '$request->Total_Credit_Hours' , 
            @Status              = '$request->Status';");

        return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'Degree Updated!
            ']);
    }
}
