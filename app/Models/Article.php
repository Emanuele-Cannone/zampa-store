<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'ean_code',
        'product_code',
        'min_quantity',
        'description',
        'is_active',
        'in_order',
    ];
}
