@extends('users.home')

@section('title', 'Berita')
@section('breadcrumb','Berita')
@section('content')
    <div class="row">
                <div class="col-12">
                    @foreach($data as $berita)
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title" style="margin-bottom: 0px">{{$berita->judul}}</h4>
                                <small class="card-subtitle">Di Posting pada {{date('d/m/Y', strtotime($berita->created_at))}}</small>
                                <hr>
                                <p class="card-text">{{$berita->isi}}
                                <br>
                                    @if($berita->nama_file != NULL)
                                        File attach: <a href="{{asset("uploads/file/")."/".$berita->nama_file}}">{{$berita->nama_file}}</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        {{$data->links()}}
                    </div>
                </div>
    </div>
@endsection