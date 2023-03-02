<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    public function acdRule(){
          return $this->belongsTo('App\Models\Exam_AcademicStandingRule' , 'AcaStd_ID');
   }
    public function student(){

    return $this->belongsTo('App\Models\Student','Std_ID');
   }

   public function challan(){

    return $this->belongsTo('App\Models\Challan','ID' ,'Reg_ID');
   }

   public function std_scholarship()
   {
    return $this->belongsTo('App\Models\StdScholarship', 'Std_ID');
   }
}
