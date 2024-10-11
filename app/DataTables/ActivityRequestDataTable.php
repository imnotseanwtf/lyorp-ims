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
            ->addColumn('action', fn(ActivityRequest $activity) => view('activity-request.components.action', compact('activity')))
            ->addColumn('status', fn(ActivityRequest $activity) => match ($activity->status) {
                0 => 'Pending',
                1 => 'Accepted',
                2 => 'Rejected',
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ActivityRequest $model): QueryBuilder
    {
        $query = $model->newQuery();
        $user = auth()->user();

        if ($user->isOrganization()) {
            $query->where('user_id', $user->id);
        }

        $statusQuery = array_key_first(request()->query()) ?? false;

        if ($statusQuery == false || $statusQuery == 0) {
            $query->where('status', 0);
        }
        if ($statusQuery == '1') {
            $query->where('status', 1);
        }
        if ($statusQuery == '2') {
            $query->where('status', 2);
        }

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
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
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
        return [
            Column::make('id'),
            Column::make('title'),
            Column::make('content'),
            Column::make('status'),
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
        return 'ActivityRequest_' . date('YmdHis');
    }
}
