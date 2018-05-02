<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model as SysModel;

class Model extends SysModel
{
    protected $table = 'model_number';

    public $timestamps = false;

    protected $fillable = ['model', 'number'];
}
