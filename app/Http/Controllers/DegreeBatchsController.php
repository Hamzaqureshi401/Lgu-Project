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
        $validation['validation'] = $validator->errors()->first();
        if ($validator->fails()) {
            $validation['error'] = true;
        }else{
            $validation['error'] = false;
        }
        return $validation;
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
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }elseif($unique == true){
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> 'These are Already Enrolled!'
            ]);
        }else {
            $submit = DB::update("EXEC sp_InsertDegreeBatches
            @Degree_ID  = '$request->Degree_ID',
            @Batch_ID  = '$request->Batch_ID'
           ;");

          return response()->json([
            'title' => 'Done' ,
            'type'=> 'success',
            'message'=> 'DegreeBatch Added!
            ']);
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

        $validator = $this->validation($request);
        if ($validator['error'] == true) {
            return
            response()->json([
            'title' => 'Failed' ,
            'type'=> 'error',
            'message'=> ''.$validator['validation']
            ]);
        }else {
           $submit = DB::update("EXEC sp_UpdateDegreeBatches
            @ID                    = '$request->id',
            @Degree_ID             = '$request->Degree_ID',
            @Batch_ID             = '$request->Batch_ID'
            ;");
         return response()->json([
            'title'  => 'Done' ,
            'type'   => 'success',
            'message'=> 'Degree Batch Updated!
            ']);
        }
    }

    public function uniqueDigreeBatch($request){

        return DegreeBatche::where(['Degree_ID' => $request->Degree_ID , 'Batch_ID' => $request->Batch_ID])->exists();
    }

}
