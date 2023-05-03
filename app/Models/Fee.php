<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    public function DegreeBatche(){
        return $this->belongsTo('App\Models\DegreeBatche' ,'DegreeBatches_ID' , 'ID');
    }

    
    public function Degree(){
        return $this->belongsTo('App\Models\Degree' ,'Degree_ID' , 'ID');
    }




}
