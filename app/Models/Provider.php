<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'city',
        'postal_code',
        'country',
        'fiscal_code',
        'p_iva',
        'iban',
        'email',
        'pec',
        'telephone',
        'other_contact'
    ];
}
