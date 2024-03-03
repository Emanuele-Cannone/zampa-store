<?php

namespace App\Http\Controllers;

use App\DataTables\AnimalsDataTable;
use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use App\Models\Customer;
use App\Services\AnimalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnimalController extends Controller
{

    public function __construct(private AnimalService $service)
    {
    }

    /**
     * Display a listing of the resource.
     * @param AnimalsDataTable $dataTable
     * @return mixed
     */
    public function index(AnimalsDataTable $dataTable): mixed
    {
        return $dataTable->render('animals.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('animals.create', [
            'customers' => Customer::all()
                ->map(fn(Customer $customer) => [
                    'id' => $customer->id,
                    'text' => $customer->name
                ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param AnimalRequest $request
     * @return RedirectResponse
     */
    public function store(AnimalRequest $request): RedirectResponse
    {
        Animal::create($request->validated());
        return redirect()->route('animals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Animal $animal
     * @return View
     */
    public function edit(Animal $animal): View
    {
        return view('animals.edit',
            [
                'animal' => $animal,
                'customers' => Customer::all()
                    ->map(fn(Customer $customer) => [
                        'id' => $customer->id,
                        'text' => $customer->name,
                        'selected' => $customer->id === $animal->customer->id
                    ])
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * @param AnimalRequest $request
     * @param Animal $animal
     * @return RedirectResponse
     */
    public function update(AnimalRequest $request, Animal $animal): RedirectResponse
    {
        $this->service->update($request, $animal);
        return redirect()->route('animals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return response()->json('ok', 201);
    }
}
