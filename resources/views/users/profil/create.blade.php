@extends('users.home')

@section('title', 'Tambah Profil')
@section('breadcrumb','Tambah Profil')
@section('parent-bread')
    <a href="{{route('profil.index')}}">Profil</a>
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-warning'))
        <div class="alert alert-warning">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-warning') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Tambah Profil</h4>
                    <h6 class="card-subtitle">Silahkan mengisi semua kolom yang disediakan di bawah</h6>
                    <form class="form-horizontal" enctype="multipart/form-data" method='post' action="{{route('profil.store')}}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Nama</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="name" required value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-2 col-form-label">Foto Profil</label>
                            <div class="col-10">
                                <input class="form-control" type="file"  name="avatar" value="{{old('avatar')}}">
                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback error">
                                        <strong style="color: red">{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">NIPH</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="niph" required value="{{old('niph')}}">
                                @if ($errors->has('niph'))
                                    <span class="invalid-feedback">
                                        <strong style="color: red">{{ $errors->first('niph') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat" class="col-2 col-form-label">Pangkat</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="pangkat" required value="{{old('pangkat')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">Jabatan</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="jabatan" required value="{{old('jabatan')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jurusan" class="col-2 col-form-label">Jurusan</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id="jurusan" name="jurusan" required>
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
                                <select class="custom-select col-12" id="prodi" name="prodi" required>
                                    <option value="">Pilih Prodi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lab" class="col-2 col-form-label">Lab</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="lab" required value="{{old('lab')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-2 col-form-label">Alamat</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="alamat" required value="{{old('alamat')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-2 col-form-label">No Telfon</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="no_telp" required value="{{old('no_telp')}}">
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
