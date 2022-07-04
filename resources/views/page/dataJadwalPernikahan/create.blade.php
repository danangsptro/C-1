@extends('masterBackend')
@section('title', 'DATA | CREATE JADWAL PERNIKAHAN')


@section('backend')
    <style>
        .card-content {
            margin-top: 5rem;
        }
    </style>

    <div class="container card-content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Jadwal Pernikahan</h6>
            </div>
            <div class="container-fluid mt-4 mb-4">
                <form method="POST" action="{{ route('data-store-jadwal-pernikahan') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label mb-1">Nama Penghulu</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="user_id">
                                        <option selected>Pilih Option</option>
                                        @foreach ($user as $item)
                                            @if ($item->user_role === 'penghulu')
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Pernikahan</label>
                                <input type="date" class="form-control" name="tanggal_pernikahan" required>
                                @error('tanggal_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jam Pernikahan</label>
                                <input type="time" class="form-control" name="jam_pernikahan" required>
                                @error('jam_pernikahan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tempat</label>
                                <textarea name="tempat" id="" class="form-control"cols="30" rows="10" required></textarea>
                                @error('tempat')
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
