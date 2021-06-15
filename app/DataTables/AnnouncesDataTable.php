<?php

namespace App\DataTables;

use App\Models\Announce;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AnnouncesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $query->with('user');

        // SoftDeletes filter
        if (request('announces_softDelete') == 2) {
            $query->onlyTrashed();
        }
        return datatables()
            ->eloquent($query)
            ->filter(function ($query) {
                // Title filter
                if (request()->has('title')) {
                    $query->where('title', 'like', '%'.request('title').'%');
                }

                // User filter
                if (request()->has('username')) {
                    $query->whereHas('user', function($query2) {
                        $query2->where('username', 'like', '%'.request('username').'%');
                    });
                }

                // Announce status
                if (request()->has('announce_status')) {
                    $query->where('status', 'like', '%'.request('announce_status').'%');
                }

                // Animal type
                if (request()->has('animal_type')) {
                    $query->where('type', 'like', '%'.request('animal_type').'%');
                }

                // Animal gender
                if (request()->has('animal_gender')) {
                    $query->where('gender', 'like', '%'.request('animal_gender').'%');
                }
            })
            ->addColumn('action', function ($query) {
                if ($query->deleted_at != null) {
                    return '
                    <div class="btn-group dropdown mr-1 mb-1">
                        <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle" data-toggle="dropdown"
                          data-boundary="window" aria-haspopup="true" aria-expanded="false">
                            '.__("global.menu").'
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item restore-user"
                                onclick="document.getElementById(\'restore_form\').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                '.__("global.restore").'
                          </a>
                          <form method="post" class="d-none" id="restore_form"
                                action="'.route('announces.restore', $query->id).'">
                              <input type="hidden" name="_token" value="'.csrf_token().'" />
                          </form>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item delete-announce" href="#" data-href="'.route('announces.destroy', $query->id).'">
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
                          <a class="dropdown-item" href="'.route('announces.edit', ['announce' => $query->id]).'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pr-1" viewBox="0 0 20 20" fill="#44bd32">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            '.__("global.edit").'
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item delete-announce" href="#" data-href="'.route('announces.destroy', ['announce' => $query->id]).'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pr-1" viewBox="0 0 20 20" fill="#c23616">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            '.__('global.delete').'
                          </a>
                          </div>
                    </div>';
                }
            })
            ->editColumn('user_id', function ($query) {
                return $query->user->username;
            })
            ->editColumn('gender', function ($query) {
                if ($query->gender === 1) {
                    return __('global.male');
                } else {
                    return __('global.female');
                }
            })
            ->editColumn('status', function ($query) {
                if ($query->status === 1) {
                    return __('global.new');
                } else if ($query->status === 2) {
                    return __('global.on-hold');
                } else {
                    return __('global.adopted');
                }
            })
            ->editColumn('type', function ($query) {
                if ($query->type === 1) {
                    return __('global.dog');
                } else if ($query->type === 2) {
                    return __('global.cat');
                } else if ($query->type === 3) {
                    return __('global.bird');
                } else {
                    return __('global.rodent');
                }
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Announce $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Announce $model)
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
        return $this
            ->builder()
            ->parameters([
                'buttons' => ['reload'],
                'filter' => false
            ])
            ->setTableId('announces-table')
            ->columns($this->getColumns())
            ->postAjax([
                'url' => route('announces.index'),
                'data' => 'function(d) {
                    d.username = $("#username").val();
                    d.title = $("#title").val();
                    d.description = $("#description").val();
                    d.announce_status = $("#announce_status").val();
                    d.animal_type = $("#animal_type").val();
                    d.animal_gender = $("#animal_gender").val();
                    d.announces_softDelete = $("#announces_softDelete").val();
                }'
            ])
            ->dom('B <"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>> rt <"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('user_id')
                ->title(__('global.username'))
                ->width(40)
                ->addClass('text-center')
                ->orderable(true),
            Column::make('title')->title(__('global.title')),
            Column::computed('status')
                ->title(__('global.announce-status'))
                ->width(150),
            Column::computed('type')
                ->title(__('global.animal-type'))
                ->width(150),
            Column::computed('gender')
                ->title(__('global.gender'))
                ->width(150),
            Column::computed('action')
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
        return 'Announces_' . date('YmdHis');
    }
}
