<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Interact with the Tag's name.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => ucfirst(strtolower($value))
        );
    }
}
