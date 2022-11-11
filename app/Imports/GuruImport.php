<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class GuruImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    //  Jangan lupa Use Importable untuk memanggil Nama Row sesuai dengan nama nya, dan tidak memakai => $row[0]
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row)
    {
        return new Guru([
            'foto_guru' => $row['foto_guru'],
            'nig' => $row['nig'],
            'nama_guru' => $row['nama_guru'],
            'mapel' => $row['mapel'],
            'gelar' => $row['gelar'],
            'mengajar_sejak' => $row['mengajar_sejak'],
            'tgl_lahir' => $row['tgl_lahir'],
            'alamat' => $row['alamat'],
            'telepon' => $row['telepon'],
        ]);
    }

    public function rules(): array
    {
        return [
            'foto_guru' => 'required',
            'nig' => 'required|unique:guru',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'gelar' => 'required',
            'mengajar_sejak' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
    }
}
