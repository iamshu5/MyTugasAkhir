<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $guarded =  [ 'id_guru' ];
    protected $filltable = ['foto_guru', 'nig', 'nama_guru', 'mapel', 'gelar', 'mengajar_sejak', 'tgl_lahir', 'alamat', 'telepon'];
    public    $timestamps = false; // Tidak memakai Data Migration

}
