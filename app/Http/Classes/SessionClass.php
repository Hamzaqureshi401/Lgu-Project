<?php
namespace App\Http\Classes;
use Illuminate\Support\Facades\DB;
use Session;


class SessionClass
{
	
	public function getSessionData(){

        return session::all();
    }
  
}