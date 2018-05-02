<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    protected $table = 'household';

    public $timestamps = false;

    protected $fillable = ['brand', 'type', 'model', 'number', 'uid'];
}
