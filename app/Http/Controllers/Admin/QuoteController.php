<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;
use App\Models\Quote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class QuoteController extends Controller
{
    public function index()
    {
        $results = Quote::orderBy('id', 'DESC')->paginate(10);

        return view('admin.quote.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.quote.form');
    }

    public function store(QuoteRequest $request)
    {

        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $quote_image = $request->file('author_image');

        if ($quote_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('author_image')) . '.' . $request->file('author_image')->getClientOriginalExtension();
            $request->file('author_image')->move('uploads/quote/', $imgName);
            $input['author_image'] = $imgName;
        }

        try {

            unset($input['_token']);

            Quote::create($input);
            return back()->with('success', 'Quote created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Quote::findOrFail($id);

        return view('admin.quote.form', $data);
    }

    public function update(QuoteRequest $request, $id)
    {
        $quote = Quote::findOrFail($id);

        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $quote_image = $request->file('author_image');

        if ($quote_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('author_image')) . '.' . $request->file('author_image')->getClientOriginalExtension();
            $request->file('author_image')->move('uploads/quote/', $imgName);

            if (file_exists('uploads/quote/' . $quote->author_image) && !empty($quote->author_image)) {
                unlink('uploads/quote/' . $quote->author_image);
            }

            $input['author_image'] = $imgName;
        }

        try {
            $quote->update($input);
            return redirect(route('admin.quotes.index'))->with('success', 'Quote updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Quote::findOrFail($request->quote_id);

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
            Quote::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
