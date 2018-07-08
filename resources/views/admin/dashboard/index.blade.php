@extends('admin')

@section('title', 'Dashboard')
@section('breadcrumb','Dashboard')

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-inverse card-info">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">{{$jumlah_dosen}}</h1>
                    <h6 class="text-white">Jumlah Dosen</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-primary card-inverse">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{$jumlah_pengajuan}}</h1>
                    <h6 class="text-white">Jumlah Pengajuan</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-inverse card-success">
                <div class="box text-center">
                    <h1 class="font-light text-white">{{$didanai}}</h1>
                    <h6 class="text-white">Total yang di Danai</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xlg-3">
            <div class="card card-inverse card-dark">
                <div class="box text-center">
                    <h1 class="font-light text-white">Rp. {{$total_dana}}</h1>
                    <h6 class="text-white">Total Dana yang Dikeluarkan</h6>
                </div>
            </div>
        </div>
    </div>
    {{--<div>{!! $chart->container() !!}</div>--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    {{--<div>{!! $chart->container() !!}</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js" charset="utf-8"></script>
    {{-- {!! $chart->script() !!}--}}
@endsection