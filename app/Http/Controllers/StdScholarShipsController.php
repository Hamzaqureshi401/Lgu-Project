<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StdScholarShip;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Semester;
use DB;
use Session;

class StdScholarShipsController extends Controller
{
           public function validation($request){

        $this->validate($request, [
            'Std_ID'        => 'required|max:50|unique:Students_scholarship',
            'Percentage'    => 'required|numeric',
            'Category'      => 'required|max:70',
            'Scholarship_Type'  => 'required',
        ]);
       
    }
     public function validationUpdate($request){


         $this->validate($request, [
            'Percentage'    => 'required|numeric',
            'Category'      => 'required|max:70',
            'Scholarship_Type'  => 'required',
        ]);
       
    }



    public function addStdScholarShips(){
        $button = "Add StdScholarShip";
        $title  = 'Add StdScholarShip';
        $route  = '/storeStdScholarShip';
        $students = Student::get();


        return
        view('StdScholarShips.AddStdScholarShips',
         compact(
            'button',
            'title',
            'route',
            'students'
            
         ));
    }

    public function storeStdScholarShip(Request $request){        

        $Emp_ID = Session::get('ID');
        $reollNo = Student::where('ID' , $request->Std_ID)->first()->StdRollNo;
        $SemSession = explode('/' ,  $reollNo);
        $sem_ID = Semester::where('SemSession' , $SemSession)->first()->ID;
        $validator = $this->validation($request);
       
           $submit = DB::update("EXEC Sp_InsertStudents_scholarship
            @Std_ID               = '$request->Std_ID',
            @Percentage           = '$request->Percentage',
            @Category             = '$request->Category',
            @Scholarship_Type     = '$request->Scholarship_Type',
            @Emp_ID               = '$Emp_ID',
            @Sem_ID               = '$sem_ID ';
            ");
    
        return redirect()->back()->with(['successToaster' => 'StdScholarShip Added' , 'title' => 'Success']);

    }
    public function editStdScholarShip($id){

        $button = "Update StdScholarShip";
        $title  = 'Edit StdScholarShip';
        $route  = '/updateStdScholarShip';
        
        $stdScholarShip = StdScholarShip::where('ID' , $id)->first();

        return
        view('StdScholarShips.editStdScholarShip',
         compact(
            'stdScholarShip',
            'button',
            'title' ,
            'route'
            
         ));
    }

     public function allStdScholarShips(){

        $stdScholarShips = StdScholarShip::paginate(10);
        $title  = 'All StdScholarShips';
        $route = 'updateStdScholarShip';
        $getEditRoute = 'editStdScholarShip';
        $modalTitle = 'Edit StdScholarShip';
        return
        view('StdScholarShips.allStdScholarShips' ,
         compact(
            'stdScholarShips' ,
            'title',
            'route',
            'modalTitle',
            'getEditRoute'
         ));
    }

    public function updateStdScholarShip(Request $request){

         $validator = $this->validationUpdate($request);

         $Emp_ID = Session::get('ID');
     
           $submit = DB::update("EXEC sp_updateStudents_scholarship

            @ID                   = '$request->id',
            @Percentage           = '$request->Percentage',
            @Category             = '$request->Category',
            @Scholarship_Type     = '$request->Scholarship_Type',
            @Emp_ID               = '$Emp_ID';
            ");

     
        return redirect()->back()->with(['successToaster' => 'StdScholarShip Updated' , 'title' => 'Success']);
    }
}
