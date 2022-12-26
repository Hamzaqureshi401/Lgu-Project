<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
     public function department(){

          return $this->belongsTo('App\Models\Department' , 'Dpt_ID');
   }
}
