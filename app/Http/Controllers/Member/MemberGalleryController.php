<?php

namespace App\Http\Controllers\Member;

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
            ->where('a.user_id', session('logged_session_data.id'))
            ->latest('a.id')
            ->paginate(10);

        return view('member.member_gallery.index', ['results' => $results]);
    }

    public function create()
    {
        $user = DB::table('users')->where('id', session('logged_session_data.id'))->first(['id', 'name']);

        return view('member.member_gallery.form', compact('user'));
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
        $data['user'] = DB::table('users')->where('id', session('logged_session_data.id'))->first(['id', 'name']);
        $data['editModeData'] = MemberGallery::findOrFail($id);

        return view('member.member_gallery.form', $data);
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
            return redirect(route('member.memberGallery.index'))->with('success', 'Member gallery updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = MemberGallery::findOrFail($request->id);
        $input['status'] = $request->status;

        try {
            $data->update($input);
            return response()->json('success');
        } catch (Exception $e) {
            return response()->json(['error', $e->getMessage()]);
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
