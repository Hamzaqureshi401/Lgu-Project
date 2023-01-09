<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Validator;


class DepartmentController extends Controller
{
   public function validation($request){

        $this->validate($request, [
            'Dpt_Name'      => 'required|max:10',
            'Dpt_FullName'  => 'required|max:50',
            'HODUID'        => 'required|numeric',
            'DeanUID'       => 'required|numeric',
            'Status'        => 'required|numeric',

        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

     public function addDepartment(){

        $button = "Add Department";
        $title  = 'Add Department';
        $route  = '/storeDepartment';
        return
            view('Departments.addDepartment',
               compact(
                  'button' ,
                  'title' ,
                  'route'
               ));
    }

    public function storeDepartment(Request $request){

      $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
            $submit = DB::update("EXEC sp_InsertDepartments
            @Dpt_Name       = '$request->Dpt_Name',
            @Dpt_FullName   = '$request->Dpt_FullName',
            @HODUID         = '$request->HODUID' ,
            @DeanUID        = '$request->DeanUID',
            @Status         = '$request->Status'
            ;");
          return response()->json([
            'title' => 'Done' ,
            'type'=> 'success',
            'message'=> 'Department Added!
            ']);
        }

    }

    public function editDepartment($id){

        $button = "Update Department";
        $title  = 'Edit Department';
        $route  = '/updateDepartment';
        $department = Department::where('ID' , $id)->first();

        return
            view('Departments.editDepartment',
               compact(
                  'department',
                  'button' ,
                  'title' ,
                  'route'
               ));
    }

     public function allDepartments(){

        $departments = Department::paginate(10);
        $title  = 'All Departments';
        $route = 'updateDepartment';
        $getEditRoute = 'editDepartment';
        $modalTitle = 'Edit Departments';


        return
            view('Departments.allDepartments' ,
               compact(
                  'departments' ,
                  'title',
                  'route',
                  'modalTitle',
                  'getEditRoute'
               ));
    }
     public function updateDepartment (Request $request){

       $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
             $submit = DB::update("EXEC sp_UpdateDepartments

            @Dpt_ID         = '$request->id',
            @Dpt_Name       = '$request->Dpt_Name',
            @Dpt_FullName   = '$request->Dpt_FullName',
            @HODUID         = '$request->HODUID' ,
            @DeanUID        = '$request->DeanUID',
            @Status         = '$request->Status'
            ;");

        return response()->json([
            'title'  => 'Done' ,
            'type'   => 'success',
            'message'=> 'Department Updated!
            ']);
        }
    }
}
