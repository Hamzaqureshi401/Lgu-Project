<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeBatche extends Model
{
     use HasFactory;
   protected $table = 'DegreeBatches';

   public function degree(){

    return $this->belongsTo('App\Models\Degree','ID');
   }

    public function batch(){

    return $this->belongsTo('App\Models\semester' , 'Batch_ID');
   }

}
