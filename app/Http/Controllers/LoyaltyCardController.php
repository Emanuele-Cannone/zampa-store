<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoyaltyCardStoreRequest;
use App\Models\LoyaltyCard;
use App\Services\LoyaltyCardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoyaltyCardController extends Controller
{
    /**
     * @param LoyaltyCardService $service
     */
    public function __construct(private readonly LoyaltyCardService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param LoyaltyCardStoreRequest $request
     * @return RedirectResponse
     */
    public function store(LoyaltyCardStoreRequest $request): RedirectResponse
    {
        $this->service->create($request);
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoyaltyCard $loyaltyCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoyaltyCard $loyaltyCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoyaltyCard $loyaltyCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoyaltyCard $loyaltyCard)
    {
        //
    }
}
