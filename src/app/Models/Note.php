<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'description', 'done', 'deadline'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'done' => 'boolean',
        'deadline' => 'date',
    ];
    protected $guarded = ['id'];
}
