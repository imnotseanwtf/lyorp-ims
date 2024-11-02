<?php

namespace App\DataTables;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CertificateDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', fn(Certificate $certificate) => view('certificate.components.action', compact('certificate')))
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Certificate $model): QueryBuilder
    {
        $user = auth()->user();

        $query = $model->newQuery();

        if ($user->isOrganization()) {
            $query->where('user_id', $user->id)
                ->with('user');
        }
        if ($user->isAdmin()) {
            $query->with('user')
                ->select('certificates.*');
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('certificate_dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return array_filter(
            [
                Column::make('user.name', 'user.name'),
                Column::make('register_number', 'register_number'),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(100)
                    ->addClass('text-center'),
            ]
        );
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Certificate_' . date('YmdHis');
    }
}
