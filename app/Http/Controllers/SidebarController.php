<?php

namespace App\Http\Controllers;

use App\Models\UserRight;
use App\Models\EmpDesignation;
use App\Models\Module;
use Illuminate\Http\Request;
use Session;

class SidebarController extends Controller
{
    public function userSidebar(){

        
        $userRights['empDesignations'] = EmpDesignation::where('Emp_ID' , Session::get('ID'))->first();

        //foreach($empDesignations as $empDesignation){
            //dd($empDesignations);
           $userRights['rights'] = UserRight::where('Des_ID' , $userRights['empDesignations']->Des_ID)->get();

        //}
        if (empty($userRights)){
            $userRights = "";
        }
        //dd(session::all());
        return $userRights;

    }
}
