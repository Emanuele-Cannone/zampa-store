<?php

namespace App\Services;

use App\Http\Requests\LoyaltyCardStoreRequest;
use App\Models\LoyaltyCard;
use Illuminate\Support\Str;

class LoyaltyCardService
{

    /**
     * @param LoyaltyCardStoreRequest $request
     * @return void
     */
    public static function create(LoyaltyCardStoreRequest $request): void
    {
        LoyaltyCard::create($request->validated());
    }
}
