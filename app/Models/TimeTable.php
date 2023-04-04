<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $table = 'TimeTable';
    public function semesterCourse(){
        return $this->belongsTo('App\Models\SemesterCourse','SemCourse_ID');
    }
    public function employee(){
        return $this->belongsTo('App\Models\Employee','Emp_ID');
    }
    public function timeTableDetails(){
        return $this->hasMany('App\Models\TimeTableDetail','TimeTable_ID');
    }

}
