<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use PDF;
use App\Models\Guru; // Tambah Models guru
use App\Exports\GuruExport;
use App\Imports\GuruImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function DataGuru(Request $request)
    {
        $DataGuru = Guru::when(!empty($request->search_guru), function ($query) use ($request) {
            $query
                ->where('nig', 'like', '%' . $request->search_guru . '%')
                ->orWhere('nama_guru', 'like', '%' . $request->search_guru . '%')
                ->orWhere('mapel', 'like', '%' . $request->search_guru . '%')
                ->orWhere('gelar', 'like', '%' . $request->search_guru . '%')
                ->orWhere('mengajar_sejak', 'like', '%' . $request->search_guru . '%')
                ->orWhere('tgl_lahir', 'like', '%' . $request->search_guru . '%')
                ->orWhere('alamat', 'like', '%' . $request->search_guru . '%')
                ->orWhere('telepon', 'like', '%' . $request->search_guru . '%');
                Guru::all()->orderBy('nama_guru', 'asc');
        })->paginate(4);

        // Kembali ke halaman guru
        return view('admin.guru.data-guru', ['guru' => $DataGuru]);
    }

    public function createGuru(Request $request)
    {
        // Form Validasi

        $rules=[
            'foto_guru' => 'required|mimes:jpeg,png,jpg',
            'nig' => 'required',
            'nama_guru' => 'required',
            'mapel' => 'required',
            'gelar' => 'required',
            'mengajar_sejak' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
        $message=[
            'required' =>' Pesan: Attribut ini tidak boleh kosong',
            'unique' =>' Pesan: Attribut ini tidak boleh kosong',
            'min' =>' Pesan: Attribut ini terlalu pendek',
            'max' =>' Pesan: Attribut ini terlalu panjang',
        ];
        $this->validate($request, $rules, $message);

        $fileName = $request->foto_guru->getClientOriginalName(); // Nama file akan tersimpan dengan nama aslinya.
        $request->foto_guru->storeAs('assets/admin/image/foto_guru', $fileName); // Lokasi simpan gambar.

        $guru = new Guru(); //Variabel dari Models -> Guru

        $guru->foto_guru = $fileName;
        $guru->nig = $request->nig;
        $guru->nama_guru = $request->nama_guru;
        $guru->mapel = $request->mapel;
        $guru->gelar = $request->gelar;
        $guru->mengajar_sejak = $request->mengajar_sejak;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->alamat = $request->alamat;
        $guru->telepon = $request->telepon;

        $guru->save();
        return redirect('admin/guru/data-guru')->with('alert', ['bg' => 'success', 'message' => 'Data Guru berhasil ditambahkan']);
    }

    public function editGuru(Guru $guru, Request $request)
    {
        if (!empty($request->foto_guru)) {
            @unlink(public_path("assets/admin/image/foto_guru/{$guru->foto_guru}")); //Lokasi Tersimpannya Foto guru
            $fileName = $request->foto_guru->getClientOriginalName();
            $request->foto_guru->storeAs('assets/admin/image/foto_guru', $fileName);
        } else {
            $fileName = $guru->foto_guru; //Pakai Foto Sebelumnya.
        }

        $guru->foto_guru = $fileName;
        $guru->nig = $request->nig;
        $guru->nama_guru = $request->nama_guru;
        $guru->mapel = $request->mapel;
        $guru->gelar = $request->gelar;
        $guru->mengajar_sejak = $request->mengajar_sejak;
        $guru->tgl_lahir = $request->tgl_lahir;
        $guru->alamat = $request->alamat;
        $guru->telepon = $request->telepon;

        $guru->save(); //
        return redirect('admin/guru/data-guru')->with('alert', ['bg' => 'success', 'message' => 'Data Guru Berhasil diubah']);
    }

    public function deleteGuru(Guru $guru)
    {
        $pathFoto_Guru = public_path("assets/admin/image/foto_Guru/{$guru->foto_guru}");
        if (file_exists($pathFoto_Guru)) {
            @unlink($pathFoto_Guru);
        }

        $guru->delete();
        return redirect('admin/guru/data-guru')->with('alert', ['bg' => 'success', 'message' => 'Data Guru Berhasil dihapus.']);
    }

    // Export to PDF
    public function guruexportpdf()
    {
        $guru = Guru::all();

        view()->share('guru', $guru);
        $pdf = PDF::loadView('admin/guru/dataguru-pdf');
        return $pdf->download('data-guru.pdf');
    }
    // Export to Excel
    public function guruexportexcel()
    {
        return Excel::download(new GuruExport(), 'data-guru.xlsx');
    }

    // Import to PDF
    public function guruimportexcel(Request $request)
    {
        $rules=[
            'guruuimportexcel' => 'required|mimes:xlsx',
        ];
        $message=[
            'mimes' =>' Pesan: Hanya bisa mengupload format file .xlxs',
            'required' =>' Pesan: Tidak ada File Excel yang dipilih!',
        ];
        $this->validate($request, $rules, $message);

        $guru = $request->file('guruuimportexcel'); //Panggil nama div folder nya.
        $fileName = $guru->getClientOriginalName();
        $guru->move('assets/admin/excel/import', $fileName); //Simpan lokasi folder

        Excel::import(new GuruImport, \public_path('assets/admin/excel/import/' . $fileName));
        return redirect('admin/guru/data-guru')->with('alert', ['bg' => 'success', 'message' => 'Data Excel Berhasil di Import!']);
    }
}
