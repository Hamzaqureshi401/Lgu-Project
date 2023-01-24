<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    //protected $table = 'Employee';
    public function department(){

          return $this->belongsTo('App\Models\Department' , 'Dpt_ID');
   }
   public function semesterCourse(){

          return $this->belongsTo('App\Models\SemesterCourse' , 'Emp_ID');
   }
}
