<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StdRollNoSlip extends Model
{
    use HasFactory;
    protected $table = 'StdRollNoSlips';

    public function employee(){
        return $this->belongsTo('App\Models\employee', 'Emp_ID');
    }
    public function enrollment(){
        return $this->belongsTo('App\Models\Enrollment', 'Enroll_ID');
    }
}
