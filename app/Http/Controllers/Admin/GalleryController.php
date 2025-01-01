<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Programs;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $members = DB::table('member_galleries')->orderBy('id', 'DESC')->where('status', 'YES')->get(['id', 'caption', 'image', 'type']);
        return view('admin.gallery.index', compact('members'));
    }
}
