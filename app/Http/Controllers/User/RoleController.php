<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $results = Role::orderBy('id', 'DESC')->paginate(10);

        return view('admin.role.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.role.form');
    }

    public function store(RoleRequest $request)
    {

        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {
            Role::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            dd($e);
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect()->back()->with('success', 'Role successfully saved.');
        } else {
            return redirect()->back()->with('error', 'Something error found !, Please try again.');
        }
    }

    public function edit($id)
    {
        $editModeData = Role::findOrFail($id);

        return view('admin.role.form', compact('editModeData'));
    }

    public function update(RoleRequest $request, $id)
    {
        $data = Role::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $data->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return redirect(route('role.index'))->with('success', 'Role successfully updated.');
        } else {
            return redirect()->back()->with('error', 'Something Error Found !, Please try again.');
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Role::findOrFail($request->role_id);
        $input['status'] = $request->status;
        try {
            $data->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }
}
