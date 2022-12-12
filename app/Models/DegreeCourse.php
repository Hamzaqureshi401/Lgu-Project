<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeCourse extends Model
{
    protected $table = 'DegreeCourses';

    public function degree($id){
        return Degree::where('Degree_ID' , $id)->first();

    }
    public function course($id){
        return Course::where('Course_ID' , $id)->first();
    }
}
