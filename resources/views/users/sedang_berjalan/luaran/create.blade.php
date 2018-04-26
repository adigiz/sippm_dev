@extends('users.home')

@section('title', 'Luaran Penelitian')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form class="form-horizontal" method='post' action="{{route('luaran.store')}}">
                        {{csrf_field()}}
                        <div class="form-group m-t-40 row">
                            <label for="judul_penelitian" class="col-2 col-form-label">Judul Penelitian</label>
                            <div class="col-10">
                                <input disabled  class="form-control" type="text" placeholder="{{$pengajuan->judul_penelitian}}">
                                <input  required class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" type="checkbox" id="jurnal" name="jurnal" value="1">
                                <label>Publikasi Ilmiah</label>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" type="checkbox" name="pertemuan_ilmiah" value="1">
                                <label>Pertemuan Ilmiah</label>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" type="checkbox" name="haki" value="1">
                                <label>Haki</label>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" type="checkbox" name="prototype" value="1">
                                <label>Prototype</label>
                            </label>
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