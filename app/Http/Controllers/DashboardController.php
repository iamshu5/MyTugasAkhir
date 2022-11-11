<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function jumlahalumni()
    {
        // BAR COLUMN TAHUN LULUS
        $alumni = Alumni::orderBy('tahun_lulus', 'ASC')->get();

        $categories = collect([]);
        $data = collect([]);
        foreach($alumni as $a) {
            if($categories->search($a->tahun_lulus) !== false){
                continue;
            }
            $data->push( Alumni::where('tahun_lulus', $a->tahun_lulus)->count() );
            $categories->push($a->tahun_lulus);
        }

        $sekolah_lanjutan = Alumni::orderBy('sekolah_lanjutan', 'ASC')->get();

        $data_sekolah = [
            'SMA' => 0,
            'SMK' => 0,
            'MA' => 0,
            'MAK' => 0,
            'PONDOK_PESANTREN' => 0,
        ];

        foreach($data_sekolah as $kategori_lulusan => $value) {
            $data_sekolah[ $kategori_lulusan ] = Alumni::where('sekolah_lanjutan', $kategori_lulusan)->count();
        }

        // $categories = json_encode($categories);
        // dd(json_encode($categories));
        $jumlahAlumni = DB::table('alumni')->count();
        $jumlahGuru = DB::table('guru')->count();
        $jumlahKontak = DB::table('kontak')->count();
        return view('/admin/dashboard', ['alumni' => $jumlahAlumni, 'guru' => $jumlahGuru, 'kontak' => $jumlahKontak, 'categories' => $categories, 'data' => $data, 'data_sekolah' => $data_sekolah]);
    }
}
