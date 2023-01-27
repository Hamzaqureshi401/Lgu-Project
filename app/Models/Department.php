<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Degree;


class Department extends Model
{
    use HasFactory;

    public function getDegree($id){
        return Degree::where('ID' , $id)->first();
    }
    public function countStudent($id){
        return Student::where('Degrees_ID' , $this->getDegree($id)->ID ?? '')->get() ?? '';
    }
}
