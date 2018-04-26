@extends('users.home')

@section('title', 'Pertemuan Ilmiah')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-danger'))
        <div class="alert alert-success">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-danger') }}</strong>
            <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-xlg-6 col-md-6">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"></h4>
                    <strong>Judul Makalah</strong>
                    <br>
                    <p class="text-muted">{{$pertemuan->judul_penelitian}}</p>
                    <strong>Nama Anggota</strong>
                    <br>
                    @foreach($anggotas as $anggota)
                        <p class="text-muted">{{$anggota}}</p>
                    @endforeach
                    <strong>Nama Forum</strong>
                    <br>
                    <p class="text-muted">{{$pertemuan->nama_kegiatan}}</p>
                    <strong>Institusi Penyelenggara</strong>
                    <br>
                    <p class="text-muted">{{$pertemuan->penyelenggara}}</p>
                    <strong>Waku Pelaksanaan</strong>
                    <br>
                    <p class="text-muted">{{date('d-m-Y',strtotime($pertemuan->tgl_pelaksanaan))}}</p>
                    <strong>Tempat Pelaksanaan</strong>
                    <br>
                    <p class="text-muted">{{$pertemuan->tempat_pelaksanaan}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection