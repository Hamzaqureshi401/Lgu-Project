<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     public function degree(){
        return $this->belongsTo('App\Models\degree', 'Degrees_ID');
    }
}
