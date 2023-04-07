<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTable;
use App\Models\Employee;
use App\Models\Course;
use App\Models\DegreeSemCourse;
use App\Models\TimeTableDetail;


use App\Models\SemesterCourse;
use Illuminate\Support\Facades\DB;
use Validator;

class TimeTableController extends Controller
{
    public function validation($request){

        $this->validate($request, [
            
            'Day'               => 'required|max:50',
            'StartTime'         => 'required|date_format:H:i',
            'EndTime'           => 'required|date_format:H:i',
            'Building'          => 'required',
            'Room'              => 'required',
            'Type'              => 'required'
            
        ]);
       
    }
    public function validationUpdate($request){

        $this->validate($request, [
            
            'Day'               => 'required|max:50',
            'StartTime'         => 'required|date_format:H:i',
            'EndTime'           => 'required|date_format:H:i',
            'Building'          => 'required',
            'Room'              => 'required',
            'Type'              => 'required'

        ]);
        
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

        foreach($request->Day as $key => $data){
            $day        = $request['Day'][$key];
            $EndTime    = $request['EndTime'][$key];
            $StartTime  = $request['StartTime'][$key];
            $Building   = $request['Building'][$key];
            $Room       = $request['room'][$key];
    
            $submit = DB::update("EXEC sp_InsertTimeTable
            @Day                = '$day',
            @StartTime          = '$StartTime' ,
            @EndTime            = '$EndTime',
            @Building           = '$Building',
            @Room               = '$Room',
            @Type               = '$request->Type'
            ;");

            $recentRecord = DB::select('SELECT TOP 1 * FROM TimeTable ORDER BY ID DESC');
            $DegreeSemCourse = DegreeSemCourse::where('ID' , $request->DegSemCourses_ID)->first();
                $this->storeTimeTableDetail($request->DegSemCourses_ID , $recentRecord , $DegreeSemCourse->Emp_ID);
            if(!empty($request->Merge)){
            foreach($request->Merge as $merge){
                $this->storeTimeTableDetail($merge , $recentRecord , $DegreeSemCourse->Emp_ID);
            }
        }
    }
        return redirect()->back()->with(['successToaster' => 'TimeTable Added' , 'title' => 'Success']);
    }

    public function storeTimeTableDetail($merge , $recentRecord , $updateEmp){

                $DegreeSemCourse = new TimeTableDetail(); 
                $DegreeSemCourse->DegSemCourses_ID = $merge;
                $DegreeSemCourse->TimeTable_ID = $recentRecord[0]->ID;
                $DegreeSemCourse->save();
                $DegreeSemCourse = DegreeSemCourse::where('ID' , $merge)->update(['Emp_ID' => $updateEmp ]);
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

        
            $submit = DB::update("EXEC sp_UpdateTimeTable

            @ID                 = '$request->id',
            @Day                = '$request->Day',
            @StartTime          = '$request->StartTime' ,
            @EndTime            = '$request->EndTime',
            @Building           = '$request->Building',
            @Room               = '$request->Room',
            @Type               = '$request->Type'
            ;");

    }
     public function deleteTimeTable($id){
        TimeTable::where('ID' , $id)->delete();
         return redirect()->back()->with(['successToaster' => 'TimeTable Deleted' , 'title' => 'Success']);
    }

    public function updateTimeTableAndCourse(Request $request){

        foreach($request->id as $key => $id){

            $TimeTable = TimeTable::where('ID' , $id)->first();
            $data['id']             = $id;
            $data['SemCourse_ID']   = $request->SemCourse_ID;
            $data['Day']            = $request->Day[$key];
            $data['StartTime']      = $request->StartTime[$key];
            $data['EndTime']        = $request->EndTime[$key];
            $data['Building']       = $request->Building[$key];
            $data['Room']           = $request->room[$key];
            $data['Type']           = $TimeTable->Type;
            $data['Emp_ID']         = $TimeTable->Emp_ID;
            $req = new Request($data);
            $this->updateTimeTable($req);
        }
        return redirect()->back()->with(['successToaster' => 'TimeTable Updated' , 'title' => 'Success']);
    }

}
