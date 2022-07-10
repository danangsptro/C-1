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
                    <h5>Data Sudah Menikah</h5>
                    <hr>
                    <h5>{{$approved->count()}}</h5>
                </div>
                <a href="{{route('status-pernikahan-approved')}}" class="btn btn-primary mt-4 btn-block">Klik</a>
            </div>
            <div class="col-lg-6">
                <div class="card py-4">
                    <h5>Data Belum Menikah</h5>
                    <hr>
                    <h5>{{$rejected->count()}}</h5>
                </div>
                <a href="{{route('status-pernikahan-rejected')}}" class="btn btn-danger mt-4 btn-block">Klik</a>
            </div>
        </div>

    </div>

@endsection
