<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmpDesignation;



use Illuminate\Support\Facades\DB;
use Validator;

class DesignationController extends Controller
{
    public function validation($request){


       $this->validate($request, [
            'Designation' => 'required',
            'Dpt_ID'      => 'required|max:255',

        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function addDesignation(){

        $button = "Add Designation";
        $title  = 'Add Designation';
        $route  = '/storeDesignation';
        $departments = Department::get();
        return
        view('Designation.addDesignation',
            compact(
                'button' ,
                'title' ,
                'route',
                'departments'
            ));
    }

    public function setEmpDesignation(){

        $button = "Add Emp Designation";
        $title  = 'Add Emp Designation';
        $route  = '/storeEmpDesignation';
        $empDesignations = EmpDesignation::select('Emp_ID')->get();
        $designations = Designation::get();
        $employees = Employee::whereNotIn('ID' , $empDesignations->pluck('Emp_ID')->toArray())->get();
        return
        view('Designation.setEmpDesignation',
            compact(
                'button' ,
                'title' ,
                'route',
                'designations',
                'employees'
            ));
    }

    public function storeEmpDesignation(Request $request){

    
            $submit       = DB::Update("EXEC insertEmpDesignation
            @Des_ID       = '$request->Des_ID',
            @Emp_ID       = '$request->Emp_ID',
            @Status       = '1'
            
            ;
        ");
       
             return redirect()->back()->with(['successToaster' => 'Dasignation Added' , 'title' => 'Success']);
    }

    public function storeDesignation(Request $request){

        $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
            $submit             = DB::Update("EXEC sp_InsertDesignations
            @Designation       = '$request->Designation',
            @Dpt_ID            = '$request->Dpt_ID'
            ;
        ");
        //     return response()->json([
        //     'title' => 'Done' ,
        //     'type'=> 'success',
        //     'message'=> 'Designation Added!
        //     ']);
        // }
             return redirect()->back()->with(['successToaster' => 'Dasignation Added' , 'title' => 'Success']);
    }

    public function editDesignation($id){

        $button = "Update Designation";
        $title  = 'Edit Designation';
        $route  = '/updateDesignation';
        $designation = Designation::where('ID' , $id)->first();
        $departments = Department::get();

        return
        view('Designation.editDesignation',
            compact(
                'designation',
                'button' ,
                'title' ,
                'route',
                'departments'
            ));

    }

     public function editEmpDesignation($id){

        $button = "Update Emp Designation";
        $title  = 'Edit EmpDesignation';
        $route  = '/updateEmpDesignation';
        $empDesignation = EmpDesignation::where('ID' , $id)->first();
        $designations = Designation::get();

        return
        view('Designation.editEmpDesignation',
            compact(
                'empDesignation',
                'button' ,
                'title' ,
                'route',
                'designations'
            ));

    }
    public function allDesignations(){

        $designations = Designation::paginate(10);
        $title  = 'All Designations';
        $route = 'updateDesignation';
        $getEditRoute = 'editDesignation';
        $modalTitle = 'Edit Designations';
        return
        view('Designation.allDesignations' ,
            compact(
                'designations' ,
                'title',
                'route',
                'getEditRoute',
                'modalTitle'
            ));
        return response()->json([
            'title'  => 'Done' ,
            'type'   => 'success',
            'message'=> 'Designation Updated!
            ']);
    }

     public function allEmpDesignations(){

        $designations = EmpDesignation::paginate(10);
        $title  = 'All Emp Designations';
        $route = 'updateEmpDesignation';
        $getEditRoute = 'editEmpDesignation';
        $modalTitle = 'Edit Emp Designations';
        return
        view('Designation.allEmpDesignations' ,
            compact(
                'designations' ,
                'title',
                'route',
                'getEditRoute',
                'modalTitle'
            ));
        return response()->json([
            'title'  => 'Done' ,
            'type'   => 'success',
            'message'=> 'EmpDesignation Updated!
            ']);
    }

     public function updateDesignation (Request $request){


         $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
             $submit = DB::update("EXEC sp_UpdateDesignations
            @Des_ID             = '$request->id',
            @Designation    = '$request->Designation',
            @Dpt_ID         = '$request->Dpt_ID'
            ;");

        // return response()->json([
        //     'title'  => 'Done' ,
        //     'type'   => 'success',
        //     'message'=> 'Designation Updated!
        //     ']);
        // }
              return redirect()->back()->with(['successToaster' => 'Designation Updated' , 'title' => 'Success']);

    }
    public function updateEmpDesignation (Request $request){


        
             $submit = DB::update("EXEC UpdateEmpDesignation
            @ID         = '$request->id',
            @Des_ID       = '$request->Des_ID',
            @Status       = '$request->Status'
            ;");

        
              return redirect()->back()->with(['successToaster' => 'Designation Updated' , 'title' => 'Success']);

    }
}
