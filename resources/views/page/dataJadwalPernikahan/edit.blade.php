@extends('masterBackend')
@section('title', 'DATA | EDIT PASANGAN')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }

        .name-pasangan {
            display: di
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Jadwal Pasangan</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="{{ route('data-update-jadwal-pernikahan', $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="index_id"><strong>Nama Penghulu</strong></label>
                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select name="user_id" class="custom-select" id="inputGroupSelect01">
                                        @foreach ($user as $ds)
                                            @if ($ds->user_role === 'Penghulu')
                                                <option value="{{ $ds->id }}"
                                                    {{ old('user_id') ?? $data->user_id == $ds->id ? 'selected' : '' }}>
                                                    {{ $ds->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="index_id"><strong>Nama Pasangan</strong></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select name="pasangan_id" class="custom-select name-pasangan" id="inputGroupSelect01">
                                        @foreach ($pasangan as $ds)
                                            <option value="{{ $ds->id }}"
                                                {{ old('pasangan_id') ?? $data->pasangan_id == $ds->id ? 'selected' : '' }}>
                                                <strong>Pria: </strong> {{ $ds->nama_pria }} - <strong>Wanita :
                                                </strong>{{ $ds->nama_wanita }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pasangan_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tanggal Pernikahan</label>
                                <input type="date" class="form-control"name="tanggal_pernikahan" required
                                    value="{{ $data->tanggal_pernikahan }}">
                                @error('tanggal_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jam Mulai</label>
                                <input type="time" class="form-control" name="jam_mulai" required
                                    value="{{ $data->jam_mulai }}">
                                @error('jam_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jam Selesai</label>
                                <input type="time" class="form-control" name="jam_selesai" required
                                    value="{{ $data->jam_selesai }}">
                                @error('jam_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tempat Pernikahan</label>
                                <input type="text" class="form-control" name="tempat" required
                                    value="{{ $data->tempat }}">
                                @error('tempat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status" readonly required
                                    value="{{ $data->status }}">
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 disabled">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status_arsip" readonly required
                                    value="{{ $data->status_arsip }}">
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary"
                            onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                        <a href="{{ route('data-jadwal-pasangan') }}" type="submit" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
