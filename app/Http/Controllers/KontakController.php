<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function kontakMasuk(Request $request)
    {
        $rules=[
            'nama' => 'required',
            'email' => 'email',
            'pesan' => 'required',
        ];
        $message=[
            'required' => 'Harap isi kolom ini terlebih dahulu!',
            'email' => 'Email tidak boleh kosong',
        ];
        $this->validate($request, $rules, $message);
        $kontak = new Kontak();

        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $kontak->pesan = $request->pesan;

        $kontak->save();
        return redirect('/kontak')->with('alert', ['bg' => 'success', 'message' => 'Terimakasih atas masukan yang Anda berikan kepada kami!']);
    }

    public function kontakAdmin(Request $request){
        $DataKontak = Kontak::when(!empty($request->search_kontak), function ($query) use ($request) {
            $query
                ->where('nama', 'like', '%' . $request->search_kontak . '%')
                ->orWhere('email', 'like', '%' . $request->search_kontak . '%')
                ->orWhere('pesan', 'like', '%' . $request->search_kontak . '%');
        })->paginate(15);

        // Kembali ke halaman kontak
        return view('admin.kontak.data-kontak', ['kontak' => $DataKontak]);
    }

    public function deleteKontak(Kontak $kontak)
    {

        $kontak->delete();
        return redirect('admin/kontak/data-kontak')->with('alert', ['bg' => 'success', 'message' => 'Data Kontak Berhasil dihapus.']);
    }
}
