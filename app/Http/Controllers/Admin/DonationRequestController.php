<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use App\Models\Programs;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PHPUnit\Exception;

class DonationRequestController extends Controller
{
    public function index(): View
    {
        $results = Donation::query()->orderBy('id', 'DESC')->paginate(10);

        return view('admin.donation_request.index', ['results' => $results]);
    }

    public function create(): View
    {
        $data['projects'] = Project::query()->latest()->get(['id', 'title']);
        $data['programs'] = Programs::query()->latest()->get(['id', 'name']);

        return view('admin.donation_request.form', $data);
    }

    public function store(DonationRequest $request): RedirectResponse
    {
        $input = $request->validated();

        // Split the string by underscore
        $parts = explode("_", $input['project_or_program_name']);

        $input['project_program_id'] = (int)$parts[1];
        $input['type'] = strtolower($parts[0]);
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        try {

            unset($input['project_or_program_name']);

            Donation::query()->create($input);
            return back()->with('success', 'Donation request created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(int $id): View
    {
        $data['projects'] = Project::query()->latest()->get(['id', 'title']);
        $data['programs'] = Programs::query()->latest()->get(['id', 'name']);

        $data['editModeData'] = Donation::query()->findOrFail($id);

        return view('admin.donation_request.form', $data);
    }

    public function view(int $id): View
    {
        $getDonationInfo = Donation::query()->findOrFail($id)->toArray();

        $type = $getDonationInfo["type"];

        $data = DB::table('donation_requests as a');

        if ($type === "project") {
            $data = $data
                ->select('a.*', 'b.title as project_or_program_name')
                ->leftJoin('projects as b', 'a.project_program_id', '=', 'b.id');
        } elseif ($type === "program") {
            $data = $data
                ->select('a.*', 'b.name as project_or_program_name')
                ->leftJoin('programs as b', 'a.project_program_id', '=', 'b.id');
        }

        $data = $data->where('a.id', $id)->first();

        return view('admin.donation_request.view', compact('data'));
    }

    public function update(DonationRequest $request, int $id): RedirectResponse
    {
        $donation = Donation::query()->findOrFail($id);

        $input = $request->validated();

        // Split the string by underscore
        $parts = explode("_", $input['project_or_program_name']);

        $input['project_program_id'] = (int)$parts[1];
        $input['type'] = strtolower($parts[0]);
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        try {
            $donation->update($input);
            return redirect(route('admin.donation_request.index'))->with('success', 'Donation request updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request): JsonResponse
    {
        $data = Donation::query()->findOrFail($request->input('donation_request_id'));
        $input['status'] = $request->input('status');

        try {
            $data->update($input);
            return response()->json('success');
        } catch (\Exception $e) {
            return response()->json(['error', $e->getMessage()]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            Donation::query()->where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
