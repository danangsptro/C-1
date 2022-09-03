@extends('masterBackend')
@section('title', 'DATA | PASANGAN')


@section('backend')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center mb-4 mt-4">Data Pasangan</h1>
        <hr>
        <a href="{{ route('data-pasangan-create') }}" class="btn btn-primary btn-icon-split mb-4">
            <span class="icon text-white-50">
                <i class="menu-icon fa fa-plus-square"></i>
            </span>
            <span class="text">Create Pasangan</span>
        </a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Pasangan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>img</th> --}}
                                <th>Nama Pria</th>
                                <th>Nama Wanita</th>
                                <th>Status Pernikahan</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td><img src="{{ Storage::url($item->foto_pria) }}" alt=""></td> --}}
                                    <td>{{ $item->nama_pria }}</td>
                                    <td>{{ $item->nama_wanita }}</td>
                                    @if ($item->status_pernikahan === 'Sudah Menikah')
                                        <td class="text-success"><strong>{{ $item->status_pernikahan }}</strong></td>
                                        <td class="text-center"><strong>-</strong></td>
                                    @else
                                        <td class="text-danger"><stro   ng>{{ $item->status_pernikahan }}</strong></td>
                                        <td class="text-center">
                                            <a href="{{ route('data-pasangan-edit', $item->id) }}"
                                                class="btn btn-info btn-circle">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            {{-- button modal --}}
                                            <a href="" class="btn btn-warning btn-circle" data-toggle="modal"
                                                data-target="#exampleModal{{ $loop->iteration }}">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="exampleModal{{ $loop->iteration }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel{{ $loop->iteration }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel{{ $loop->iteration }}">Detail
                                                                Pasangan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <label>Nama Pria</label><br>
                                                                    <input class="form-control"
                                                                        required disabled value="{{ $item->nama_pria }}">
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Foto Wanita</label><br>
                                                                    <input class="form-control"
                                                                        required disabled value="{{ $item->nama_wanita }}">
                                                                </div>
                                                                <div class="col-lg-6 mt-2">
                                                                    <label>Tanggal Lahir Pria</label><br>
                                                                    <input class="form-control" name="tanggal_lahir_pria"
                                                                        required disabled value="{{ $item->tanggal_lahir_pria }}">
                                                                </div>
                                                                <div class="col-lg-6 mt-2">
                                                                    <label>Tanggal Lahir Wanita</label><br>
                                                                    <input class="form-control"
                                                                        required disabled value="{{ $item->tanggal_lahir_wanita }}">
                                                                </div>
                                                                <div class="col-lg-6 mt-2">
                                                                    <label>Agama Pria</label><br>
                                                                    <input class="form-control"
                                                                        required disabled value="{{ $item->agama_pria }}">
                                                                </div>
                                                                <div class="col-lg-6 mt-2">
                                                                    <label>Agama Wanita</label><br>
                                                                    <input class="form-control"
                                                                        required disabled value="{{ $item->agama_wanita }}">
                                                                </div>
                                                                <div class="col-lg-6 mt-2">
                                                                    <label>Bin</label><br>
                                                                    <input class="form-control"
                                                                        required disabled value="{{ $item->bin }}">
                                                                </div>
                                                                <div class="col-lg-6 mt-2">
                                                                    <label>Binti</label><br>
                                                                    <input class="form-control"
                                                                        required disabled value="{{ $item->binti }}">
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

                                            <form action="{{ route('data-pasangan-delete', $item->id) }}" class="d-inline"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-circle"
                                                    onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
