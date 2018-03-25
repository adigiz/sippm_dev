@extends('users.home')

@section('title', 'Berita')
@section('content')
    <div class="row">
                <div class="col-12 m-t-30">
                    @foreach($data as $berita)
                        <div class="card">
                            <div class="card-block">
                                <h4>{{$berita->judul}}</h4>
                                <p class="card-text">{{$berita->isi}}</p>
                                <hr>
                            </div>
                            {{--<form action="{{ route('post.destroy', $berita->id) }}" method="post">--}}
                                {{--<div class="card-block">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--<a href="{{ route('post.edit',$berita->id) }}" class=" btn btn-warning">Edit</a>--}}
                                {{--<button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        </div>
                    @endforeach
                </div>
    </div>
@endsection