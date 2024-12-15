<?php

namespace App\DataTables;

use App\Models\ActivityRequest;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ActivityRequestDataTable extends DataTable
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
            ->addColumn('status', fn(ActivityRequest $activity) => match ($activity->status) {
                0 => 'Pending',
                1 => 'Accepted',
                2 => 'Rejected',
                3 => 'Done',
                4 => 'Cancelled'
            })
            ->editColumn('time', fn(ActivityRequest $activityRequest) => \Carbon\Carbon::parse($activityRequest->time)->format('H:i A'))
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ActivityRequest $model): QueryBuilder
    {
        $query = $model->newQuery();
        $user = auth()->user();

        // Filter by organization user ID if applicable
        if ($user->isOrganization()) {
            $query->where('user_id', $user->id);
        }

        // Determine status from query string
        $statusQuery = array_key_first(request()->query());

        // Filter by status
        if ($statusQuery == 0) {
            $query->where('status', 0);
        }
        if ($statusQuery == '1') {
            $query->where('status', 1);
        }
        if ($statusQuery == '2') {
            $query->where('status', 2);
        }
        if ($statusQuery == '3') {
            $query->where('status', 3);
        }
        if ($statusQuery == '4') {
            $query->where('status', 4);
        }

        // Order by created_at timestamp instead of date
        $query->orderBy('created_at', 'desc');

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('activityRequest_dataTable')
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
    if (auth()->user()->isOrganization()) {
        // If the authenticated user is an organization, show only specific columns
        return [
            Column::make('id'),
            Column::make('activity_name'),
            Column::make('date'),
            Column::make('venue'),
            Column::make('status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(240)
            ->addClass('text-center'),
        ];
    }

    // Default columns for other users
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
            ->width(240)
            ->addClass('text-center'),
    ];
}


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ActivityRequest_' . date('YmdHis');
    }
}
