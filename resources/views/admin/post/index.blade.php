@extends('admin')

@section('title', 'Berita')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-success'))
        <div class="alert alert-success">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
        </div>
    @endif
    <div class="row">
                <div class="col-12 m-t-30">
                    @foreach($data as $berita)
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">{{$berita->judul}}
                                <br>
                                    <small class="text-muted">{{$berita->created_at->format('d-m-Y')}}</small>
                                </h4>

                                <p class="card-text">{{$berita->isi}}</p>
                                <hr>
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
                </div>
    </div>
@endsection