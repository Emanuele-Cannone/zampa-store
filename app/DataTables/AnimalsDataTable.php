<?php

namespace App\DataTables;

use App\Models\Animal;
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

class AnimalsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @throws Exception
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('customer_id', function (Animal $animal) {
                return '<div>'. $animal->customer->name .'</div>';
            })
            ->editColumn('breed_id', function (Animal $animal) {
                return '<div>'. $animal->breed->name .'</div>';
            })
            ->editColumn('animal_typology_id', function (Animal $animal) {
                return '<div>'. $animal->breed->animalTypology->name .'</div>';
            })
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
            ->rawColumns(['animal_typology_id','breed_id', 'animal_id', 'customer_id', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Animal $model): QueryBuilder
    {
        $listing_cols = $this->getColumns();
        return $model->select($listing_cols)
        ->with(['breed','breed.animalTypology','customer']);
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

        $columns[] = [
            'name' => 'breed.name',
            'title' => trans('common.breed'),
            'data' => 'breed_id'
        ];

        $columns[] = [
            'name' => 'breed.animalTypology.name',
            'title' => trans('common.typology'),
            'data' => 'animal_typology_id'
        ];

        $columns[] = [
            'name' => 'customer.name',
            'title' => trans('common.customer'),
            'data' => 'customer_id'
        ];

        return $this->builder()
            ->setTableId('animals-table')
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
            'animals.id',
            'animals.name',
            'animals.breed_id',
            'animals.customer_id',
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Animals_' . date('YmdHis');
    }
}
