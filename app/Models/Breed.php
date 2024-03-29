<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'animal_typology_id'
    ];

    /**
     * @return BelongsTo
     */
    public function animalTypology(): BelongsTo
    {
        return $this->belongsTo(AnimalTypology::class);
    }

    /**
     * @return HasMany
     */
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
