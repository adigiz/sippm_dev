@extends('admin')

@section('title', 'Pengumuman')
@section('breadcrumb','Pengumuman')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-success'))
        <div class="alert alert-success">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            @foreach($posts as $berita)
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">{{$berita->judul}}
                            <br>
                            <small class="text-muted">{{date('d-m-Y',strtotime($berita->created_at))}}</small>
                        </h4>

                        <hr>
                        <p class="card-text">
                            {{$berita->isi}}
                            <br>
                            @if($berita->nama_file != NULL)
                                <a href="{{asset("uploads/file/")."/".$berita->nama_file}}">{{$berita->nama_file}}</a>
                            @endif

                        </p>
                    </div>
                    <form action="{{ route('post.destroy', $berita->id) }}" method="post">
                        <div class="card-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('post.edit',$berita->id) }}" class=" btn btn-warning">Edit</a>
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </div>
                    </form>
                </div>
            @endforeach
            <div class="text-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection