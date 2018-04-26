@extends('users.home')

@section('title', 'Tambah Profil')
@section('content')

    <div class="row">
        <div class="col-12 m-t-30">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" enctype="multipart/form-data" method='post' action="{{route('profil.store')}}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Nama</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-2 col-form-label">Foto Profil</label>
                            <div class="col-10">
                                <input class="form-control-file" type="file"  name="avatar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">NIPH</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="niph">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat" class="col-2 col-form-label">Pangkat</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="pangkat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">Jabatan</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="jabatan">
                            </div>
                        </div>
                        {{--<div class="form-group row">--}}
                            {{--<label for="jurusan" class="col-2 col-form-label">Jurusan</label>--}}
                            {{--<div class="col-10">--}}
                                {{--<input class="form-control" type="text"  name="jurusan">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group row">--}}
                            {{--<label for="prodi" class="col-2 col-form-label">Prodi</label>--}}
                            {{--<div class="col-10">--}}
                                {{--<input class="form-control" type="text"  name="prodi">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group row">
                            <label for="jurusan" class="col-2 col-form-label">Jurusan</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id="jurusan" name="jurusan">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach ($jurusan as $jurusans)
                                        <option value="{{ $jurusans->id }}"> {{ $jurusans->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodi" class="col-2 col-form-label">Prodi</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id="prodi" name="prodi">
                                    <option value="">Pilih Prodi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodi" class="col-2 col-form-label">Lab</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="lab">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodi" class="col-2 col-form-label">Alamat</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodi" class="col-2 col-form-label">No Telfon</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="no_telp">
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