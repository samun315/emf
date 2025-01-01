<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteerRequest;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class VolunteerController extends Controller
{
    public function index()
    {
        $results = Volunteer::orderBy('id', 'DESC')->paginate(10);

        return view('admin.volunteer.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.volunteer.form');
    }

    public function store(VolunteerRequest $request)
    {
        $input                  = $request->all();
        $input['created_by']    = session('logged_session_data.id');
        $input['created_at']    = Carbon::now();

        $volunteer_image = $request->file('image');

        if ($volunteer_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/volunteer/', $imgName);
            $input['image'] = $imgName;
        }

        try {

            unset($input['_token']);

            Volunteer::create($input);
            return back()->with('success', 'Volunteer created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Volunteer::findOrFail($id);

        return view('admin.volunteer.form', $data);
    }

    public function update(VolunteerRequest $request, $id)
    {
        $volunteer              = Volunteer::findOrFail($id);

        $input                  = $request->all();
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        $volunteer_image = $request->file('image');

        if ($volunteer_image) {

            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/volunteer/', $imgName);

            if (file_exists('uploads/volunteer/' . $volunteer->image) && !empty($volunteer->image)) {
                unlink('uploads/volunteer/' . $volunteer->image);
            }

            $input['image'] = $imgName;
        }

        try {
            $volunteer->update($input);
            return redirect(route('admin.volunteer.index'))->with('success', 'Volunteer updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Volunteer::findOrFail($request->volunteer_id);
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
            Volunteer::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
