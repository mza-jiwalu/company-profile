<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $cek = DB::table('user')->where('username', $username)->get();
        if(count($cek) != 0) {
            if(Hash::check($password, $cek[0]->password)) {
                $request->session()->put('login', true);
                $request->session()->put('nama', $cek[0]->nama);
                $request->session()->put('id', $cek[0]->id);
                $request->session()->put('role', $cek[0]->role);
                return redirect('admin');
            } else {
                return redirect()->back()->with(['error' => 'Password salah!', 'username' => $username]);
            }
        } else {
            return redirect()->back()->with('error', 'Username salah!');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('admin/login');
    }
}
