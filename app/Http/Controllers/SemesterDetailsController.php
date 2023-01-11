<?php

namespace App\Http\Controllers;
use App\Models\Degree;
use App\Models\Semester;
use App\Models\SemesterDetail;
use Illuminate\Support\Facades\DB;
use App\Models\DegreeBatche;
use Illuminate\Http\Request;
use Validator;

class SemesterDetailsController extends Controller
{
    public function validation($request){

        $this->validate($request, [
            'DegBatches_ID'         => 'required|numeric|unique:SemesterDetails',
            'Sem_ID'            => 'required|numeric|unique:SemesterDetails',
            'SemesterFee'       => 'required|numeric',
            'Magazine_Fee'      => 'required|numeric',
            'Exam_Fee'          => 'required|numeric',
            'Society_Fee'       => 'required|numeric',
            'Misc_Fee'          => 'required|numeric',
            'Registration_Fee'  => 'required|numeric',
            'Practical_charges' => 'required|numeric',
            'Sports_Fund'       => 'required|numeric',
            'FeeType'           => 'required|numeric',
            'Tuition_Fee'       => 'required|numeric',
            
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
            'DegBatches_ID'         => 'required|numeric',
            'Sem_ID'            => 'required|numeric',
             'SemesterFee'       => 'required|numeric',
            'Magazine_Fee'      => 'required|numeric',
            'Exam_Fee'          => 'required|numeric',
            'Society_Fee'       => 'required|numeric',
            'Misc_Fee'          => 'required|numeric',
            'Registration_Fee'  => 'required|numeric',
            'Practical_charges' => 'required|numeric',
            'Sports_Fund'       => 'required|numeric',
            'FeeType'           => 'required|numeric',
            'Tuition_Fee'       => 'required|numeric',
            
        ]);
        // $validation['validation'] = $validator->errors()->first();
        // if ($validator->fails()) {
        //     $validation['error'] = true;
        // }else{
        //     $validation['error'] = false;
        // }
        // return $validation;
    }

    public function uniqueSemesterdetails($request){

        return SemesterDetail::where(['DegBatches_ID' => $request->DegBatches_ID , 'Sem_ID' => $request->Sem_ID])->exists();
    }

    public function addSemesterDetails(){

        $degrees = Degree::get();
        $semesters = Semester::get();
        $button = "Add Semester Detail";
        $title  = 'Add Semester Detail';
        $route  = '/storeSemesterDetails';
         $degreeCourses=  DegreeBatche::select('DegreeName' , 'SemSession' , 'DegreeBatches.ID')
        ->join('Degrees' , 'Degrees.ID' , 'DegreeBatches.Degree_ID')
        ->join('Semesters' , 'Semesters.ID' , 'DegreeBatches.Batch_ID')
        ->get();
        return 
        view('SemesterDetail.addSemesterDetails', 
            compact(
                'button' , 
                'title' , 
                'route',
                'degrees',
                'semesters',
                'degreeCourses'
            )
        );
    }

    public function storeSemesterDetails(Request $request){
        //dd($request->all());
        $validator = $this->validation($request);
         $unique    = $this->uniqueSemesterdetails($request);
         if ($unique == true){
             return redirect()->back()->with(['errorToaster' => 'Semester And Degree Batch must be Unique!' , 'title' => 'Duplicate record']);
         }
        // if ($validator['error'] == true) {
        //     return 
        //     response()->json([
        //     'title' => 'Failed' , 
        //     'type'=> 'error', 
        //     'message'=> ''.$validator['validation']
        //     ]);
        // }else {

             $submit = DB::update("EXEC sp_InsertSemesterDetails 
            @DegBatches_ID          = '$request->DegBatches_ID', 
            @Sem_ID             = '$request->Sem_ID', 
            @SemesterFee        = '$request->SemesterFee',
            @Magazine_Fee       = '$request->Magazine_Fee' , 
            @Exam_Fee           = '$request->Exam_Fee',
            @Society_Fee        = '$request->Society_Fee' , 
            @Misc_Fee           = '$request->Misc_Fee',
            @Registration_Fee   = '$request->Registration_Fee' , 
            @Practical_charges  = '$request->Practical_charges',
            @Sports_Fund        = '$request->Sports_Fund' , 
            @FeeType            = '$request->FeeType',
            @Tuition_Fee            = '$request->Tuition_Fee'
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
        $degreeCourses  = DegreeBatche::whereNotNull('Batch_ID')->get();
       
         return 
         view('SemesterDetail.editSemesterDetail', 
            compact(
                'semesterDetail', 
                'button' , 
                'title' , 
                'route',
                'degrees',
                'semesters',
                'degreeCourses'
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
       //  dd($request->all());
              $submit = DB::statement("EXEC sp_UpdateSemesterDetails

            @SemDetail_ID       = '$request->id', 
            @DegBatches_ID          = '$request->DegBatches_ID', 
            @Sem_ID             = '$request->Sem_ID', 
            @SemesterFee        = '$request->SemesterFee',
            @Magazine_Fee       = '$request->Magazine_Fee' , 
            @Exam_Fee           = '$request->Exam_Fee',
            @Society_Fee        = '$request->Society_Fee' , 
            @Misc_Fee           = '$request->Misc_Fee',
            @Registration_Fee   = '$request->Registration_Fee' , 
            @Practical_charges  = '$request->Practical_charges',
            @Sports_Fund        = '$request->Sports_Fund' , 
            @FeeType            = '$request->FeeType',
            @Tuition_Fee            = '$request->Tuition_Fee'
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
