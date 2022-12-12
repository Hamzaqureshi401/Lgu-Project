<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
     public function addEmployee(){

        $button = "Add Employee";
        $title  = 'Add Employee';
        $route  = '/storeEmployee';
        $departments = Department::get();
        return 
        view('Employees.addEmployees', 
            compact(
                'button' , 
                'title' , 
                'route',
                'departments')
        );
    }

    public function storeEmployee(Request $request){

         $submit = DB::update("EXEC InsertEmployee 
            @Emp_FirstName      = '$request->Emp_FirstName', 
            @Emp_LastName       = '$request->Emp_LastName', 
            @DOB                = '$request->DOB' , 
            @CNIC               = '$request->CNIC' , 
            @DateOfJoining      = '$request->DateOfJoining' , 
            @DateOfAppointment  = '$request->DateOfAppointment', 
            @Specialization     = '$request->Specialization', 
            @Designation        = '$request->Designation' , 
            @Status             = '$request->Status' , 
            @UserName           = '$request->UserName' , 
            @Password           = '$request->Password' , 
            @Gender             = '$request->Gender' , 
            @Email              = '$request->Email' , 
            @Address            = '$request->Address' , 
            @Dpt_ID             = '$request->Dpt_ID' , 
            @Grade              = '$request->Grade' , 
            @Contact_Number     = '$request->Contact_Number'
            ;");

          return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'Employee Added!
            ']);

    }

    public function editEmployee($id){

        $button = 'Update Employee';
        $title  = 'Edit Employee';
        $route  = '/updateEmployee';
        $employee = Employee::where('Emp_ID' , $id)->first();
        $departments = Department::get();
         return 
         view('Employees.editEmployee', 
            compact(
                'employee', 
                'button' , 
                'title' , 
                'route',
                'departments'
            ));
    }
    public function allEmployees(){

        $employees      = Employee::get();
        $title          = 'All Employees';
        $route          = 'updateEmployee';
        $getEditRoute   = 'editEmployee';
        $modalTitle     = 'Edit Employee';
       
        return 
        view('Employees.allEmployees' , 
            compact(
                'employees' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'
            ));
    }

    public function updateEmployee(Request $request){

        $submit = DB::update("EXEC UpdateEmployee
            @Emp_ID             = '$request->id',
            @Emp_FirstName      = '$request->Emp_FirstName',
            @Emp_LastName       = '$request->Emp_LastName', 
            @DOB                = '$request->DOB' , 
            @CNIC               = '$request->CNIC' , 
            @DateOfJoining      = '$request->DateOfJoining' , 
            @DateOfAppointment  = '$request->DateOfAppointment', 
            @Specialization     = '$request->Specialization', 
            @Designation        = '$request->Designation' , 
            @Status             = '$request->Status' , 
            @UserName           = '$request->UserName' , 
            @Password           = '$request->Password' , 
            @Gender             = '$request->Gender' , 
            @Email              = '$request->Email' , 
            @Address            = '$request->Address' , 
            @Dpt_ID             = '$request->Dpt_ID' , 
            @Grade              = '$request->Grade' , 
            @Contact_Number     = '$request->Contact_Number'
            ;");

        return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'Employee Updated!
            ']);
    }
}
