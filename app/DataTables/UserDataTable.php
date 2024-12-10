<?php

namespace App\DataTables;

use App\Models\ActivityRequest;
use App\Models\Answer;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->addColumn('action', function (User $user) {
                $activityRequestAnnounced = ActivityRequest::where('user_id', $user->id)
                    ->where('is_notif', 0)
                    ->exists();
                $reportAnnounced = Report::where('user_id', $user->id)
                    ->where('is_notif', 0)
                    ->exists();
                $answerAnnounced = Answer::whereHas('assignToAnswer', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                    ->where('is_notif', 0)
                    ->exists();

                return view('users.components.action', compact('user', 'activityRequestAnnounced', 'reportAnnounced', 'answerAnnounced'));
            })

            ->addColumn('status', function (User $user) {
                if ($user->status === true || $user->status === 1) {
                    return 'Activated'; // For true or 1
                } elseif ($user->status === 2) {
                    return 'Rejected'; // For false or 0
                } else {
                    return 'Pending'; // For null
                }
            })
            ->addColumn('name', function (User $user) {
                $hasUnannounced = ActivityRequest::where('user_id', $user->id)
                    ->where('is_notif', 0)
                    ->exists() ||
                    Report::where('user_id', $user->id)
                    ->where('is_notif', 0)
                    ->exists() ||
                    Answer::whereHas('assignToAnswer', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->where('is_notif', 0)
                    ->exists();

                return $user->name . ($hasUnannounced ? '<span class="btn btn-primary text-white mx-2" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;">New</span>' : '');
            })
            ->rawColumns(['action', 'name']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        $query = $model::query()
            ->whereHas('roles', fn($q) => $q->where('name', 'organization'));

        $statusQuery = array_key_first(request()->query());

        if ($statusQuery == '0') {
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
            ->setTableId('user_dataTable')
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
            Column::make('id', 'id'),
            Column::make('name', 'name'),
            Column::make('email', 'email'),
            Column::make('name_of_the_primary_representative', 'name_of_the_primary_representative'),
            Column::make('address', 'address'),
            Column::make('facebook_url', 'facebook_url'),
            Column::make('phone_number', 'phone_number'),
            Column::make('age', 'age'),
            Column::make('sex', 'sex'),
            Column::make('status', 'status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(140)
                ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
