@extends('users.home')

@section('title', 'Profil')
@section('content')

    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-block">

                        <center class="m-t-30"> <img src="/uploads/avatar/{{$profile->avatar}}" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10">{{$profile->name}}</h4>
                            <h6 class="card-subtitle">{{$users->email}}</h6>
                        </center>
                        <div class="form-group">
                            <div class="col-sm-12 text-center">
                                <a class="btn btn-warning" role="button" href="{{ action('ProfileController@edit',$profile['id'])}}"> Edit Profile</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->

        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">

                    <div class="card-block">
                        <strong>NIPH</strong>
                        <br>
                        <p class="text-muted">{{$profile->niph}}</p>
                        <strong>Pangkat</strong>
                        <br>
                        <p class="text-muted">{{$profile->pangkat}}</p>
                        <strong>Jabatan</strong>
                        <br>
                        <p class="text-muted">{{$profile->jabatan}}</p>
                        <strong>Fakultas / Jurusan</strong>
                        <br>
                        <p class="text-muted">{{$profile->jurusans['nama_jurusan']}}</p>
                        <strong>Program Studi</strong>
                        <br>
                        <p class="text-muted">{{$profile->prodis['nama_prodi']}}</p>
                        <strong>Lab</strong>
                        <br>
                        <p class="text-muted">{{$profile->lab}}</p>
                        <strong>Alamat</strong>
                        <br>
                        <p class="text-muted">{{$profile->alamat}}</p>
                        <strong>Nomor Telfon</strong>
                        <br>
                        <p class="text-muted">{{$profile->no_telp}}</p>

                    </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection