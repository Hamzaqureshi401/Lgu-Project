<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
class login extends Controller
{
    public function index()
    {
        $error = "";
        return view('Employee_Login', compact('error'));
    }

    public function Emp_login_1()
    {
        if (session()->has('Emp_session')) {
            return view('Dashboard.Employee_dashboard');
        } else {
            $error = "";
            return view('Employee_Login', compact('error'));
        }
    }
    public function Std_login_view()
    {
        if (session()->has('std_session')) {
            return view('Dashboard.Student_dashboard');
        } else {

            $batch = DB::table('Students')->select('AdmissionSession')->distinct()->get();
            $department = DB::table('Departments')->select('Dpt_Name')->distinct()->get();
            $error = "";
            return view('Student_Login', compact('error', 'batch', 'department'));
        }
    }
    public function logoutsessions()
    {
        session()->flush();
        $error = "";
        return redirect('/Std_login_view');
    }

    ###################Start Employee Login #####################
    public function Emp_login(Request $Employee_data)
    {
        $Employee_data->validate([
            'Username' => 'required',
            'password' => 'required',
        ]);
        $username = $Employee_data->input('Username');
        $password = $Employee_data->input('password');

        $submit = DB::select("EXEC sp_EmployeesLogin @username = '$username',@password='$password';");

        if ($submit != NUll) {

            foreach ($submit as $Employeedata) {
                $Emp_FirstName = $Employeedata->Emp_FirstName;
                $Emp_LastName = $Employeedata->Emp_LastName;
                $Designation = $Employeedata->Designation;
            }
            $user = $Emp_FirstName . '' . $Emp_LastName;
            session(['Emp_session' => 'session created', 'Designation' => $Designation, 'user' => $user]);
            switch ($Designation) {
                case 'Assistant Lecturer/TA':
                     return redirect()->route('main')
                        ->withSuccess('Signed in');
                    break;

                case 'Addmission':
                    return view('Dashboard.Admission_dashboard');
                    break;
            }
        } else {
            $error = "No Employee found!";
             return redirect()->route('main')
                        ->withSuccess('Signed in');
        }
    }

    ###################End Employee Login #####################

    ###################Start Student Login #####################

    public function Std_login(Request $Student_data)
    {
        $Student_data->validate([
            'rollno' => 'required',
            'password' => 'required',
            'batch' => 'required',
            'department' => 'required',
        ]);
        $batch      = $Student_data->input('batch');
        $department = $Student_data->input('department');
        $rollno     = $Student_data->input('rollno');
        $password   = $Student_data->input('password');
        $roll       = $batch . "/" . $department . "/" . $rollno;
        
        $submit     = DB::table('Students')->where(['StdRollNo' => $roll , 'password' => $password])->first();
        //DB::select("EXEC sp_StudentsLogin @StdRollNo = '$roll',@Password='$password';");
       // dd($roll , $password , $submit);
        if (!empty($submit)) {

            
            session([
                'std_session' => 'session created', 
                'Std_FName'   => $submit->Std_FName, 
                'user'        => $roll,
                'id'          => $submit->ID
            ]);

           
         return redirect()->route('add.Enrollment')
                        ->withSuccess('Signed in');
        } else {
            $error = "No Student found!";
            $batch = DB::table('Students')->select('AdmissionSession')->distinct()->get();
            $department = DB::table('Departments')->select('Dpt_Name')->distinct()->get();
            return view('Student_Login', compact('error', 'batch', 'department'));
        }
    }
    ###################End Student Login #####################
}
