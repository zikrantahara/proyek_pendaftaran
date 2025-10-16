<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftaranExport;
use App\Imports\PendaftaranImport;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan daftar semua pendaftar.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::latest()->paginate(10);
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Menampilkan form untuk membuat pendaftar baru.
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Menyimpan data pendaftar baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input menggunakan $request->validate()
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat'       => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'hobi'         => 'required|string|max:150',
            'foto'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'no_hp'        => 'required|string|max:15',
            'email'        => 'required|email|unique:pendaftarans,email',
            'nama_ayah'    => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:150',
            'nik'          => 'required|string|max:20|unique:pendaftarans,nik',
        ]);

        // Upload gambar
        $foto = $request->file('foto');
        $fotoPath = $foto->store('pendaftaran', 'public');

        // Buat record baru
        Pendaftaran::create([
            'foto'          => basename($fotoPath),
            'nama_lengkap'  => $request->nama_lengkap,
            'alamat'        => $request->alamat,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hobi'          => $request->hobi,
            'no_hp'         => $request->no_hp,
            'email'         => $request->email,
            'nama_ayah'     => $request->nama_ayah,
            'asal_sekolah'  => $request->asal_sekolah,
            'nik'           => $request->nik,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pendaftaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Menampilkan detail satu pendaftar.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        return view('pendaftaran.show', compact('pendaftaran'));
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        // Validasi input menggunakan $request->validate()
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat'       => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'hobi'         => 'required|string|max:150',
            'foto'         => 'image|mimes:jpeg,jpg,png|max:2048', // foto tidak wajib
            'no_hp'        => 'required|string|max:15',
            'email'        => 'required|email|unique:pendaftarans,email,' . $pendaftaran->id,
            'nama_ayah'    => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:150',
            'nik'          => 'required|string|max:20|unique:pendaftarans,nik,' . $pendaftaran->id,
        ]);

        // Buat array data tanpa foto
        $updateData = $request->except('foto');

        // Cek jika ada foto baru diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::disk('public')->delete('pendaftaran/' . $pendaftaran->foto);

            // Upload foto baru
            $foto = $request->file('foto');
            $fotoPath = $foto->store('pendaftaran', 'public');

            // Tambahkan nama file foto baru ke data update
            $updateData['foto'] = basename($fotoPath);
        }

        // Update record
        $pendaftaran->update($updateData);

        // Redirect dengan pesan sukses
        return redirect()->route('pendaftaran.index')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        // Hapus foto dari storage
        Storage::disk('public')->delete('pendaftaran/' . $pendaftaran->foto);

        // Hapus record dari database
        $pendaftaran->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pendaftaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


    /**
     * Mengekspor data pendaftar ke file Excel.
     */
    public function export()
    {
        $namaFile = 'data_pendaftar_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new PendaftaranExport, $namaFile);
    }

    /**
     * Menampilkan form untuk import data.
     */
    public function showImportForm()
    {
        return view('pendaftaran.import'); // Kita akan buat file ini
    }

    /**
     * Mengimpor data dari file Excel ke database.
     */
    public function import(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Proses import
        Excel::import(new PendaftaranImport, $request->file('file'));

        // Redirect kembali dengan pesan sukses
        return redirect()->route('pendaftaran.index')->with('success', 'Data pendaftar berhasil diimpor!');
    }
}
