@extends('users.home')

@section('title', 'Prototype')
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
                    <strong>Judul</strong>
                    <br>
                    <p class="text-muted">{{$prototype->judul_penelitian}}</p>
                    <strong>Nama Anggota</strong>
                    <br>
                    @foreach($anggotas as $anggota)
                        <li style="margin-left: 15px" class="text-muted">{{$anggota}}</li>
                    @endforeach
                    <br>
                    <strong>Jenis Prototype</strong>
                    <br>
                    <p class="text-muted">{{$prototype->jenis_prototype}}</p>
                    <br>
                    <a href="{{asset("uploads/file/$prototype->gambar")}}" class="btn btn-sm  btn-success" >Gambar</a>
                </div>
            </div>
        </div>
    </div>

@endsection