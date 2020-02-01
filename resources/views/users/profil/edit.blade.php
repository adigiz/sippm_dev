@extends('users.home')

@section('title', 'Edit Profil')
@section('parent-bread')
    <a href="{{route('profil.index')}}">Profil</a>
@endsection
@section('breadcrumb','Edit Profil')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="/uploads/avatar/{{$profile->avatar}}" class="img-circle" width="150" />
                        <br>
                        <br>
                        <h4 class="card-title">{{$users->email}}</h4>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal form-material" method='post' action="{{action('ProfileController@update',$profile->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">Nama</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="name" value="{{$profile['name']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-2 col-form-label">Foto Profil</label>
                            <div class="col-10">
                                <input class="form-control" type="file"  name="avatar" value="{{$profile['avatar']}}">
                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback">
                                        <strong style="color: red">{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">NIPH</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="niph" value="{{$profile['niph']}}">
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
                                <input class="form-control" type="text"  name="pangkat" value="{{$profile['pangkat']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-2 col-form-label">Jabatan</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="jabatan" value="{{$profile['jabatan']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-2 col-form-label">Jurusan</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id="jurusan" name="jurusan">
                                    <option value="{{$profile->jurusan_id}}">Pilih Jurusan</option>
                                    @foreach ($jurusan as $jurusans)
                                        <option value="{{ $jurusans->id}}"> {{ $jurusans->nama_jurusan }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodi" class="col-2 col-form-label">Prodi</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id="prodi" name="prodi">
                                    <option value="{{$profile->prodi_id}}">Pilih Prodi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-datetime-local-input" class="col-2 col-form-label">Lab</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$profile['lab']}}" id="lab" name="lab">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Alamat</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$profile['alamat']}}" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-2 col-form-label">No Telfon</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$profile['no_telp']}}" id="no_telp" name="no_telp">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
