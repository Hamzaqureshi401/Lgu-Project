<?php

namespace App\Http\Controllers;
use App\Models\Challan;
use Illuminate\Http\Request;
use Session;


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
       // dd(session::all());
       return
        view('Challans.printChallan' , compact('challan'));
    }
}
