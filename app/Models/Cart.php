<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    public $timestamps = false;
    protected $guarded = [];
}
