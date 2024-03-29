<?php

namespace App\Http\Controllers;

use App\DataTables\CustomersDataTable;
use App\Http\Requests\ClusterUpdateRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param CustomersDataTable $dataTable
     * @return mixed
     */
    public function index(CustomersDataTable $dataTable): mixed
    {
        return $dataTable->render('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CustomerRequest $request
     * @return RedirectResponse
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        Customer::create($request->validated());
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     * @param ClusterUpdateRequest $request
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function update(ClusterUpdateRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Customer $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();
        return response()->json('ok', 200);
    }
}
