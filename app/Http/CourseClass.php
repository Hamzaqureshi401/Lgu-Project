<?php
namespace App\Http\Classes;
use Illuminate\Support\Facades\DB;
use Session;


class CourseClass
{
	
	public function getSessionData(){

        return session::all();
    }
  
}