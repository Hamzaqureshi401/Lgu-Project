<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Employee;
use App\Models\StdRollNoSlip;
use DB;
use Session;
use Excel;
use Rap2hpoutre\FastExcel\FastExcel;



class StdRollNoSlipsController extends Controller
{
     public function validation($request){


        $this->validate($request, [
            'Enroll_ID'        => 'required',
            'Building'        => 'required',
            'Room'       => 'required|max:10',
            'SeatNo'       => 'required|max:10',
            'Time'       => 'required',
           
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    

    public function addStdRollNoSlips(){

        $this->uploadExal();

        $button = "Add Std Roll No Slip";
        $title  = 'Add Std Roll No Slip';
        $route  = '/storeStdRollNoSlips';
        $enrollments = Enrollment::get()->unique('Std_ID');
        return
        view('StdRollNoSlips.addStdRollNoSlips',
            compact(
                'button' ,
                'title' ,
                'route',
                'enrollments'
                
            )
        );
    }

   


    public function storeStdRollNoSlips(Request $request){

       // dd($request->all());

        $validator = $this->validation($request);

        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
            $Emp_ID = Session::get('ID');
        
        
            $submit = DB::update("EXEC sp_InsertStdRollNoSlips
            @Enroll_ID  = '$request->Enroll_ID',
            @Building   = '$request->Building',
            @Room       = '$request->Room' ,
            @SeatNo     = '$request->SeatNo',
            @Time       = '$request->Time' 
           

            ;");
            $StdRollNoSlip = StdRollNoSlip::where(['Enroll_ID' => $request->Enroll_ID])->first();

             
            $submit = DB::update("EXEC sp_InsertInvigilator
            @StdRollNoSlips_ID  = '$StdRollNoSlip->ID',
            @Emp_ID     = '$Emp_ID'

            ;");

          // return response()->json([
          //   'title' => 'Done' ,
          //   'type'=> 'success',
          //   'message'=> 'StdRollNoSlip Added!
          //   ']);
        //}
             return redirect()->back()->with(['successToaster' => 'StdRollNoSlip Added' , 'title' => 'Success']);

    }


    public function uploadExal(){

       // dd(StdRollNoSlip::get());

         $users = (new FastExcel)->import('00 - FOR ERP.xlsx', function ($line) {
                
                
             $Enroll_ID =  $line['SemCourseId'];
             $Building  =  $line['Center'];
             $Room      =  $line['Room'];
             $SeatNo    =  0;
             $Time      = "";


            $submit = DB::update("EXEC sp_InsertStdRollNoSlips
            @Enroll_ID  = '$Enroll_ID',
            @Building   = '$Building',
            @Room       = '$Room' ,
            @SeatNo     = '$SeatNo',
            @Time       = '$Time'
           
           ;");
            });
        
    }

    public function editStdRollNoSlip($id){
         
       
        $button = 'Update Std Roll No Slip';
        $title  = 'Edit Std Roll No Slip';
        $route  = '/updateStdRollNoSlip';
        $stdRollNoSlips = StdRollNoSlip::where('ID' , $id)->first();
        $enrollments = Enrollment::get()->unique('Std_ID');
        $employees   = Employee::get();
         return
         view('StdRollNoSlips.editStdRollNoSlips',
            compact(
                'stdRollNoSlips',
                'button' ,
                'title' ,
                'route',
                'enrollments',
                'employees'
            ));
    }
    public function allStdRollNoSlips(){

        $stdRollNoSlips = StdRollNoSlip::paginate(10);
        $title  = 'All Std Roll No Slips';
        $route = 'editStdRollNoSlip/';
        $getEditRoute = 'editStdRollNoSlip';
        $modalTitle = 'Edit Std Roll No Slip';

        return
        view('StdRollNoSlips.allStdRollNoSlips' ,
            compact(
                'stdRollNoSlips' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function updateStdRollNoSlip(Request $request){

     
        
        //  $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return
        //     response()->json([
        //     'title' => 'Failed' ,
        //     'type'=> 'error',
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
              $submit = DB::update("EXEC sp_UpdateStdRollNoSlips
                @ID = '$request->ID',
             @Enroll_ID  = '$request->Enroll_ID',
            @Building   = '$request->Building',
            @Room       = '$request->Room' ,
            @SeatNo     = '$request->SeatNo',
            @Time       = '$request->Time' 
            ;");

        // return response()->json([
        //     'title' => 'Done' ,
        //     'type'=> 'success',
        //     'message'=> 'StdRollNoSlip Updated!
        //     ']);
              return redirect()->back()->with(['successToaster' => 'StdRollNoSlip Updated' , 'title' => 'Success']);
        


    }
}
