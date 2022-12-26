<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Validator;

class DegreeController extends Controller
{

    public function validation($request){

        $validator = Validator::make($request->all(),[
            'DegreeName'        => 'required|max:50',
            'DegreeLevel'       => 'required|max:30',
            'DegreeFullName'    => 'required|max:70',
            'Dpt_ID'            => 'required|numeric',
            'Total_Credit_Hours' => 'required|numeric',
            'Status'            => 'required|numeric',
        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

    public function addDegree(){
        $button = "Add Degree";
        $title  = 'Add Degree';
        $route  = '/storeDegree';
        $departments = Department::get();
        return
        view('Degrees.AddDegree',
         compact(
            'button',
            'title',
            'route',
            'departments'
         ));
    }

    public function storeDegree(Request $request){

      //  dd($request->all());

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
           $submit = DB::update("EXEC sp_InsertDegrees
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

    }
    public function editDegree($id){

        $button = "Update Degree";
        $title  = 'Edit Degree';
        $route  = '/updateDegree';
        $departments = Department::get();
        $degree = Degree::where('ID' , $id)->first();

        return
        view('Degrees.editDegree',
         compact(
            'degree',
            'button',
            'title' ,
            'route',
            'departments'
         ));
    }

     public function allDegrees(){

        $degrees = Degree::paginate(10);
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

         $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
           $submit = DB::update("EXEC sp_UpdateDegrees

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
}
