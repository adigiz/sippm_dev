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
//        $data['posts'] = Post::orderBy('created_at','desc')->get();
//        $id_post = Post::orderBy('created_at','desc')->get()->pluck('file_id');
//        $data['files'] = File::whereIn('id',$id_post)->get();
        $data['posts'] = DB::table('posts')
            ->leftJoin('files', 'posts.file_id', '=', 'files.id')
            ->select('posts.id','posts.judul', 'posts.isi', 'posts.created_at','nama_file')
            ->orderBy('posts.created_at','desc')
            ->paginate(2);

        return view('admin/post.index',$data);
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
        $file = $request->file('attach');
        $files = new File();
        $files->nama_file = time().'-'.$file->getClientOriginalName();
        $files->ukuran_file =  $file->getClientSize();
        $files->ekstensi_file = $file->getClientOriginalExtension();
        $nm = time().'-'.$file->getClientOriginalName();
        $file->move('uploads/file',$nm);
        $files->save();

        $id_file = $files->id;

        $data = new Post();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->users_id = Auth::guard('admin')->id();
        $data->file_id = $id_file;
        $data->save();
        return redirect()->route('post.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
        $id_file = $data->file_id;
        if(File::where('id',$id_file)->exists()){
            $file = File::where('id',$id_file)->first();
            $file_path = 'uploads/file/'.$file->nama_file;
            unlink($file_path);
            $file->delete();
        }
        $data->delete();
        return redirect()->route('post.index')->with('alert-success','Data berhasi dihapus!');
    }
}
