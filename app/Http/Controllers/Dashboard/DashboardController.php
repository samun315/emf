<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Eauction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data['program'] = DB::table('programs')->where('status', 'YES')->count();
        $data['project'] = DB::table('projects')->where('status', 'YES')->count();
        $data['event'] = DB::table('events')->where('status', 'YES')->count();
        $data['user'] = DB::table('users')->where('status', 'YES')->count();
        $data['blog'] = DB::table('blogs')->where('status', 'YES')->count();
        $data['folders'] = DB::table('folders')->get();

        return view('admin.dashboard', $data);
    }
}
