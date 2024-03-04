<?php

namespace App\Services;


use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AnimalService
{

    public function update(AnimalRequest $request, Animal $animal): void
    {
        try {
            DB::beginTransaction();

            $validated = $request->validated();

//            array_key_exists('is_sterilized', $validated) ?
//                $validated['is_sterilized'] = true :
//                $validated['is_sterilized'] = false;

            $animal->update($validated);

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error on update of animal', [$e->getMessage()]);
//            throw new ClusterException();
        }


    }


}
