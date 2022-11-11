<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AlumniImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumni([
            'email' => $row['email'],
            'foto_alumni' => $row['foto_alumni'],
            'nis' => $row['nis'],
            'nama_alumni' => $row['nama_alumni'],
            'tahun_lulus' => $row['tahun_lulus'],
            'sekolah_lanjutan' => $row['sekolah_lanjutan'],
            'nama_sekolah' => $row['nama_sekolah'],
            'jurusan_sekolah' => $row['jurusan_sekolah'],
            'alamat' => $row['alamat'],
            'telepon' => $row['telepon'],
        ]);
    }

    public function rules(): array
    {
        return[
            'email' => 'required',
            'foto_alumni' => 'required',
            'nis' => 'required|unique:alumni',
            'nama_alumni' => 'required',
            'tahun_lulus' => 'required',
            'sekolah_lanjutan' => 'required',
            'nama_sekolah' => 'required',
            'jurusan_sekolah' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
    }
}
