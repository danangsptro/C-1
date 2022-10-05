@extends('masterBackend')
@section('title', 'DATA | ARSIP BARU')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kelola Arsip</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="{{ route('update-data-laporan', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>No Akta</label>
                                <input type="text" class="form-control" placeholder="Masukan nama no akta" name="no_akta"
                                    value="{{ $data->no_akta }}" required>
                                @error('no_akta')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan nama pria" name="nama_pria"
                                    value="{{ $data->nama_pria }}" required>
                                @error('nama_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan tempat lahir pria"
                                    name="tempat_lahir_pria" value="{{ $data->tempat_lahir_pria }}" required>
                                @error('tempat_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir Pria</label>
                                <input type="date" class="form-control" placeholder="Masukan nama pria"
                                    name="tanggal_lahir_pria" value="{{ $data->tanggal_lahir_pria }}" required>
                                @error('tanggal_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warga negara pria</label>
                                <input type="text" class="form-control" placeholder="Masukan nama warga negara pria"
                                    name="warga_negara_pria" value="{{ $data->warga_negara_pria }}" required>
                                @error('warga_negara_pria')
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
                            <div class="form-group">
                                <label>Tempat Lahir Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan tempat lahir wanita"
                                    name="tempat_lahir_wanita" required value={{ $data->tempat_lahir_wanita }}>
                                @error('tempat_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir Wanita</label>
                                <input type="date" class="form-control" placeholder="Masukan nama wanita"
                                    name="tanggal_lahir_wanita" value="{{ $data->tanggal_lahir_wanita }}" required>
                                @error('tanggal_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warga negara wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan nama warga negara wanita"
                                    name="warga_negara_wanita" value="{{ $data->warga_negara_wanita }}" required>
                                @error('warga_negara_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Bin</label>
                                <input type="text" class="form-control" name="bin" value="{{ $data->bin }}"
                                    required>
                                @error('bin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Binti</label>
                                <input type="text" class="form-control" name="binti" value="{{ $data->binti }}"
                                    required>
                                @error('binti')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat Pernikahan</label>
                                <input type="text" class="form-control" name="tempat_pernikahan"
                                    value="{{ $data->tempat_pernikahan }}" required>
                                @error('tempat_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Pernikahan</label>
                                <input type="date" class="form-control" name="tanggal_pernikahan"
                                    value="{{ $data->tanggal_pernikahan }}" required>
                                @error('tanggal_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 disabled">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status_arsip"
                                    value="{{ $data->status_arsip }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 disabled">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="jenis_arsip"
                                    value="{{ $data->jenis_arsip }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6 disabled">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status_pernikahan"
                                    value="{{ $data->status_pernikahan }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                        <a href="{{ route('detail-arsip-baru') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
