@extends('users.home')

@section('title', 'Tambah Haki')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/tagsinput.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> Form Penambahan Luaran Haki</h4>
                    <form class="form" action="{{action('LuaranController@storeHaki', $pengajuan->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group m-t-40 row">
                            <input required class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                            <label for="jenis_haki" class="col-2 col-form-label">Jenis Haki</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id=jenis_haki" name="jenis_haki">
                                    <option value="">Pilih Jenis Haki</option>
                                    <option value="Hak Paten">Hak Paten</option>
                                    <option value="Hak Paten Sederhana">Hak Paten Sederhana</option>
                                    <option value="Hak Cipta">Hak Cipta</option>
                                    <option value="Hak Desain Produk Industri">Hak Desain Produk Industri</option>
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
                            <label for="penulis" class="col-2 col-form-label">Penulis</label>
                            <div class="tags-default col-10">
                                <input class="form-control" type="text" data-role="tagsinput" name="penulis" required>
                                <br>
                                <small class="form-control-feedback"> Tambahkan anggota dengan menekan <b>Enter</b> </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="abstrak" class="col-2 col-form-label">Abstrak</label>
                            <div class="col-10">
                                <textarea  class="form-control" name="abstrak" rows="8" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_pelaksanaan" class="col-2 col-form-label">Tanggal</label>
                            <div class="input-group col-10">
                                <input type="date" class="form-control" placeholder="DD/MM/YYYY" name="tanggal" required>
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
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