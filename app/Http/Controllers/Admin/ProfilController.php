<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class ProfilController
{
    public function index()
    {
        $idUser = session('id');
        $user = DB::table('user')->where('id', $idUser)->get();
        return view('admin.profil.index', ['user' => $user[0]]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $id = session('id');
        unset($data['_token']);
        $gambar = $request->file('gambar');
        if ($request->gambar) {
            $lokasi = "assets/images/user";
            $nama = "user-".time().".".$gambar->extension();
            try {
                $gambar->move($lokasi, $nama);
                $gambarDelete = DB::table("user")->where('id', $id)->value('gambar');
                File::delete($gambarDelete);
                $request->session()->put('nama', $request->nama);
                DB::table('user')->where('id', $id)->update(array_merge($data, ['gambar' => $lokasi."/".$nama]));
                return redirect()->back()->with('sukses', 'Berhasil update profil');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        } else {
            unset($data['gambar']);
            try {
                DB::table('user')->where('id', $id)->update($data);
                $request->session()->put('nama', $request->nama);
                return redirect()->back()->with('sukses', 'Berhasil update profil');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
    }
}
