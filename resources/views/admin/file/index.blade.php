@extends('admin')

@section('title', 'Daftar File')
@section('breadcrumb','File')
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
                                            <form action="{{ route('file.destroy', $file->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                                <a href="{{asset("uploads/file/$file->nama_file")}}" class="btn btn-sm btn-info" >Download</a>
                                            </form>

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