@extends('masterBackend')
@section('title', 'DATA | JADWAL PASANGAN')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Data Jadwal Pernikahan</h1>
        <hr>
        @if (Auth::user()->user_role === 'pegawai')
            <a href="{{ route('data-create-jadwal-pasangan') }}" class="btn btn-primary btn-icon-split mb-4">
                <span class="icon text-white-50">
                    <i class="menu-icon fa fa-plus-square"></i>
                </span>
                <span class="text">Create Jadwal Pernikahan</span>
            </a>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Jadwal Pernikahan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Pasangan</th>
                                <th>No Akta</th>
                                <th>Nama Penghulu</th>
                                <th>Nama Pasanagan</th>
                                <th>Tanggal Pernikahan</th>
                                <th>Jam Pernikahan</th>
                                <th>Tempat</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalPernikahan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{-- button modal --}}
                                        <a href="" class="btn btn-info" data-toggle="modal"
                                            data-target="#exampleModal{{ $loop->iteration }}">
                                           Klik untuk melihat!</i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade text-left" id="exampleModal{{ $loop->iteration }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel{{ $loop->iteration }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel{{ $loop->iteration }}">Detail Jadwal
                                                            Produksi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label>Foto pria</label><br>
                                                                <img src="{{ Storage::url($item->pasangan->foto_pria) }}"
                                                                    width="100%" alt="wdw">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Foto Wanita</label><br>
                                                                <img src="{{ Storage::url($item->pasangan->foto_wanita) }}"
                                                                    width="100%" alt="wdw">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->no_akta ? $item->no_akta : '-' }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td><strong>Nama Pria : </strong>{{ $item->pasangan->nama_pria }} | <strong>Nama Wanita
                                            : </strong>{{ $item->pasangan->nama_wanita }}</td>
                                    <td>{{ $item->tanggal_pernikahan }}</td>
                                    <td>{{ $item->jam_pernikahan }}</td>
                                    <td>{{ $item->tempat }}</td>
                                    <td class=" text-center">
                                        @if ($item->status === 'Rejected')
                                            <strong class="text-danger">{{ $item->status }}</strong>
                                        @else
                                            <strong class="text-success">{{ $item->status }}</strong>
                                        @endif
                                    </td>
                                    <td class="text-center">

                                        @if (Auth::user()->user_role === 'pegawai')
                                            @if ($item->status === 'Rejected')
                                                <a href="{{route('data-edit-jadwal-pernikahan', $item->id)}}" class="btn btn-info btn-circle">
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                <form action="{{ route('data-delete-jadwal-pernikahan', $item->id) }}"
                                                    class="d-inline" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-circle"
                                                        onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        @else
                                            @if ($item->status === 'Rejected')
                                                <form action="{{ route('data-approved-jadwal-pernikahan', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('post')
                                                    <button class="btn btn-success" onclick="return confirm('Approved ?')">
                                                        <i class="fas fa-check"></i>
                                                        Approved
                                                    </button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        @endif
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
