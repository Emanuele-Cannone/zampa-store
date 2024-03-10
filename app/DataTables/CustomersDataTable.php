<?php

namespace App\DataTables;

use App\Models\Customer;
use App\Models\LoyaltyCard;
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

class CustomersDataTable extends DataTable
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
            ->editColumn('loyalty_card', function (Customer $customer) {
                return $customer->loyaltyCard ?
                    '<div><i class="text-md text-green far fa-check-circle"></i></div>' :
                    '<div><i class="text-md text-danger far fa-times-circle"></i></div>';
            })
            ->addColumn('action', function ($customer) {
                $output = '';
//                if (Auth::user()->can('update-category')) {
                $output .= ButtonsService::editButton(true, $customer);
//                }
//                if (Auth::user()->can('delete-category')) {
                $output .= ButtonsService::deleteButton(true, $customer);
//                }
                return $output;
            })
            ->rawColumns(['loyalty_card','customer_id', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Customer $model): QueryBuilder
    {
        $listing_cols = $this->getColumns();
        return $model->select($listing_cols)->with(['loyaltyCard']);
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
            'name' => 'phone_number',
            'title' => trans('common.phone_number'),
            'data' => 'phone_number'
        ];

        $columns[] = [
            'name' => 'email',
            'title' => trans('common.email'),
            'data' => 'email'
        ];

        $columns[] = [
            'name' => 'loyaltyCard.id',
            'title' => trans('common.card'),
            'data' => 'loyalty_card'
        ];

        return $this->builder()
                ->setTableId('customers-table')
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
            'customers.id',
            'customers.name',
            'customers.phone_number',
            'customers.email'
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Customers_' . date('YmdHis');
    }
}
