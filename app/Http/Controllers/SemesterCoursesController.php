<?php

namespace App\Http\Controllers;
use App\Models\Degree;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Employee;
use App\Models\SemesterCourse;
use App\Models\DegreeBatche;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
class SemesterCoursesController extends Controller
{
      public function validation($request){

        $this->validate($request, [
            'Sem_ID'                => 'required|numeric|unique:SemesterCourses',
            'Emp_ID'                => 'required|numeric',
            'CampusLimit'           => 'required|numeric',
            'DegCourse_ID'          => 'required|numeric|unique:SemesterCourses',
            'Section'               => 'required|max:1|unique:SemesterCourses',
            'Course_ID'             => 'required|numeric|unique:SemesterCourses',
            
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
            'Sem_ID'                => 'required|numeric',
            'Emp_ID'                => 'required|numeric',
            'CampusLimit'           => 'required|numeric',
            'DegCourse_ID'          => 'required|numeric',
            'Section'               => 'required|max:10',
            'Course_ID'             => 'required|numeric',
            
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function addSemesterCourses(){

        $employees   = Employee::get();
        $semesters   = Semester::get();
        $courses     = Course::get();
        $degreeCourses=  DegreeBatche::select('DegreeName' , 'SemSession' , 'DegreeBatches.ID')
        ->join('Degrees' , 'Degrees.ID' , 'DegreeBatches.Degree_ID')
        ->join('Semesters' , 'Semesters.ID' , 'DegreeBatches.Batch_ID')
        ->get();
        $button = "Add Semester Course";
        $title  = 'Add Semester Course';
        $route  = '/storeSemesterCourses';
        return 
        view('SemesterCourses.addSemesterCourses', 
            compact(
                'button' , 
                'title' , 
                'route',
                'employees',
                'semesters',
                'degreeCourses',
                'courses'
            )
        );
    }

    public function storeSemesterCourses(Request $request){

        // $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return 
        //     response()->json([
        //     'title' => 'Failed' , 
        //     'type'=> 'error', 
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
             $submit = DB::update("EXEC sp_InsertSemesterCourses 
            @Sem_ID                = '$request->Sem_ID', 
            @Emp_ID                = '$request->Emp_ID', 
            @CampusLimit           = '$request->CampusLimit' , 
            @DegBatches_ID         = '$request->DegCourse_ID',
            @QuizWeightage         = '$request->QuizWeightage' , 
            @Section               = '$request->Section',
            @Course_ID             = '$request->Course_ID'
            ;");

        //   return response()->json([
        //     'title' => 'Done' , 
        //     'type'=> 'success', 
        //     'message'=> 'SemesterCourse Added!
        //     ']);
        // }
        return redirect()->back()->with(['successToaster' => 'Semester Course Added' , 'title' => 'Success']);

    }

    public function editSemesterCourse($id){

        $button = 'Update Semester Course';
        $title  = 'Edit Semester Course';
        $route  = '/updateSemesterCourse';
        
        $semesterCourse = SemesterCourse::where('ID' , $id)->first();
        $semesters      = Semester::get();
        $degrees        = Degree::get();
        $courses        = Course::get();
        $degreeCourses  = DegreeBatche::whereNotNull('Batch_ID')->get();
       
         return 
         view('SemesterCourses.editSemesterCourse', 
            compact(
                'semesterCourse', 
                'button' , 
                'title' , 
                'route',
                'id',
                'semesters',
                'degrees',
                'degreeCourses',
                'courses'
            ));
    }
    public function allSemesterCourses(){

        $semesterCourses = SemesterCourse::paginate(10);

        $title  = 'All Semester Courses';
        $route = 'updateSemesterCourse';
        $getEditRoute = 'editSemesterCourse';
        $modalTitle = 'Edit SemesterCourse';
        
       
        return 
        view('SemesterCourses.allSemesterCourses' , 
            compact(
                'semesterCourses' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'  
            ));
    }

    public function updateSemesterCourse(Request $request){

         $validator = $this->validationUpdate($request);
         //$validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return 
        //     response()->json([
        //     'title' => 'Failed' , 
        //     'type'=> 'error', 
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
         //dd($request->all());
              $submit = DB::statement("EXEC sp_UpdateSemesterCourses

            @SemCourse_ID           = '$request->SemCourse_ID', 
            @Sem_ID                 = '$request->Sem_ID', 
            @Emp_ID                 = '$request->Emp_ID', 
            @CampusLimit            = '$request->CampusLimit' , 
            @DegBatches_ID          = '$request->DegCourse_ID',
            @Section                = '$request->Section',
            @Course_ID              = '$request->Course_ID' 
            ;");



        // return response()->json([
        //     'title' => 'Done' , 
        //     'type'=> 'success', 
        //     'message'=> 'SemesterCourse Updated!
        //     ']);
        // }
        return redirect()->back()->with(['successToaster' => 'Semester Course Updated' , 'title' => 'Success']);


       
    }
}
