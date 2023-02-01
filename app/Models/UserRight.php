<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRight extends Model
{
    use HasFactory;
    protected $table = 'UserRights';
    public function designation()
    {
        return $this->belongsTo('App\Models\Designation','Des_ID');
    }
    public function module()
    {
        return $this->belongsTo('App\Models\Module','Mod_ID');
    }
}
