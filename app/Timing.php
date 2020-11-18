<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    public function district() {
        return $this->belongsTo('App\District','district_id','id');
    }

    public function ramadan() {
        return $this->belongsTo('App\Ramadan','ramadan_id','id');
    }
}
