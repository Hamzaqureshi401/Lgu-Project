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
     }else{
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


        // dd($Challans_ID);

        // $session           = $this->getSessionData();
        // $request['Std_ID'] = $session['std_ID'];
        
        // $registration = Registration::where('Std_ID' , $request['Std_ID'])->first();
       
        $challan = Challan::where('ID',$Challans_ID)->first();





// $dompdf = new Dompdf($options);
// $table = ;
// $dompdf->load_html($table);
// $dompdf->set_paper('A4', 'landscape');
// $dompdf->render();
// $dompdf->output();



       // view()->share('challan',$challan);
       //  $pdf = PDF::loadView('Challans.printChallan');
       //  $pdf->setPaper('A4', 'portrait');
        // $pdf = PDF::loadView('Challans.printChallan' , compact('challan') );
       //   return $pdf->download('invoice.pdf');

       //  PDF::setOptions(['isRemoteEnabled' => TRUE, 'enable_javascript' => TRUE]);
       // $dompdf = new Dompdf();
       // $html = view('Challans.printChallan' , compact('challan'))->render();
       // $dompdf->loadHtml($html);
       // $dompdf->render();

       // return $dompdf->download('card.pdf');

        //dd($challan);
       return
        view('Challans.printChallan' , compact('challan'));
    }

    public function getSessionData(){

        return session::all();
    }

    public function createChallan(
           
            $Amount,
            $Type,
            $Reg,
            $Sem_ID
    ){

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
            @Sem_ID                = '$Sem_ID'
            ;");

        // return Challan::where(['DueDate' => $IssueDate , 'Reg_ID' => 30021 , 'Sem_ID' =>  $Sem_ID])->first();
         return Challan::latest('ID')->first();


    }

    public function createChallanDetail(

        $Challans_ID,
        // $SemesterFee,
        $Magazine_Fee,
        $Exam_Fee,
        $Society_Fee,
        $Misc_Fee,
        $Registration_Fee,
        $Practical_charges,
        $Sports_Fund,
        // $FeeType,
         $Tuition_Fee
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
            @Tuition_Fee             = '$Tuition_Fee'
            
            ;");


    }


    
    public function approvechallan(Request $request,$Challans_ID){

        $challan= Challan::where('ID', $Challans_ID);
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
