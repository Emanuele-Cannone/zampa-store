<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email'
    ];

    /**
     * @return HasMany
     */
    public function animals():HasMany
    {
        return $this->hasMany(Animal::class);
    }

    /**
     * @return HasOne
     */
    public function loyaltyCard(): HasOne
    {
        return $this->hasOne(LoyaltyCard::class);
    }
}
