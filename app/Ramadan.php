<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramadan extends Model
{
    public function timing() {
        return $this->hasMany('App\Timing','ramadan_id','id');
    }
}
