@extends('users.home')

@section('title', 'Edit Profil')
@section('content')

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="/uploads/avatar/{{$profile->avatar}}" class="img-circle" width="150" />
                        <br>
                        {{--<form enctype="multipart/form-data" action="{{action('ProfileController@update',$profile->id)}}" method="POST"></form>--}}
                        {{--<input name="_method" type="hidden" value="PUT">--}}
                        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        {{--<label class="btn btn-info text-center">--}}
                            {{--Upload Foto <input type="file" name="avatar" hidden>--}}
                        {{--</label>--}}
                        <h6 class="card-subtitle">{{$users->email}}</h6>

                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->

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
                                <input class="form-control-file" type="file"  name="avatar" value="{{$profile['avatar']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="niph" class="col-2 col-form-label">NIPH</label>
                            <div class="col-10">
                                <input class="form-control" type="text"  name="niph" value="{{$profile['niph']}}">
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
                                    {{--@foreach($jurusan as $jurusans)--}}
                                    {{--<option value="{{$jurusans->id}}">{{$jurusans->nama_jurusan}}</option>--}}
                                    {{--@endforeach--}}
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
                                    {{--<option value="{{ $prodis->id}}"> {{ $prodis->nama_prodis }}</option>--}}
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
                            <label for="example-month-input" class="col-2 col-form-label">No Telfon</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="{{$profile['no_telp']}}" id="no_telp" name="no_telp">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
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