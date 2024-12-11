<?php

namespace App\DataTables;

use App\Models\ActivityRequest;
use App\Models\ViewActivityRequest;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ViewActivityRequestDataTable extends DataTable
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
            ->addColumn('organization.name', function (ActivityRequest $activityRequest) {
                return $activityRequest->user->name;
            })
            ->addColumn('action', fn(ActivityRequest $activity) => view('viewActivityRequest.components.action', compact('activity')))
            ->addColumn('status', fn(ActivityRequest $activity) => match ($activity->status) {
                0 => 'Pending',
                1 => 'Accepted',
                2 => 'Rejected',
                3 => 'Done', 
                4 => 'Cancelled'
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ActivityRequest $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('user_id', array_key_first(request()->query()));
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('viewActivityRequest_dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('organization.name'),
            Column::make('activity_name'),
            Column::make('date'),
            Column::make('time'),
            Column::make('venue'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ViewActivityRequest_' . date('YmdHis');
    }
}
