<?php

namespace App\Http\Controllers;

use App\DataTables\AnimalTypologiesDataTable;
use App\Http\Requests\AnimalTypologyRequest;
use App\Http\Requests\AnimalTypologyUpdateRequest;
use App\Models\AnimalTypology;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
     * @param AnimalTypologyRequest $request
     * @return RedirectResponse
     */
    public function store(AnimalTypologyRequest $request): RedirectResponse
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
     * @param AnimalTypology $animalTypology
     * @return View
     */
    public function edit(AnimalTypology $animalTypology): View
    {
        return view('animal-typologies.edit', ['animalTypology' => $animalTypology]);
    }

    /**
     * Update the specified resource in storage.
     * @param AnimalTypologyUpdateRequest $request
     * @param AnimalTypology $animalTypology
     * @return RedirectResponse
     */
    public function update(AnimalTypologyUpdateRequest $request, AnimalTypology $animalTypology): RedirectResponse
    {
        $animalTypology->update($request->validated());
        return redirect()->route('animal-typologies.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param AnimalTypology $animalTypology
     * @return JsonResponse
     */
    public function destroy(AnimalTypology $animalTypology): JsonResponse
    {
        $animalTypology->delete();
        return response()->json('ok',200);
    }
}
