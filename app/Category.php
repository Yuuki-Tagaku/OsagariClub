<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\School;
use App\Supply;

class Category extends Model
{
    public function school()
    {
        return $this->belongsTo('App\School');
    }

    public function supply()
    {
        return $this->hasMany('App\Supply');
    }
}
