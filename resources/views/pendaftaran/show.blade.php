<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('storage/pendaftaran/' . $pendaftaran->foto) }}" class="w-50 rounded">
                        </div>
                        <hr>
                        <h3>{{ $pendaftaran->nama_lengkap }}</h3>
                        <p class="tmt-3">
                            NIK: <strong>{{ $pendaftaran->nik }}</strong>
                        </p>
                        <p class="tmt-3">
                            Tempat, Tanggal Lahir: <strong>{{ $pendaftaran->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d F Y') }}</strong>
                        </p>
                        <p class="tmt-3">
                            Alamat: <strong>{!! $pendaftaran->alamat !!}</strong>
                        </p>
                        <p class="tmt-3">
                            Hobi: <strong>{{ $pendaftaran->hobi }}</strong>
                        </p>
                        <p class="tmt-3">
                            No. HP: <strong>{{ $pendaftaran->no_hp }}</strong>
                        </p>
                        <p class="tmt-3">
                            Email: <strong>{{ $pendaftaran->email }}</strong>
                        </p>
                        <p class="tmt-3">
                            Nama Ayah: <strong>{{ $pendaftaran->nama_ayah }}</strong>
                        </p>
                        <p class="tmt-3">
                            Asal Sekolah: <strong>{{ $pendaftaran->asal_sekolah }}</strong>
                        </p>

                        <a href="{{ route('pendaftaran.index') }}" class="btn btn-md btn-secondary mt-3">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
