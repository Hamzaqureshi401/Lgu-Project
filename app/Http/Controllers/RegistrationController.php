<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;


class RegistrationController extends Controller
{
     public function storeRegistrationInDB($Std_ID , $AcaStdID , $Sem_ID){

        $submit = DB::statement("EXEC sp_InsertRegistrations
            @Std_ID         = '$Std_ID',
            @AcaStdID       = '$AcaStdID',
            @Sem_ID         = '$Sem_ID'
            ;");

    }
}
