<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FOTO (kosongkan jika tidak diubah)</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto">
                                @error('foto')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA LENGKAP</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}"
                                    placeholder="Masukkan Nama Lengkap">
                                @error('nama_lengkap')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">TEMPAT LAHIR</label>
                                        <input type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            name="tempat_lahir"
                                            value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}"
                                            placeholder="Masukkan Tempat Lahir">
                                        @error('tempat_lahir')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">TANGGAL LAHIR</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">ALAMAT</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5"
                                    placeholder="Masukkan Alamat Lengkap">{{ old('alamat', $pendaftaran->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">HOBI</label>
                                        <input type="text" class="form-control @error('hobi') is-invalid @enderror"
                                            name="hobi" value="{{ old('hobi', $pendaftaran->hobi) }}"
                                            placeholder="Masukkan Hobi">
                                        @error('hobi')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">NO. HP</label>
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                            name="no_hp" value="{{ old('no_hp', $pendaftaran->no_hp) }}"
                                            placeholder="Masukkan Nomor HP">
                                        @error('no_hp')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">EMAIL</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $pendaftaran->email) }}"
                                    placeholder="Masukkan Alamat Email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA AYAH</label>
                                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror"
                                    name="nama_ayah" value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}"
                                    placeholder="Masukkan Nama Ayah">
                                @error('nama_ayah')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">ASAL SEKOLAH</label>
                                        <input type="text"
                                            class="form-control @error('asal_sekolah') is-invalid @enderror"
                                            name="asal_sekolah"
                                            value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah) }}"
                                            placeholder="Masukkan Asal Sekolah">
                                        @error('asal_sekolah')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                            name="nik" value="{{ old('nik', $pendaftaran->nik) }}"
                                            placeholder="Masukkan NIK">
                                        @error('nik')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
