<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Validator;


class EmployeeController extends Controller
{
    public function validation($request){

        $validator = Validator::make($request->all(),[
            'Emp_FirstName'      => 'required|max:30',
            'Emp_LastName'       => 'required|max:30',
            'DOB'                => 'required|date',
            'CNIC'               => 'required|numeric|min:16|unique:employees',
            'DateOfJoining'      => 'required|date',
            'DateOfAppointment'  => 'required|date',
            'Specialization'     => 'required|max:50',
            'Designation'        => 'required|max:50',
            'Status'             => 'required|max:50',
            'UserName'           => 'required|max:50|unique:employees',
            'Password'           => 'required|min:6|max:255',
            'Gender'             => 'required|max:10',
            'Email'              => 'required|max:50|unique:employees',
            'Address'            => 'required|max:50',
            'Dpt_ID'             => 'required|numeric',
            'Grade'              => 'required|numeric',
            'Contact_Number'     => 'required|max:10',

        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

    public function validationUpdate($request){

        $validator = Validator::make($request->all(),[
            'Emp_FirstName'      => 'required|max:30',
            'Emp_LastName'       => 'required|max:30',
            'DOB'                => 'required|date',
            'CNIC'               => 'required|numeric|min:16',
            'DateOfJoining'      => 'required|date',
            'DateOfAppointment'  => 'required|date',
            'Specialization'     => 'required|max:50',
            'Designation'        => 'required|max:50',
            'Status'             => 'required|max:50',
            'UserName'           => 'required|max:50',
            'Password'           => 'required|min:6|max:255',
            'Gender'             => 'required|max:10',
            'Email'              => 'required|max:50',
            'Address'            => 'required|max:50',
            'Dpt_ID'             => 'required|numeric',
            'Grade'              => 'required|numeric',
            'Contact_Number'     => 'required|max:10',

        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

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

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
            $password = bcrypt($request->Password);
           $submit = DB::update("EXEC sp_InsertEmployees
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
            @Password           = '$password' ,
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



    }

    public function editEmployee($id){

        $button = 'Update Employee';
        $title  = 'Edit Employee';
        $route  = '/updateEmployee';
        $employee = Employee::where('ID' , $id)->first();
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

        $employees      = Employee::paginate(10);
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

         $validator = $this->validationUpdate($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {

        $submit = DB::update("EXEC sp_UpdateEmployees
            @Emp_ID                 = '$request->id',
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
}
