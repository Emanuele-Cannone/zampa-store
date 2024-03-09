<?php

namespace App\Http\Controllers;

use App\DataTables\ArticleDataTable;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index(ArticleDataTable $dataTable) : mixed{
        return $dataTable->render('article.index');
    }

    public function create(): View{
        return view('article.create');
    }

    public function edit(Article $article): View{
        return view('article.edit',compact('article'));
    }

    public function store(ArticleRequest $request): RedirectResponse{
        Article::create($request->validated());
        return redirect()->route('articles.index');
    }

    public function update(ArticleUpdateRequest $request, Article $article): RedirectResponse{
        $article->update($request->validated());
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article){
        $article->delete();
        return response()->json('ok',200);
    }

}
