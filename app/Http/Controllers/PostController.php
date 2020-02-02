<?php

namespace App\Http\Controllers;

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
            ->leftJoin('files', 'posts.id', '=', 'files.post_id')
            ->select('posts.id','posts.judul', 'posts.isi', 'posts.created_at','nama_file')
            ->orderBy('posts.created_at','desc')
            ->paginate(2);

        return view('users/post.index',compact('data'));
    }
}
