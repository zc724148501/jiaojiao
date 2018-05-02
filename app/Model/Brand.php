<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand_number';

    public $timestamps = false;

    protected $fillable = ['brand', 'number'];
}
