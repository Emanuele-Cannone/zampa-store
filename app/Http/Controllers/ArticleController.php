<?php

namespace App\Http\Controllers;

use App\DataTables\ArticleDataTable;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ArticleDataTable $dataTable
     * @return mixed
     */
    public function index(ArticleDataTable $dataTable) : mixed
    {
        return $dataTable->render('article.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('article.create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Article $article
     * @return View
     */
    public function edit(Article $article): View
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ArticleRequest $request
     * @return RedirectResponse
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
        Article::create($request->validated());
        return redirect()->route('articles.index');
    }


    /**
     * Update the specified resource in storage.
     * @param ArticleUpdateRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(ArticleUpdateRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Article $article
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        $article->delete();
        return response()->json('ok',200);
    }

}
