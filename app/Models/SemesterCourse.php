<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCourse extends Model
{
    //use HasFactory;
    protected $table = 'SemesterCourses';
     
     public function employee(){
        return $this->belongsTo('App\Models\employee', 'Emp_ID');
    }
    public function degree(){
        return $this->belongsTo('App\Models\Degree', 'Deg_ID');
    }
    public function degreeBatches(){
        return $this->belongsTo('App\Models\DegreeBatche', 'DegBatches_ID');
    } 
    public function semester(){
        return $this->belongsTo('App\Models\Semester', 'Sem_ID');
    }
    public function batch(){
        return $this->belongsTo('App\Models\semester' , 'Batch_ID');
    }
    public function course(){
        return $this->belongsTo('App\Models\Course' , 'Course_ID');
    }
    public function SemesterDetail(){
        return $this->belongsTo('App\Models\SemesterDetail' , 'Sem_ID');
    }
    



}
