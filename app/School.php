<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\Category;
use App\User;

class School extends Model
{
    public function admin()
    {
        return $this->hasMany('App\Admin');
    }

    public function category()
    {
        return $this->hasMany('App\Category');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
