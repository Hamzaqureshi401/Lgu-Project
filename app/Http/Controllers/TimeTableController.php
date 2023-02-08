<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;
use App\Models\Employee;
use App\Models\SemesterCourse;
use Illuminate\Support\Facades\DB;
use Validator;

class TimeTableController extends Controller
{
    public function validation($request){

        $this->validate($request, [
            'SemCourse_ID'      => 'required|numeric',
            'Day'               => 'required|max:50',
            'StartTime'         => 'required|date_format:H:i',
            'EndTime'           => 'required|date_format:H:i',
            'Building'          => 'required',
            'Room'              => 'required',
            'Type'              => 'required',
            'Emp_ID'            => 'required|numeric'
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
            'SemCourse_ID'      => 'required|numeric',
            'Day'               => 'required|max:50',
            'StartTime'         => 'required|date_format:H:i',
            'EndTime'           => 'required|date_format:H:i',
            'Building'          => 'required',
            'Room'              => 'required',
            'Type'              => 'required',
            'Emp_ID'            => 'required|numeric'

        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

     public function addTimeTable(){

        $button = "Add TimeTable";
        $title  = 'Add TimeTable';
        $route  = '/storeTimeTable';
        $semesterCourses = SemesterCourse::get();
        $employees = Employee::get();
        return
            view('TimeTables.addTimeTable',
               compact(
                  'button' ,
                  'title' ,
                  'route',
                  'semesterCourses',
                  'employees'
               ));
    }

    public function storeTimeTable(Request $request){

         //dd($request->all());

      //$validator = $this->validation($request);

        foreach($request->Day as $key => $data){

        
        $day        = $request['Day'][$key];
        $EndTime    = $request['EndTime'][$key];
        $StartTime  = $request['StartTime'][$key];
        $Building   = $request['Building'][$key];
        $Room       = $request['room'][$key];
       

        //dd($day);
            $submit = DB::update("EXEC sp_InsertTimeTable
            @SemCourse_ID       = '$request->SemCourse_ID',
            @Day                = '$day',
            @StartTime          = '$StartTime' ,
            @EndTime            = '$EndTime',
            @Building           = '$Building',
            @Room               = '$Room',
            @Type               = '$request->Type',
            @Emp_ID             = '$request->Emp_ID'
            ;");
        }

         return redirect()->back()->with(['successToaster' => 'TimeTable Added' , 'title' => 'Success']);


    }

    public function editTimeTable($id){

        $button = "Update TimeTable";
        $title  = 'Edit TimeTable';
        $route  = '/updateTimeTable';
        $timeTable = TimeTable::where('ID' , $id)->first();
        $semesterCourses = SemesterCourse::get();
        $employees = Employee::get();

        return
            view('TimeTables.editTimeTable',
               compact(
                  'timeTable',
                  'button' ,
                  'title' ,
                  'route',
                  'semesterCourses',
                  'employees'
               ));
    }

     public function allTimeTables(){

        $timeTables = TimeTable::paginate(10);
        $title  = 'All TimeTables';
        $route = 'updateTimeTable';
        $getEditRoute = 'editTimeTable';
        $modalTitle = 'Edit TimeTables';


        return
            view('TimeTables.allTimeTable' ,
               compact(
                  'timeTables' ,
                  'title',
                  'route',
                  'modalTitle',
                  'getEditRoute'
               ));
    }
     public function updateTimeTable (Request $request){

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
             $submit = DB::update("EXEC sp_UpdateTimeTable

            @ID                 = '$request->id',
            @SemCourse_ID       = '$request->SemCourse_ID',
            @Day                =  '$request->Day',
            @StartTime          = '$request->StartTime' ,
            @EndTime            = '$request->EndTime',
            @Building           = '$request->Building',
            @Room               = '$request->Room',
            @Type               = '$request->Type',
            @Emp_ID             = '$request->Emp_ID'
            ;");

        // return response()->json([
        //     'title'  => 'Done' ,
        //     'type'   => 'success',
        //     'message'=> 'TimeTable Updated!
        //     ']);
        // }
    return redirect()->back()->with(['successToaster' => 'TimeTable Updated' , 'title' => 'Success']);

    }
}
