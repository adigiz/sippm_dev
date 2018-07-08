<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('posts')
            ->leftJoin('files', 'posts.file_id', '=', 'files.id')
            ->select('posts.id','posts.judul', 'posts.isi', 'posts.created_at','nama_file')
            ->orderBy('posts.created_at','desc')
            ->paginate(2);

        return view('users/post.index',compact('data'));
    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        return view('users/post.create');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $data = new Post();
//        $data->judul = $request->judul;
//        $data->isi = $request->isi;
//        $data->users_id = Auth::id();
//        $data->save();
//        return redirect()->route('post.index')->with('alert-success','Berhasil Menambahkan Data!');
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Post $post)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        $data = Post::where('id',$id)->get();
//        return view('users/post.edit',compact('data'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        $data = Post::where('id',$id)->first();
//        $data->judul = $request->judul;
//        $data->isi = $request->isi;
//        $data->save();
//        return redirect()->route('post.index')->with('alert-success','Data berhasil diubah!');
//
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $data = Post::where('id',$id)->first();
//        $data->delete();
//        return redirect()->route('post.index')->with('alert-success','Data berhasi dihapus!');
//    }
}
