<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Admin;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Exception;

class MemberController extends Controller
{
    public function index()
    {
        $results = DB::table('member_details as a')
            ->select('a.*', 'b.name as user_name', 'b.email as user_email', 'b.phone_number as user_phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->orderBy('a.id', 'DESC')
            ->paginate(10);

        return view('admin.member.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.member.form');
    }

    public function store(MemberRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $passport_photo_image = $request->file('passport_photo');

        if ($passport_photo_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('passport_photo')) . '.' . $request->file('passport_photo')->getClientOriginalExtension();
            $request->file('passport_photo')->move('uploads/member/', $imgName);
            $input['passport_photo'] = $imgName;
        }

        $student_photo_image = $request->file('student_photo');

        if ($student_photo_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('student_photo')) . '.' . $request->file('student_photo')->getClientOriginalExtension();
            $request->file('student_photo')->move('uploads/member/', $imgName);
            $input['student_photo'] = $imgName;
        }

        $doctor_photo_image = $request->file('doctor_photo');

        if ($doctor_photo_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('doctor_photo')) . '.' . $request->file('doctor_photo')->getClientOriginalExtension();
            $request->file('doctor_photo')->move('uploads/member/', $imgName);
            $input['doctor_photo'] = $imgName;
        }

        $family_photo_image = $request->file('family_photo');

        if ($family_photo_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('family_photo')) . '.' . $request->file('family_photo')->getClientOriginalExtension();
            $request->file('family_photo')->move('uploads/member/', $imgName);
            $input['family_photo'] = $imgName;
        }

        //set user table data
        $userInputData['name'] = $request->name;
        $userInputData['email'] = $request->email;
        $userInputData['phone_number'] = $request->phone_number;
        $userInputData['role_type'] = "USER";
        $userInputData['password'] = Hash::make('password'); //set default password for all member when registered by admin user

        try {

            unset($input['_token']);

            $user = User::create($userInputData);

            unset($userInputData['role_type']);

            $userInputData['role_id'] = 2; //For member role id
            Admin::create($userInputData);

            $input['user_id'] = $user->id;

            Member::create($input);

            return redirect()->back()->with('success', 'Member created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $editModeData = DB::table('member_details as a')
            ->select('a.*', 'b.id as user_id', 'b.name', 'b.email', 'b.phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->where('a.id', $id)
            ->first();

        return view('admin.member.form', compact('editModeData'));
    }

    public function update(MemberRequest $request, $id)
    {
        $member = Member::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $passport_photo_image = $request->file('passport_photo');

        if ($passport_photo_image) {

            $imgName = md5(Str::random(30) . time() . '_' . $request->file('passport_photo')) . '.' . $request->file('passport_photo')->getClientOriginalExtension();
            $request->file('passport_photo')->move('uploads/member/', $imgName);

            if (file_exists('uploads/member/' . $member->passport_photo) && !empty($member->passport_photo)) {
                unlink('uploads/member/' . $member->passport_photo);
            }

            $input['passport_photo'] = $imgName;
        }

        $student_photo_image = $request->file('student_photo');

        if ($student_photo_image) {

            $imgName = md5(Str::random(30) . time() . '_' . $request->file('student_photo')) . '.' . $request->file('student_photo')->getClientOriginalExtension();
            $request->file('student_photo')->move('uploads/member/', $imgName);

            if (file_exists('uploads/member/' . $member->student_photo) && !empty($member->student_photo)) {
                unlink('uploads/member/' . $member->student_photo);
            }

            $input['student_photo'] = $imgName;
        }

        $doctor_photo_image = $request->file('doctor_photo');

        if ($doctor_photo_image) {

            $imgName = md5(Str::random(30) . time() . '_' . $request->file('doctor_photo')) . '.' . $request->file('doctor_photo')->getClientOriginalExtension();
            $request->file('doctor_photo')->move('uploads/member/', $imgName);

            if (file_exists('uploads/member/' . $member->doctor_photo) && !empty($member->doctor_photo)) {
                unlink('uploads/member/' . $member->doctor_photo);
            }

            $input['doctor_photo'] = $imgName;
        }

        $family_photo_image = $request->file('family_photo');

        if ($family_photo_image) {

            $imgName = md5(Str::random(30) . time() . '_' . $request->file('family_photo')) . '.' . $request->file('family_photo')->getClientOriginalExtension();
            $request->file('family_photo')->move('uploads/member/', $imgName);

            if (file_exists('uploads/member/' . $member->family_photo) && !empty($member->family_photo)) {
                unlink('uploads/member/' . $member->family_photo);
            }

            $input['family_photo'] = $imgName;
        }

        //set user table data
        $userUpdateData['name'] = $request->name;
        $userUpdateData['email'] = $request->email;
        $userUpdateData['phone_number'] = $request->phone_number;

        try {
            $member->update($input);

            User::where('id', $member->user_id)->update($userUpdateData);
            Admin::where('email', $member->email)->update($userUpdateData);

            return redirect(route('admin.member.index'))->with('success', 'Member updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Member::findOrFail($request->member_id);
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
            Member::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
