@extends('users.home')

@section('title', 'Tambah Riwayat Publikasi Ilmiah')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/tagsinput.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> Form Penambahan Riwayat Publikasi Ilmiah</h4>
                    <form class="form" action="{{route('riwayat.publikasi.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group m-t-40 row">
                            <label for="jenis_jurnal" class="col-2 col-form-label">Jenis Jurnal</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id=jenis_jurnal" name="jenis_jurnal">
                                    <option value="">Pilih Jenis Publikasi</option>
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
                            <label for="url" class="col-2 col-form-label">URL</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="url" required>
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
                            <label for="nama-jurnal" class="col-2 col-form-label">Nama Jurnal</label>
                            <div class="col-10">
                                <input  required class="form-control" type="text" name="nama_jurnal">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="issn" class="col-2 col-form-label">ISSN</label>
                            <div class="col-10">
                                <input  class="form-control" type="text" name="issn">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="volume" class="col-2 col-form-label">Volume</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" name="volume">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_jurnal" class="col-2 col-form-label">No Jurnal</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" name="no_jurnal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tahun" class="col-2 col-form-label">Tahun Publikasi</label>
                            <div class="col-10">
                                <input required class="form-control" type="text" name="tahun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="halaman" class="col-2 col-form-label">Halaman</label>
                            <div class="col-10">
                                <input required class="form-control" type="text"  name="halaman">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="abstrak" class="col-2 col-form-label">Abstrak</label>
                            <div class="col-10">
                                <textarea  class="form-control" name="abstrak" rows="8" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bukti" class="col-2 col-form-label">Upload Bukti</label>
                            <div class="col-10">
                                <input required class="form-control" type="file"  name="bukti">
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
@endsection