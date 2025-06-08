<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $guarded = ['id'];

    public function cartItem(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }
}
