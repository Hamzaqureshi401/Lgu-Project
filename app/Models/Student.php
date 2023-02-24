<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   public $timestamps = false;
     public function degree(){
        return $this->belongsTo('App\Models\degree', 'Degree_ID');
    }
     public function semester(){

          return $this->belongsTo('App\Models\Semester' , 'AdmissionSession' , 'SemSession');
   }

   public function registration(){
      return $this->belongsTo('App\Models\Registration', 'ID' , 'Std_ID');
  }
   
}
