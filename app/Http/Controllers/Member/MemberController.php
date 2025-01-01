<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members = DB::table('member_details as a')
            ->select('a.*', 'b.name as user_name', 'b.email as user_email', 'b.phone_number as user_phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->orderBy('a.id', 'DESC')
            ->get();

        return view('member.member.index', compact('members'));
    }

    public function memberGallery()
    {
        $galleries = DB::table('member_galleries')->orderBy('id', 'DESC')
            ->where('status', 'YES')
            // ->where('user_id', session('logged_session_data.id'))
            ->get(['id', 'caption', 'image', 'type']);

        return view('member.gallery.index', compact('galleries'));
    }

    public function viewMemberData($id)
    {
        $member = DB::table('member_details as a')
            ->select('a.*', 'b.name as user_name', 'b.email as user_email', 'b.phone_number as user_phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->where('a.user_id', $id)
            ->first();

        $galleries = DB::table('member_galleries')->orderBy('id', 'DESC')
            ->where('status', 'YES')
            ->where('user_id', $id)
            ->get(['id', 'caption', 'image', 'type']);$members = DB::table('member_galleries')->orderBy('id', 'DESC')->where('status', 'YES')->get(['id', 'caption', 'image', 'type']);

        return view('member.member.view', compact('member', 'galleries'));
    }

    public function memberBlogList()
    {
        $results = DB::table('blogs as a')
            ->select('a.*', 'a.id as blog_id', 'b.title as category_name')
            ->leftJoin('blog_categories as b', 'a.category_id', '=', 'b.id')
            ->orderBy('id', 'DESC')
            ->where('a.blog_type', 'PRIVATE')
            ->paginate(10);

        return view('member.member_blog.index', compact('results'));
    }

    public function viewMemberBlog($blog_id)
    {
        $data['result'] = DB::table('blogs as a')
            ->select('a.*', 'a.id as blog_id', 'b.name as user_name', 'c.passport_photo as member_photo')
            ->leftJoin('users as b', 'a.created_by', '=', 'b.id')
            ->leftJoin('member_details as c', 'a.created_by', '=', 'c.user_id')
            ->where('a.id', $blog_id)
            ->first();

            // dd($data['result']);

        //Insert blog views table
        $makeBlogViewData = [];

        $makeBlogViewData['blog_id'] = $blog_id;
        $makeBlogViewData['view_count'] = 1;

        $get_blog_view_by_blog_id = DB::table('blog_views')->where('blog_id', $blog_id)->first();

        if (!empty($get_blog_view_by_blog_id)) {

            $makeBlogViewData['view_count'] = $get_blog_view_by_blog_id->view_count + 1;
            DB::table('blog_views')->where('id', $get_blog_view_by_blog_id->id)->update($makeBlogViewData);
        } else {
            DB::table('blog_views')->insert($makeBlogViewData);
        }

        $data['recent_posts'] = DB::table('blogs')->orderBy('id', 'DESC')->where('blog_type', 'PRIVATE')->take(5)->get();

        return view('member.member_blog.view', $data);
    }


    public function memberVideo(){
        return view('member.video_gallery.index');
    }
}
