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
                <form method="POST" action="{{ route('KelolaArsipDataBaruStore', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>No Akta</label>
                                <input type="text" class="form-control" placeholder="Masukan nama no akta" name="no_akta" value="{{$data->no_akta}}"
                                    required>
                                @error('no_akta')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan nama pria" name="nama_pria" value="{{$data->pasangan->nama_pria}}"
                                    required>
                                @error('nama_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan tempat lahir pria" name="tempat_lahir_pria" value="{{$data->pasangan->tempat_lahir_pria}}"
                                    required>
                                @error('tempat_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan nama pria" name="tanggal_lahir_pria" value="{{$data->pasangan->tanggal_lahir_pria}}"
                                    required>
                                @error('tanggal_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warga negara pria</label>
                                <input type="text" class="form-control" placeholder="Masukan nama warga negara pria" name="warga_negara_pria" value="{{$data->pasangan->warga_negara_pria}}"
                                    required>
                                @error('warga_negara_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan nama wanita"
                                    name="nama_wanita" required value="{{$data->pasangan->nama_wanita}}">
                                @error('nama_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan tempat lahir wanita"
                                    name="tempat_lahir_wanita" required value={{$data->pasangan->tempat_lahir_wanita}}>
                                @error('tempat_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan nama wanita" name="tanggal_lahir_wanita" value="{{$data->pasangan->tanggal_lahir_wanita}}"
                                    required>
                                @error('tanggal_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Warga negara wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan nama warga negara wanita" name="warga_negara_wanita" value="{{$data->pasangan->warga_negara_wanita}}"
                                    required>
                                @error('warga_negara_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Binti</label>
                                <input type="text" class="form-control" name="binti" value="{{$data->pasangan->binti}}"
                                    readonly required>
                                @error('binti')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat Pernikahan</label>
                                <input type="text" class="form-control" name="tempat_pernikahan" value="{{$data->tempat}}"
                                    readonly required>
                                @error('tempat_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Pernikahan</label>
                                <input type="text" class="form-control" name="tanggal_pernikahan" value="{{$data->tanggal_pernikahan}}"
                                    readonly required>
                                @error('tanggal_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 disabled">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status_arsip" value="Sudah Arsip" required>
                            </div>
                        </div>
                        <div class="col-lg-6 disabled">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="jenis_arsip" value="Arsip Baru" required>
                            </div>
                        </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>Status Pernikahan</label>
                                <input type="text" class="form-control" name="status_pernikahan" value="{{$data->status === 'Approved' ? 'Sudah Menikah' : 'Belum Menikah'}}"
                                    readonly required>
                                @error('status_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                        <a href="{{ route('KelolaArsipDataBaru') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
