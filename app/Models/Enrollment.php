<?php

namespace App\Models;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    public $timestamps = false;
     public function course(){
        return $this->belongsTo('App\Models\Course' , 'Course_ID');
    }
     public function semesterCourse(){
        return $this->belongsTo('App\Models\SemesterCourse' , 'SemCourses_ID');
    }
    public function student(){
        return $this->belongsTo('App\Models\Student' , 'Std_ID');
    }
   
    public function att(){
        return $this->belongsTo('App\Models\Attendance' , 'Enroll_ID');
    }
    public function igrade(){
        return $this->belongsTo('App\Models\StudentIgrade' ,'ID' , 'Enroll_ID');
    }
}
