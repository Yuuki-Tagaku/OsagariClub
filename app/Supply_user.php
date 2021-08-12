<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Supply;

class Supply_user extends Model
{
    protected $table = 'supply_user';

    public function chat()
    {
        return $this->hasMany('App\Chat');
    }
}
