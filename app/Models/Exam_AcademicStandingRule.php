<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_AcademicStandingRule extends Model
{
    use HasFactory;
    protected $table = 'Exam_AcademicStandingRules';
    public $timestamps = false;
}
