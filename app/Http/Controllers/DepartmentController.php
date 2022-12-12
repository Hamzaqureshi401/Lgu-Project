<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
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

      

         $submit = DB::update("EXEC InsertDepartment 
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

    public function editDepartment($id){

        $button = "Update Department";
        $title  = 'Edit Department';
        $route  = '/updateDepartment';
        $department = Department::where('Dpt_id' , $id)->first();

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

        $departments = Department::get();
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

        $submit = DB::update("EXEC DepartmentUpdate

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
