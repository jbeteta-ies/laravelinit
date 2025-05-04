<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SIMCard extends Model 
{
    protected $guarded = [];

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}
