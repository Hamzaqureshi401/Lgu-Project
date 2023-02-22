<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challan extends Model
{
    use HasFactory;
     public function registration(){

    return $this->belongsTo('App\Models\Registration','Reg_ID');
   }
   public function ChallanDetail()
   {
    return $this->belongsTo('App\Models\ChallanDetail','ID','Challans_ID');
   }
}
