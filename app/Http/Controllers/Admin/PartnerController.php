<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class PartnerController extends Controller
{
    public function index()
    {
        $results = Partner::orderBy('id', 'DESC')->paginate(10);

        return view('admin.partner.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.partner.form');
    }

    public function store(PartnerRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $partner_image = $request->file('image');

        if ($partner_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/partner/', $imgName);
            $input['image'] = $imgName;
        }

        try {

            unset($input['_token']);

            Partner::create($input);
            return redirect()->back()->with('success', 'Partner created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Partner::findOrFail($id);

        return view('admin.partner.form', $data);
    }

    public function update(PartnerRequest $request, $id)
    {
        $partner = Partner::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $partner_image = $request->file('image');

        if ($partner_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/partner/', $imgName);

            if (file_exists('uploads/partner/' . $partner->image) && !empty($partner->image)) {
                unlink('uploads/partner/' . $partner->image);
            }

            $input['image'] = $imgName;
        }

        try {
            $partner->update($input);
            return redirect(route('admin.partner.index'))->with('success', 'Partner updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Partner::findOrFail($request->partner_id);
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
            Partner::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
