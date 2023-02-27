<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Degree;


class Department extends Model
{
    use HasFactory;

    public function getDegree($id){
        return Degree::where('ID' , $id)->first();
    }
    public function countStudent($ids , $type){
        return Student::where('Degree_ID' , $ids)->where('Category' , $type)->pluck('ID')->count() ?? '';
    }
    public function hod(){
          return $this->belongsTo('App\Models\Employee' , 'HODUID');
   }
   public function dean(){
          return $this->belongsTo('App\Models\Employee' , 'DeanUID');
   }

   public function countStudentsByDpt($id){

   $degreesID = Degree::where('Dpt_ID' , $id)->pluck('ID')->toArray();
     return Student::whereIn('Degree_ID' , $degreesID);
   }
}
