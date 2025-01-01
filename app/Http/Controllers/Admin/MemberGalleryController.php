<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberGalleryRequest;
use App\Models\MemberGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class MemberGalleryController extends Controller
{
    public function index()
    {
        $results = DB::table('member_galleries as a')
            ->select('a.*', 'b.name as user_name')
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->latest('a.id')
            ->paginate(10);

        return view('admin.member_gallery.index', ['results' => $results]);
    }

    public function create()
    {
        $users = DB::table('users')->where('role_type', 'USER')->latest()->get();

        return view('admin.member_gallery.form', compact('users'));
    }

    public function store(MemberGalleryRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->member_name;
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $request_image = $request->file('image');

        if ($request_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/member_gallery/', $imgName);
            $input['image'] = $imgName;
        }

        try {

            unset($input['_token']);

            MemberGallery::create($input);
            return redirect()->back()->with('success', 'Member gallery created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['users'] = DB::table('users')->where('role_type', 'USER')->latest()->get();
        $data['editModeData'] = MemberGallery::findOrFail($id);

        return view('admin.member_gallery.form', $data);
    }

    public function update(MemberGalleryRequest $request, $id)
    {
        $blog = MemberGallery::findOrFail($id);
        $input = $request->all();
        $input['user_id'] = $request->member_name;
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $request_image = $request->file('image');

        if ($request_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/member_gallery/', $imgName);

            if (file_exists('uploads/member_gallery/' . $blog->image) && !empty($blog->image)) {
                unlink('uploads/member_gallery/' . $blog->image);
            }

            $input['image'] = $imgName;
        }

        try {
            $blog->update($input);
            return redirect(route('admin.memberGallery.index'))->with('success', 'Member gallery updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = MemberGallery::findOrFail($request->id);
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
            MemberGallery::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
