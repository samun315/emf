<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FolderRequest;
use App\Models\Folder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class FolderController extends Controller
{
    public function index()
    {
        $results = Folder::orderBy('id', 'DESC')->paginate(10);

        return view('admin.folder.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.folder.form');
    }

    public function store(FolderRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['_token']);

            Folder::create($input);

            return back()->with('success', 'Folder created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Folder::findOrFail($id);
        return view('admin.folder.form', $data);
    }

    public function update(FolderRequest $request, $id)
    {
        $folder = Folder::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $folder->update($input);

            return redirect(route('admin.folder.index'))->with('success', 'Folder updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Folder::findOrFail($request->folder_id);
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

    public function delete($id)
    {
        try {
            Folder::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
