<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallanDetail extends Model
{
    use HasFactory;
    protected $table = 'ChallanDetails';
    public function Challan()
   {
    return $this->belongsTo('App\Models\Challan','Challans_ID');
   }
}
