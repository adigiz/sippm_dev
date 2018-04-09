@extends('users.home')

@section('title', 'Detail Pengajuan')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h3>Pengajuan Penelitian <span class="pull-right">{{$pengajuan->created_at->format('d M Y')}}</span></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                    <h3> <b>{{$pengajuan->judul_penelitian}}</b></h3>
                                    <h3 class="text-muted">{{$users->name}}</h3>
                                    <p class="text-muted m-l-5">Abstrak:
                                        <br/> {{$pengajuan->abstrak}}</p>
                                </address>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40" style="clear: both;">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Anggota</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@php $no = 1; @endphp--}}
                                    {{--@foreach($profile as $anggota)--}}
                                        {{--<tr>--}}
                                            {{--<td class="text-center">{{$no++}}</td>--}}
                                            {{--<td>{{$anggota->}}</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection