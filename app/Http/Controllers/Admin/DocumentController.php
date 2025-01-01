<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Folder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class DocumentController extends Controller
{
    public function index()
    {
        $results = DB::table('documents as a')
            ->select('a.*', 'b.name as folder_name')
            ->leftJoin('folders as b', 'a.folder_id', '=', 'b.id')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.document.index', ['results' => $results]);
    }

    public function create()
    {
        $folders = Folder::orderBy('id', 'DESC')->where('status', 'YES')->get();

        return view('admin.document.form', compact('folders'));
    }

    public function store(DocumentRequest $request)
    {
        $input = $request->all();
        $input['folder_id'] = $request->folder_name;
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $document_image = $request->file('document_file');

        if ($document_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('document_file')) . '.' . $request->file('document_file')->getClientOriginalExtension();
            $request->file('document_file')->move('uploads/document/', $imgName);
            $input['document_file'] = $imgName;
        }

        try {

            unset($input['_token']);
            unset($input['folder_name']);

            Document::create($input);
            return redirect()->back()->with('success', 'Document created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Document::findOrFail($id);

        $data['folders'] = Folder::orderBy('id', 'DESC')->where('status', 'YES')->get();

        return view('admin.document.form', $data);
    }

    public function update(DocumentRequest $request, $id)
    {
        $document = Document::findOrFail($id);

        $input = $request->all();
        $input['folder_id'] = $request->folder_name;
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $documentImage = $request->file('document_file');

        if ($documentImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('document_file')) . '.' . $request->file('document_file')->getClientOriginalExtension();
            $request->file('document_file')->move('uploads/document/', $imgName);

            if (file_exists('uploads/document/' . $document->document_file) && !empty($document->document_file)) {
                unlink('uploads/document/' . $document->document_file);
            }

            $input['document_file'] = $imgName;
        }

        unset($input['folder_name']);

        try {
            $document->update($input);
            return redirect(route('admin.document.index'))->with('success', 'Document updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Document::findOrFail($request->document_id);

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
            Document::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
