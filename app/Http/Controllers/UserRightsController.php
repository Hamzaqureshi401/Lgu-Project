<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRight;
use App\Models\Designation;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Validator;

class UserRightsController extends Controller
{
       public function validation($request){

        $this->validate($request, [
            'Des_ID'        => 'required|max:50|unique:UserRights',
            'Mod_ID'       => 'required|max:30',
            'IsInsert'    => 'required|max:70',
            'IsUpdate'            => 'required|numeric',
            'IsDelete' => 'required|numeric',
            'IsBrowse'            => 'required|numeric',
        ]);
       
    }
     public function validationUpdate($request){


         $this->validate($request, [
            'Des_ID'        => 'required|max:50',
            'Mod_ID'       => 'required|max:30',
            'IsInsert'    => 'required|max:70',
            'IsUpdate'            => 'required|numeric',
            'IsDelete' => 'required|numeric',
            'IsBrowse'            => 'required|numeric',
        ]);
       
    }

    public function addUserRights(){
        $button = "Add UserRight";
        $title  = 'Add UserRight';
        $route  = '/storeUserRight';
        $designations = Designation::get();
        $modules = Module::get();

        return
        view('UserRights.AddUserRights',
         compact(
            'button',
            'title',
            'route',
            'designations',
            'modules'
         ));
    }

    public function storeUserRight(Request $request){

        dd($request->all());

        $validator = $this->validation($request);
       
           $submit = DB::update("EXEC sp_InsertUserRights
            @Des_ID         = '$request->Des_ID',
            @Mod_ID        = '$request->Mod_ID',
            @IsInsert     = '$request->IsInsert',
            @IsUpdate             = '$request->IsUpdate',
            @IsDelete = '$request->IsDelete',
            @IsBrowse             = '$request->IsBrowse';
            ");
    
        return redirect()->back()->with(['successToaster' => 'UserRight Added' , 'title' => 'Success']);

    }
    public function editUserRight($id){

        $button = "Update UserRight";
        $title  = 'Edit UserRight';
        $route  = '/updateUserRight';
        $departments = Designation::get();
        $userRight = UserRight::where('ID' , $id)->first();

        return
        view('UserRights.editUserRight',
         compact(
            'userRight',
            'button',
            'title' ,
            'route',
            'departments'
         ));
    }

     public function allUserRights(){

        $userRights = UserRight::paginate(10);
        $title  = 'All UserRights';
        $route = 'updateUserRight';
        $getEditRoute = 'editUserRight';
        $modalTitle = 'Edit UserRight';
        return
        view('UserRights.allUserRights' ,
         compact(
            'userRights' ,
            'title',
            'route',
            'modalTitle',
            'getEditRoute'
         ));
    }

    public function updateUserRight(Request $request){

         $validator = $this->validationUpdate($request);
     
           $submit = DB::update("EXEC sp_UpdateUserRights

            @ID           = '$request->id',
            @Des_ID          = '$request->Des_ID',
            @Mod_ID         = '$request->Mod_ID',
            @IsInsert      = '$request->IsInsert' ,
            @IsUpdate              = '$request->IsUpdate',
            @IsDelete  = '$request->IsDelete' ,
            @IsBrowse              = '$request->IsBrowse';
            ");

     
        return redirect()->back()->with(['successToaster' => 'UserRight Updated' , 'title' => 'Success']);
    }
}
