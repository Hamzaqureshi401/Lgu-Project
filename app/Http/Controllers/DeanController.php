<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeanController extends Controller
{
    public function deanDashboard(){

        return 
        view('Dean.deanDashboard');
    }
}
