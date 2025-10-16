<?php

namespace App\Imports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PendaftaranImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pendaftaran([
            'nama_lengkap'  => $row['nama_lengkap'],
            'alamat'        => $row['alamat'],
            'tempat_lahir'  => $row['tempat_lahir'],
            'tanggal_lahir' => Date::excelToDateTimeObject($row['tanggal_lahir']),
            'hobi'          => $row['hobi'],
            'foto'          => 'default.jpg',
            'no_hp'         => $row['no_hp'],
            'email'         => $row['email'],
            'nama_ayah'     => $row['nama_ayah'],
            'asal_sekolah'  => $row['asal_sekolah'],
            'nik'           => $row['nik'],
        ]);
    }
}
