@extends('admin')

@section('title', 'Buat berita / pengumuman')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" method='post' action="{{route('post.store')}}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="judul" class="col-2 col-form-label">Judul</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="judul">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi" class="col-2 col-form-label">Isi</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" rows="5" name="isi"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-success" type="submit">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection