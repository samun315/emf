<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramsRequest;
use App\Models\Programs;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class ProgramsController extends Controller
{
    public function index()
    {
        $results = Programs::orderBy('id', 'DESC')->paginate(10);

        return view('admin.programs.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.programs.form');
    }

    public function store(ProgramsRequest $request)
    {

        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $categoryImage = $request->file('image');

        if ($categoryImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/programs/', $imgName);
            $input['image'] = $imgName;
        }

        try {

            unset($input['_token']);

            Programs::create($input);
            return redirect()->back()->with('success', 'Programs created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Programs::findOrFail($id);
        return view('admin.programs.form', $data);
    }

    public function update(ProgramsRequest $request, $id)
    {
        $programs = Programs::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $programsImage = $request->file('image');

        if ($programsImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/programs/', $imgName);

            if (file_exists('uploads/programs/' . $programs->image) && !empty($programs->image)) {
                unlink('uploads/programs/' . $programs->image);
            }

            $input['image'] = $imgName;
        }

        try {
            $programs->update($input);
            return redirect(route('admin.programs.index'))->with('success', 'Programs updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Programs::findOrFail($request->programs_id);
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
            Programs::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
