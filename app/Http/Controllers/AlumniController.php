<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;
use App\Exports\AlumniExport;
use App\Imports\AlumniImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Alumni; // Tambah Models Alumni

class AlumniController extends Controller
{
    public function DataAlumni(Request $request)
    {
        // Mengambil data dari tabel Alumni
        $DataAlumni = Alumni::when(!empty($request->search_alumni), function($query) use($request){
                      $query->where('nama_alumni', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('email', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('nis', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('tahun_lulus', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('sekolah_lanjutan', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('nama_sekolah', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('jurusan_sekolah', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('alamat', 'like', '%'.$request->search_alumni.'%')
                      ->orWhere('telepon', 'like', '%'.$request->search_alumni.'%');}
                      )->paginate(20);
        // Kembali ke halaman Alumni
        return view('admin.alumni.data-alumni', ['alumni' => $DataAlumni]);
    }


    // Buat Data Alumni
    public function CreateAlumni(Request $request)
    {
        // Form Validasi.
        $rules=[
            'email' => 'email',
            'foto_alumni' => 'required|mimes:jpeg,png,jpg',
            'nis' => 'required',
            'nama_alumni' => 'required',
            'tahun_lulus' => 'required',
            'sekolah_lanjutan' => 'required',
            'nama_sekolah' => 'required',
            'jurusan_sekolah' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
        $message=[
            'required' =>' Pesan: Attribut ini tidak boleh kosong',
            'email' =>' Pesan: Masukan Email dengan benar ',
            'unique' =>' Pesan: Attribut ini tidak boleh kosong',
            'min' =>' Pesan: Attribut ini terlalu pendek',
            'max' =>' Pesan: Attribut ini terlalu panjang',
        ];
        $this->validate($request, $rules, $message);

        // Upload file gambar
        $fileName = $request->foto_alumni->getClientOriginalName(); // Nama file akan tersimpan dengan nama aslinya.
        $request->foto_alumni->storeAs('assets/admin/image/foto_alumni', $fileName); // Lokasi simpan gambar.

        $alumni = new Alumni(); // Buat Variabel $alumni mengambil dari Model -> Alumni.

        $alumni->email = $request->email;
        $alumni->foto_alumni = $fileName;
        $alumni->nis = $request->nis;
        $alumni->nama_alumni = $request->nama_alumni;
        $alumni->tahun_lulus = $request->tahun_lulus;
        $alumni->sekolah_lanjutan = $request->sekolah_lanjutan;
        $alumni->nama_sekolah = $request->nama_sekolah;
        $alumni->jurusan_sekolah = $request->jurusan_sekolah;
        $alumni->alamat = $request->alamat;
        $alumni->telepon = $request->telepon;

        $alumni->save();
        return redirect('admin/alumni/data-alumni')->with('alert', ['bg' => 'success', 'message' => 'Hore, Data Alumni Berhasil ditambahkan!']);
    }

    // Untuk input data secara mandiri ada di views '/form-alumni'
    public function register(Request $request)
    {
        // Form Validasi.
        $rules=[
            'foto_alumni' => 'required|mimes:jpeg,png,jpg',
            'email' => 'required',
            'nis' => 'required',
            'nama_alumni' => 'required',
            'tahun_lulus' => 'required',
            'sekolah_lanjutan' => 'required',
            'nama_sekolah' => 'required',
            'jurusan_sekolah' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
        $message=[
            'required' =>' Pesan: Attribut ini tidak boleh kosong',
            'mimes' =>' Pesan: Format Foto Harus JPG dan JPEG!',
            'unique' =>' Pesan: Attribut ini tidak boleh kosong',
            'min' =>' Pesan: Attribut ini terlalu pendek',
            'max' =>' Pesan: Attribut ini terlalu panjang',
        ];
        $this->validate($request, $rules, $message);

        // Upload file gambar
        $fileName = $request->foto_alumni->getClientOriginalName(); // Nama file akan tersimpan dengan nama aslinya.
        $request->foto_alumni->storeAs('assets/admin/image/foto_alumni', $fileName); // Lokasi simpan gambar.

        $alumni = new Alumni(); // Buat Variabel $alumni mengambil dari Model -> Alumni.

        $alumni->email = $request->email;
        $alumni->foto_alumni = $fileName;
        $alumni->nis = $request->nis;
        $alumni->nama_alumni = $request->nama_alumni;
        $alumni->tahun_lulus = $request->tahun_lulus;
        $alumni->sekolah_lanjutan = $request->sekolah_lanjutan;
        $alumni->nama_sekolah = $request->nama_sekolah;
        $alumni->jurusan_sekolah = $request->jurusan_sekolah;
        $alumni->alamat = $request->alamat;
        $alumni->telepon = $request->telepon;

        $alumni->save();
        return redirect('/form-alumni')->with('alert', ['bg' => 'success', 'message' => 'Terima kasih, Data kamu berhasil dikirim!']);
    }

    public function EditAlumni(Alumni $alumni, Request $request)
    {
        if(!empty($request->foto_alumni))
        {
            @unlink(public_path("assets/admin/image/foto_alumni/{$alumni->foto_alumni}")); //Lokasi Tersimpannya Foto Alumni
            $fileName = $request->foto_alumni->getClientOriginalName();
            $request->foto_alumni->storeAs('assets/admin/image/foto_alumni', $fileName);
        }else{
            $fileName = $alumni->foto_alumni; //Pakai foto sebelumnya
        }

        $alumni->email = $request->email;
        $alumni->foto_alumni = $fileName;
        $alumni->nis = $request->nis;
        $alumni->nama_alumni = $request->nama_alumni;
        $alumni->tahun_lulus = $request->tahun_lulus;
        $alumni->sekolah_lanjutan = $request->sekolah_lanjutan;
        $alumni->nama_sekolah = $request->nama_sekolah;
        $alumni->jurusan_sekolah = $request->jurusan_sekolah;
        $alumni->alamat = $request->alamat;
        $alumni->telepon = $request->telepon;

        $alumni->save(); //
        return redirect('admin/alumni/data-alumni')->with('alert', ['bg' => 'success', 'message' => 'Data Alumni Berhasil diubah']);
    }

    public function DeleteAlumni(Alumni $alumni)
    {
        $pathFoto_Alumni = public_path("assets/admin/image/foto_alumni/{$alumni->foto_alumni}");
        if( file_exists($pathFoto_Alumni)) @unlink ($pathFoto_Alumni); //Foto alumni yang tersimpan di Folder assets/admin/image/foto_alumni/... ikut terhapus.

        $alumni->delete();
        return redirect('admin/alumni/data-alumni')->with('alert', ['bg' => 'success', 'message' => 'Data Alumni Berhasil dihapus.']);
    }

    public function alumniexportpdf()
    {
        $alumni = Alumni::all(); // Model -> Alumni

        view()->share('alumni', $alumni);
        $pdf = PDF::loadView('admin/alumni/dataalumni-pdf'); //Tidak terlalu fatal. Karna use Barryvdh\DomPDF\PDF; tidak mendukung, maka dari itu saya pakai use PDF; saja.
        return $pdf->download('data-alumni.pdf');
    }

    public function alumniexportexcel()
    {
        return Excel::download(new AlumniExport(), 'data-alumni.xlsx');
    }

    public function alumniimportexcel(Request $request)
    {
        $rules=[
            'alumniiimportexcel' => 'required|mimes:xlsx',
        ];
        $message=[
            'required' =>' :Hanya bisa mengupload format file .xlxs',
            'mimes' => 'Format Harus .xlxs',
        ];
        $this->validate($request, $rules, $message);

        $alumni = $request->file('alumniiimportexcel'); //Panggil nama div folder nya.
        $fileName = $alumni->getClientOriginalName();
        $alumni->move('assets/admin/excel/import', $fileName); //Simpan lokasi folder

        Excel::import(new AlumniImport, \public_path('assets/admin/excel/import/' . $fileName));
        return redirect('admin/alumni/data-alumni')->with('alert', ['bg' => 'success', 'message' => 'Data Excel Berhasil di Import!']);
    }
}
