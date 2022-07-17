@extends('masterBackend')
@section('title', 'DATA | KELOLA ARSIP BARU ')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Data Kelola Arsip Data Baru</h1>
        <hr>
        <a href="{{ route('laporan-pernikahan') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="text">Back to page laporan</span>
        </a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Kelola Arsip</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Akta</th>
                                <th>Nama Pria</th>
                                <th>Nama Wanita</th>
                                <th>Tanggal Pernikahan</th>
                                <th>Jam</th>
                                <th>Status Pernikahan</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_akta }}</td>
                                    <td>{{ $item->nama_pria }}</td>
                                    <td>{{ $item->nama_wanita }}</td>
                                    {{-- <td>{{ $item->tanggal_pernikahan }}</td>
                                    <td>{{ $item->jam_pernikahan }}</td> --}}
                                    <td>
                                        <span class="badge badge-success">Sudah Menikah</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('KelolaArsipDataBaruCreate', $item->id) }}"
                                            class="btn btn-warning"> Arsip | <i class="fas fa-pen"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
