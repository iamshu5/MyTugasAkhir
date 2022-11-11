<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';
    protected $primaryKey = 'id_kontak';
    protected $guarded = [ 'id_kontak' ];
    protected $filltable = [ 'nama', 'email', 'pesan'];
    public    $timestamps = false; // Tidak memakai Data Migration
}
