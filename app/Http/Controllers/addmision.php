<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class addmision extends Controller
{
    public function student_info_view()
    {
        return view('Pages.Addmission_student_info');
    }
}
