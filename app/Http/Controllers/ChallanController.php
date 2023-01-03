<?php

namespace App\Http\Controllers;
use App\Models\Challan;
use Illuminate\Http\Request;
use Session;

use PDF;
use Dompdf\Dompdf;
class ChallanController extends Controller
{
     public function allChallans(){

     if (session()->has('std_session')) {
        $Std_ID = session::get('id');
        $challans = Challan::where('Std_ID' , $Std_ID)->paginate(10);
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

       $Std_ID = session::get('id');
       $challan = Challan::where('Std_ID' , $Std_ID)->latest('ID')->first();






$dompdf = new Dompdf($options);
$table = '
<table id="vertical" style="width:100%; background-color:white;">
<tr>
    <td style="width:33.90%; background-color:#000">
        <table style="width:100%; background-color:white">
            <tr>
                <td style="width:45%; ">
                <img src="logo.jpg" alt="Microsoft-Teams-image-1" border="0" width="80">
                </td>
                <td style="width:5%;"></td>
                <td style="width:45%;   font-size:8px; text-align:right"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center; border:2px solid #000; padding-top:5px; padding-bottom:5px; background-color:#ccc; font-weight:bold;">Bank Copy</td>
            </tr>
            <tr>
                <td colspan="3" style="width:100%; height:15px;"></td>
            </tr>
            <tr>
                <td style="width:42%;  border:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">MCB Account</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000; text-align:center;"><span style="margin-top:5px; display:block">0633853231000004</span></div>
                </td>
                <td style="width:5%;"></td>
                <td style="width:53%;  border:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Depost Date(<small>dd-mm-yy</small>)</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000; text-align:center;"><span style="margin-top:5px; display:block">'.$dateonly.'</span></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Applicant Name</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$fullname.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Applicant CNIC</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$cnic.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Father/Spouse/Guardian Name with CNIC</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$father_name.'('.$father_cnic.')'.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3">
                       <table style="width: 100%;">
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000; font-size:14px;">Sr.#</td>
                                <td width="65%" style="text-align:center; font-size:14px; border:1px solid #000;">Particulars</td>
                                <td width="20%" style="text-align:center; border:1px solid #000; font-size:14px;">Amount</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">1</td>
                                <td width="65%" style="text-align:center; font-size:14px; border:1px solid #000;">Application Fee</td>
                                <td width="20%" style="text-align:center; border:1px solid #000;">1500</td>
                            </tr>
                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                       <table style="width: 100%;">
                            <tr>
                                <td width="80%" style="text-align:center; font-size:14px; border:1px solid #000;">Total Amount</td>
                                <td width="20%" style="text-align:center; border:1px solid #000;">1500</td>
                            </tr>
                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:30px;"></td>
            </tr>

            <tr>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Depositor Signature</td>
                <td style="width:5%; "></td>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Bank Signature</td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:15px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;">
                    <strong style="font-size:14px;">TERMS</strong>
                    <p style="font-size:12px;"> Amount deposit is non-refundable. Deposit can be made in any Branch of MCB. </p>
                </td> 
            </tr>
            
        </table>
    </td>
    <td style="width:33.90%; background-color:#000">
        <table style="width:100%; background-color:white">
            <tr>
                <td style="width:45%; ">
                <img src="logo.jpg" alt="Microsoft-Teams-image-1" border="0" width="80">
                </td>
                <td style="width:5%;"></td>
                <td style="width:45%;   font-size:8px; text-align:right"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center; border:2px solid #000; padding-top:5px; padding-bottom:5px; background-color:#ccc; font-weight:bold;">Applicant Copy</td>
                
            </tr>
            <tr>
                <td colspan="3" style="width:100%; height:15px;"></td>
            </tr>
            <tr>
                <td style="width:42%;  border:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">MCB Account</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000; text-align:center;"><span style="margin-top:5px; display:block">0633853231000004</span></div>
                </td>
                <td style="width:5%;"></td>
                <td style="width:53%;  border:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Depost Date(<small>dd-mm-yy</small>)</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000; text-align:center;"><span style="margin-top:5px; display:block">'.$dateonly.'</span></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Applicant Name</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$fullname.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Applicant CNIC</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$cnic.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Father/Spouse/Guardian Name with CNIC</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$father_name.'('.$father_cnic.')'.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3">
                       <table style="width: 100%;">
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000; font-size:14px;">Sr.#</td>
                                <td width="65%" style="text-align:center; font-size:14px; border:1px solid #000;">Particulars</td>
                                <td width="20%" style="text-align:center; border:1px solid #000; font-size:14px;">Amount</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">1</td>
                                <td width="65%" style="text-align:center; font-size:14px; border:1px solid #000;">Application Fee</td>
                                <td width="20%" style="text-align:center; border:1px solid #000;">1500</td>
                            </tr>
                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                       <table style="width: 100%;">
                            <tr>
                                <td width="80%" style="text-align:center; font-size:14px; border:1px solid #000;">Total Amount</td>
                                <td width="20%" style="text-align:center; border:1px solid #000;">1500</td>
                            </tr>
                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:30px;"></td>
            </tr>

            <tr>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Depositor Signature</td>
                <td style="width:5%; "></td>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Bank Signature</td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:15px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;">
                    <strong style="font-size:14px;">TERMS</strong>
                    <p style="font-size:12px;"> Amount deposit is non-refundable. Deposit can be made in any Branch of MCB. </p>
                </td> 
            </tr>
            
        </table>
    </td>
    <td style="width:33.90%; background-color:#000">
        <table style="width:100%; background-color:white">
            <tr>
                <td style="width:45%; ">
                <img src="logo.jpg" alt="Microsoft-Teams-image-1" border="0" width="80">
                </td>
                <td style="width:5%;"></td>
                <td style="width:45%;   font-size:8px; text-align:right"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center; border:2px solid #000; padding-top:5px; padding-bottom:5px; background-color:#ccc; font-weight:bold;">Accounts Copy</td>
                
            </tr>
            <tr>
                <td colspan="3" style="width:100%; height:15px;"></td>
            </tr>
            <tr>
                <td style="width:42%;  border:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">MCB Account</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000; text-align:center;"><span style="margin-top:5px; display:block">0633853231000004</span></div>
                </td>
                <td style="width:5%;"></td>
                <td style="width:53%;  border:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Depost Date(<small>dd-mm-yy</small>)</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000; text-align:center;"><span style="margin-top:5px; display:block">'.$dateonly.'</span></div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>
            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Applicant Name</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$fullname.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Applicant CNIC</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$cnic.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;  background-color:#ccc; border-left:2px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">
                    <div style="width:100%; height:20px; background-color:#ccc; padding:3px; font-size:14px;">Father/Spouse/Guardian Name with CNIC</div>
                    <div style="width:100%; height:30px; background-color:white; border-top:1px solid #000;"><span style="margin-top:5px; display:block">'.$father_name.'('.$father_cnic.')'.'</span></div>
                </td>
                
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:3px;"></td>
            </tr>

            <tr>
                <td colspan="3">
                       <table style="width: 100%;">
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000; font-size:14px;">Sr.#</td>
                                <td width="65%" style="text-align:center; font-size:14px; border:1px solid #000;">Particulars</td>
                                <td width="20%" style="text-align:center; border:1px solid #000; font-size:14px;">Amount</td>
                            </tr>
                            <tr>
                                <td width="15%" style="text-align:center; border:1px solid #000;">1</td>
                                <td width="65%" style="text-align:center; font-size:14px; border:1px solid #000;">Application Fee</td>
                                <td width="20%" style="text-align:center; border:1px solid #000;">1500</td>
                            </tr>
                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                       <table style="width: 100%;">
                            <tr>
                                <td width="80%" style="text-align:center; font-size:14px; border:1px solid #000;">Total Amount</td>
                                <td width="20%" style="text-align:center; border:1px solid #000;">1500</td>
                            </tr>
                       </table>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:30px;"></td>
            </tr>

            <tr>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Depositor Signature</td>
                <td style="width:5%; "></td>
                <td style="width:45%;  border-top:2px solid #000; text-align:center; font-size:14px;">Bank Signature</td>
            </tr>

            <tr>
                <td colspan="3" style="width:100%; height:15px;"></td>
            </tr>

            <tr>
                <td colspan="3" style="border-top:2px solid #000;">
                    <strong style="font-size:14px;">TERMS</strong>
                    <p style="font-size:12px;"> Amount deposit is non-refundable. Deposit can be made in any Branch of MCB. </p>
                </td> 
            </tr>
            
        </table>
    </td>
</tr>
</table>';
$dompdf->load_html($table);
$dompdf->set_paper('A4', 'landscape');
$dompdf->render();
$dompdf->output();



       // view()->share('challan',$challan);
       //  $pdf = PDF::loadView('Challans.printChallan');
       //  $pdf->setPaper('A4', 'portrait');
       // // $pdf = PDF::loadView('Challans.printChallan' , compact('challan') );
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
}
