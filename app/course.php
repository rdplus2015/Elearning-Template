<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
   public function  category()
   {
    return $this->belongsTo('App\category');
   }
   public function user()
   {
       return $this -> belongsTo('App\user');
   }
}
