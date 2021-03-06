@extends('admin')

@section('title', 'Pengumuman')
@section('parent-bread')
    <a href="{{route('post.index')}}">Pengumuman</a>
@endsection
@section('breadcrumb','Tambah Pengumuman')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form autocomplete="off"  method='post' action="{{route('post.store')}}" enctype="multipart/form-data">
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
                        <div class="form-group row">
                            <label for="file" class="col-2 col-form-label">Attach File</label>
                            <div class="col-10">
                                <input type="file" class="form-control" name="attach">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-success" type="submit">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection