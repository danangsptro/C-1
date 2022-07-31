@extends('masterBackend')
@section('title', 'DATA | CREATE PASANGAN')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Data Pasangan</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="{{ route('data-pasangan-store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Pria</label>
                                <input type="text" class="form-control" placeholder="Masukan nama pria" name="nama_pria"
                                    required>
                                @error('nama_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan nama wanita"
                                    name="nama_wanita" required>
                                @error('nama_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Lahir Pria</label>
                                <input type="date" class="form-control" name="tanggal_lahir_pria" required>
                                @error('tanggal_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Lahir Wanita</label>
                                <input type="date" class="form-control" name="tanggal_lahir_wanita" required>
                                @error('tanggal_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat lahir pria</label>
                                <input type="text" class="form-control" name="tempat_lahir_pria"
                                    placeholder="Masukan tempat lahir pria" required>
                                @error('tempat_lahir_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat Lahir Wanita</label>
                                <input type="text" class="form-control" placeholder="Masuka tempat lahir wanita"
                                    name="tempat_lahir_wanita" required>
                                @error('tempat_lahir_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Warga Negara pria</label>
                                <input type="text" class="form-control" name="warga_negara_pria"
                                    placeholder="Masukan warga negara pria" required>
                                @error('warga_negara_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Warga Negara Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan warga negara wanita"
                                    name="warga_negara_wanita" required>
                                @error('warga_negara_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Agama Pria</label>
                                <input type="text" class="form-control" name="agama_pria"
                                    placeholder="Masukan agama pria" required>
                                @error('agama_pria')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Agama Wanita</label>
                                <input type="text" class="form-control" placeholder="Masukan agama wanita"
                                    name="agama_wanita" required>
                                @error('agama_wanita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Bin</label>
                                <input type="text" class="form-control" placeholder="Masukan bin"
                                    name="bin" required>
                                @error('bin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Binti</label>
                                <input type="text" class="form-control" placeholder="Masukan binti"
                                    name="binti" required>
                                @error('binti')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Status Pernikahan</label>
                                <input type="text" class="form-control" name="status_pernikahan" value="Belum Menikah"
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
                        <a href="{{ route('data-pasangan') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
