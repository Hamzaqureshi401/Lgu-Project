<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Department;
use App\Models\Degree;

use Session;
class login extends Controller
{
    public function index()
    {
        $error = "";
        return view('Login.Employee_Login', compact('error'));
    }

    public function Emp_login_1()
    {
        if (session()->has('Emp_session')) {
            return view('Dashboard.Employee_dashboard');
        } else {
            $error = "";
            return view('Login.Employee_Login', compact('error'));
        }
    }
    public function Std_login_view()
    {
        if (session()->has('std_session')) {
             return redirect()->route('student.Dashboard');
        } else {

            $batch      = Semester::get();
            $department = DB::table('Degrees')->select('DegreeName')->get();
            $error      = "";
            return view('Login.Student_Login', compact('error', 'batch', 'department'));
        }
    }
    public function logoutsessions()
    {
        session()->flush();
        $error = "";
        return redirect('/studentLogin');
    }

    ###################Start Employee Login #####################
    public function Emp_login(Request $Employee_data)
    {

        $Employee_data->validate([
            'Username' => 'required',
            'password' => 'required',
        ]);
        
        $submit = DB::table('Employees')
        ->where(['UserName' => $Employee_data->Username  , 'Password' => $Employee_data->password])
        ->first();

        // dd($submit);
        
        if ($submit != NUll) {
                $Emp_FirstName = $submit->Emp_FirstName;
                $Emp_LastName = $submit->Emp_LastName;
                $Designation = $submit->Designation;
            
            $user = $Emp_FirstName ?? '--'. '' . $Emp_LastName ?? '--';
            session([
                'Emp_session' => 'session created', 
                'Designation' => $Designation ?? '--', 
                'user'        => $submit,
                'ID'          => $submit->ID,

            ]);
             if(empty($submit->DefualtUrl)){
                $url = '/empDashboard';
                return  redirect($url);
            }else{
                $url = $submit->DefualtUrl;
                return  redirect($url);
             
            }
            
        } else {
            return  
            redirect()
            ->route('emp.login')
            ->with([
                'errorToaster'   => 'Employee Not Found' , 
                'title' => 'No Record'
            ]);
        }
    }

    ###################End Employee Login #####################

    ###################Start Student Login #####################

    public function Std_login(Request $Student_data)
    {
        $this->validate($Student_data, [
            'rollno' => 'required',
            'password' => 'required',
            'batch' => 'required',
            'degree' => 'required',
        ]);
        $batch      = $Student_data->input('batch');
        $degree     = $Student_data->input('degree');
        $rollno     = $Student_data->input('rollno');
        $password   = $Student_data->input('password');
        $roll       = $batch . "/" . $degree . "/" . $rollno;
        
        $submit     = DB::table('Students')->where(['StdRollNo' => $roll , 'password' => $password])->first();
    
        // dd($submit);
         if(empty($submit)){
                 return  redirect()->route('std.login')->with(['errorToaster'   => 'Student Not Found' , 'title' => 'No Record']);
            }

        if(empty($submit->AdmissionSession)){
            return  redirect()->route('std.login')->with(['errorToaster'   => 'Please Ask Admin to Add AdmissionSession' , 'title' => 'Your AdmissionSession Not found']);
        }
            $sem_ID     =  Semester::where('SemSession' , $submit->AdmissionSession)->first()->ID ?? false;

            $degreedata   = Degree::where('DegreeName'   , $degree)->first()  ?? false;
        
            $dpt_ID     = Department::where('ID' , $degreedata->Dpt_ID)->first()->ID ?? false;



             if (empty($sem_ID)){
                 return  redirect()->route('std.login')->with(['errorToaster'   => 'Please Ask Admin to Add Semester' , 'title' => 'Your Semester Not found']);
            }
             if (empty($dpt_ID)){
                 return  redirect()->route('std.login')->with(['errorToaster'   => 'Please Ask Admin to Add Department' , 'title' => 'Your Department Not found']);
            }
             if (empty($degreedata->ID)){
                 return  redirect()->route('std.login')->with(['errorToaster'   => 'Please Ask Admin to Add Degree' , 'title' => 'Your Degree Not found']);
            }
      
        if ((!empty($submit))) {

           
            session([
                'std_session' => 'session created', 
                'Std_FName'   => $submit->Std_FName, 
                'user'        => $roll,
                'std_ID'      => $submit->ID,
                'sem_ID'      => $sem_ID,
                'dpt_ID'      => $dpt_ID,
                'degree_ID'   => $degreedata->ID,
                'Std'         => $submit
            ]);

    

           
         return redirect()->route('student.Dashboard')
                        ->withSuccess('Signed in');
        } else {
            return  redirect()->route('std.login')->with(['errorToaster'   => 'Student Not Found' , 'title' => 'No Record']);
        }
    }
    ###################End Student Login #####################
}
