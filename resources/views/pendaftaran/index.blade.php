<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pendaftar</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('pendaftaran.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        <a href="{{ route('pendaftaran.export') }}" class="btn btn-md btn-info mb-3">EXPORT EXCEL</a>
                        <a href="{{ route('pendaftaran.show_import_form') }}" class="btn btn-md btn-warning mb-3">IMPORT DATA</a>
                        <a href="{{ route('pendaftaran.export_pdf') }}" class="btn btn-md btn-danger mb-3">EXPORT PDF</a>
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th scope="col">FOTO</th>
                                    <th scope="col">NAMA LENGKAP</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ASAL SEKOLAH</th>
                                    <th scope="col" style="width: 20%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendaftarans as $pendaftaran)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/pendaftaran/' . $pendaftaran->foto) }}"
                                                class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $pendaftaran->nama_lengkap }}</td>
                                        <td>{{ $pendaftaran->email }}</td>
                                        <td>{{ $pendaftaran->asal_sekolah }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}"
                                                method="POST">
                                                <a href="{{ route('pendaftaran.show', $pendaftaran->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data pendaftar belum tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pendaftarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Pesan dengan sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>

</html>
