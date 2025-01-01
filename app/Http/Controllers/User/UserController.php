<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $results = Admin::orderBy('id', 'DESC')->paginate(10);

        $results =  DB::table('admins as a')
            ->leftJoin('roles as b', 'a.role_id', '=', 'b.id')
            ->select('a.*', 'b.role_name as role_name')
            ->paginate(10);

        return view('admin.user.index', ['results' => $results]);
    }

    public function create()
    {
        $roles = Role::orderBy('id', 'DESC')->where('status', 'YES')->get();

        return view('admin.user.form', compact('roles'));
    }

    public function store(AdminRequest $request)
    {

        $input                  = $request->all();
        $input['password']      = Hash::make($request->password);
        $input['created_by']    = session('logged_session_data.id');
        $input['created_at']    = Carbon::now();

        try {
            Admin::create($input);
            return redirect()->back()->with('success', 'User successfully saved.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Admin::findOrFail($id);

        $data['roles'] = Role::orderBy('id', 'DESC')->where('status', 'YES')->get();

        return view('admin.user.form', $data);
    }

    public function update(AdminRequest $request, $id)
    {
        $data                   = Admin::findOrFail($id);
        $input                  = $request->all();
        $input['password']      = Hash::make($request->password);
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        try {
            $data->update($input);
            return redirect(route('user.index'))->with('success', 'User successfully updated.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Admin::findOrFail($request->user_id);
        $input['status'] = $request->status;

        try {
            $data->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            return response()->json(['error', $e->getMessage()]);
        }

        if ($bug == 0) {
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }
}
