<?php

namespace App\Http\Controllers;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\Employee;
use App\Models\SemesterCourse;
use App\Models\DegreeCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
class SemesterCoursesController extends Controller
{
      public function validation($request){

        $validator = Validator::make($request->all(),[
            'Sem_ID'                => 'required|numeric',
            'Emp_ID'                => 'required|numeric',
            'CampusLimit'           => 'required|numeric',
            'DegCourse_ID'          => 'required|numeric',
            'QuizWeightage'         => 'required|max:10',
            'AssignmentWeightage'   => 'required|max:10',
            'PresentationWeightage' => 'required|max:10',
            'MidWeightage'          => 'required|max:10',
            'FinalWeightage'        => 'required|max:10',
            'Section'               => 'required|max:10',
            
        ]);
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
    }

    public function addSemesterCourses(){

        $employees   = Employee::get();
        $semesters   = Semester::get();
        $degreeCourses=  DegreeCourse::select('DegreeName' , 'CourseName' , 'DegCourses_ID')
        ->join('Degrees' , 'Degrees.Degree_ID' , 'DegreeCourses.Degree_ID')
        ->join('Courses' , 'Courses.Course_ID' , 'DegreeCourses.Course_ID')
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
                'degreeCourses'
            )
        );
    }

    public function storeSemesterCourses(Request $request){

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return 
            response()->json([
            'title' => 'Failed' , 
            'type'=> 'error', 
            'message'=> ''.$validator['validation']
            ]);
        }else {
             $submit = DB::update("EXEC InsertSemesterCourse 
            @Sem_ID                = '$request->Sem_ID', 
            @Emp_ID                = '$request->Emp_ID', 
            @CampusLimit           = '$request->CampusLimit' , 
            @DegCourse_ID          = '$request->DegCourse_ID',
            @QuizWeightage         = '$request->QuizWeightage' , 
            @AssignmentWeightage   = '$request->AssignmentWeightage',
            @PresentationWeightage = '$request->PresentationWeightage' , 
            @MidWeightage          = '$request->MidWeightage',
            @FinalWeightage        = '$request->FinalWeightage' , 
            @Section               = '$request->Section'
            ;");

          return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'SemesterCourse Added!
            ']);
        }

    }

    public function editSemesterCourse($id){

        $button = 'Update Semester Course';
        $title  = 'Edit Semester Course';
        $route  = '/updateSemesterCourse';
        
        $semesterCourse = SemesterCourse::join('degreeCourses' , 'DegCourses_ID' , 'SemesterCourses.DegCourse_ID')->where('ID' , $id)->first();
        $semesters      = Semester::get();
        $degrees        = Degree::get();
        $degreeCourses  = DegreeCourse::get();
       
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
                'degreeCourses'
            ));
    }
    public function allSemesterCourses(){

        $semesterCourses = 
        DB::table('SemesterCourses')->join('semesters' , 'semesters.Sem_ID' , 'SemesterCourses.Sem_ID')
        ->join('employee' , 'employee.Emp_ID' , 'SemesterCourses.Emp_ID')
        ->join('degreeCourses' , 'DegCourses_ID' , 'SemesterCourses.DegCourse_ID')
        ->join('Degrees' , 'Degrees.Degree_ID' , 'DegreeCourses.Degree_ID')
        ->join('Courses' , 'Courses.Course_ID' , 'DegreeCourses.Course_ID')
        ->paginate(10);

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

         $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return 
            response()->json([
            'title' => 'Failed' , 
            'type'=> 'error', 
            'message'=> ''.$validator['validation']
            ]);
        }else {
              $submit = DB::statement("EXEC SemesterCoursesUpdate

            @ID                     = '$request->id', 
            @Sem_ID                 = '$request->Sem_ID', 
            @Emp_ID                 = '$request->Emp_ID', 
            @CampusLimit            = '$request->CampusLimit' , 
            @DegCourse_ID           = '$request->DegCourse_ID',
            @QuizWeightage          = '$request->QuizWeightage' , 
            @AssignmentWeightage    = '$request->AssignmentWeightage',
            @PresentationWeightage  = '$request->PresentationWeightage', 
            @MidWeightage           = '$request->MidWeightage' , 
            @FinalWeightage         = '$request->FinalWeightage',
            @Section                = '$request->Section' 
            ;");



        return response()->json([
            'title' => 'Done' , 
            'type'=> 'success', 
            'message'=> 'SemesterCourse Updated!
            ']);
        }

       
    }
}
