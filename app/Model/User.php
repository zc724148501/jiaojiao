<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = ['username', 'password', 'name', 'sex', 'age', 'tel', 'province', 'city', 'address', 'create_time'];
}
