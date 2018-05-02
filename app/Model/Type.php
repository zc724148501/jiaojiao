<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type_number';

    public $timestamps = false;

    protected $fillable = ['type', 'number'];
}
