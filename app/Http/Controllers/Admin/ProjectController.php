<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class ProjectController extends Controller
{
    public function index()
    {
        $results = Project::orderBy('id', 'DESC')->paginate(10);

        $results = DB::table('projects as a')
            ->select('a.*', 'b.name as program_name')
            ->leftJoin('programs as b', 'a.program_id', '=', 'b.id')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.project.index', ['results' => $results]);
    }

    public function create()
    {
        $programs = DB::table('programs')->orderBy('id', 'DESC')->get();

        return view('admin.project.form', compact('programs'));
    }

    public function store(ProjectRequest $request)
    {
        $input = $request->all();
        $input['program_id'] = $request->program_name;
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $projectImage = $request->file('banner_img');

        if ($projectImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/project/', $imgName);
            $input['banner_img'] = $imgName;
        }

        try {

            unset($input['_token']);
            unset($input['category_name']);

            Project::create($input);
            return redirect()->back()->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Project::findOrFail($id);
        $data['programs'] = DB::table('programs')->orderBy('id', 'DESC')->get();

        return view('admin.project.form', $data);
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::findOrFail($id);
        $input = $request->all();
        $input['program_id'] = $request->program_name;
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $projectImage = $request->file('banner_img');

        if ($projectImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/project/', $imgName);

            if (file_exists('uploads/project/' . $project->banner_img) && !empty($project->banner_img)) {
                unlink('uploads/project/' . $project->banner_img);
            }

            $input['banner_img'] = $imgName;
        }

        try {
            unset($input['program_name']);

            $project->update($input);
            return redirect(route('admin.project.index'))->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Project::findOrFail($request->project_id);
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

    public function uploadCkeditorImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extention = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '-' . time() . '.' . $extention;

            $request->file('upload')->move(public_path('uploads/project/ckeditor'), $fileName);

            $url = asset('uploads/project/ckeditor/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function delete($id)
    {
        try {
            Project::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
