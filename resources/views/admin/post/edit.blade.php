@extends('admin')

@section('title', 'Edit berita / pengumuman')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    @foreach($data as $berita)
                    <form class="form-horizontal form-material" method='post' action="{{route('post.update', $berita->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">Judul</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="judul" value="{{$berita->judul}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat" class="col-2 col-form-label">Isi</label>
                            <div class="col-10">
                                <textarea class="form-control" value="{{$berita->isi}}" name="isi"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection