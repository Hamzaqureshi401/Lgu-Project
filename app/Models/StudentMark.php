<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $table='StudentMarks';
    public function semestercourse(){
        return $this->belongsTo('App\Models\SemesterCourse', 'SemCourse_ID');
    }
    public function enrollment(){
        return $this->belongsTo('App\Models\Enrollment', 'Emp_ID');
    }
}
