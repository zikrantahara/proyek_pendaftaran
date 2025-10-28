<!DOCTYPE html>
<html>

<head>
    <title>Data Pendaftar</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h3 style="text-align: center;">Laporan Data Pendaftar</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>NIK</th>
                <th>Asal Sekolah</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftarans as $pendaftaran)
                <tr>
                    <td>{{ $pendaftaran->id }}</td>
                    <td>{{ $pendaftaran->nama_lengkap }}</td>
                    <td>{{ $pendaftaran->email }}</td>
                    <td>{{ $pendaftaran->nik }}</td>
                    <td>{{ $pendaftaran->asal_sekolah }}</td>
                    <td>{{ $pendaftaran->created_at->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
