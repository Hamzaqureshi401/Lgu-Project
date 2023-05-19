<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challan extends Model
{
    use HasFactory;
    public $timestamps = false;
     public function c(){

    return $this->belongsTo('App\Models\Registration','Reg_ID');
   }
   public function ChallanDetail(){
    return $this->belongsTo('App\Models\ChallanDetail','ID','Challans_ID');
   }

   public function registration(){
    return $this->belongsTo('App\Models\Registration','Reg_ID');
   }

   public static function getOldAmount($Reg_ID){
    
        $old_Challans = self::where('Reg_ID', $Reg_ID)->orderBy('ID' , 'desc');
        if ($old_Challans->exists() && $old_Challans->first()->Status == 'Valid') {
            return $old_Challans->first()->Amount;
        } else {
            return 0;
        }
    }
}
