<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectGalleryRequest;
use App\Models\ProjectGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class ProjectGalleryController extends Controller
{
    public function index()
    {
        $results = DB::table('project_galleries as a')
            ->select('a.*', 'a.id as project_gallery_id', 'b.title as project_name')
            ->leftJoin('projects as b', 'a.project_id', '=', 'b.id')
            ->orderBy('a.id', 'DESC')
            ->paginate(10);

        return view('admin.project_gallery.index', ['results' => $results]);
    }

    public function create()
    {
        $projects = DB::table('projects')->orderBy('id', 'DESC')->get();

        return view('admin.project_gallery.form', compact('projects'));
    }

    public function store(ProjectGalleryRequest $request)
    {

        $input = $request->all();
        $input['project_id'] = $request->project_name;
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $request_image = $request->file('image');

        if ($request_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/project_gallery/', $imgName);
            $input['image'] = $imgName;
        }

        try {

            unset($input['_token']);

            ProjectGallery::create($input);
            return redirect()->back()->with('success', 'Project gallery created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['projects'] = DB::table('projects')->orderBy('id', 'DESC')->get();
        $data['editModeData'] = ProjectGallery::findOrFail($id);

        return view('admin.project_gallery.form', $data);
    }

    public function update(ProjectGalleryRequest $request, $id)
    {
        $blog = ProjectGallery::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $request_image = $request->file('image');

        if ($request_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/project_gallery/', $imgName);

            if (file_exists('uploads/project_gallery/' . $blog->image) && !empty($blog->image)) {
                unlink('uploads/project_gallery/' . $blog->image);
            }

            $input['image'] = $imgName;
        }

        try {
            $blog->update($input);
            return redirect(route('admin.project_gallery.index'))->with('success', 'Project gallery updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = ProjectGallery::findOrFail($request->project_gallery_id);
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
            ProjectGallery::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
