<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Carbon\Carbon;

class PelangganKamiController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = DB::table('pelanggan_kami')->orderBy('id', 'desc')->get();
        return view('admin.pelanggan.index', ['pelanggans' => $pelanggans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelanggan = [
            'nama' => $request->nama,
            "gambar" => $request->file('gambar')
        ];
        
        $destination = "assets/images/pelanggan/pelanggan-".time().".".$pelanggan['gambar']->extension();
        try {
            move_uploaded_file($pelanggan['gambar'], $destination);
            DB::table('pelanggan_kami')->insert(array_merge($pelanggan, ['gambar' => $destination]));
            return redirect()->route('pelanggan.index')->with('success', 'Berhasil tambah pelanggan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = DB::table('pelanggan_kami')
        ->where('id', $id)->get();
        return view('admin.pelanggan.edit', ['pelanggan' => $pelanggan[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan = [
            'nama' => $request->nama,
        ];
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $destination = "assets/images/pelanggan/pelanggan-".time().".".$gambar->extension();
            try {
                $gambarHapus = DB::table('pelanggan_kami')->where('id', $id)->value('gambar');
                move_uploaded_file($gambar, $destination);
                File::delete($gambarHapus);
                DB::table('pelanggan_kami')
                ->where('id', $id)
                ->update(array_merge($pelanggan, ['gambar' => $destination]));
                return redirect()->route('pelanggan.index')->with('success', 'Berhasil update pelanggan');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        } else {
            $pelanggan = [
                'nama' => $request->nama
            ];
            try {
                DB::table('pelanggan_kami')
                ->where('id', $id)
                ->update($pelanggan);
                return redirect()->route('pelanggan.index')->with('success', 'Berhasil update pelanggan');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('pelanggan_kami')->where('id', $id)->delete();
            return redirect()->route('pelanggan.index')->with('success', 'Berhasil hapus data pelanggan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
