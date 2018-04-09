<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileAdminController extends Controller
{
    public function index()
    {
        $data['files'] = File::orderBy('id','DESC')->get();

        return view('admin/file.index',$data);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $data = new File();
        $data->nama_file = $file->getClientOriginalName();
        $data->ukuran_file =  $file->getClientSize();
        $data->ekstensi_file = $file->getClientOriginalExtension();
        $nm = $file->getClientOriginalName();
        $file->move('uploads/file',$nm);
        $data->save();
        return redirect()->route('file.index')->with('alert-success','Berhasil Mengupload File!');
    }
    public function create()
    {
        return view('admin/file.create');
    }
}
