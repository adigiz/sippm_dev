@extends('admin')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
@endsection
@section('title', 'Riwayat Pertemuan')
@section('breadcrumb','Riwayat Pertemuan')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('alert-warning'))
        <div class="alert alert-warning">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-warning') }}</strong>
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('alert-success'))
        <div class="alert alert-success">
            <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Riwayat Pertemuan</h4>
                    <h6 class="card-subtitle">Silahkan klik tombol <b>Download</b> untuk mengunduh file</h6>
                    <div class="table-responsive">
                        <table id="riwayat" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>
                                    Judul
                                </th>
                                <th>Jenis Riwayat</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>Judul Makalah</th>
                                <th>Nama Forum</th>
                                <th>Institusi Penyelenggara</th>
                                <th>Waktu Pelaksanaan</th>
                                <th>Tempat Pelaksanaan</th>
                            </tr>
                            </thead>
                            @php $no = 1; @endphp

                            @foreach($pertemuans as $pertemuan)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td>
                                        <b> {{$pertemuan->judul_penelitian}}</b>
                                        <br>
                                        <small>{{$pertemuan->nama_kegiatan}}
                                            | {{$pertemuan->penyelenggara}}
                                            | {{$pertemuan->tempat_pelaksanaan}}
                                            | tgl: {{$pertemuan->tgl_pelaksanaan}}
                                        </small>
                                    </td>
                                    <td>
                                        Pertemuan Ilmiah
                                    </td>
                                    <td>
                                        {{date('Y',strtotime($pertemuan->tgl_pelaksanaan))}}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm  btn-success" >Lihat Detail</a>
                                    </td>
                                    <td>{{$pertemuan->profils->name}}</td>
                                    <td>{{$pertemuan->judul_penelitian}}</td>
                                    <td>{{$pertemuan->nama_kegiatan}}</td>
                                    <td>{{$pertemuan->penyelenggara}}</td>
                                    <td>{{$pertemuan->tgl_pelaksanaan}}</td>
                                    <td>{{$pertemuan->tempat_pelaksanaan}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="{{asset('js/datatables.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#riwayat').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Rekap Pertemuan',
                        exportOptions: {
                            columns: [0,5,6,7,8,9,10]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Rekap Pertemuan',
                        exportOptions: {
                            columns: [ 0,5,6,7,8,9,10]
                        }
                    }
                ],
                "columnDefs": [
                    {
                        "targets": [ 5 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 6 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 7 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 8 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 9 ],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [ 10 ],
                        "visible": false,
                        "searchable": false
                    }
                ]
            } );
        } );
    </script>
@endsection