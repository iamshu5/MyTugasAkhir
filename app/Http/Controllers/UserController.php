<?php

namespace App\Http\Controllers;

use App\Models\User; // Tambah Models User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Ambil Data dari Database.
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash; // Digunakan untuk membuat Password menjadi Hash.

class UserController extends Controller
{
    // Display Data User
    public function DataUsers(Request $request)
    {
        //  Display Data
         $Users = User::when(!empty($request->search_users), function($query) use($request) {
                    $query->where('username', 'like', '%'.$request->search_users.'%')
                    ->orWhere('telepon', 'like', '%'.$request->search_users.'%'); }
                    )->paginate(3); // Get untuk menampilkan Data.

         return view('admin.users.data-users', ['users' => $Users]);
    }

    // Buat Data
    public function CreateUsers(Request $request)
    {
        $rules=[
            'foto' => 'required|mimes:jpeg,png,jpg',
            'username' => 'required',
            'password' => 'required|min:7|max:20',
            'nama_user' => 'required',
            'telepon' => 'required|max:13',
        ];
        $message=[
            'required' =>' Pesan: Attribut ini tidak boleh kosong',
            'mimes' =>' Pesan: Format Foto hanya boleh .jpeg, .jpg, .png',
            'unique' =>' Pesan: Attribut ini tidak boleh kosong',
            'min' =>' Pesan: Minimal 7 huruf',
            'max' =>' Pesan: Maksimal 20 huruf',
        ];
        $this->validate($request, $rules, $message);
        // Untuk Upload file gambar.
        $fileName = $request->foto->getClientOriginalName(); // Nama gambar tidak akan berubah.
        $request->foto->storeAs('assets/admin/image/users', $fileName); // Lokasi menyimpan Gambar

        $user = new User(); // Buat Variabel $user mengambil dari Model User.

        $user->foto = $fileName;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->nama_user = $request->nama_user;
        $user->telepon = $request->telepon;

        $user->save(); //Alert
        return redirect('admin/users/data-users')->with('alert', ['bg' => 'success', 'message' => 'Data User berhasil ditambahkan!']);
    }

    // Edit Data
    public function EditUsers(User $user, Request $request) // Extends Models => USer
    {
        // Kondisi untuk File Upload Gambar
        if(!empty($request->foto)) {
            @unlink(public_path("assets/admin/image/users/{$user->foto}")); // Lokasi Foto Tersimpan di Package Public => assets => admin =? image.
            $fileName = $request->foto->getClientOriginalName(); // Nama Gambar tesimpan sesuai yang di upload.
            $request->foto->storeAs('assets/admin/image/users', $fileName); // Lokasi menyimpan File
        } else {
            $fileName = $user->foto; // Jika tidak mengedit gambar maka menggunakan gambar sebelumnya.
        }

        // Menangkap Data yang sudah ada.
        $user->foto = $fileName;
        $user->username = $request->username;
        $user->password = !empty($request->password) ? Hash::make($request->password) : $user->password;
        $user->nama_user = $request->nama_user;
        $user->telepon = $request->telepon;

        $user->save(); // Alert
        return redirect('admin/users/data-users')->with('alert', ['bg' => 'success', 'message' => 'Data User berhasil di edit!']);
    }

        // Delete Data
        public function DeleteUsers(User $user) {
            $pathFoto = public_path("assets/admin/image/users/{$user->foto}");
            if(file_exists($pathFoto)) @unlink($pathFoto);

            $user->delete();
            return redirect('admin/users/data-users')->with('alert', ['bg' => 'success', 'message' => 'Data User berhasil dihapus!']);
        }

}
