<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Validator;


class DepartmentController extends Controller
{
   public function validation($request){

        $this->validate($request, [
            'Dpt_Name'      => 'required|max:10|unique:Departments',
            'Dpt_FullName'  => 'required|max:50|unique:Departments',
            'Status'        => 'required|numeric',

        ]);
        
    }
    public function validationUpdate($request){

        $this->validate($request, [
            'Dpt_Name'      => 'required|max:10',
            'Dpt_FullName'  => 'required|max:50',
            'Status'        => 'required|numeric',

        ]);
        
    }

     public function addDepartment(){

        $button = "Add Department";
        $title  = 'Add Department';
        $route  = '/storeDepartment';
        $employees = Employee::get();
        return
            view('Departments.addDepartment',
               compact(
                  'button' ,
                  'title' ,
                  'route',
                  'employees'
               ));
    }

    public function storeDepartment(Request $request){

        if(!empty($request->HODUID) &&  !empty($request->DeanUID)){
            return redirect()->back()->with(['errorToaster' => 'Please Select One User!' , 'title' => 'Error']);
        }

      $validator = $this->validation($request);
       
            $submit = DB::update("EXEC sp_InsertDepartments
            @Dpt_Name       = '$request->Dpt_Name',
            @Dpt_FullName   = '$request->Dpt_FullName',
            @HODUID         = '$request->HODUID' ,
            @DeanUID        = '$request->DeanUID',
            @Status         = '$request->Status'
            ;");
       
         return redirect()->back()->with(['successToaster' => 'Department Added' , 'title' => 'Success']);


    }

    public function editDepartment($id){

        $button = "Update Department";
        $title  = 'Edit Department';
        $route  = '/updateDepartment';
        $department = Department::where('ID' , $id)->first();
        $employees = Employee::get();

        return
            view('Departments.editDepartment',
               compact(
                  'department',
                  'button' ,
                  'title' ,
                  'route',
                  'employees'
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

        $validator = $this->validationUpdate($request);
      
             $submit = DB::update("EXEC sp_UpdateDepartments

            @Dpt_ID         = '$request->id',
            @Dpt_Name       = '$request->Dpt_Name',
            @Dpt_FullName   = '$request->Dpt_FullName',
            @HODUID         = '$request->HODUID' ,
            @DeanUID        = '$request->DeanUID',
            @Status         = '$request->Status'
            ;");

    return redirect()->back()->with(['successToaster' => 'Department Updated' , 'title' => 'Success']);

    }
}
