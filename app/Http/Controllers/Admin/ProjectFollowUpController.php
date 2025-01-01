<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFollowUpRequest;
use App\Models\ProjectFollowUp;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class ProjectFollowUpController extends Controller
{
    public function index()
    {
        $results = DB::table('project_followup as a')
            ->select('a.*', 'a.id as project_follow_up_id', 'b.title as project_title')
            ->leftJoin('projects as b', 'a.project_id', '=', 'b.id')
            ->orderBy('a.id', 'DESC')
            ->paginate(10);

        return view('admin.project_follow_up.index', ['results' => $results]);
    }

    public function create()
    {
        $projects = DB::table('projects')->orderBy('id', 'DESC')->get();

        return view('admin.project_follow_up.form', compact('projects'));
    }

    public function store(ProjectFollowUpRequest $request)
    {

        $input['project_id']    = $request->project_name;
        $input['title']         = $request->title;
        $input['details']       = $request->details;
        $input['created_by']    = session('logged_session_data.id');
        $input['created_at']    = Carbon::now();

        $project_follow_up_image = $request->file('image_url');

        if ($project_follow_up_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image_url')) . '.' . $request->file('image_url')->getClientOriginalExtension();
            $request->file('image_url')->move('uploads/project_follow_up/', $imgName);
            $input['image_url'] = $imgName;
        }

        $project_follow_up_attachment = $request->file('attachment');

        if ($project_follow_up_attachment) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('attachment')) . '.' . $request->file('attachment')->getClientOriginalExtension();
            $request->file('attachment')->move('uploads/project_follow_up/', $imgName);
            $input['attachment'] = $imgName;
        }

        try {

            unset($input['_token']);

            ProjectFollowUp::create($input);
            return back()->with('success', 'Project follow-up created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = ProjectFollowUp::findOrFail($id);
        $data['projects'] = DB::table('projects')->orderBy('id', 'DESC')->get();

        return view('admin.project_follow_up.form', $data);
    }

    public function update(ProjectFollowUpRequest $request, $id)
    {
        $project_follow_up      = ProjectFollowUp::findOrFail($id);

        $input['project_id']    = $request->project_name;
        $input['title']         = $request->title;
        $input['details']       = $request->details;
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        $project_follow_up_image = $request->file('image_url');

        if ($project_follow_up_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image_url')) . '.' . $request->file('image_url')->getClientOriginalExtension();
            $request->file('image_url')->move('uploads/project_follow_up/', $imgName);

            if (file_exists('uploads/project_follow_up/' . $project_follow_up->image_url) && !empty($project_follow_up->image_url)) {
                unlink('uploads/project_follow_up/' . $project_follow_up->image_url);
            }

            $input['image_url'] = $imgName;
        }

        $project_follow_up_attachment = $request->file('attachment');

        if ($project_follow_up_attachment) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('attachment')) . '.' . $request->file('attachment')->getClientOriginalExtension();
            $request->file('attachment')->move('uploads/project_follow_up/', $imgName);

            if (file_exists('uploads/project_follow_up/' . $project_follow_up->attachment) && !empty($project_follow_up->attachment)) {
                unlink('uploads/project_follow_up/' . $project_follow_up->attachment);
            }

            $input['attachment'] = $imgName;
        }

        try {
            $project_follow_up->update($input);
            return redirect(route('admin.project_follow_up.index'))->with('success', 'Project follow-up updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = ProjectFollowUp::findOrFail($request->project_follow_up_id);
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
            ProjectFollowUp::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
