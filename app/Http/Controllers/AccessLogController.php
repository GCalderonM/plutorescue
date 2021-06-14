<?php

namespace App\Http\Controllers;

use App\DataTables\AccessLogDataTable;
use App\Models\AccessLog;
use Illuminate\Http\Request;

class AccessLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AccessLogDataTable $accessLogDataTable)
    {
        return $accessLogDataTable->render('project.dashboard.accessLog.index');
    }

}
