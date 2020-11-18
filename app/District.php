<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function timing() {
        return $this->hasMany('App\Timing','district_id','id');
    }
}
