<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftaranExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        // Mengambil semua data dari model Pendaftaran
        return Pendaftaran::query();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Mendefinisikan judul untuk setiap kolom di file Excel
        return [
            'ID',
            'NAMA LENGKAP',
            'ALAMAT',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'HOBI',
            'NO HP',
            'EMAIL',
            'NAMA AYAH',
            'ASAL SEKOLAH',
            'NIK',
            'TANGGAL DAFTAR',
        ];
    }

    /**
     * @param mixed $pendaftaran
     *
     * @return array
     */
    public function map($pendaftaran): array
    {
        // Memetakan data dari objek $pendaftaran ke dalam array
        return [
            $pendaftaran->id,
            $pendaftaran->nama_lengkap,
            $pendaftaran->alamat,
            $pendaftaran->tempat_lahir,
            $pendaftaran->tanggal_lahir,
            $pendaftaran->hobi,
            $pendaftaran->no_hp,
            $pendaftaran->email,
            $pendaftaran->nama_ayah,
            $pendaftaran->asal_sekolah,
            $pendaftaran->nik,
            $pendaftaran->created_at->format('d-m-Y'),
        ];
    }
}
