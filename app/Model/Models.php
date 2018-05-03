<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'model_number';

    public $timestamps = false;

    protected $fillable = ['model', 'number','brand'];
}
