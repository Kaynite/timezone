<?php

namespace App\DataTables;

use App\Models\Order;
use App\User;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', 'adminlte.orders.datatables.checkbox')
            ->addColumn('name', 'adminlte.orders.datatables.name')
            ->addColumn('total', 'adminlte.orders.datatables.total')
            ->addColumn('datetime', 'adminlte.orders.datatables.datetime')
            ->addColumn('payment', 'adminlte.orders.datatables.payment')
            ->addColumn('status', 'adminlte.orders.datatables.status')
            ->addColumn('action', 'adminlte.orders.datatables.action')
            ->rawColumns(['action', 'checkbox', 'status']);
    }

    public function query(Order $model)
    {
        return $model->latest()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('ordersdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All Records']])
            ->orderBy(1, 'asc')
            ->language(self::lang()) // From Static Function lang()
            ->buttons(
                Button::make('print')
                    ->className('btn btn-success text-white mx-1')
                    ->text('<i class="fa fa-print"></i> '. __('dataTables.buttons.print')),
                Button::make('excel')
                    ->className('btn btn-info text-white mx-1')
                    ->text('<i class="fa fa-file-excel"></i> ' . __('dataTables.buttons.excel')),
                Button::make('reset')
                    ->className('btn btn-info text-white mx-1')
                    ->text('<i class="fa fa-undo"></i> ' . __('dataTables.buttons.reset')),
                Button::make()
                    ->className('btn btn-danger text-white mx-1 deleteAllBtn')
                    ->text('<i class="fa fa-trash"></i> ' . __('dataTables.buttons.delete all')),
            );
    }

    protected function getColumns()
    {
        return [
            Column::computed('checkbox')
                ->title('<input type="checkbox" id="checkAllCheckbox" onclick="checkAll()">')
                ->data('checkbox')
                ->name('checkbox')
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->width(25)
                ->addClass('text-center'),
            Column::make('id')
                ->title(__('common.hashid')),
            Column::computed('name')
                ->title(__('common.name')),
            Column::make('email')
                ->title(__('common.email')),
            Column::computed('total')
                ->title(__('admin.orders.form.total')),
            Column::computed('payment')
                ->title(__('admin.orders.form.payment_method')),
            Column::computed('status')
                ->title(__('admin.orders.form.status'))
                ->orderable(true)
                ->searchable(true),
            Column::computed('datetime')
                ->title(__('admin.orders.form.date')),
            Column::computed('action')
                ->title(__('common.actions'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Orders_' . date('YmdHis');
    }


    protected static function lang()
    {
        return [
            "sProcessing"       => __('dataTables.sProcessing'),
            "sLengthMenu"       => __('dataTables.sLengthMenu'),
            "sZeroRecords"      => __('dataTables.sZeroRecords'),
            "sEmptyTable"       => __('dataTables.sEmptyTable'),
            "sInfo"             => __('dataTables.sInfo'),
            "sInfoEmpty"        => __('dataTables.sInfoEmpty'),
            "sInfoFiltered"     => __('dataTables.sInfoFiltered'),
            "sInfoPostFix"      => __('dataTables.sInfoPostFix'),
            "sSearch"           => __('dataTables.sSearch'),
            "sUrl"              => __('dataTables.sUrl'),
            "sInfoThousands"    => __('dataTables.sInfoThousands'),
            "sLoadingRecords"   => __('dataTables.sLoadingRecords'),

            "oPaginate" => [
                "sFirst"    => __("dataTables.oPaginate.sFirst"),
                "sLast"     => __("dataTables.oPaginate.sLast"),
                "sNext"     => __("dataTables.oPaginate.sNext"),
                "sPrevious" => __("dataTables.oPaginate.sPrevious")
            ],

            "oAria" => [
                "sSortAscending"    => __('dataTables.oAria.sSortAscending'),
                "sSortDescending"   => __('dataTables.oAria.sSortDescending'),
            ]
        ];
    }
}
