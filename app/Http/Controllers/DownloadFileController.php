<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
class DownloadFileController extends Controller
{
    public function index()
    {
        $data['files'] = File::orderBy('id','DESC')->get();

        return view('users.download.index',$data);
    }
}
