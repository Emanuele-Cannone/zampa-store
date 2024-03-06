<?php

namespace App\Http\Controllers;

use App\DataTables\ClustersDataTable;
use App\Http\Requests\ClusterRequest;
use App\Http\Requests\ClusterUpdateRequest;
use App\Models\Cluster;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ClustersDataTable $dataTable
     * @return mixed
     */
    public function index(ClustersDataTable $dataTable): mixed
    {
        return $dataTable->render('clusters.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('clusters.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ClusterRequest $request
     * @return RedirectResponse
     */
    public function store(ClusterRequest $request): RedirectResponse
    {
        Cluster::create($request->validated());
        return redirect()->route('clusters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cluster $cluster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Cluster $cluster
     * @return View
     */
    public function edit(Cluster $cluster): View
    {
        return view('clusters.edit', ['cluster' => $cluster]);
    }

    /**
     * Update the specified resource in storage.
     * @param ClusterUpdateRequest $request
     * @param Cluster $cluster
     * @return RedirectResponse
     */
    public function update(ClusterUpdateRequest $request, Cluster $cluster): RedirectResponse
    {
        $cluster->update($request->validated());
        return redirect()->route('clusters.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Cluster $cluster
     * @return JsonResponse
     */
    public function destroy(Cluster $cluster): JsonResponse
    {
        $cluster->delete();
        return response()->json('ok', 200);
    }
}
