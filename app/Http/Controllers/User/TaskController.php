<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskDocument;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('user.task.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('user.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|string',
        ]);
        $user = auth()->user();
        $task = new Task();
        $task->user_id = $user->id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->deadline = date('Y-m-d', strtotime($request->deadline));
        $task->status = $request->status;
        $task->save();

        session()->flash('success_msg', "Task Has Been Created Successfully!");
        return redirect()->route('user-task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Task::find($id);
        return view('user.task.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data = Task::find($id);
        return view('user.task.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|string',
        ]);

        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->deadline = date('Y-m-d', strtotime($request->deadline));
        $task->status = $request->status;
        $task->save();

        session()->flash('success_msg', "Task Has Been Updated Successfully!");
        return redirect()->route('user-task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $data = Task::find($id);
        $data->delete();
        return response()->json('success', 200);
    }

    public function getData(): JsonResponse
    {
        $user = auth()->user();
        $data = Task::join('users', 'users.id', 'tasks.user_id')
            ->where('tasks.user_id', $user->id)
            ->select('tasks.*', 'users.name')->orderBy('tasks.deadline', 'asc');
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
                if (auth()->user()->can('delete tasks')) {
                    return '<a href="' . route('user-task.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                        <a href="' . route('user-task.show', $datatables->id) . '" class="btn btn-primary btn-sm" title="View Detail"><i class="mdi mdi-eye d-block font-size-16"></i></a>
                        <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
                } else {
                    return '<a href="' . route('user-task.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                        <a href="' . route('user-task.show', $datatables->id) . '" class="btn btn-primary btn-sm" title="View Detail"><i class="mdi mdi-eye d-block font-size-16"></i></a>';
                }
            })->rawColumns(['action', 'status', 'priority'])->make(true);
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $task_document = new TaskDocument();
        $task_document->task_id = $request->task_id;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = 'task-document' . rand(9999, 99999) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('task-' . $request->task_id, $filename);
            $task_document->document_path = $path;
        }
        $task_document->save();
        session()->flash('success_msg', "Task Document Has Been Uploaded Successfully!");
        return redirect()->route('user-task.show', $task_document->task_id);
    }
}
