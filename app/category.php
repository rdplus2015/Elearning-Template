<?php

namespace App;

use App\course;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function  course()
    {
     return $this->hasMany('App\course');
    }
}
