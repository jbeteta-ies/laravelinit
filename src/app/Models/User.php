<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\SIMCard;
use App\Models\Phone;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded  = [];

    public function phone(): HasOne
    {
        return $this->hasOne(Phone::class);
    }

    public function simCard(): HasOneThrough
    {
        return $this->hasOneThrough(
            SIMCard::class,
            Phone::class,
            'user_id',       // Foreign key on phones
            'id',            // Foreign key on sim_cards (default is id)
            'id',            // Local key on users
            'sim_card_id'    // Local key on phones
        );
    }
     
}
