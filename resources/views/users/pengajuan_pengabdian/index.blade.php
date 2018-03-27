@extends('users.home')

@section('title', 'Daftar Pengajuan')
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
                    <h4 class="card-title">{{$pengajuan->judul_penelitian}}</h4>
                    <p>{{$pengajuan->abstrak}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection