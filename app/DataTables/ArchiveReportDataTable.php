<?php

namespace App\DataTables;

use App\Models\Report;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArchiveReportDataTable extends DataTable
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
            ->addColumn('action', fn(Report $report) => view('archive.components.action', compact('report')))
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Report $model): QueryBuilder
    {
        $user = auth()->user();

        $query = $model->newQuery()
            ->where('reports.status', false);

        if ($user->isOrganization()) {
            $query
                ->where('user_id', $user->id)
                ->where('folder_id',  array_key_first(request()->query()));
        }

        if ($user->isAdmin()) {
            $query->with('user')
                ->select('reports.*')
                ->where('folder_id',  array_key_first(request()->query()));
        }

        return $query;
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('archiveReport_dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
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
                Column::make('id'),
                auth()->user()->isAdmin() ? Column::make('user.name', 'user.name') : null,
                Column::make('title'),
                Column::make('content'),
                Column::make('seminars_and_activities_conducted'),
                Column::make('seminars_and_activities_attended'),
                Column::make('recruitment'),
                Column::make('meeting_conducted'),
                Column::make('others'),
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
        return 'ArchiveReport_' . date('YmdHis');
    }
}
