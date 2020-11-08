<?php

namespace App\DataTables;

use App\Models\Color;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ColorsDatatable extends DataTable
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
            ->addColumn('action', 'adminlte.colors.datatables.action')
            ->addColumn('checkbox', 'adminlte.colors.datatables.checkbox')
            ->rawColumns(['action', 'checkbox']);
    }

    public function query(Color $model)
    {
        return $model->locale()->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('colorsdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All Records']])
            ->orderBy(1, 'asc')
            ->language(self::lang()) // From Static Function lang()
            ->buttons(
                Button::make('create')
                    ->className('btn btn-primary text-white mx-1')
                    ->text('<i class="fa fa-plus"></i> ' . __('dataTables.buttons.create color')),
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
                ->width(50)
                ->title(__('common.hashid')),
            Column::make('name', 'name_'.siteLang())
                ->title(__('common.title')),
            Column::make('color')
                ->title(__('common.color')),
            Column::computed('action')
                ->title(__('common.actions'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Colors_' . date('YmdHis');
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
