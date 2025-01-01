<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $results = BlogCategory::orderBy('id', 'DESC')->paginate(10);

        return view('admin.blog_category.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.blog_category.form');
    }

    public function store(BlogCategoryRequest $request)
    {

        $input                  = $request->all();
        $input['created_by']    = session('logged_session_data.id');
        $input['created_at']    = Carbon::now();

        try {

            unset($input['_token']);

            BlogCategory::create($input);
            return redirect()->back()->with('success', 'Blog category created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = BlogCategory::findOrFail($id);
        return view('admin.blog_category.form', $data);
    }

    public function update(BlogCategoryRequest $request, $id)
    {
        $category               = BlogCategory::findOrFail($id);
        $input                  = $request->all();
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        try {
            $category->update($input);
            return redirect(route('admin.blog.category.index'))->with('success', 'Blog category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = BlogCategory::findOrFail($request->blog_category_id);
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
            BlogCategory::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
