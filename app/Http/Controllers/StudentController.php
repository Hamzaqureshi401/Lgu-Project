<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\Registration;
use App\Models\Semester;
use App\Models\Enrollment;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    public function studentDashboard()
    {
        $session = $this->getSessionData();
        //dd($session);
        $user         = explode('/',$session['user']);
        $semester     = Semester::where('SemSession' , $user[0])->first();
        $enrollments  = Enrollment::where('Std_ID' , $session['std_ID'])->get();
        $registration = Registration::where('Std_ID' , $session['std_ID'])->first();
        $attendences = new Attendance();
        if (!empty($registration)){
            $challans = Challan::where('Reg_ID' , $registration->ID)->get();    
        }else{
            $challans = '';
        }
        
        return view('Dashboard.studentDashboard',compact('semester' , 'enrollments' , 'challans' , 'attendences'));
        
    }
    public function getSessionData(){

        return session::all();
    }
}
