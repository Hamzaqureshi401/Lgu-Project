<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCourseWeightage extends Model
{
    use HasFactory;
    protected $table = 'SemesterCourse_Weightage';
    public $timestamps = false;
}
