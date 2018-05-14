<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table = 'worker';

    public $timestamps = false;

    protected $fillable = ['brandNum', 'typeNum'];
}
