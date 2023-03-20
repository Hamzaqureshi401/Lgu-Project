<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeSemCourse extends Model
{
    use HasFactory;
    protected $table = 'DegreeSemCourses';
    public $timestamps = false;

     public function degreeBatch(){

    return $this->belongsTo('App\Models\degreeBatche','DegBatches_ID');
   }

    public function semesterCourse(){

    return $this->belongsTo('App\Models\SemesterCourse' , 'SemCourse_ID');
   }
}
