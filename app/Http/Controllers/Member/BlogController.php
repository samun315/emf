<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class BlogController extends Controller
{
    public function index()
    {
        $created_by = session('logged_session_data.id');

        $results = DB::table('blogs as a')
            ->select('a.*', 'b.title as category_name')
            ->leftJoin('blog_categories as b', 'a.category_id', '=', 'b.id')
            ->orderBy('id', 'DESC')
            ->where('a.created_by', $created_by)
            ->paginate(10);

        return view('member.blog.index', ['results' => $results]);
    }

    public function create()
    {
        $categories = DB::table('blog_categories')->orderBy('id', 'DESC')->get();

        return view('member.blog.form', compact('categories'));
    }

    public function store(BlogRequest $request)
    {

        $input = $request->all();
        $input['category_id'] = $request->category_name;
        $input['blog_type'] = 'PRIVATE';
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $blogImage = $request->file('banner_img');

        if ($blogImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/blog/', $imgName);
            $input['banner_img'] = $imgName;
        }

        try {

            unset($input['_token']);

            Blog::create($input);
            return redirect()->back()->with('success', 'Blog created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['categories'] = DB::table('blog_categories')->orderBy('id', 'DESC')->get();
        $data['editModeData'] = Blog::findOrFail($id);

        return view('member.blog.form', $data);
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $input = $request->all();
        $input['category_id'] = $request->category_name;
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $blogImage = $request->file('banner_img');

        if ($blogImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/blog/', $imgName);

            if (file_exists('uploads/blog/' . $blog->banner_img) && !empty($blog->banner_img)) {
                unlink('uploads/blog/' . $blog->banner_img);
            }

            $input['banner_img'] = $imgName;
        }

        try {
            $blog->update($input);
            return redirect(route('member.blog.index'))->with('success', 'Blog updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Blog::findOrFail($request->blog_id);
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
            Blog::where('id', $id)->delete();
            return back()->with('success', 'Deleted successfully');
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
