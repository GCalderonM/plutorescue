<?php

namespace App\DataTables;

use App\Models\AccessLog;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AccessLogDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->filter(function ($query) {
                // Filtro ip
                if (request()->has('ip')) {
                    $query->where('ip', 'like', '%'.request('ip').'%');
                }

                // Filtro email
                if (request()->has('email')) {
                    $query->where('email', 'like', '%'.request('email').'%');
                }

                // Filtro email
                if (request()->has('access_select')) {
                    $query->where('access', 'like', '%'.request('access_select').'%');
                }
            })
            ->editColumn('email', function ($query) {
                $user = \App\Models\User::where('email', '=', $query->email)->first();
                if ($user != null) {
                    return $query->email.'<span class="badge rounded-pill bg-success ml-2 text-white">'.__("global.existing_user").'</span>';
                }else {
                    return $query->email.'<span class="badge rounded-pill bg-danger ml-2 text-white">'.__("global.unknown_user").'</span>';
                }
            })
            ->editColumn('access', function ($query) {
                if ($query->access == 1) {
                    return '<span class="badge rounded-pill bg-success text-white">'.__("global.success").'</span>';
                }else {
                    return '<span class="badge rounded-pill bg-danger text-white">'.__("global.failed").'</span>';
                }
            })
            ->rawColumns(['access', 'email']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccessLog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccessLog $model)
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
            ->setTableId('accesslog-table')
            ->columns($this->getColumns())
            ->postAjax([
                'url' => route('accessLog.index'),
                'data' => 'function(d) {
                   d.ip = $("#ip").val();
                   d.email = $("#email").val();
                   d.access_select = $("#access_select").val();
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
            Column::make('ip')->title(__('global.ip')),
            Column::make('email')->title(__('global.email')),
            Column::make('created_at')->title(__('global.created_at')),
            Column::computed('access')
                ->title(__('global.access'))
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AccessLog_' . date('YmdHis');
    }
}
