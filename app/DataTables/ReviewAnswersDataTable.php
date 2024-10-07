<?php

namespace App\DataTables;

use App\Models\EvaluationAssignToAnswer;
use App\Models\ReviewAnswer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReviewAnswersDataTable extends DataTable
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
            ->addColumn('action', fn(EvaluationAssignToAnswer $evaluationAssignToAnswer) => view('review-answer.components.action', compact('evaluationAssignToAnswer')))
            ->addColumn('is_answered', fn(EvaluationAssignToAnswer $evaluationAssignToAnswer) => $evaluationAssignToAnswer->is_answered ? 'Yes' : 'No Answered Yet')
            ->rawColumns(['actions']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(EvaluationAssignToAnswer $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(
                [
                    'user',
                    'criteria'
                ]
            )
            ->where('criteria_id', array_key_first(request()->query()));
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('reviewAnswers_dataTable')
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
            Column::make('user.name', 'user.name')
                ->title('Organization'),
            Column::make('is_answered', 'is_answered')
                ->title('is Answered?'),
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
        return 'ReviewAnswers_' . date('YmdHis');
    }
}
