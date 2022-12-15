<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCourse extends Model
{
    use HasFactory;
    protected $table = 'SemesterCourses';
     
     public function employee(){
        return $this->belongsTo('App\Models\employee','Emp_ID' , 'Emp_ID');
    }
    public function degree(){
        return $this->belongsTo('App\Models\degree','Degree_ID' , 'Degree_ID');
    }
    public function course(){
        return $this->belongsTo('App\Models\course','Course_ID' , 'Course_ID');
    }


}
