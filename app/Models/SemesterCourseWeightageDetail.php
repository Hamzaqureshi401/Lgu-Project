<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCourseWeightageDetail extends Model
{
    use HasFactory;
     protected $table = 'SemesterCourse_WeightageDetail';
    public $timestamps = false;

     public function SemesterCourseWeightage(){
        return $this->belongsTo('App\Models\SemesterCourseWeightage', 'SemCourseWeightage_ID');
    }
}
