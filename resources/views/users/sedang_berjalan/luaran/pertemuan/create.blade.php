@extends('users.home')

@section('title', 'Tambah Pertemuan Ilmiah')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/tagsinput.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> Form Penambahan Luaran Pertemuan Ilmiah</h4>
                    <form class="form" action="{{action('LuaranController@storePertemuan', $pengajuan->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group m-t-40 row">
                            <input required class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                            <label for="jenis_pertemuan" class="col-2 col-form-label">Jenis Pertemuan</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id=jenis_pertemuan" name="jenis_pertemuan" required>
                                    <option value="">Pilih Jenis Pertemuan</option>
                                    <option value="Jurnal Nasional">Nasional</option>
                                    <option value="Jurnal Internasional">Internasional</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="judul-penelitian" class="col-2 col-form-label">Judul Penelitian</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="judul_penelitian" required>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="tim_penulis" class="col-2 col-form-label">Tim Penulis</label>
                            <div class="tags-default col-10">
                                <input class="form-control" type="text" data-role="tagsinput" name="tim_penulis" required>
                                <br>
                                <small class="form-control-feedback"> Tambahkan anggota dengan menekan <b>Enter</b> </small>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="nama_kegiatan" class="col-2 col-form-label">Nama Kegiatan</label>
                            <div class="col-10">
                                <input  required class="form-control" type="text" name="nama_kegiatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_pelaksanaan" class="col-2 col-form-label">Tanggal Pelaksanaan</label>
                            <div class="input-group col-10">
                                <input type="date" class="form-control" placeholder="DD/MM/YYYY" name="tgl_pelaksanaan">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_pelaksanaan" class="col-2 col-form-label">Tempat Pelaksanaan</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" name="tempat_pelaksanaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penyelenggara" class="col-2 col-form-label">Penyelenggara</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" name="penyelenggara">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="abstrak" class="col-2 col-form-label">Abstrak</label>
                            <div class="col-10">
                                <textarea  class="form-control" name="abstrak" rows="8" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-success" type="submit">Tambahkan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascripts')
    <script type="text/javascript" charset="utf8" src="{{asset('js/tagsinput.min.js')}}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
@endsection