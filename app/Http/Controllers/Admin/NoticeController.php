<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class NoticeController extends Controller
{
    public function index()
    {
        $results = Notice::orderBy('id', 'DESC')->paginate(10);

        return view('admin.notice.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.notice.form');
    }

    public function store(NoticeRequest $request)
    {

        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $notice_image = $request->file('image');

        if ($notice_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/notice/', $imgName);
            $input['image'] = $imgName;
        }

        try {

            unset($input['_token']);

            Notice::create($input);
            return back()->with('success', 'Notice created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Notice::findOrFail($id);

        return view('admin.notice.form', $data);
    }

    public function update(NoticeRequest $request, $id)
    {
        $notice = Notice::findOrFail($id);

        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $notice_image = $request->file('image');

        if ($notice_image) {

            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/notice/', $imgName);

            if (file_exists('uploads/notice/' . $notice->image) && !empty($notice->image)) {
                unlink('uploads/notice/' . $notice->image);
            }

            $input['image'] = $imgName;
        }

        try {
            $notice->update($input);
            return redirect(route('admin.notice.index'))->with('success', 'Notice updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Notice::findOrFail($request->notice_id);
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
            Notice::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
