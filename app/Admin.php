<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\School;

class Admin extends Model
{
    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
