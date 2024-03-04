<?php

namespace App\Http\Controllers;

use App\DataTables\BreedsDataTable;
use App\Http\Requests\AnimalRequest;
use App\Http\Requests\BreedRequest;
use App\Http\Requests\BreedUpdateRequest;
use App\Models\AnimalTypology;
use App\Models\Breed;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param BreedsDataTable $dataTable
     * @return mixed
     */
    public function index(BreedsDataTable $dataTable): mixed
    {
        return $dataTable->render('breeds.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('breeds.create', [
            'typologies' => AnimalTypology::all()
            ->map(fn ($animalTypology) => [
                'id' => $animalTypology->id,
                'text' => $animalTypology->name
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param BreedRequest $request
     * @return RedirectResponse
     */
    public function store(BreedRequest $request): RedirectResponse
    {
        Breed::create($request->validated());
        return redirect()->route('breeds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Breed $breed)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Breed $breed
     * @return View
     */
    public function edit(Breed $breed): View
    {
        return view('breeds.edit', [
            'breed' => $breed,
            'typologies' => AnimalTypology::all()
                ->map(fn ($animalTypology) => [
                    'id' => $animalTypology->id,
                    'text' => $animalTypology->name,
                    'selected' => $animalTypology->id === $breed->animalTypology->id
                ])
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param BreedUpdateRequest $request
     * @param Breed $breed
     * @return RedirectResponse
     */
    public function update(BreedUpdateRequest $request, Breed $breed): RedirectResponse
    {
        $breed->update($request->validated());
        return redirect()->route('breeds.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Breed $breed)
    {
        //
    }
}
