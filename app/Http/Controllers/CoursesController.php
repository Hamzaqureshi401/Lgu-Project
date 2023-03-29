<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\DegreeBatche;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\SemesterCourse;
use App\Models\Employee;
use App\Models\TimeTable;
use App\Models\DegreeSemCourse;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;

class CoursesController extends Controller
{
    public function validation($request){


        $this->validate($request, [
            'CourseCode'        => 'required|max:30|unique:Courses',
            'CourseName'        => 'required|max:60',
            'CreditHours'       => 'required|max:10',
            'LectureType'       => 'required|max:10',
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

      public function validationUpdate($request){


        $this->validate($request, [
            'CourseCode'        => 'required|max:6',
            'CourseName'        => 'required|max:60',
            'CreditHours'       => 'required|max:10',
            'LectureType'       => 'required|max:10',
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function addCourses(){

        $button = "Add Course";
        $title  = 'Add Course';
        $route  = '/storeCourses';
        return
        view('Courses.addCourses',
            compact(
                'button' ,
                'title' ,
                'route')
        );
    }

    protected function validteCreditHours($request){


            $CourseCode = explode('-', $request->CreditHours);
            $CourseCode = end($CourseCode);
            
            if ($CourseCode[0] == 0){
                 $CourseCode = $CourseCode[1];

            }elseif($CourseCode[1] == '_'){

                $CourseCode = $CourseCode[0];
               
            }
            else{
                 $CourseCode = $CourseCode;
            }
            // dd($CourseCode);
            
            $Course = explode('-', $request->CreditHours);
            $Course[2] = $CourseCode;
            return implode('-', $Course);
    }

    public function storeCourses(Request $request){

       // dd($request->all());

        $validator = $this->validation($request);
        $CreditHours = $this->validteCreditHours($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
        
             $submit = DB::update("EXEC sp_InsertCourses
            @CourseCode  = '$request->CourseCode',
            @CourseName  = '$request->CourseName',
            @CreditHours = '$CreditHours' ,
            @LectureType = '$request->LectureType';");

          // return response()->json([
          //   'title' => 'Done' ,
          //   'type'=> 'success',
          //   'message'=> 'Course Added!
          //   ']);
        //}
             return redirect()->back()->with(['successToaster' => 'Course Added' , 'title' => 'Success']);

    }

    public function editCourse($id){

        $button = 'Update Course';
        $title  = 'Edit Course';
        $route  = '/updateCourse';
        $courses = Course::where('ID' , $id)->first();
         return
         view('Courses.editCourse',
            compact(
                'courses',
                'button' ,
                'title' ,
                'route'
            ));
    }
    public function allCourses(){

        $courses = Course::paginate(10);
        $title  = 'All Courses';
        $route = 'editCourse/';
        $getEditRoute = 'editCourse';
        $modalTitle = 'Edit Course';

        return
        view('Courses.allCourses' ,
            compact(
                'courses' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function updateCourse(Request $request){

        $validator = $this->validationUpdate($request);
        $CreditHours = Course::where('ID' , $request->id)->first()->CreditHours;
        if ($CreditHours != $request->CreditHours){
            $CreditHours = $this->validteCreditHours($request);
        }

        //dd($request->all());
        

        
        //  $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
              $submit = DB::update("EXEC sp_UpdateCourses

            @Course_ID   = '$request->id',
            @CourseCode  = '$request->CourseCode',
            @CourseName  = '$request->CourseName',
            @CreditHours = '$CreditHours' ,
            @LectureType = '$request->LectureType';");

        // return response()->json([
        //     'title' => 'Done' ,
        //     'type'=> 'success',
        //     'message'=> 'Course Updated!
        //     ']);
              return redirect()->back()->with(['successToaster' => 'Course Updated' , 'title' => 'Success']);
        


    }




    ############################ Courses ###########################

    public function courseOffering($selectedDegreeId = null){
       
        if(!empty($selectedDegreeId)){
            
            $semesterCourses = SemesterCourse::join('DegreeSemCourses' , 'DegreeSemCourses.SemCourse_ID' , 'SemesterCourses.ID')
            ->where('DegreeSemCourses.DegBatches_ID' , $selectedDegreeId)
            ->get();
        }else{
            $semesterCourses = "";
        }
       $degrees      =  Degree::get();
       $semesters    =  semester::get();
       $degreeBatchs =  DegreeBatche::get();
       $timeTables   =  TimeTable::get();
      
        $title      = 'All Courses';
        $route      = 'courseOffering/';
        $getEditRoute = 'courseAssign';
        $modalTitle = 'Assign Course';
        $button     = 'Submit';
        
       return 
        view('Courses.courseOffering', 
            compact(
                
                'degrees',
                'semesters',
                'title',
                'route',
                'getEditRoute',
                'modalTitle',
                'button',
                'semesterCourses',
                'selectedDegreeId',
                'timeTables',
                'degreeBatchs'
            )    
            );

    }


    public function courseAssign($id , $SemCourse_ID){

        $button = 'Do You Wish To Submit?';
        $courses = Course::where('ID' , $id)->first();
        // $semCourses = SemesterCourse::join('semesters' , 'semesters.ID' , 'SemesterCourses.Sem_ID')
        // ->join('degreeBatches' , 'degreeBatches.Batch_ID' , 'semesters.ID')
        // ->join('Degrees' , 'Degrees.ID' , 'degreeBatches.Degree_ID')
        // ->select('SemesterCourses.ID' , 'DegreeName' , 'SemSession' , 'Section')
        // ->get();

        $degsemcourses=DegreeSemCourse::get();
        // $degbatch=$degsemcourse->first()->degreeBatch->first();
        // dd($degbatch);

        $employees      = Employee::get();
        $route  = '/storeTimeTable';


        return 
        view('Courses.courseAssign', 
            compact(
                
                'courses',
                'button',
                'employees',
                'route',
                'SemCourse_ID',
                'degsemcourses'
              
            ));

    }


    public function editAssignedCourse($id){

        $button = 'Do You Wisht To Submit?';
        $courses = Course::where('ID' , $id)->first();
        $employees      = Employee::get();
        $degrees      =  Degree::get();
        $semesters    =  semester::get();

        

        return 
        view('View.editAssignedCourse', 
            compact(
                
                'courses',
                'button',
                'employees',
                'degrees',
                'semesters'
              
            ));

    }

    public function editTimeTableAndCourse($id){

       
        $qury           = TimeTable::where('ID' , $id)->first();
        $courseID       = $qury->semesterCourse->course->ID;
        $SemCourse_ID   = $qury->semesterCourse->ID;
        $timeTable      = TimeTable::where('SemCourse_ID' , $SemCourse_ID)->get();

       // dd($timeTable);


        $button         = 'Do You Wish To Submit?';
        $courses        = Course::where('ID' , $courseID)->first();
        $employees      = Employee::get();
        $route          = '/updateTimeTableAndCourse';



        return 
        view('Courses.editTimeTableAndCourse', 
            compact(
                
                'courses',
                'button',
                'employees',
                'route',
                'SemCourse_ID',
                'timeTable',
                'qury'

              
            ));
    }
}
