<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Supply_user;


class Supply extends Model
{
    protected $dates = ['display_date'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function supply()
    {
        return $this->belongsToMany('App\User');
    }

    public function supply_user()
    {
        return $this->hasMany('App\Supply_user');
    }

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
}
