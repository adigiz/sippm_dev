
@extends('users.home')

@section('title', 'Luaran Penelitian')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                        <form method='post' action="{{route('luaran.update', $luaran->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group m-t-40 row">
                                <label for="judul_penelitian" class="col-2 col-form-label">Judul Penelitian</label>
                                <div class="col-10">
                                    <input disabled  class="form-control" type="text" placeholder="{{$pengajuan->judul_penelitian}}">
                                    <input  required class="form-control" type="hidden" name="pengajuan_id" value="{{$pengajuan->id}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="custom-control custom-checkbox">
                                    <input class="styled-checkbox" id="read" type="checkbox" id="jurnal" name="jurnal" value="@if($luaran->jurnal == NULL) 0 @else {{$luaran->jurnal}} @endif"
                                           @if( $luaran->jurnal == 1 )
                                                checked="1"
                                           @endif
                                    >
                                    <label>Publikasi Ilmiah</label>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="custom-control custom-checkbox">
                                    <input class="styled-checkbox" id="read1" type="checkbox" name="pertemuan_ilmiah" value="@if($luaran->pertemuan_ilmiah == NULL) 0 @else {{$luaran->pertemuan_ilmiah}} @endif"
                                           @if( $luaran->pertemuan_ilmiah == 1 )
                                           checked="1"
                                            @endif
                                    >
                                    <label>Pertemuan Ilmiah</label>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="custom-control custom-checkbox">
                                    <input class="styled-checkbox" id="read2" type="checkbox" name="haki" value="@if($luaran->haki == NULL) 0 @else {{$luaran->haki}} @endif"
                                           @if( $luaran->haki == 1 )
                                           checked="1"
                                            @endif
                                    >
                                    <label>Haki</label>
                                </label>
                            </div>
                            <div class="form-group row">
                                <label class="custom-control custom-checkbox">
                                    <input class="styled-checkbox" id="read3" type="checkbox" name="prototype" value="@if($luaran->prototype == NULL) 0 @else {{$luaran->prototype}} @endif"
                                           @if( $luaran->prototype == 1 )
                                           checked="1"
                                            @endif
                                    >
                                    <label>Prototype</label>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-right">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection