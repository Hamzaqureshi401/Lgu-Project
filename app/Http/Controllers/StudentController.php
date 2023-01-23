<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    public function studentDashboard()
    {
        $session = $this->getSessionData();
        $year = explode('/',$session['user']);
        $year_info = session::where('SemSession',$year[0]);
        // dd($year[0]);
        return view('Dashboard.Student_dashboard',compact('year_info'));
        
    }
    public function getSessionData(){

        return session::all();
    }
}
