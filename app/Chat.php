<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Supply_user;

class Chat extends Model
{
    public function supply_user()
    {
        return $this->belongsTo('App\Supply_user');
    }
}
