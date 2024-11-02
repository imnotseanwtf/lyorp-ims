<?php

namespace App\DataTables;

use App\Models\Audit;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AuditDataTable extends DataTable
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
            ->editColumn('new_values', function (Audit $audit) {
                // Safely check the is_login value from new_values JSON
                $isLogin = json_decode($audit->new_values, true)['is_login'] ?? null;

                return $isLogin === true ? 'Login' : 'Logout';
            })
            ->editColumn('updated_at', fn(Audit $audit) => $audit->updated_at->format('M d, Y H:i A'));
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Audit $model): QueryBuilder
    {
        return $model->newQuery()
            ->whereHas('user', function ($query) {
                $query->whereHas('roles', function ($roleQuery) {
                    $roleQuery->where('name', 'organization');
                });
            })
            ->whereRaw("JSON_EXTRACT(new_values, '$.is_login') IN (true, false)")
            ->with('user');
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('audit_dataTable')
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
            Column::make('user.name'),
            Column::make('new_values')->title('Action'),
            Column::make('ip_address'),
            Column::make('updated_at')->title('Date'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Audit_' . date('YmdHis');
    }
}
