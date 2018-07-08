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
                                <input class="styled-checkbox" type="checkbox" id="read" name="jurnal" value="1">
                                <label for="read">Publikasi Ilmiah</label>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" type="checkbox" id="read1" name="pertemuan_ilmiah" value="1">
                                <label for="read1">Pertemuan Ilmiah</label>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" type="checkbox" id="read2" name="haki" value="1">
                                <label for="read2">Haki</label>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="custom-control custom-checkbox">
                                <input class="styled-checkbox" type="checkbox" id="read3" name="prototype" value="1">
                                <label for="read3">Prototype</label>
                            </label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                            </div>
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