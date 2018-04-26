@extends('users.home')

@section('title', 'Tambah Prototype')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/tagsinput.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> Form Penambahan Luaran Prototype</h4>
                    <form class="form" action="{{action('LuaranController@storePrototype', $pengajuan->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group m-t-40 row">
                            <input required class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                            <label for="jenis_prototype" class="col-2 col-form-label">Jenis Prototype</label>
                            <div class="col-10">
                                <select class="custom-select col-12" id=jenis_prototype" name="jenis_prototype">
                                    <option value="">Pilih Jenis Prototype</option>
                                    <option value="Model">Model</option>
                                    <option value="Purwarupa">Purwarupa</option>
                                    <option value="Desain">Desain</option>
                                    <option value="Karya Seni">Karya Seni</option>
                                    <option value="Rekayasa Sosial">Rekayasa Sosial</option>
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
                        <div class="form-group m-t-40 row">
                            <label for="judul-penelitian" class="col-2 col-form-label">Gambar</label>
                            <div class="col-10">
                                <input required type="file" class="form-control" name="gambar">
                                <small class="form-control-feedback"> File yang di upload berupa <b>.jpg</b> / <b>.png</b> </small>
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