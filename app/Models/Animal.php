<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'name',
        'breed_id',
        'birth',
        'is_sterilized'
    ];


    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }

    /**
     * @return BelongsTo
     */
    public function breed(): BelongsTo
    {
        return $this->BelongsTo(Breed::class);
    }
}
