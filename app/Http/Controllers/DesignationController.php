<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;

use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    public function addDesignation(){

        $button = "Add Designation";
        $title  = 'Add Designation';
        $route  = '/storeDesignation';  
        return 
        view('Designation.addDesignation', 
            compact(
                'button' , 
                'title' , 
                'route'
            ));
    }

    public function storeDesignation(Request $request){

        $submit        = DB::Update("EXEC InsertDesignation 
            @Designation       = '$request->Designation', 
            @Dpt_ID            = '$request->Dpt_ID'
            ;
        ");
        return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'Designation Added!
            ']);

    }

    public function editDesignation($id){

        $button = "Update Designation";
        $title  = 'Edit Designation';
        $route  = '/updateDesignation';
        $designation = Designation::where('Des_id' , $id)->first();

        return 
        view('Designation.editDesignation', 
            compact(
                'designation', 
                'button' , 
                'title' , 
                'route'
            ));

    }
    public function allDesignations(){

        $designations = Designation::get();
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

        $submit = DB::update("EXEC DesignationUpdate
            @Des_ID         = '$request->id',
            @Designation    = '$request->Designation', 
            @Dpt_ID         = '$request->Dpt_ID' 
            ;");

        return response()->json([
            'title'  => 'Done' , 
            'type'   => 'success', 
            'message'=> 'Designation Updated!
            ']);
    }
}
