<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class BlogController extends Controller
{
    public function index()
    {
        $results = DB::table('blogs as a')
            ->select('a.*', 'b.title as category_name')
            ->leftJoin('blog_categories as b', 'a.category_id', '=', 'b.id')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.blog.index', ['results' => $results]);
    }

    public function create()
    {
        $categories = DB::table('blog_categories')->orderBy('id', 'DESC')->get();

        return view('admin.blog.form', compact('categories'));
    }

    public function store(BlogRequest $request)
    {

        $input = $request->all();
        $input['category_id'] = $request->category_name;
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

        return view('admin.blog.form', $data);
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
            return redirect(route('admin.blog.index'))->with('success', 'Blog updated successfully.');
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

    public function updateBlogType(Request $request)
    {
        $data = Blog::findOrFail($request->blog_id);
        $input['blog_type'] = $request->blog_type;

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

    public function uploadCkeditorImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extention = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '-' . time() . '.' . $extention;

            $request->file('upload')->move(public_path('uploads/blog/ckeditor'), $fileName);

            $url = asset('uploads/blog/ckeditor/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function delete($id)
    {
        try {
            Blog::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);

        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
