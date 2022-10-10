@extends('masterBackend')
@section('title', 'DATA | EDIT PASANGAN')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pasangan</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="{{ route('data-pasangan-update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Info Dokumen Pendukung</label>
                                <br>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <strong>Klik!</strong>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><strong>Data Lampiran Calon Pasangan</strong></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <li>N1, N2, N3 & N4</li>
                                                <li>Ktp, KK, akte kelahiran/ijazah</li>
                                                <li>Surat keterangan wali / nasab</li>
                                                <hr>
                                                <i class="text-danger">Semua Dokumen yang tertera diatas di jadikan 1 file dengan format pdf dengan max 2 mb</i>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Dokumen Pendukung - Pria</label>
                                <input type="file" class="form-control" name="dokumen_pendukung_pria"  value="{{$data->dokumen_pendukung_pria}}">
                                @error('dokumen_pendukung_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Dokumen Pendukung - Wanita</label>
                                <input type="file" class="form-control" name="dokumen_pendukung_wanita"  value="{{$data->dokumen_pendukung_wanita}}">
                                @error('dokumen_pendukung_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan nama pria" name="nama_pria"
                                    required value="{{ $data->nama_pria }}">
                                @error('nama_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan nama wanita"
                                    name="nama_wanita" required value="{{ $data->nama_wanita }}">
                                @error('nama_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Lahir Pria</label>
                                <input type="date" class="form-control" placeholder="Masukan tanggal lahir pria"
                                    name="tanggal_lahir_pria" required value="{{ $data->tanggal_lahir_pria }}">
                                @error('tanggal_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Lahir Wanita</label>
                                <input type="date" class="form-control" placeholder="Masukan tanggal lahir wanita"
                                    name="tanggal_lahir_wanita" required value="{{ $data->tanggal_lahir_wanita }}">
                                @error('tanggal_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat Lahir Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan tempat lahir pria"
                                    name="tempat_lahir_pria" required value="{{ $data->tempat_lahir_pria }}">
                                @error('tempat_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat Lahir Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan tempat lahir wanita"
                                    name="tempat_lahir_wanita" required value="{{ $data->tempat_lahir_wanita }}">
                                @error('tempat_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Warga Negara Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan warga negara pria"
                                    name="warga_negara_pria" required value="{{ $data->warga_negara_pria }}">
                                @error('warga_negara_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Warga Negara Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan warga negara wanita"
                                    name="warga_negara_wanita" required value="{{ $data->warga_negara_wanita }}">
                                @error('warga_negara_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Agama Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan agama pria"
                                    name="agama_pria" required value="{{ $data->agama_pria }}">
                                @error('agama_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Agama Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan agama wanita"
                                    name="agama_wanita" required value="{{ $data->agama_wanita }}">
                                @error('agama_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label> Bin</label>
                                <input type="text" class="form-control" placeholder="Masukan Bin"
                                    name="bin" required value="{{ $data->bin }}">
                                @error('bin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Binti</label>
                                <input type="text" class="form-control" placeholder="Masukan Binti"
                                    name="binti" required value="{{ $data->binti }}">
                                @error('binti')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Status Pernikahan</label>
                                <input type="text" class="form-control" name="status_pernikahan" readonly required
                                    value="{{ $data->status_pernikahan }}">
                                @error('status_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                        <a href="{{ route('data-pasangan') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
