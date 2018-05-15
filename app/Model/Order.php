<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public $timestamps = false;

    protected $fillable = ['fault', 'describe','startTime', 'endTime', 'finishTime', 'status', 'workerId', 'userId'];
}
