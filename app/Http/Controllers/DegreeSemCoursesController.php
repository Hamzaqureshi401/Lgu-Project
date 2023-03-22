<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Batch;
use App\Models\Course;
use App\Models\DegreeBatche;
use App\Models\Semester;
use App\Models\SemesterCourse;
use App\Models\DegreeSemCourse;

use Illuminate\Support\Facades\DB;
use Validator;
class DegreeSemCoursesController extends Controller
{
     public function validation($request){

        $this->validate($request, [
            'DegBatches_ID'       => 'required|numeric',
            'SemCourse_ID'        => 'required|numeric',
            'Section'             => 'required'

        ]);
        
    }

     public function addDegreeSemCourses(){

        $button = "Add Degree Semester Courses";
        $title  = 'Add Degree Semester Courses';
        $route  = '/storeDegreeSemCourses';
        $degreeBatches = DegreeBatche::get();
        $semesterCourses = SemesterCourse::get();
        return
        view('DegreeSemCourses.addDegreeSemCourses',
            compact(
                'button' ,
                'title' ,
                'route',
                'degreeBatches',
                'semesterCourses')
        );
    }

     public function storeDegreeSemCourses(Request $request){

        //dd($request->all());

        $unique = $this->uniqueDigreeBatch($request);
        $validator = $this->validation($request);
      

            if($unique == true){
             return redirect()->back()->with(['errorToaster' => 'Degree Batches Must Be Uniqle' , 'title' => 'Warning']);
        }else {
            $submit = DB::update("EXEC sp_InsertDegreeSemCourses
            @DegBatches_ID  = '$request->DegBatches_ID',
            @SemCourse_ID  = '$request->SemCourse_ID',
            @Section = '$request->Section'
           ;");
            return redirect()->back()->with(['successToaster' => 'Degree Batches Added' , 'title' => 'Success']);
        }

       

    }

      public function allDegreeSemCourses(){

        $degreeSemCourses = DegreeSemCourse::paginate(10);
        $title         = 'Degree Batch';
        $route         = 'updateDegreeSemCourses';
        $getEditRoute  = 'editDegreeSemCourses';
        $modalTitle    = 'Edit Degree Batch';

       


        return
        view('DegreeSemCourses.allDegreeSemCourses' ,
            compact(
                'degreeSemCourses' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

     public function editDegreeSemCourses($id){

        $button = "Update Degree Batch Sem Courses";
        $title  = 'Edit Degree Batch Sem Courses';
        $route  = '/updateDegreeSemCourses';
        $degreeBatches = DegreeBatche::get();
        $semesterCourses = SemesterCourse::get();
        $degreeSemCoursees = DegreeSemCourse::where('ID' , $id)->first();
        //dd($degreeSemCoursees);

        return
        view('DegreeSemCourses.editDegreeSemCourses',
            compact(
                'degreeSemCoursees',
                'button' ,
                'title' ,
                'route',
                'degreeBatches',
                'semesterCourses'
            ));

    }
     public function updateDegreeSemCourses (Request $request){

       
           $submit = DB::update("EXEC sp_UpdateDegreeSemCourses
            @ID                     = '$request->id',
            @DegBatches_ID          = '$request->DegBatches_ID',
            @SemCourse_ID           = '$request->SemCourse_ID',
            @Section                = '$request->Section'
            ;");
        
           return redirect()->back()->with(['successToaster' => 'Degree Batches Updated' , 'title' => 'Success']);
    }

    public function uniqueDigreeBatch($request){

        return DegreeSemCourse::where(['DegBatches_ID' => $request->DegBatches_ID , 'SemCourse_ID' => $request->SemCourse_ID])->exists();
    }
}