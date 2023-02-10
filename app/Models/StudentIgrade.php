<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentIgrade extends Model
{
    use HasFactory;
    protected $table = 'Student_Igrade';
    public $timestamps = false;

    public function enrollment(){

          return $this->belongsTo('App\Models\Enrollment' , 'Enroll_ID' );
   }
}
