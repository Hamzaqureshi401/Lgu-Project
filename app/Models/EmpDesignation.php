<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpDesignation extends Model
{
    use HasFactory;

    public function designation(){

          return $this->belongsTo('App\Models\Designation' , 'Des_ID');
   }
    public function employee(){

          return $this->belongsTo('App\Models\Employee' , 'Emp_ID');
   }
}
