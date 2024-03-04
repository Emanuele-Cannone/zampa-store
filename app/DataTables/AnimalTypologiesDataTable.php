<?php

namespace App\DataTables;

use App\Models\AnimalTypology;
use App\Services\ButtonsService;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AnimalTypologiesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return EloquentDataTable
     * @throws Exception
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($cluster) {
                $output = '';
//                if (Auth::user()->can('update-category')) {
                $output .= ButtonsService::editButton(true, $cluster);
//                }
//                if (Auth::user()->can('delete-category')) {
                $output .= ButtonsService::deleteButton(true, $cluster);
//                }
                return $output;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AnimalTypology $model): QueryBuilder
    {
        $listing_cols = $this->getColumns();
        $animalTypologies = $model->select($listing_cols);

        return $this->applyScopes($animalTypologies);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        $columns[] = [
            'name' => 'name',
            'title' => trans('common.name'),
            'data' => 'name'
        ];

        return $this->builder()
            ->setTableId('animaltypologies-table')
            ->columns($columns)
            ->minifiedAjax()
            ->language(asset('js/dataTables.Italian.json'))
            ->pagingType('full_numbers')
            ->responsive()
            ->initComplete('
                function() {
                    $("#clusters_table tbody").on("submit", "form[class=confirm-delete]", function (event) {
                        var form = this;
                        event.preventDefault();
                        Swal.fire({
                            title: "' . __('common.are_you_sure_delete') . '",
                            text: "' . __('common.cannot_revert') . '",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "' . __('common.yes_delete') . '",
                            cancelButtonText: "' . __('common.no') . '"
                        }).then((result) => {
                            if (result.value) {
                                form.submit();
                                Swal.fire({
                                    title: "' . __('common.deleted') . '",
                                    text: "' . __('common.correctly_deleted') . '",
                                    icon: "success",
                                    showConfirmButton: false
                                })
                            }
                        })
                    });
                }')
            ->orderBy(0, 'asc')
            ->addAction(['title' => trans('common.actions')]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            'animal_typologies.id',
            'animal_typologies.name'
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AnimalTypologies_' . date('YmdHis');
    }
}
