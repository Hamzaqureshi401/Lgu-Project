<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterDetail extends Model
{
   protected $table = 'SemesterDetails';

    public function degree(){
        return $this->belongsTo('App\Models\Degree' , 'Degree_ID');
    }
    public function semester(){
        return $this->belongsTo('App\Models\Semester', 'Sem_ID');
    } 
    public function degreeBatches(){
        return $this->belongsTo('App\Models\DegreeBatche', 'DegBatches_ID');
    } 
}
