<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StdScholarShip extends Model
{
    use HasFactory;
    protected $table = 'Students_scholarship';

     public function student(){

          return $this->belongsTo('App\Models\Student' , 'Std_ID' );
   }
    public function semester(){

          return $this->belongsTo('App\Models\Semester' , 'Sem_ID' );
   }
    public function employee(){

          return $this->belongsTo('App\Models\Employee' , 'Emp_ID' );
   }
}
