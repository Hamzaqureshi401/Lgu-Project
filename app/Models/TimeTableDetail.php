<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTableDetail extends Model
{
    use HasFactory;
    protected $table = 'TimeTableDetail';
     public $timestamps = false;

      public function DegreeSemCourse(){
        return $this->belongsTo('App\Models\DegreeSemCourse','DegSemCourses_ID');
    }


}
