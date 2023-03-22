<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Batch;
use App\Models\Course;
use App\Models\DegreeBatche;
use App\Models\Semester;
use App\Models\SemesterCourse;

use Illuminate\Support\Facades\DB;
use Validator;

class DegreeBatchsController extends Controller
{
    public function validation($request){

        $this->validate($request, [
            'Degree_ID'        => 'required|numeric',
            'Batch_ID'        => 'required|numeric',

        ]);
        
    }

     public function addDegreeBatch(){

        $button = "Add Degree Batches";
        $title  = 'Add Degree Batches';
        $route  = '/storeDegreeBatch';
        $degrees = Degree::get();
        $semesters = Semester::get();
        return
        view('DegreeBatchs.addDegreeBatchs',
            compact(
                'button' ,
                'title' ,
                'route',
                'degrees',
                'semesters')
        );
    }

     public function storeDegreeBatch(Request $request){

        $unique = $this->uniqueDigreeBatch($request);
        $validator = $this->validation($request);
      

            if($unique == true){
             return redirect()->back()->with(['errorToaster' => 'Degree Batches Must Be Uniqle' , 'title' => 'Warning']);
        }else {
            $submit = DB::update("EXEC sp_InsertDegreeBatches
            @Degree_ID  = '$request->Degree_ID',
            @Batch_ID  = '$request->Batch_ID'
           ;");
            return redirect()->back()->with(['successToaster' => 'Degree Batches Added' , 'title' => 'Success']);
        }

       

    }

      public function allDegreeBatchs(){

        $degreeBatchs = DegreeBatche::paginate(10);
        $title         = 'Degree Batch';
        $route         = 'updateDegreeBatch';
        $getEditRoute  = 'editDegreeBatch';
        $modalTitle    = 'Edit Degree Batch';

       


        return
        view('DegreeBatchs.allDegreeBatchs' ,
            compact(
                'degreeBatchs' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

     public function editDegreeBatch($id){

        $button = "Update Degree Batch";
        $title  = 'Edit Degree Batch';
        $route  = '/updateDegreeBatch';
        $degrees = Degree::get();
        $batches  = Semester::get();
        $degreeBatches = DegreeBatche::where('ID' , $id)->first();

        return
        view('DegreeBatchs.editDegreeBatch',
            compact(
                'degreeBatches',
                'button' ,
                'title' ,
                'route',
                'degrees',
                'batches'
            ));

    }
     public function updateDegreeBatch (Request $request){

       
           $submit = DB::update("EXEC sp_UpdateDegreeBatches
            @ID                    = '$request->id',
            @Degree_ID             = '$request->Degree_ID',
            @Batch_ID             = '$request->Batch_ID'
            ;");
        
           return redirect()->back()->with(['successToaster' => 'Degree Batches Updated' , 'title' => 'Success']);
    }

    public function uniqueDigreeBatch($request){

        return DegreeBatche::where(['Degree_ID' => $request->Degree_ID , 'Batch_ID' => $request->Batch_ID])->exists();
    }

}
