<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function UserLogin()
    {
        if(Auth::check())
        {
            return redirect('adminsmpinh@@');
        }
        return view('admin.login');
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect('login@@')->with('alert', ['bg' => 'success', 'message' => 'Anda berhasil Logout']);
    }

    public function LogProses(Request $request)
    {
        $users = User::where('username', $request->username)->first();
        if($users === NULL || !Hash::check($request->password, $users->password) )
        {
            return redirect('login@@')->with('alert', ['bg' => 'success', 'message' => 'Anda berhasil Logout']);
        }

        Auth::login($users);
        return redirect('adminsmpinh@@');
    }
}
