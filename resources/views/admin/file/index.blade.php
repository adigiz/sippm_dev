@extends('admin')

@section('title', 'Daftar File')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Daftar File</h4>
                    <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama File</th>
                                    <th>Ekstensi</th>
                                    <th>Ukuran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            @foreach($files as $file)
                                <tr>
                                    <td>{{$file->nama_file}}</td>
                                    <td>{{$file->ekstensi_file}}</td>
                                    <td>{{$file->ukuran_file}}</td>
                                    <td>
                                        <div class="col-sm-12 text-right">
                                            <a href="{{asset("uploads/file/$file->nama_file")}}" class="btn btn-info" >Download</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection