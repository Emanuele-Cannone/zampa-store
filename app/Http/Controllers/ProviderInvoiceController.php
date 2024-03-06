<?php

namespace App\Http\Controllers;

use App\DataTables\ProviderInvoicesDataTable;
use App\Http\Requests\ProviderInvoiceRequest;
use App\Models\Provider;
use App\Models\ProviderInvoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProviderInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ProviderInvoicesDataTable $dataTable
     * @return mixed
     */
    public function index(ProviderInvoicesDataTable $dataTable): mixed
    {
        return $dataTable->render('provider-invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('provider-invoices.create',
            [
                'providers' => Provider::all()
                    ->map(fn ($provider) => [
                        'id' => $provider->id,
                        'text' => $provider->company_name,
                    ])
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param ProviderInvoiceRequest $request
     * @return RedirectResponse
     */
    public function store(ProviderInvoiceRequest $request): RedirectResponse
    {
        ProviderInvoice::create($request->validated());
        return redirect()->route('provider-invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProviderInvoice $providerInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param ProviderInvoice $providerInvoice
     * @return View
     */
    public function edit(ProviderInvoice $providerInvoice): View
    {
        return view('provider-invoices.edit',
            [
                'providerInvoice' => $providerInvoice,
                'providers' => Provider::all()
                    ->map(fn ($provider) => [
                        'id' => $provider->id,
                        'text' => $provider->company_name,
                        'selected' => $providerInvoice->provider->id === $provider->id
                    ])
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * @param ProviderInvoiceRequest $request
     * @param ProviderInvoice $providerInvoice
     * @return RedirectResponse
     */
    public function update(ProviderInvoiceRequest $request, ProviderInvoice $providerInvoice): RedirectResponse
    {
        $providerInvoice->update($request->validated());
        return redirect()->route('provider-invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProviderInvoice $providerInvoice)
    {
        //
    }
}
