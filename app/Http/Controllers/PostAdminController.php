<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;
use Illuminate\Support\Facades\DB;

class PostAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if(Post::all() -> isNotEmpty()) {
            $data = DB::table('posts')
                ->leftjoin('files', 'posts.id', '=', 'files.post_id')
                ->select('posts.id','posts.judul', 'posts.isi', 'posts.created_at','nama_file')
                ->orderBy('posts.created_at','desc')
                ->paginate(2);
            return view('admin/post.index', compact('data'));
        }
        $data = NULL;
        return view('admin/post.index', compact('data'))->with('alert-warning','Belum ada pengumuman yang dibuat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Post();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->users_id = Auth::guard('admin')->id();
        $data->save();

        $file = $request->file('attach');
        $files = new File();
        if($file != null ){
            $files->nama_file = time().'-'.$file->getClientOriginalName();
            $files->ukuran_file =  $file->getClientSize();
            $files->ekstensi_file = $file->getClientOriginalExtension();
            $files-> post_id = $data ->id;
            $nm = time().'-'.$file->getClientOriginalName();
            $file->move('uploads/file',$nm);
            $files->save();
        }
        return redirect()->route('post.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::where('id',$id)->get();
        return view('admin/post.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Post::where('id',$id)->first();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();
        return redirect()->route('post.index')->with('alert-success','Data berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::where('id',$id)->first();
        if(File::where('post_id',$id)->exists()){
            $file = File::where('post_id',$id)->first();
            $file_path = 'uploads/file/'.$file->nama_file;
            unlink($file_path);
            $file->delete();
        }
        $data->delete();
        return redirect()->route('post.index')->with('alert-success','Data berhasi dihapus!');
    }
}
