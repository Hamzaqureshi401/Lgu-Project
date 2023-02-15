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
    public function countStudent($id , $type){
        return Student::where(['Degree_ID' => $this->getDegree($id)->ID , 'Category' => $type])->get() ?? '';
    }
    public function hod(){
          return $this->belongsTo('App\Models\Employee' , 'HODUID');
   }
   public function dean(){
          return $this->belongsTo('App\Models\Employee' , 'DeanUID');
   }
}
