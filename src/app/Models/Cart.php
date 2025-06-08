<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    public function items()
    {
        // return $this->belongsToMany(Product::class, 'cart_items')
        //     ->withPivot('quantity', 'price')
        //     ->withTimestamps();

        $i = $this->belongsToMany(Product::class, 'cart_items')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
        return $i;

    }
}
