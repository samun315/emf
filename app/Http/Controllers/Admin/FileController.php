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

class FileController extends Controller
{
    public function index($id)
    {
        //dd($id);
        //$results = DB::table('documents as a')
        $results = DB::table('documents')->where('folder_id', $id)->where('status', 'YES')->get();
        //dd($results);
        //print($results);
        return view('admin.document.file', ['results' => $results]);
    }

}
