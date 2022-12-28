<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
     public function course(){
        return $this->belongsTo('App\Models\Course' , 'Course_ID');
    }
     public function semesterCourse(){
        return $this->belongsTo('App\Models\SemesterCourse' , 'SemCourses_ID');
    }
}
