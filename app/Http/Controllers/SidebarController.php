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

        
        $empDesignations = EmpDesignation::where('Emp_ID' , Session::get('ID'))->get();

        foreach($empDesignations as $empDesignation){
            //dd($empDesignations);
           $userRights['rights'] = UserRight::where('Des_ID' , $empDesignation->Des_ID)->get();

        }
        
        // dd(
        //     $userRights['rights']->first()->module->ModuleName,// result Add Course
        //     $userRights['rights']->first()->module->URL        // /addCourse 

        // );


        return $userRights;

        //result should be 
        // Courses
        //Add Course





    }
}
