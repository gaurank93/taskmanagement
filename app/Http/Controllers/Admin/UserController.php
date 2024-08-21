<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required:min:8',
            'delete_it' => 'required',
            'role' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole($request->role);
        if ($request->delete_it == 'yes') {
            $user->givePermissionTo('delete tasks');
        }
        session()->flash('success_msg', "User Has Been Created Successfully!");
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view('admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required:min:8',
            'delete_it' => 'required',
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->assignRole($request->role);
        if ($request->delete_it == 'yes') {
            $user->givePermissionTo('delete tasks');
        } else {
            $user->revokePermissionTo('delete tasks');
        }
        session()->flash('success_msg', "User Has Been Updated Successfully!");
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getData(): JsonResponse
    {
        $data = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->with('roles')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn("DT_RowIndex", '')
            ->addColumn('roles', function ($datatables) {
                return $datatables->roles->pluck('name')->map(function ($role) {
                    return "<span class='badge badge-info'>{$role}</span>";
                })->implode(' ');
            })
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('user.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                        <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
            })->rawColumns(['action', 'roles'])->make(true);
    }
}
