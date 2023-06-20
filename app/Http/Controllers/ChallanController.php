<?php

namespace App\Http\Controllers;
use App\Models\Challan;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;
use App\Models\Registration;
use DB;
use PDF;
use Dompdf\Dompdf;
class ChallanController extends Controller
{
     public function allChallans(){

     if (session()->has('std_session')) {

        $session           = $this->getSessionData();
        $request['Std_ID'] = $session['std_ID'];
        
        $registration = Registration::where('Std_ID' , $request['Std_ID'])->first();
        if (!empty($registration)){
            $challans = Challan::where('Reg_ID' , $registration->ID)->paginate(10);    
        }else{
            $challans = '';
        }
        $title  = 'My Challan';
        $route = '';
        $getEditRoute = '';
        $modalTitle = '';
     }elseif(session()->has('Emp_session')){
        $challans = Challan::paginate(10);
        $title  = 'All Challan';
        $route = 'updateChallan';
        $getEditRoute = 'editChallan';
        $modalTitle = 'Edit Challan';
     }
        return
        view('Challans.allChallans' ,
            compact(
                'challans' ,
                'title' ,
                'modalTitle' ,
                'route',
                'getEditRoute'
            ));
    }

    public function printChallan($Challans_ID){
       
        $challan            = Challan::where('ID',$Challans_ID)->first();

        // $previousChallan = Challan::where('Reg_ID' , $challan->Reg_ID)->where('ID', '<', $Challans_ID)->orderBy('ID', 'desc');
        // if($previousChallan->exists() == true && $previousChallan->first()->Status == 'Valid'){
        //     $previousBalance = $previousChallan->first()->Amount;
        // }else{
        //     $previousBalance = 0.00;
        // }

        $previousChallan = Challan::where('Reg_ID' , $challan->Reg_ID);
        if($previousChallan->exists() == true ){
            $previousBalance = $previousChallan->where('Status' , 'Valid')->sum('Amount');
        }else{
            $previousBalance = 0.00;
        }
        
        
        $std_sch_details    = $challan->registration->student->std_scholarship;
        $challan_deta       = $challan->ChallanDetail;

        if(!empty($std_sch_details)){
            $std_sch_details=$challan->registration->student->std_scholarship->latest('Date')->first();
        }
        
            if(!empty($std_sch_details)){
                if($std_sch_details['Scholarship_Type']==='Percentage')
                {
                    $std_sch_amount = ($std_sch_details['Percentage']/100)*$challan_deta->Tuition_Fee ?? 0;
                }
                if($std_sch_details['Scholarship_Type']==='Fixed')
                {
                    $std_sch_amount = $std_sch_details['Percentage'] ?? 0;
                }
                $submit=$this->Updatescholarship($std_sch_details,$challan,$std_sch_amount);


            }

        $challan        = Challan::where('ID',$Challans_ID)->first();
        $std_sch_details= $challan->registration->student->std_scholarship;
        $challan_deta   = $challan->ChallanDetail;
        // dd($std_sch_details,$challan,$challan_deta,$std_sch_amount);
       return
        view('Challans.printChallan' , compact('challan' , 'previousBalance'));
    }

    function Updatescholarship($std_sch_details,$challan,$std_sch_amount){
                
        $submit       = DB::Update("EXEC sp_UpdateChallans
        @ID             = '$challan->ID',
        @IssueDate      = '$challan->IssueDate',
        @DueDate        = '$challan->DueDate',
        @PaidDate       = '$challan->PaidDate',
        @Status         = '$challan->Status',
        @Fine           = '$challan->Fine',
        @Amount         = '$challan->Amount',
        @Type           = '$challan->Type',
        @Sem_ID         = '$challan->Sem_ID',
        @Reg_ID         = '$challan->Reg_ID',
        @SchlorShip     = '$std_sch_amount',
        @Sch_Type       = '$std_sch_details->Scholarship_Type'
        ;");
        return $submit;
    }
    public function getSessionData(){
        return session::all();
    }

    public function createChallan(
            $Amount,
            $Type,
            $Reg,
            $Sem_ID,
            $std_sch_amount,
            $std_sch_type

    ){

       // $oldAmount  = Challan::getOldAmount($Reg);
        $Amount     = $Amount ;//+ $oldAmount;
        $IssueDate  = date('m/d/Y h:i:s a', time());
        $DueDate    = Date('m/d/Y', strtotime('+10 days'));
        $PaidDate   = "";
        $Status     = "Valid";
        $Fine       = 0;

       // dd($Reg);
         $submit = DB::statement("EXEC sp_InsertChallans
            
            @IssueDate             = '$IssueDate',
            @DueDate               = '$DueDate',
            @PaidDate              = '$PaidDate',
            @Status                = '$Status',
            @Fine                  = '$Fine',
            @Amount                = '$Amount',
            @Type                  = '$Type',
            @Reg_ID                = '$Reg',
            @Sem_ID                = '$Sem_ID',
            @Sch                   = '$std_sch_amount',
            @Sch_type              = '$std_sch_type'
            ;");

        // return Challan::where(['DueDate' => $IssueDate , 'Reg_ID' => 30021 , 'Sem_ID' =>  $Sem_ID])->first();
         return Challan::latest('ID')->first();
    }

    public function createChallanDetail(

        $Challans_ID,
        $Magazine_Fee,
        $Exam_Fee,
        $Society_Fee,
        $Misc_Fee,
        $Registration_Fee,
        $Practical_charges,
        $Sports_Fund,
        // $FeeType,
         $Tuition_Fee,
         $SemesterFee
        
    ){
         $submit = DB::statement("EXEC sp_InsertChallanDetails
            
            @Challans_ID             = '$Challans_ID',
            
            @Magazine_Fee            = '$Magazine_Fee',
            @Exam_Fee                = '$Exam_Fee',
            @Society_Fee             = '$Society_Fee',
            @Misc_Fee                = '$Misc_Fee',
            @Registration_Fee        = '$Registration_Fee',
            @Practical_charges       = '$Practical_charges',
            @Sports_Fund             = '$Sports_Fund',
            @Tuition_Fee             = '$Tuition_Fee',
            @Semester_Fee            = '$SemesterFee'
            
            ;");
    }

    public function approvechallan(Request $request,$Challans_ID){

        if(session()->has('Emp_session')){

        $challan = Challan::where('ID', $Challans_ID);
        $checkNextChallan = Challan::where('Reg_ID' , $challan->first()->Reg_ID)->where('ID', '>', $Challans_ID)->first();

        if(!empty($checkNextChallan)){
             return redirect()
                ->back()
                ->with([
                    'errorToaster' => 'Challan Confirmation Failed!' , 
                    'title' => 'Only Last Challn Can Be Confirmed!'
                ]);
        }
        
        $challan->update(['Status' => "Paid",'PaidDate' => $request->paiddate]);
        $student      =  Student::where('StdRollNo' , $challan->first()->registration->student->StdRollNo)->first();
            $registration = Registration::where('Std_ID' , $student->ID)->first();
            if (!empty($registration)){
                $challans = Challan::where('Reg_ID' , $registration->ID)->paginate(10);    
            }else{
                $challans = '';
            }
              return view('Challans.student_challan',
                  compact(
                      'challans','student'
                      
                  )
                     );
              }
          }
          public function admissionfeewaveoff(Request $request,$Challans_ID)
          {
            
            $challan = Challan::where('ID',$Challans_ID)->first();
            $challans_details=$challan->ChallanDetail;

            // dd($challan,$challans_details,$request->admissionfeewaveoff);


        if(empty($request->admissionfeewaveoff)){
            return redirect()
                ->back()
                ->with([
                    'errorToaster' => 'Addmision Wave off details Not Added!' , 
                    'title' => 'Error'
                ]);
          }
else{
    
          $submit = DB::Update("EXEC sp_UpdateChallansDetails


            @Challans_ID ='$challans_details->Challans_ID',
            @Tuition_Fee ='$challans_details->Tuition_Fee',
            @Magazine_Fee ='$challans_details->Magazine_Fee',
            @Exam_Fee ='$challans_details->Exam_Fee',
            @Society_Fee ='$challans_details->Society_Fee',
            @Misc_Fee ='$challans_details->Misc_Fee',
            @Registration_Fee = 0 ,
            @Practical_charges ='$challans_details->Practical_charges',
            @Sports_Fund ='$challans_details->Sports_Fund',
            @Admission_Fee_Waveoff_Details ='$request->admissionfeewaveoff'
            @Semester_Fee = 0
            

          
          ;");

          if(!empty($submit)){
            return redirect()
                ->back()
                ->with([
                    'successToaster' => 'Addmision fee Wave off successfully!' , 
                    'title' => 'Success'
                ]);
          }

          else{
            return redirect()
                ->back()
                ->with([
                    'errorToaster' => 'Addmision Wave off Not Added try again!' , 
                    'title' => 'Error'
                ]);

          }
}


          }

    
}
