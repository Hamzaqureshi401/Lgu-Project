<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\StudentIgrade;
use App\Models\SemesterCourse;
use Session;
use Illuminate\Http\Request;
use DB;
use Image;
use File;

class IgradesController extends Controller
{
    public function studentIgrades(){
        $enrollments =  Enrollment::where('Std_ID' , Session::get('std_ID'))->get();
        
        $title        = 'All Igrades';
        $route        = 'applyIgrades/';
        $getEditRoute = 'applyIgrades';
        $modalTitle   = 'Apply Igrade';
        $studentIgrade = StudentIgrade::pluck('Enroll_ID')->toArray();

        //dd($studentIgrade);

        return
        view('Igrades.studentIgrades' ,
            compact(
                'enrollments' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute',
                'studentIgrade'
            ));
    }

    public function applyIgrades($id){


       $enrollments = Enrollment::where(['ID' => $id , 'Std_ID' => Session::get('std_ID')])->first();

        $button = 'Submit';
        $title  = 'Apply Igrade';
        $route  = '/storeIgrades';
        $courses = Course::where('ID' , $enrollments->semesterCourse->course->ID)->first();
         return
         view('Igrades.applyIgrade',
            compact(
                'courses',
                'button' ,
                'title' ,
                'route',
                'enrollments'
            ));
        //dd($id);

    }
    public function storeIgrades(Request $request){

       // dd($request->all());

         $this->validate($request, [
            "Image" => "required|image|mimes:jpg,jpeg,png,gif,svg|max:90480",
            'Remarks' => 'required|max:255',
        ]);

         $image = $request->file("Image");
        $input["file"] = time() . "." . $image->getClientOriginalExtension();

         $destinationPath = public_path().'/igradeImage/';
            if (!File::exists($destinationPath)) {
                 File::makeDirectory($destinationPath, 0755, true);
            }
        $imgFile = Image::make($image->getRealPath());
        $imgFile
            ->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($destinationPath . "/" . $input["file"]);

            $path = '/igradeImage/'.$input["file"];


        
        $IP         = $this->get_client_ip();
        $date = date('m/d/Y h:i:s a', time());
         $submit = DB::update("EXEC Sp_InsertStd_Igrade
            @Enroll_ID  = '$request->enrollmentID',
            @Date       = '$date',
            @IP         = '$IP' ,
            @Type       = '$request->Type',
            @Remarks    = '$request->Remarks',
            @Image      = '$path'

            
            ;");
         return redirect()->route('all.Igrades')->with(['successToaster' => 'Igrade Applied Successfully' , 'title' => 'Success']);

    }

      public function get_client_ip() {
        
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function teacherStdIgrade(){

        // $a = Enrollment::join('semesterCourses' , 'semesterCourses.ID' , 'Enrollments.SemCourses_ID')->where('Emp_ID' , Session::get('ID'))->pluck('Enrollments.ID')->toArray();
        // dd($semCourse , $enrollments , $a);
       //$enrollments =  Enrollment::where(['ID' => $studentIgrade])->get();

       $studentIgrade   = StudentIgrade::where('Status' , 'Teacher')->select('Enroll_ID' , 'ID')->get();
      
       $semCourse       = SemesterCourse::where('Emp_ID' , Session::get('ID'))->pluck('ID')->toArray();
       dd($studentIgrade , SemesterCourse::where('ID' , 10017)->first()->course->CourseName , $semCourse);
    
       $enrollments     =  Enrollment::where(['SemCourses_ID' => $semCourse , 
       'ID' => $studentIgrade->pluck('Enroll_ID')->toArray()])->get();  
       
       $igArr = $studentIgrade->pluck('ID')->toArray();    
        $title  = 'All Igrades';
        $route = 'confirmIgradesTeacher/';
        $getEditRoute = 'confirmIgradesTeacher';
        $modalTitle = 'Confirm Igrade';

        return
        view('Igrades.teacherStdIgrade' ,
            compact(
                'enrollments' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute',
                
                'igArr'
            ));
    }
    public function confirmIgradesTeacher($id){

         StudentIgrade::where('ID' , $id)->update(['Status' => 'Hod']);
        

        return redirect()->back()->with(['successToaster' => 'Igrade Confirmed' , 'title' => 'Success']);

    }
    public function confirmIgradesHod($id){

        StudentIgrade::where('ID' , $id)->update(['Status' => 'Dean']);

    }
    public function confirmIgradesDean($id){

        StudentIgrade::where('ID' , $id)->update(['Status' => 'Coe']);

    }
    
    public function HodStdIgrade()
    {
        $studentIgrade   = StudentIgrade::where('Status' , 'Hod')->select('Enroll_ID' , 'ID')->get();
        // dd($studentIgrade );
        $semCourse = SemesterCourse::where('Emp_ID' , Session::get('ID'))->pluck('ID')->toArray();
        // dd($semCourse);

        $enrollments     =  Enrollment::where(['SemCourses_ID' => $semCourse , 'ID' => $studentIgrade->pluck('Enroll_ID')->toArray()])->get();

        // dd($enrollments );

        $igArr = $studentIgrade->pluck('ID')->toArray();    
        $title  = 'All Igrades';
        $route = 'confirmIgradesTeacher/';
        $getEditRoute = 'confirmIgradesTeacher';
        $modalTitle = 'Confirm Igrade';

        return
        view('Igrades.HodStdIgrade' ,
            compact(
                'enrollments' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute',
                'igArr'
            ));
    }
   
}
