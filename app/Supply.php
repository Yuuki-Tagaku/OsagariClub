<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Supply_user;


class Supply extends Model
{
    public function user()
    {
        return $this->belontsTo('App\User');
    }

    public function supply_user()
    {
        return $this->belongsToMany('App\Supply_user', 'App\User');
    }
}
