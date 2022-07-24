<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <p class="text-center font-weight-bold">{{ $text }} </p>
    <div class="mt-4 mb-4">
        <table>
            <tr>
                <td><strong>Note:</strong></td>
            </tr>
            <tr>
                <td>Name </td>
                <td> : {{ $idUser->name }}</td>
            </tr>
            <tr>
                <td>User Role</td>
                <td> : {{ $idUser->user_role }}</td>
            </tr>
            <tr>
                <td>Total Data: </td>
                <td> : {{ $data->count() }}</td>
            </tr>
        </table>
    </div>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope="col">No Akta</th>
                <th scope="col">Nama Pria</th>
                <th scope="col">Nama Wanita</th>
                <th scope="col">Agama Pria</th>
                <th scope="col">Agama Wanita</th>
                <th scope="col">Tanggal Pernikahan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->no_akta ??  '-'}}</td>
                    <td>{{ $item->pasangan->nama_pria }}</td>
                    <td>{{ $item->pasangan->nama_wanita }}</td>
                    <td>{{ $item->pasangan->agama_pria }}</td>
                    <td>{{ $item->pasangan->agama_wanita }}</td>
                    <td>{{ $item->tanggal_pernikahan }}</td>
                    @if ($item->status === 'Approved')
                        <td>Sudah Menikah</td>
                    @else
                        <td>Belum Menikah</td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
