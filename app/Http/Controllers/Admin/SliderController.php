<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Carbon\Carbon;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('slider')->orderBy('id', 'desc')->get();
        return view('admin.slider.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'deskripsi' => $request->deskripsi
        ];
        $destination = "assets/images/slider/slider-".time().".".$request->file('gambar')->extension();
        try {
            move_uploaded_file($request->file('gambar'), $destination);
            DB::table('slider')->insert(array_merge($data, ['gambar' => $destination]));
            return redirect('admin/slider')->with('sukses', 'Berhasil tambah slider');
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
        $slider = DB::table('slider')->where('id', $id)->get();
        return view('admin.slider.edit', ['slider' => $slider]);
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
        $data = [
            'deskripsi' => $request->deskripsi
        ];
        unset($data['_token'], $data['_method']);
        if ($request->file('gambar')) {
            $destination = "assets/images/slider/slider-".time().".".$request->file('gambar')->extension();
            $pathHapus = DB::table('slider')->where('id', $id)->value('gambar');
            File::delete($pathHapus);
            try {
                move_uploaded_file($request->file('gambar'), $destination);
                DB::table('slider')->where('id', $id)->update(array_merge($data, ['gambar' => $destination]));
                return redirect('admin/slider')->with('sukses', 'Berhasil tambah slider');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        } else {
            try {
                DB::table('slider')->where('id', $id)->update(array_merge($data, ['updated_at' => Carbon::now()]));
                return redirect('admin/slider')->with('sukses', 'Berhasil tambah slider');
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
            $gambar = DB::table('slider')->where('id', $id)->value('gambar');
            File::delete($gambar);
            DB::table('slider')->where('id', $id)->delete();
            return redirect('admin/slider')->with('sukes', 'Berhasil hapus slider');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
