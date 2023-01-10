<?php

namespace App\Http\Controllers;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\SemesterDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class SemesterDetailsController extends Controller
{
    public function validation($request){

        $this->validate($request, [
            'Degree_ID'         => 'required|numeric|unique:SemesterDetails',
            'Sem_ID'            => 'required|numeric|unique:SemesterDetails',
            'SemesterFee'       => 'required|numeric',
            'PerSemester'       => 'required|numeric',
            'PerCourse'         => 'required|numeric',
            
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
            'Degree_ID'         => 'required|numeric',
            'Sem_ID'            => 'required|numeric',
            'SemesterFee'       => 'required|numeric',
            'PerSemester'       => 'required|numeric',
            'PerCourse'         => 'required|numeric',
            
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function addSemesterDetails(){

        $degrees = Degree::get();
        $semesters = Semester::get();
        $button = "Add Semester Detail";
        $title  = 'Add Semester Detail';
        $route  = '/storeSemesterDetails';
        return 
        view('SemesterDetail.addSemesterDetails', 
            compact(
                'button' , 
                'title' , 
                'route',
                'degrees',
                'semesters'
            )
        );
    }

    public function storeSemesterDetails(Request $request){

        $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return 
        //     response()->json([
        //     'title' => 'Failed' , 
        //     'type'=> 'error', 
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
             $submit = DB::update("EXEC InsertSemesterDetails 
            @Degree_ID          = '$request->Degree_ID', 
            @Sem_ID             = '$request->Sem_ID', 
            @SemesterFee        = '$request->SemesterFee',
            @PerSemester        = '$request->PerSemester' , 
            @PerCourse          = '$request->PerCourse'
            ;");

        //   return response()->json([
        //     'title' => 'Done' , 
        //     'type'=> 'success', 
        //     'message'=> 'SemesterDetail Added!
        //     ']);
        // }
              return redirect()->back()->with(['successToaster' => 'Semester Details Added' , 'title' => 'Success']);

    }

    public function editSemesterDetail($id){

        $button = 'Update Semester Detail';
        $title  = 'Edit Semester Detail';
        $route  = '/updateSemesterDetail';
        $semesterDetail = SemesterDetail::where('ID' , $id)->first();
        //dd($semesterDetail , $id);
        $degrees = Degree::get();
        $semesters = Semester::get();
         return 
         view('SemesterDetail.editSemesterDetail', 
            compact(
                'semesterDetail', 
                'button' , 
                'title' , 
                'route',
                'degrees',
                'semesters'
            ));
    }
    public function allSemesterDetails(){

        $semesterDetails = 
        SemesterDetail::paginate(10);
        $title  = 'All Semester Details';
        $route = 'updateSemesterDetail';
        $getEditRoute = 'editSemesterDetail';
        $modalTitle = 'Edit SemesterDetail';
        
       
        return 
        view('SemesterDetail.allSemesterDetails' , 
            compact(
                'semesterDetails' , 
                'title' , 
                'modalTitle' , 
                'route',
                'getEditRoute'  
            ));
    }

    public function updateSemesterDetail(Request $request){

         $validator = $this->validationUpdate($request);
        //  $validator = $this->validation($request);
        // if ($validator['error'] == true) {
        //     return 
        //     response()->json([
        //     'title' => 'Failed' , 
        //     'type'=> 'error', 
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {
              $submit = DB::statement("EXEC sp_UpdateSemesterDetails

            @SemDetail_ID                 = '$request->id', 
            @Degree_ID           = '$request->Degree_ID', 
            @Sem_ID              = '$request->Sem_ID', 
            @SemesterFee         = '$request->SemesterFee',
            @PerSemester         = '$request->PerSemester' , 
            @PerCourse   = '$request->PerCourse'
            ;");



        // return response()->json([
        //     'title' => 'Done' , 
        //     'type'=> 'success', 
        //     'message'=> 'SemesterDetail Updated!
        //     ']);
        // }
              return redirect()->back()->with(['successToaster' => 'Semester Details Updated' , 'title' => 'Success']);

       
    }
}
