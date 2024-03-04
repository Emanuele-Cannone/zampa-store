<?php

namespace App\Http\Controllers;

use App\DataTables\AnimalTypologiesDataTable;
use App\Http\Requests\AnimalTypologyRequest;
use App\Http\Requests\AnimalTypologyUpdateRequest;
use App\Models\AnimalTypology;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnimalTypologyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param AnimalTypologiesDataTable $dataTable
     * @return mixed
     */
    public function index(AnimalTypologiesDataTable $dataTable): mixed
    {
        return $dataTable->render('animal-typologies.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('animal-typologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalTypologyRequest $request)
    {
        AnimalTypology::create($request->validated());
        return redirect()->route('animal-typologies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnimalTypology $animalTypology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnimalTypology $animalTypology)
    {
        return view('animal-typologies.edit', ['animalTypology' => $animalTypology]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalTypologyUpdateRequest $request, AnimalTypology $animalTypology)
    {
        $animalTypology->update($request->validated());
        return redirect()->route('animal-typologies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalTypology $animalTypology)
    {
        //
    }
}
