<?php

namespace App\Http\Controllers;
use App\Models\Challan;
use Illuminate\Http\Request;
use Session;
use App\Models\Registration;

use PDF;
use Dompdf\Dompdf;
class ChallanController extends Controller
{
     public function allChallans(){

     if (session()->has('std_session')) {

        $session           = $this->getSessionData();
        $request['Std_ID'] = $session['std_ID'];
        
        $registration = Registration::where('Std_ID' , $request['Std_ID'])->first();
        $challans = Challan::where('Reg_ID' , $registration->ID)->paginate(10);
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

    public function printChallan(){

        $session           = $this->getSessionData();
        $request['Std_ID'] = $session['std_ID'];
        
        $registration = Registration::where('Std_ID' , $request['Std_ID'])->first();
       
        $challan = Challan::where('Reg_ID' , $registration->ID)->first();





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
}
