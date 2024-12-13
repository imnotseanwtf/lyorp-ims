<?php

namespace App\DataTables;

use App\Models\ActivityRequest;
use App\Models\OngoingActivity;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OngoingActivityDataTable extends DataTable
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
            ->addColumn('action', fn(ActivityRequest $activity) => view('activity-request.components.action', compact('activity')))
            ->addColumn('activity_status', fn(ActivityRequest $activity) => match ($activity->activity_status) {
                1 => 'On Going',
                2 => 'In Progress'
            })
            ->editColumn('time', fn(ActivityRequest $activityRequest) => \Carbon\Carbon::parse($activityRequest->time)->format('H:i A'))
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ActivityRequest $model): QueryBuilder
    {
        $query = request()->query('status');

        if (is_null($query)) {
            return $model->newQuery()
                ->whereIn('activity_status', [1, 2])
                ->orderBy('created_at', 'desc'); // Sorting by latest date
        } else {
            return $model->newQuery()
                ->where('activity_status', $query)
                ->orderBy('created_at', 'desc'); // Sorting by latest date
        }
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ongoingActivity_dataTable')
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
            Column::make('activity_status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(140)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'OngoingActivity_' . date('YmdHis');
    }
}
