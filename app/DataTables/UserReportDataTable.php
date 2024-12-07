<?php

namespace App\DataTables;

use App\Models\Report;
use App\Models\UserReport;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserReportDataTable extends DataTable
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
            ->addColumn('action', fn(Report $report) => view('user-report.components.action', compact('report')))
            ->editColumn('report_status', fn(Report $report) => match ($report->status_report) {
                0 => 'Pending',
                1 => 'Accepted',
                2 => 'Rejected',
            })
            ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Report $model): QueryBuilder
    {
        $folderId = request()->query('folder_id'); // Get 'folder_id' from query parameters
        $status = request()->query('status'); // Get 'status' from query parameters

        $query = $model->newQuery()
            ->where('folder_id', $folderId)
            ->where('user_id', auth()->id());

        if (!is_null($status)) {
            $query->where('status_report', $status);
        }

        return $query
            ->with('user')
            ->select('reports.*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('userReport_dataTable')
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
        return [
            Column::make('id'),
            Column::make('title', 'title'),
            Column::make('content', 'content'),
            Column::make('seminars_and_activities_conducted', 'seminars_and_activities_conducted'),
            Column::make('seminars_and_activities_attended', 'seminars_and_activities_attended'),
            Column::make('recruitment', 'Recruitment'),
            Column::make('meeting_conducted', 'Meeting Conducted'),
            Column::make('others', 'Others'),
            Column::make('report_status'),
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
        return 'UserReport_' . date('YmdHis');
    }
}
