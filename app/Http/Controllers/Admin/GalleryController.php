<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = DB::table('gallery')->get();
        return view('admin.gallery.index', ['data' => $gallerys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis = $request->jenis;
        if($jenis == 'foto') {
            $foto = $request->file('foto');
            $nama = 'gallery-'.time().'.'.$foto->extension();
            $lokasi = 'assets/images/gallery';
            $foto->move($lokasi, $nama);
            $data = [
                'jenis' => $jenis,
                'path' => $lokasi.'/'.$nama,
                'judul' => $request->judul
            ];
            try {
                DB::table('gallery')->insert($data);
                return redirect()->route('gallery.index')->with('success', 'Add Gallery Successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        } else {
            $data = [
                'jenis' => $jenis,
                'path' => $request->path,
                'judul' => $request->judul
            ];
            try {
                DB::table('gallery')->insert($data);
                return redirect()->route('gallery.index')->with('success', 'Add Gallery Successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
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
        try {
            $gallery = DB::table('gallery')->where('id', $id)->get();
            return view('admin.gallery.edit', ['gallery' => $gallery]);
        } catch (\Throwable $th) {
            return redirect()->route('gallery.index')->with('error', $th->getMessage());
        }
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
        $jenis = $request->jenis;
        if($jenis == 'foto') {
            $foto = $request->file('foto');
            $nama = 'gallery-'.time().'.'.$foto->extension();
            $lokasi = 'assets/images/gallery';
            $foto->move($lokasi, $nama);
            $data = [
                'jenis' => $jenis,
                'path' => $lokasi.'/'.$nama,
                'judul' => $request->judul,
                'updated_at' => \Carbon\Carbon::now()
            ];
            try {
                $fotoLama = DB::table('gallery')->where('id', $id)->value('path');
                File::delete($fotoLama);
                DB::table('gallery')->where('id', $id)->update($data);
                return redirect()->route('gallery.index')->with('success', 'Update Gallery Successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        } else {
            $data = [
                'jenis' => $jenis,
                'path' => $request->path,
                'judul' => $request->judul,
                'updated_at' => \Carbon\Carbon::now()
            ];
            try {
                DB::table('gallery')->where('id', $id)->update($data);
                return redirect()->route('gallery.index')->with('success', 'Update Gallery Successfully');
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
            $foto = DB::table('gallery')->where('id', $id)->value('path');
            File::delete($foto);
            DB::table('gallery')->where('id', $id)->delete();
            return redirect()->route('gallery.index')->with('success', 'Delete Gallery successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
