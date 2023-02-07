<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Employee;
use App\Models\StdRollNoSlip;
use App\Models\Student;

use DB;
use Session;
use Excel;
use File;
use Log;
use Response;
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


    public function uploadStdRollNoSlipExcel(Request $request){

      
      
        $this->validate($request, [
            "stdRollFile" => "required|file|mimes:xlsx",
        ]);
        $stdRollFile = $request->file("stdRollFile");
        $input["file"] = time() . "." . $stdRollFile->getClientOriginalExtension();
        
        $destinationPath = public_path().'/stdRollFilesExcal/';
            if (!File::exists($destinationPath)) {
                 File::makeDirectory($destinationPath, 0755, true);
            }
             $stdRollFile->move($destinationPath, $input["file"]);
         $users = (new FastExcel)->import($destinationPath.$input["file"], function ($line) {
            

             $Enroll_ID =  $line['SemCourseId'];
             $Building  =  $line['Center'];
             $Room      =  $line['Room'];
             $SeatNo    =  0;
             $Time      = "";
             if (empty($e)){
                $e = Enrollment::pluck('ID')->toArray();
             }
             
             $s = StdRollNoSlip::pluck('Enroll_ID')->toArray();
             if(in_array($Enroll_ID, $e) && !in_array($Enroll_ID, $s)){
            $submit = DB::update("EXEC sp_InsertStdRollNoSlips
            @Enroll_ID  = '$Enroll_ID',
            @Building   = '$Building',
            @Room       = '$Room' ,
            @SeatNo     = '$SeatNo',
            @Time       = '$Time'

           
           ;");
        }else{
            $std[] = $Enroll_ID;
            return $line['StdRollNo'];
        }
            });      
           $requests = $users;

           if(!empty($requests[0])){
             $content = "Std Enrollment Id Not Found \n";
                foreach ($requests as $request) {
                  $content .= $request;
                  $content .= "\n";
                }

                // file name that will be used in the download
                $fileName = "NotFoundStudent.txt";

                // use headers in order to generate the download
                $headers = [
                  'Content-type' => 'text/plain', 
                  'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName)
                  // 'Content-Length' => sizeof($content)
                ];

                // make a response, with the content, a 200 response code and the headers
                return Response::make($content, 200, $headers);
            }else{
                return redirect()->back()->with(['successToaster' => 'StdRollNoSlip Updated' , 'title' => 'Success']);
            }

            
        
          
        
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

    public function getStudentRollNoSlip()
    {
        $session = $this->getSessionData();
        $enrollments = Enrollment::where('Std_ID' , $session['std_ID'])->get();
        // dd($enrollments);
        return view('StdRollNoSlips.getStudentRollNoSlip');
    }

    public function getSessionData(){

        return session::all();
    }

    public function printRollNoSlip(){

        $studentrollno=Session::get('user');
        $studentdatarollnoslip     = Student::where('StdRollNo' , $studentrollno)->first();


        // dd($studentdatarollnoslip);

        return view('StdRollNoSlips.printStudentRollNoSlip',compact('studentdatarollnoslip'));
    }
}
