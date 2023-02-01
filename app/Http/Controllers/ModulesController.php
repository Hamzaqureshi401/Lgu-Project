<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Validator;

class ModulesController extends Controller
{
    public function validation($request){


        $this->validate($request, [
            'ModuleName'        => 'required|max:80|unique:Modules',
            'URL'               => 'required|max:60',
            'Status'            => 'required|max:10',
            
        ]);
       
    }

      public function validationUpdate($request){


        $this->validate($request, [
            'ModuleName'        => 'required|max:80',
            'URL'               => 'required|max:60',
            'Status'            => 'required|max:10',
        ]);
       
    }

    public function addModules(){

        $button = "Add Module";
        $title  = 'Add Module';
        $route  = '/storeModules';
        return
        view('Modules.addModules',
            compact(
                'button' ,
                'title' ,
                'route')
        );
    }

    

    public function storeModules(Request $request){

        $validator = $this->validation($request);
        $submit = DB::update("EXEC sp_InsertModules
            @ModuleName     = '$request->ModuleName',
            @URL            = '$request->URL',
            @Status         = '$request->Status'
           ;");
        return redirect()->back()->with(['successToaster' => 'Module Added' , 'title' => 'Success']);

    }

    public function editModule($id){

        $button = 'Update Module';
        $title  = 'Edit Module';
        $route  = '/updateModule';
        $modules = Module::where('ID' , $id)->first();
         return
         view('Modules.editModule',
            compact(
                'modules',
                'button' ,
                'title' ,
                'route'
            ));
    }
    public function allModules(){

        $modules = Module::paginate(10);
        $title  = 'All Modules';
        $route = 'editModule/';
        $getEditRoute = 'editModule';
        $modalTitle = 'Edit Module';

        return
        view('Modules.allModules' ,
            compact(
                'modules' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function updateModule(Request $request){

        $validator = $this->validationUpdate($request);

      //  dd($request->all());
        
        $submit = DB::update("EXEC sp_UpdateModules

            @ID             = '$request->id',
            @ModuleName     = '$request->ModuleName',
             @Status         = '$request->Status',
            @URL            = '$request->URL'
           
           ;");

        return redirect()->back()->with(['successToaster' => 'Module Updated' , 'title' => 'Success']);
        


    }

}
