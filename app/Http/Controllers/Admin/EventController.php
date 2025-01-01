<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class EventController extends Controller
{
    public function index()
    {
        $results = DB::table('events as a')
            ->select('a.*', 'b.title as project_title')
            ->leftJoin('projects as b', 'a.project_id', '=', 'b.id')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.event.index', ['results' => $results]);
    }

    public function create()
    {
        $projects = DB::table('projects')->orderBy('id', 'DESC')->get();

        return view('admin.event.form', compact('projects'));
    }

    public function store(EventRequest $request)
    {
        $input                  = $request->all();
        $input['project_id']    = $request->project_name;
        $input['created_by']    = session('logged_session_data.id');
        $input['created_at']    = Carbon::now();

        $eventImage = $request->file('banner_img');

        if ($eventImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/event/', $imgName);
            $input['banner_img'] = $imgName;
        }

        try {

            unset($input['_token']);
            unset($input['project_name']);

            Event::create($input);
            return redirect()->back()->with('success', 'Event created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData']   = Event::findOrFail($id);
        $data['projects']       = DB::table('projects')->orderBy('id', 'DESC')->get();

        return view('admin.event.form', $data);
    }

    public function update(EventRequest $request, $id)
    {
        $event                  = Event::findOrFail($id);
        $input                  = $request->all();
        $input['project_id']    = $request->project_name;
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        $eventImage = $request->file('banner_img');

        if ($eventImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/event/', $imgName);

            if (file_exists('uploads/event/' . $event->banner_img) && !empty($event->banner_img)) {
                unlink('uploads/event/' . $event->banner_img);
            }

            $input['banner_img'] = $imgName;
        }

        try {

            unset($input['project_name']);

            $event->update($input);
            return redirect(route('admin.event.index'))->with('success', 'Event updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Event::findOrFail($request->event_id);
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

            $request->file('upload')->move(public_path('uploads/event/ckeditor'), $fileName);

            $url = asset('uploads/event/ckeditor/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function delete($id)
    {
        try {
            Event::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
