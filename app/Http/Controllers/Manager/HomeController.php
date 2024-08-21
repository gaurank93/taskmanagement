<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        return view('manager.task.index');
    }

    public function getData(): JsonResponse
    {
        $data = Task::join('users', 'users.id', 'tasks.user_id')
            ->select('tasks.*', 'users.name')->orderBy('tasks.deadline', 'desc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn("DT_RowIndex", '')
            ->editColumn('deadline', function ($datatables) {
                return date('d-M-Y', strtotime($datatables->deadline));
            })->editColumn('priority', function ($datatables) {
                if ($datatables->priority == 'low') {
                    return '<span class="badge badge-primary">LOW</span>';
                } elseif ($datatables->priority == 'medium') {
                    return '<span class="badge badge-pink">Medium</span>';
                } else {
                    return '<span class="badge badge-info">High</span>';
                }
            })->editColumn('status', function ($datatables) {
                if ($datatables->status == 'pending') {
                    return '<span class="badge badge-warning">Pending</span>';
                } else {
                    return '<span class="badge badge-success">Completed</span>';
                }
            })->addColumn('action', function ($datatables) {
                return '<a href="' . route('manager-task.show', $datatables->id) . '" class="btn btn-primary btn-sm" title="View Detail"><i class="mdi mdi-eye d-block font-size-16"></i></a>';
            })->rawColumns(['action', 'status', 'priority'])->make(true);
    }

    public function show($id)
    {
        $data = Task::find($id);
        return view('manager.task.view', compact('data'));
    }
}
