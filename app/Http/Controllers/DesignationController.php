<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\Department;

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

     public function updateDesignation (Request $request){


        // $validator = $this->validation($request);
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
}
