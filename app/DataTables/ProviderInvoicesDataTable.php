<?php

namespace App\DataTables;

use App\Models\ProviderInvoice;
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

class ProviderInvoicesDataTable extends DataTable
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
            ->editColumn('provider_id', function (ProviderInvoice $providerInvoice) {
                return '<div>'. $providerInvoice->provider->company_name .'</div>';
            })
            ->editColumn('paid', function (ProviderInvoice $providerInvoice) {
                return $providerInvoice->paid ?
                    '<div><i class="text-md text-green far fa-check-circle"></i></div>' :
                    '<div><i class="text-md text-danger far fa-times-circle"></i></div>';
            })
            ->addColumn('action', function (ProviderInvoice $providerInvoice) {
                $output = '';
//                if (Auth::user()->can('update-category')) {
                $output .= ButtonsService::editButton(true, $providerInvoice);
//                }
//                if (Auth::user()->can('delete-category')) {
                $output .= ButtonsService::deleteButton(true, $providerInvoice);
//                }
                return $output;
            })
            ->rawColumns(['provider_id','paid','provider_invoice_id', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProviderInvoice $model): QueryBuilder
    {
        $listing_cols = $this->getColumns();
        $providers = $model->select($listing_cols)
        ->with('provider');

        return $this->applyScopes($providers);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        $columns[] = [
            'name' => 'provider_id',
            'title' => trans('common.name'),
            'data' => 'provider_id'
        ];

        $columns[] = [
            'name' => 'amount',
            'title' => trans('common.amount'),
            'data' => 'amount'
        ];

        $columns[] = [
            'name' => 'date',
            'title' => trans('common.date'),
            'data' => 'date'
        ];

        $columns[] = [
            'name' => 'paid',
            'title' => trans('common.paid'),
            'data' => 'paid'
        ];

        $columns[] = [
            'name' => 'number',
            'title' => trans('common.number'),
            'data' => 'number'
        ];

        return $this->builder()
            ->setTableId('provider-invoices-table')
            ->columns($columns)
            ->minifiedAjax()
            ->language(asset('js/dataTables.Italian.json'))
            ->pagingType('full_numbers')
            ->responsive()
            ->initComplete('
                function() {
                    $("#provider-invoices-table tbody").on("submit", "form[class=confirm-delete]", function (event) {
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
            ->orderBy(2)
            ->addAction(['title' => trans('common.actions')]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            'provider_invoices.id',
            'providers.name',
            'provider_invoices.amount',
            'provider_invoices.date',
            'provider_invoices.paid',
            'provider_invoices.number',
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProviderInvoices_' . date('YmdHis');
    }
}
