@extends('masterBackend')
@section('title', 'DATA | LAPORAN')


@section('backend')
    <div class="container">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4 py-4">Data Laporan</h1>
        <hr>
        <!-- DataTales Example -->
        <div class="row text-center">
            <div class="col-lg-6">
                <div class="card py-4">
                    <h5>Data Laporan Arsip Baru</h5>
                    <hr>
                    <h5>{{ $arsipBaru->count() }}</h5>
                </div>
                <a href="{{ route('detail-arsip-baru') }}" class="btn btn-warning mt-4 btn-block">Klik</a>
            </div>
            <div class="col-lg-6">
                <div class="card py-4">
                    <h5>Data Laporan Arsip Lama</h5>
                    <hr>
                    <h5>{{ $arsipLama->count() }}</h5>
                </div>
                <a href="{{ route('detail-arsip-lama') }}" class="btn btn-info mt-4 btn-block">Klik</a>
            </div>
        </div>

    </div>

@endsection
