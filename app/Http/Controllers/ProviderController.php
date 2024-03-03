<?php

namespace App\Http\Controllers;

use App\DataTables\ProvidersDataTable;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ProvidersDataTable $dataTable
     * @return mixed
     */
    public function index(ProvidersDataTable $dataTable): mixed
    {
        return $dataTable->render('providers.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ProviderRequest $request
     * @return RedirectResponse
     */
    public function store(ProviderRequest $request): RedirectResponse
    {
        Provider::create($request->validated());
        return redirect()->route('providers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Provider $provider
     * @return View
     */
    public function edit(Provider $provider): View
    {
        return view('providers.create', ['provider' => $provider]);
    }

    /**
     * Update the specified resource in storage.
     * @param ProviderRequest $request
     * @param Provider $provider
     * @return RedirectResponse
     */
    public function update(ProviderRequest $request, Provider $provider): RedirectResponse
    {
        $provider->update($request->validated());
        return redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return response()->json('ok', 201);
    }
}
