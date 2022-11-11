<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    protected $guarded = [ 'id_alumni' ];
    protected $filltable = [ 'email', 'foto_alumni', 'nis', 'nama_alumni', 'tahun_lulus', 'sekolah_lanjutan', 'nama_sekolah', 'jurusan_sekolah', 'alamat', 'telepon'];
    public    $timestamps = false; // Tidak memakai Data Migration

}
