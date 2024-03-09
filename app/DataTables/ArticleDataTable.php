<?php

namespace App\DataTables;

use App\Models\Article;
use App\Services\ButtonsService;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class ArticleDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($article) {
                $output = '';
//                if (Auth::user()->can('update-article')) {
                $output .= ButtonsService::editButton(true, $article);
//                }
//                if (Auth::user()->can('delete-article')) {
                $output .= ButtonsService::deleteButton(true, $article);
//                }
                return $output;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Article $model): QueryBuilder
    {
        $listing_cols = $this->getColumns();
        $customers = $model->select($listing_cols);

        return $this->applyScopes($customers);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        $columns[] = [
            'name' => 'ean_code',
            'title' => trans('article.ean_code'),
            'data' => 'ean_code'
        ];

        $columns[] = [
            'name' => 'product_code',
            'title' => trans('article.product_code'),
            'data' => 'product_code'
        ];

        $columns[] = [
            'name' => 'description',
            'title' => trans('article.description'),
            'data' => 'description'
        ];

        $columns[] = [
            'name' => 'is_active',
            'title' => trans('article.is_active'),
            'data' => 'is_active'
        ];

        $columns[] = [
            'name' => 'in_order',
            'title' => trans('article.in_order'),
            'data' => 'in_order'
        ];

        return $this->builder()
            ->setTableId('article-table')
            ->columns($columns)
            ->minifiedAjax()
            ->language(asset('js/dataTables.Italian.json'))
            ->pagingType('full_numbers')
            ->responsive()
            ->orderBy(0, 'asc')
            ->addAction(['title' => trans('common.actions')]);
    }

    public function getColumns(): array
    {
        return [
            'articles.id',
            'articles.ean_code',
            'articles.product_code',
            'articles.description',
            'articles.is_active',
            'articles.in_order',
        ];
    }

    protected function filename(): string
    {
        return 'Articles_' . date('YmdHis');
    }

}
