<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    public function acdRule(){
          return $this->belongsTo('App\Models\Exam_AcademicStandingRule' , 'AcaStdID');
   }
}
