<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        // SoftDeletes filter
        if (request('users_softDelete') == 2) {
            $query->onlyTrashed();
        }

        return datatables()
            ->eloquent($query)
            ->filter(function ($query) {
                // Username filter
                if (request()->has('username')) {
                    $query->where('username', 'like', '%'.request('username').'%');
                }

                // Email filter
                if (request()->has('email')) {
                    $query->where('email', 'like', '%'.request('email').'%');
                }
            })
            ->addColumn('actions', function ($query) {
                if (request('users_softDelete') == 2) {
                    return '
                    <div class="btn-group dropdown mr-1 mb-1">
                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                          data-boundary="window" aria-haspopup="true" aria-expanded="false">
                            '.__("global.menu").'
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item restore-user" href="'.route('users.restore', $query->id).'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                '.__("global.restore").'
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item delete-user" href="#" data-href="'.route('users.destroy', $query->id).'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pr-1" viewBox="0 0 20 20" fill="#c23616">
                                  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                '.__('global.delete').'
                            </a>
                        </div>
                    </div>';
                } else {
                    return '
                    <div class="btn-group dropdown mr-1 mb-1">
                        <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-toggle="dropdown"
                          data-boundary="window" aria-haspopup="true" aria-expanded="false">
                            '.__("global.menu").'
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="'.route('users.edit', ['user' => $query->id]).'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pr-1" viewBox="0 0 20 20" fill="#44bd32">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            '.__("global.edit").'
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item delete-user" href="#" data-href="'.route('users.destroy', ['user' => $query->id]).'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pr-1" viewBox="0 0 20 20" fill="#c23616">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            '.__('global.delete').'
                          </a>
                          </div>
                    </div>';
                }
            })
            ->rawColumns(['actions']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->parameters([
                        'buttons' => ['reload'],
                        'filter' => false
                    ])
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->postAjax([
                        'url' => route('users.index'),
                        'data' => 'function(d) {
                            d.username = $("#username").val();
                            d.email = $("#email").val();
                            d.users_softDelete = $("#users_softDelete").val();
                        }'
                    ])
                    ->dom('B <"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>> rt <"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>')
                    ->orderBy(1, 'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('username')->title(__('global.username')),
            Column::make('name')->title(__('global.name')),
            Column::make('surname')->title(__('global.surname')),
            Column::make('email')->title(__('global.email')),
            Column::make('created_at')->title(__('global.created_at')),
            Column::make('updated_at')->title(__('global.updated_at')),
            Column::computed('actions')
                ->title(__('global.actions'))
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
